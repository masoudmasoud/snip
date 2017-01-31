<?php 

include_once('jdf.php');

function cnv(string $datetime) {
//$timezone = 0;//برای 3:30 عدد 12600 و برای 4:30 عدد 16200 را تنظیم کنید
//$datetime = date("Y-m-d H:i:s");
$piece = explode(' ', $datetime);
//$now = date("Y-m-d", $piece[0]+$timezone);
//$time = date("H:i:s", time()+$timezone);
list($year, $month, $day) = explode('-', $piece[0]);
list($hour, $minute, $second) = explode(':', $piece[1]);

$timestamp = mktime($hour, $minute, $second, $month, $day, $year);
$jalali_date = jdate("Y/m/d H:i:s",$timestamp);
echo $jalali_date;
}

 ?>