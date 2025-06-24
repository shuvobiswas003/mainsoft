<?php
// send_absent_sms.php

include '../sms.php';
require 'interdb.php';

date_default_timezone_set('Asia/Dhaka');
$today = date('Y-m-d');
$sdate = date('Ymd');

// Headmaster phone number
$admin = '01783808373'; // Replace with actual number
$hm_number = '8801712411922'; // Replace with actual number

// Log directory
$logDir = __DIR__ . '/logs';
if (!is_dir($logDir)) {
    mkdir($logDir, 0755, true);
}

// Log files
$studentLogFile = $logDir . "/student_log_$sdate.log";
$presentLogFile = $logDir . "/present_log_$sdate.log";
$absentLogFile = $logDir . "/absent_log_$sdate.log";
$holidayLogFile = $logDir . "/holiday_log_$sdate.log";
$smsLogFile = $logDir . "/absent_sms_log_$sdate.log";

// Create log headers
file_put_contents($studentLogFile, "All Students Log - $today\n");
file_put_contents($presentLogFile, "Present Students Log - $today\n");
file_put_contents($absentLogFile, "Absent Students Log - $today\n");
file_put_contents($holidayLogFile, "Holiday (Leave) Students Log - $today\n");
file_put_contents($smsLogFile, "Absent SMS Log - $today\n");

// Class-wise summary: class-section => [present, absent, holiday]
$summary = [];

// Fetch all students with admission selected
$students = mysqli_query($link, "
    SELECT * FROM student 
    WHERE 
        secgroup != 'Admission' 
        AND NOT (classnumber = 9) 
        AND NOT (classnumber = 10) 
        AND NOT (classnumber = 8) 
    ORDER BY classnumber, roll
");


while ($row = mysqli_fetch_assoc($students)) {
    $uniqid = $row['uniqid'];
    $name = $row['name'];
    $mobile = $row['mobile'];
    $class = $row['classname'];
    $section = $row['secgroup'];
    $key = "$class-$section";

    if (!isset($summary[$key])) {
        $summary[$key] = ['present' => 0, 'absent' => 0, 'holiday' => 0];
    }

    // Log all students
    $studentLog = date("H:i:s") . " - $class-$section - $name ($uniqid) - $mobile\n";
    file_put_contents($studentLogFile, $studentLog, FILE_APPEND);

    // Skip if mobile number is missing
    if (!$mobile) continue;

    // Check personal leave
    $leaveCheck = mysqli_query($link, "SELECT id FROM personalholyday WHERE stuid='$uniqid' AND sdate <= '$today' AND edate >= '$today'");
    if (mysqli_num_rows($leaveCheck) > 0) {
        $summary[$key]['holiday']++;
        $log = date("H:i:s") . " - $class-$section - $name ($uniqid) - $mobile - HOLIDAY\n";
        file_put_contents($holidayLogFile, $log, FILE_APPEND);
        continue;
    }

    // Check attendance
    $presentCheck = mysqli_query($link, "SELECT id FROM stuattdancedata WHERE stuid='$uniqid' AND adate='$today' AND (cinoutid=1 OR cinoutid=0)");
    if (mysqli_num_rows($presentCheck) > 0) {
        $summary[$key]['present']++;
        $log = date("H:i:s") . " - $class-$section - $name ($uniqid) - $mobile - PRESENT\n";
        file_put_contents($presentLogFile, $log, FILE_APPEND);
        continue;
    }

    // Student is absent
    $summary[$key]['absent']++;
    $log = date("H:i:s") . " - $class-$section - $name ($uniqid) - $mobile - ABSENT\n";
    file_put_contents($absentLogFile, $log, FILE_APPEND);

    // Send SMS to parent
    $message = "আপনার সন্তান {$name} আজ বিদ্যালয়ে অনুপস্থিত।";
    $status = sendSMS($mobile, $message); // Enable in live

    $smsLog = date("H:i:s") . " - $name ($uniqid) - $mobile - " . ($status ? "SMS SENT" : "SMS FAILED") . "\n";
    file_put_contents($smsLogFile, $smsLog, FILE_APPEND);
}

// Send summary SMS to Headmaster
$hmMessage = "Daily Attendance Summary:\n";
foreach ($summary as $key => $counts) {
    $hmMessage .= "$key: P: {$counts['present']}, A: {$counts['absent']}, H: {$counts['holiday']}\n";
}
$hmMessage = trim($hmMessage);

// Send HM SMS
$hmStatus = sendSMS($hm_number, $hmMessage); // Enable in live
$hmStatus = sendSMS($admin, $hmMessage); // Enable in live
file_put_contents($smsLogFile, "\nHeadmaster SMS to $hm_number - " . ($hmStatus ? "SMS SENT" : "SMS FAILED") . "\nMessage:\n$hmMessage\n", FILE_APPEND);

echo "Absent SMS process completed. Check logs in: $logDir\n";
