<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="images/favicon_1.ico">

        <title>WelCome To Your School</title>

        <!-- Base Css Files -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" />

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <style>
        .chart-container {
            margin-bottom: 30px;
        }
        .table-summary {
            margin-bottom: 20px;
        }
        .chart-title {
            margin-top: 20px;
            font-weight: bold;
        }
        .container {
            margin-top: 30px;
        }
    </style>

        <!-- Font Icons -->
        <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="../assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="../css/material-design-iconic-font.min.css" rel="stylesheet">

        <!-- animate css -->
        <link href="../css/animate.css" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="../css/waves-effect.css" rel="stylesheet">
        <!-- sweet alerts -->
        <link href="../assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">

        <!-- DataTables -->
        <link href="../assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

        <!-- Custom Files -->
        <link href="../css/helper.css" rel="stylesheet" type="text/css" />
        <link href="../css/style.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



            <style>
        .grid-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            padding-bottom: 100px;
        }
        .grid-item {
            min-height: 100px;
    width: 150px;
    border: 1px solid #ddd;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 10px;
    text-align: center;
    font-size: 22px;
    background-color: #0e84f9;
    cursor: pointer;
    color: #fff;
    text-decoration: none;
        }
        .grid-item:hover {
            background-color: purple;
            color: white;
        }
        .header {
            color: Purple;
            text-align: center;
            padding-bottom: 20px;
        }
    </style>
      

        
        <link href="../assets/timepicker/bootstrap-datepicker.min.css" rel="stylesheet" />
        <link href="../assets/jquery-multi-select/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="../assets/select2/select2.css" rel="stylesheet" type="text/css" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="../js/modernizr.min.js"></script>

        <SCRIPT language="javascript">
        function addRow(tableID) {

            var table = document.getElementById(tableID);

            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);

            var colCount = table.rows[0].cells.length;

            for(var i=0; i<colCount; i++) {

                var newcell = row.insertCell(i);

                newcell.innerHTML = table.rows[0].cells[i].innerHTML;
                //alert(newcell.childNodes);
                switch(newcell.childNodes[0].type) {
                    case "text":
                            newcell.childNodes[0].value = "";
                            break;
                    case "checkbox":
                            newcell.childNodes[0].checked = false;
                            break;
                    case "select-one":
                            newcell.childNodes[0].selectedIndex = 0;
                            break;
                }
            }
        }

        function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;

            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }


            }
            }catch(e) {
                alert(e);
            }
        }

    </SCRIPT>
        
    </head>