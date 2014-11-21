<?php
/**
 * Created by PhpStorm.
 * User: Rahul
 * Date: 16/11/14
 * Time: 5:20 PM
 */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "spring";
$mysqldate = "'".date('Y-m-d', strtotime($_POST['bday']))."'";
$mysqlname = "'".$_POST['name']."'";
$mysqlemal = "'".$_POST['emal']."'";
$mysqlphno = "'".$_POST['phno']."'";
$mysqlcname = "'".$_POST['cname']."'";
$mysqlpass = "'".md5($_POST['pass'])."'";
$mysqlsdate = "'".date('Y-m-d')."'";
$mysqlext = "'".pathinfo(basename( $_FILES["file"]["name"]),PATHINFO_EXTENSION)."'";
$mysqlsipad="'".$_SERVER['REMOTE_ADDR']."'";

$target_dir = "uploads/";
$imageFileType = ".".pathinfo(basename( $_FILES["file"]["name"]),PATHINFO_EXTENSION);
$target_file = $target_dir . md5($_POST['emal']) . $imageFileType ;


$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "select COUNT(email) as co from fatable where email=$mysqlemal";

$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
if(!$data['co'])
{$sql = "INSERT INTO fatable (name,email,phone,pass,cname,dob,sdate,ext,ipad)
    values ($mysqlname,$mysqlemal,$mysqlphno,$mysqlpass,$mysqlcname,$mysqldate,$mysqlsdate,$mysqlext,$mysqlsipad)";
$result = mysqli_query($conn, $sql);

if(!is_dir("uploads"))mkdir("uploads");

if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file));
echo("
Registrastion Succesful
<form action='log.php' method='post'>
Email:
  <input type='email' name='emal'></br>
Password:
  <input type='password' name='pass'></br>
   <input type='checkbox' name='rme'>Remember me<br>
  <input type='submit' value='sign in' name='submit'>
</form>");}
else
{
	echo "this email is already registered!";
}