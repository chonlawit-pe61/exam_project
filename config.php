<?php

session_start();
if (isset($_GET['is_debug']) && $_GET['is_debug'] == 1) {
    $is_debug = 1;
} else {
    $is_debug = 0;
}
ini_set('display_errors', $is_debug);
ini_set('display_startup_errors', $is_debug);

define('DIR_PROGRAM', $_SERVER["DOCUMENT_ROOT"] . '/exam_project_');
$objOpenClass = opendir(DIR_PROGRAM . "/common/");
while (($fileClass = readdir($objOpenClass)) !== false) {
    //php7 preg_match
    //php5 ereg if(ereg("^class", $fileClass) and ereg(".php$", $fileClass)){
    if (preg_match("/^class/", $fileClass) and preg_match("/.php$/", $fileClass)) {
        include(DIR_PROGRAM . "/common/" . $fileClass);
    }
}


include_once "classDB/ezsql_php7/ez_sql_core.php";
include_once "classDB/ezsql_php7/ez_sql_mysqli.php";
$base_url = "http://localhost:8888/exam_project_";
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "exam_research2";
$conn = new ezSQL_mysqli($username, $password, $dbname, $servername, 3306);
$com = new classMain();


// แก้ไข $base_url ตามpathที่ติดตั้ง 
// servername  = เซิฟเวอร์ฐานข้อมูล
// username = ชื่อผู้ใช้ฐานข้อมูล
// password = รหัสผ่านฐานข้อมูล
// dbname = ชื่อฐานข้อมูล
// DIR_PROGRAM = path ที่ติดตั้ง
