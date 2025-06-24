<?php
session_start();
require '../interdb.php';

// Fetch school info
$schoolInfo = [];
$result = mysqli_query($link, "SELECT * FROM schoolinfo LIMIT 1");
if ($result && mysqli_num_rows($result) > 0) {
    $schoolInfo = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Student Seat Plan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    /* Bench columns stacked vertically */
    .bench-col {
      display: flex;
      flex-direction: column; /* vertical stack */
      margin-bottom: 20px;
      border: 2px solid #000;
      padding: 10px;
      min-width: 180px;
      position: relative;
    }

    /* Bench box style */
    .bench {
      border: 1px solid #333;
      margin: 8px 0;
      padding: 8px;
      cursor: default;
      background: #f8f9fa;
      user-select: none;
    }

    .bench-title {
      font-weight: bold;
      margin-bottom: 8px;
    }

    /* Seats horizontal inside bench */
    .seats-wrapper {
      display: flex;
      gap: 6px; /* horizontal spacing between seats */
    }

    .seat {
      border: 1px dashed #999;
      padding: 6px 10px;
      min-height: 50px;
      min-width: 70px;
      max-width: 70px;
      cursor: pointer;
      text-align: left;
      user-select: none;
      display: flex;
      flex-direction: column;
      justify-content: center;
      font-size: 12px;
      position: relative;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .seat.assigned {
      background-color: #d4edda;
      border: 1px solid #28a745;
    }

    .seat.selected {
      border: 2px solid red;
    }

    .student-name {
      font-size: 0.85em;
      color: #155724;
      line-height: 1.1;
    }

    .student-item {
      cursor: pointer;
      padding: 5px;
      border-bottom: 1px solid #ddd;
      user-select: none;
    }

    .student-item:hover {
      background-color: #f1f1f1;
    }

    /* Seat column selector buttons on top */
    .seat-column-select {
      border: 1px solid #666;
      background: #eee;
      text-align: center;
      font-weight: bold;
      cursor: pointer;
      user-select: none;
      min-width: 70px;
      max-width: 70px;
      padding: 3px 0;
      margin: 0 3px;
      font-size: 13px;
      border-radius: 3px;
    }

    /* Selected seats tracking */
    #selectedSeatsList {
      margin-top: 10px;
      font-family: monospace;
      font-size: 14px;
      min-height: 24px;
      white-space: nowrap;
      overflow-x: auto;
    }

    /* Print styles */
    @media print {
      body * {
        visibility: hidden;
      }
      #printArea, #printArea * {
        visibility: visible;
      }
      #printArea {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        padding: 0;
        margin: 0;
        font-size: 14px;
      }
      
      .print-header {
        text-align: center;
        margin-bottom: 15px;
        border-bottom: 2px solid #000;
        padding-bottom: 10px;
      }
      
      .print-header h2 {
        font-size: 22px;
        margin: 5px 0;
      }
      
      .print-header p {
        margin: 3px 0;
        font-size: 16px;
      }
      
      .print-exam-info {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
        font-size: 15px;
      }
      
      .print-layout {
        display: flex;
        flex-wrap: nowrap;
        gap: 10px;
        /* Force no wrapping for fitting on one line */
      }
      
      .print-bench-col {
        display: flex;
        flex-direction: column;
        margin-bottom: 10px;
        border: 1px solid #000;
        padding: 5px;
        min-width: 160px;
      }
      
      .print-bench {
        border: 1px solid #333;
        margin: 5px 0;
        padding: 5px;
        page-break-inside: avoid;
      }
      
      .print-bench-title {
        font-weight: bold;
        font-size: 14px;
        margin-bottom: 5px;
        text-align: center;
      }
      
      .print-seats-wrapper {
        display: flex;
        gap: 5px;
        flex-wrap: nowrap;
      }
      
      .print-seat {
        border: 1px solid #999;
        padding: 4px;
        min-height:auto;
        min-width: 80px;
        max-width: 120px;
        font-size: 12px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        white-space: normal;
        overflow-wrap: break-word;
      }
      
      .print-seat.assigned {
        background-color: #f0f0f0;
      }
      
      .print-student-info {
        font-size: 11px;
        line-height: 1.2;
      }
      
     
      
     
    }
  </style>
