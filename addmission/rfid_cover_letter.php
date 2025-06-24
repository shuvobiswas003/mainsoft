<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RFID Cover Letter</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lohit+Bengali:wght@400;700&amp;display=swap" rel="stylesheet">
    <style>
        @media print {
            /* Set paper size to A4 */
            @page {
                size: A4;
                margin: 20mm; /* Adjust margins as needed */
            }
            
        }
    </style>
</head>
<body>
<?php
require "../interdb.php";
$studentsQuery = "SELECT s.id, s.name, s.imgname,s.classnumber,s.secgroup,s.roll, r.rfid FROM student s JOIN rfid r ON s.uniqid = r.stuid ORDER BY s.roll ASC";
$studentsResult = mysqli_query($link, $studentsQuery);

while ($student = mysqli_fetch_assoc($studentsResult)) {
?>

    <section class="main_part">
        <section class="headerpart">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
        <table>
            <tr>
                <td>
                    <div class="lego_part">
            <img src="../img/lego.png" alt="Logo" style="height: 150px;width: 150px;    margin-top: 15px;">
                    </div>
                </td>
                <td style="width: 500px;text-align: center;">
                   <?php
                   $softlink="";
                   $headname="";
                   $post="";
                   $schoolname="";
                        
                        $sel_query2 = "SELECT * FROM schoolinfo";
                        $result2 = mysqli_query($link, $sel_query2);
                        while ($row2 = mysqli_fetch_assoc($result2)) {
                            $softlink = $row2['softlink'];
                            $headname = $row2['headname'];
                            $post=$row2['head_deg'];
                            $schoolname=$row2['schoolname'];
                        ?>
                        

                        <div class="college_info">
                            <h1 style="font-size:40px;">
                                <b>
                                    <?php echo $row2['schoolname']; ?>
                                </b>
                            </h1>
                            <span id='schtext'>
                                <h1 style="    font-size: 15px;margin-top: -8px;">
                                    <b>ESTD<?php echo $row2['estd']; ?>
                                        ; 
                                    EIIN<?php echo $row2['eiin']; ?>; 
                                    College Code: <?php echo $row2['schoolcode']; ?>,
                                    <?php $voccode = $row2['voccode']; if ($voccode > 0) { ?> ,
                                    BMT Code: <?php echo $row2['voccode']; ?>
                                    <?php } ?>
                                </b>
                                </h1>
                                <h1 style="font-size: 15px;
    margin-top: -10px;"><b><?php echo $row2['schooladdress']; ?></b></h1>
                                <h1 style="font-size: 15px;
    margin-top: -10px;"><b>
                                    E-Mail: 
                                    <?php
                                    echo $row2['schmail'];
                                    echo "Website: ";
                                    echo $row2['website'];
                                    ?>
                                </b></h1>
                            </span>
                        </div>
                        <?php } ?> 
                </td>
            </tr>
        </table>
                        
                    </div>
                </div>
            </div>
        </section>
        <hr style="border: 1px solid black">
        <hr style="border: 1px solid black;margin-top: -15px;">
        <!-- Loop through each student and generate a cover letter -->
        
        <section class="content">
            <div class="container">
                <h1>প্রিয় <?php echo $student['name']; ?>,</h1>
                <h2 style="font-size: 25px">বিষয়: RFID কার্ড ব্যবহারের সুবিধা সম্পর্কে</h2>
                <p>আমি আনন্দিত যে আমাদের প্রতিষ্ঠানে RFID কার্ড ব্যবহার করার সুযোগ সৃষ্টি হয়েছে। এই কার্ডটি বিভিন্ন গুরুত্বপূর্ণ কার্যক্রম সহজ এবং কার্যকরভাবে পরিচালনার জন্য আমাদের সাহায্য করবে। নিচে RFID কার্ড ব্যবহারের জন্য আমাদের পরিকল্পনার একটি সংক্ষিপ্ত বিবরণ প্রদান করা হলো:</p>


                <table>
                    <tr>
                        <td><img src="../img/student/<?php echo $student['imgname']; ?>" style="height: 150px;width: 150px;"alt="Student Photo"></td>
                        <td>
                            <h3 style="margin-top: -10px;">Student Name: <?php echo $student['name']; ?></h3>
                            <h3 style="margin-top: -10px;">Classnumber: <?php echo $student['classnumber']; ?></h3>
                            <h3 style="margin-top: -10px;">Group: <?php echo $student['secgroup']; ?></h3>
                            <h3 style="margin-top: -10px;">Roll: <?php echo $student['roll']; ?></h3>
                            <h3 style="margin-top: -10px;">RFID Number: <?php echo $student['rfid']; ?></h3>
                        </td>
                    </tr>
                </table>

               <table>
                   <tr>
                       <td width="50%">
                          <h3>RFID কার্ডের সুবিধা </h3>
                       </td>
                       <td width="50%">
                           <h3>RFID কার্ড ব্যবহারের নির্দেশাবলী:</h3>
                       </td>
                   </tr>
                   <tr>
                       <td>
                    <ol>
                <li>
                    <strong>শিক্ষার্থী তথ্য (Student Information):</strong>
                    <div class="description">
                        RFID কার্ডের মাধ্যমে শিক্ষার্থী মৌলিক তথ্য দ্রুত এবং সঠিকভাবে পাওয়া যাবে। শিক্ষার্থীরা তাদের কার্ড স্ক্যান করে সহজেই তাদের ব্যক্তিগত তথ্য দেখতে পারবে।
                    </div>
                </li>
                <li>
                    <strong>উপস্থিতি (Attendance):</strong>
                    <div class="description">
                        শিক্ষার্থী উপস্থিতি পরিচালনার জন্য RFID কার্ড ব্যবহৃত হবে। এটি ক্লাসে উপস্থিতি নেওয়ার প্রক্রিয়া সহজ করবে এবং ভুলের সম্ভাবনা কমাবে।
                    </div>
                </li>
                <li>
                    <strong>অ্যাকাউন্ট ম্যানেজমেন্ট (Account Management):</strong>
                    <div class="description">
                        ছাত্রদের আর্থিক লেনদেন যেমন বেতন প্রদান এবং অন্যান্য ফি এর জন্য RFID কার্ড ব্যবহার করা হবে। এটি পেমেন্ট প্রক্রিয়া সহজ এবং দ্রুত করবে।
                    </div>
                </li>
                <li>সার্টিফিকেট লেটার (Certificate Letters)</li>
                <li>প্রত্যয়ন পত্র (Testimonials)</li>
                <li>প্রশংসাপত্র (Certificates)</li>
                <li>হোস্টেল (Hostel)</li>
                <li>লাইব্রেরি (Library)</li>
                <li>অনলাইন পেমেন্ট (Online Payment)</li>
                    </ol>
                           
                       </td>
                       <td>
                            <div class="steps">
                    
                    <ol>
                        <b>
                        <li>প্রথমে আইডি কার্ডের পিছনে দেওয়া কিউআর কোডটি স্ক্যান করুন অথবা কলেজের ওয়েবসাইটে (https://kazimontucollege.edu.bd/) গিয়ে বাম পাশ থেকে শিক্ষার্থী কন্যারে ক্লিক করুন </li>
                        <li>স্ক্যান করে লিংকটি ওপেন করুন বা ওয়েবসাইটের মাধ্যমে শিক্ষার্থী কন্যারে যাওয়ার পর আপনার কাছে কার্ড নাম্বার চাইবে, কার্ড নাম্বারটি আইডি কার্ডের পিছনে লেখা আছে মোট তিনটি সংখ্যা সেখানে দেওয়া আছে এর মধ্য থেকে প্রথম ১০ ডিজিটের নম্বরটি লিখতে হবে</li>
                        <li>উক্ত নম্বরটি শুন্যসহ লিখুন।</li>
                        <li>লিখিত নম্বরটি দিয়ে আপনি আপনার বিস্তারিত সকল তথ্য দেখতে পারবেন।</li>
                        </b>
                    </ol>
                </div>

                       </td>
                   </tr>
               </table>
               

                <!-- Instructions Section -->
               

                

                <div class="footer">
                    <p>ধন্যবাদ এবং শুভেচ্ছান্তে</p>
                    
                    <?php echo $headname?>
                    <br>
                    <?php echo $post?>
                    <br>
                    <?php echo $schoolname?>
                    <span style="font-family: "></span>
                </div>
            </div>
        </section>
       
    </section>
 <?php } ?>
</body>
</html>