</head>
<body>
<div class="container-fluid mt-4">
  <div class="row">
    <div class="col-md-3">
      <h5>Filter Students</h5>
      <form id="filterForm">
        <div class="mb-2">
          <label>Class</label>
          <input type="number" name="classnumber" class="form-control" />
        </div>
        <div class="mb-2">
          <label>Section</label>
          <input type="text" name="secgroup" class="form-control" />
        </div>
        <div class="mb-2">
          <label>Gender</label>
          <select name="sex" class="form-control">
            <option value="">All</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
        </div>
        <div class="mb-2">
          <label>Roll From</label>
          <input type="number" name="roll_start" class="form-control" />
        </div>
        <div class="mb-2">
          <label>Roll To</label>
          <input type="number" name="roll_end" class="form-control" />
        </div>
        <button type="submit" class="btn btn-primary w-100">Load Students</button>
      </form>
      <hr />
      <div id="studentList" class="border p-2" style="max-height: 500px; overflow-y: auto;"></div>
    </div>

    <div class="col-md-9">
      <h5>Select Room and Seats Per Bench</h5>
      <div class="row mb-3">
        <div class="col-md-3">
          <select id="roomSelect" class="form-select">
            <option value="">Select Room</option>
            <?php
            $result = mysqli_query($link, "SELECT * FROM buildingroom");
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<option value='{$row['roomnumber']}' data-bname='{$row['bnumber']}' data-roomname='{$row['roomname']}'>Room {$row['roomname']} ({$row['seatcapacity']} Seats)</option>";
            }
            ?>
          </select>
        </div>
        <div class="col-md-3">
          <select id="seatPerBench" class="form-select">
            <option value="1">1 Seat</option>
            <option value="2" selected>2 Seats</option>
            <option value="3">3 Seats</option>
            <option value="4">4 Seats</option>
          </select>
        </div>
        <div class="col-md-3">
          <input type="text" id="examName" class="form-control" placeholder="Exam Name" />
        </div>
        <div class="col-md-3 d-flex align-items-center">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="printWithNames" checked />
            <label class="form-check-label" for="printWithNames">Print With Names</label>
          </div>
        </div>
      </div>

      <div id="roomLayout" class="d-flex flex-wrap gap-3"></div>

      <div id="selectedSeatsList"><strong>Selected Seats:</strong> <span id="selectedSeats"></span></div>

      <hr />
      <button id="assignBtn" class="btn btn-warning">Assign Students to Selected Seats</button>
      <button id="printBtn" class="btn btn-success float-end">Print Seat Plan</button>
    </div>
  </div>

  <div id="printArea" style="display:none;">
    <div class="print-header">
      <h2><?php echo htmlspecialchars($schoolInfo['schoolname'] ?? ''); ?></h2>
      
    </div>
    
    <div class="print-exam-info">
      <div><strong>Exam:</strong> <span id="printExamName"></span></div>
      <div><strong>Building:</strong> <span id="printBuilding"></span></div>
      <div><strong>Room:</strong> <span id="printRoom"></span></div>
    </div>
    
    <div id="printLayout" class="print-layout"></div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>
  let studentQueue = [];

  function renderSeats(benchId, seatCount) {
    let html = '<div class="seats-wrapper">';
    for (let i = 1; i <= seatCount; i++) {
      html += `<div class='seat' data-seat-id='${benchId}_seat${i}' data-seat-column='${i}'></div>`;
    }
    html += '</div>';
    return html;
  }

  function updateSelectedSeatsList() {
    const selectedSeats = $('.seat.selected').map(function () {
      return $(this).data('seat-id');
    }).get();

    $('#selectedSeats').text(selectedSeats.join(', ') || 'None');
  }

  $(document).ready(function () {
    $('#filterForm').on('submit', function (e) {
      e.preventDefault();
      $.post('load_students.php', $(this).serialize(), function (data) {
        $('#studentList').html(data);
        studentQueue = [];
        $('#studentList .student-item').each(function () {
          studentQueue.push({
            id: $(this).data('id'),
            name: $(this).data('name'),
            class: $(this).data('class'),
            section: $(this).data('section'),
            roll: $(this).data('roll')
          });
        });
      });
    });

    $('#roomSelect, #seatPerBench').on('change', function () {
      const roomNumber = $('#roomSelect').val();
      const seatCount = parseInt($('#seatPerBench').val());
      if (!roomNumber) {
        $('#roomLayout').html('');
        return;
      }

      $.get('load_benches.php', { room: roomNumber }, function (benches) {
        $('#roomLayout').html('');

        benches.forEach(row => {
          const benchCol = $('<div class="bench-col"></div>').attr('data-row-number', row.rownumber);

          // Seat column selectors on top for this row
          const seatColumnSelectors = $('<div></div>').css({
            display: 'flex',
            gap: '6px',
            justifyContent: 'center',
            marginBottom: '6px',
            position: 'relative',
          });

          for (let i = 1; i <= seatCount; i++) {
            const colSelect = $(`<div class="seat-column-select" data-seat-column="${i}" title="Select all seats in column ${i}">Col ${i}</div>`);
            seatColumnSelectors.append(colSelect);
          }
          benchCol.append(seatColumnSelectors);

          for (let i = 1; i <= row.numberofbench; i++) {
            const benchId = `bench_${row.rownumber}_${i}`;
            const bench = $(`
              <div class='bench' data-bench-id='${benchId}'>
                <div class='bench-title'>Row ${row.rownumber} - Bench ${i}</div>
                ${renderSeats(benchId, seatCount)}
              </div>
            `);
            benchCol.append(bench);
          }
          $('#roomLayout').append(benchCol);
        });
      }, 'json');
    });

    // Toggle seat selection on click
    $(document).on('click', '.seat', function () {
      if ($(this).hasClass('assigned')) return; // cannot select assigned seat
      $(this).toggleClass('selected');
      updateSelectedSeatsList();
    });

    // Seat column selector click: select/deselect all seats in that column within same bench-col (row)
    $(document).on('click', '.seat-column-select', function () {
      const colNum = $(this).data('seat-column');
      const benchCol = $(this).closest('.bench-col');

      // Check if all seats in this column are selected
      const allSelected = benchCol.find(`.seat[data-seat-column='${colNum}']`).length ===
                          benchCol.find(`.seat[data-seat-column='${colNum}'].selected`).length;

      if (allSelected) {
        // Deselect all
        benchCol.find(`.seat[data-seat-column='${colNum}']`).removeClass('selected');
      } else {
        // Select only seats NOT assigned
        benchCol.find(`.seat[data-seat-column='${colNum}']`).each(function(){
          if(!$(this).hasClass('assigned')) {
            $(this).addClass('selected');
          }
        });
      }
      updateSelectedSeatsList();
    });

    // Assign students to selected seats
    $('#assignBtn').on('click', function () {
      const selectedSeats = $('.seat.selected').filter(function () {
        return !$(this).hasClass('assigned');
      });

      selectedSeats.each(function () {
        if (studentQueue.length === 0) return false;

        const student = studentQueue.shift();
        $(this).removeClass('selected').addClass('assigned').html(`
          <div class='student-name'>
            ${student.name}<br>
            Roll: ${student.roll}<br>
            Class: ${student.class}, Section: ${student.section}
          </div>
        `);
        $(`#studentList .student-item[data-id='${student.id}']`).remove();
      });

      updateSelectedSeatsList();
    });

    // Print seat plan
    $('#printBtn').on('click', function () {
      const building = $('#roomSelect option:selected').data('bname');
      const roomname = $('#roomSelect option:selected').data('roomname');
      const exam = $('#examName').val();
      const printWithNames = $('#printWithNames').is(':checked');

      $('#printBuilding').text(building);
      $('#printRoom').text(roomname);
      $('#printExamName').text(exam || 'Exam');

      const layoutClone = $('#roomLayout').clone();

      // Remove seat-column-select from print clone
      layoutClone.find('.seat-column-select').remove();

      layoutClone.find('.bench-col').addClass('print-bench-col').removeClass('bench-col');
      layoutClone.find('.bench').addClass('print-bench').removeClass('bench');
      layoutClone.find('.bench-title').addClass('print-bench-title').removeClass('bench-title');
      layoutClone.find('.seats-wrapper').addClass('print-seats-wrapper').removeClass('seats-wrapper');

      layoutClone.find('.seat').each(function () {
        $(this).addClass('print-seat').removeClass('seat selected');

        if (printWithNames) {
          $(this).removeClass('no-names');
        } else {
          $(this).addClass('no-names');
        }
      });

      // Replace seat content with class, section, roll and optionally name
      layoutClone.find('.print-seat.assigned').each(function () {
        const seatId = $(this).data('seat-id');
        const origSeat = $(`.seat[data-seat-id='${seatId}']`);

        let name = '';
        let roll = '';
        let classNum = '';
        let section = '';

        if (origSeat.hasClass('assigned')) {
          const infoHtml = origSeat.html();
          const tempDiv = document.createElement('div');
          tempDiv.innerHTML = infoHtml;

          const lines = tempDiv.textContent.split('\n').map(s => s.trim()).filter(Boolean);

          if (lines.length >= 3) {
            name = lines[0];
            roll = lines[1].replace('Roll:', '').trim();
            const clsSec = lines[2].replace('Class:', '').trim().split(',');
            classNum = clsSec[0].trim();
            section = clsSec.length > 1 ? clsSec[1].replace('Section:', '').trim() : '';
          }
        }

        let displayHtml = `<div class="print-student-info">`;
        displayHtml += `<div>C: ${classNum} S/G: ${section}</div>`;
        displayHtml += `<div style='font-weight:200'>Roll: ${roll}</div>`;
        if (printWithNames && name) {
          displayHtml += `<div>Name: ${name}</div>`;
        }
        displayHtml += `</div>`;

        $(this).html(displayHtml);
      });

      $('#printLayout').html(layoutClone);

      $('#printArea').show();

      setTimeout(() => {
        const printLayout = document.getElementById('printLayout');
        const maxWidth = 1122; // approx A4 landscape width in px at 96dpi
        if(printLayout.scrollWidth > maxWidth){
          const scale = maxWidth / printLayout.scrollWidth;
          $('#printLayout').css({
            'transform': `scale(${scale})`,
            'transform-origin': 'top left'
          });
        } else {
          $('#printLayout').css('transform', '');
        }

        window.print();

        $('#printArea').hide();
        $('#printLayout').empty();
      }, 150);
    });

  });
</script>
</body>
</html>
