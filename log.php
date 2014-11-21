<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "spring";

if(isset($_POST['emal'])&&isset($_POST['pass']))
	{$mysqlemal = "'".$_POST['emal']."'";
	$mysqlpass = "'".md5($_POST['pass'])."'";
	$hash = md5($_POST['pass']);}
else if(isset($_COOKIE["springuser"]))
	{$mysqlemal = $_COOKIE["springuser"];
	$mysqlpass = "'".$_COOKIE["springpass"]."'";
	$hash = $_COOKIE["springpass"];
	}

$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "select pass as pw from fatable where email=$mysqlemal";

$result = mysqli_query($conn,$sql);
$data = mysqli_fetch_assoc($result);

if($data['pw'] === $hash)
{
	if(isset($_POST['rme'])&& !isset($_COOKIE["springuser"]))	
	{	
		setcookie("springuser", $mysqlemal, time() + (86400 * 30), "/");
		setcookie("springpass", $hash, time() + (86400 * 30), "/");
	}

	$sql = "select * from fatable where email=$mysqlemal";

	$result = mysqli_query($conn, $sql);
	$data = mysqli_fetch_assoc($result);
	$img = "uploads\\".md5($data['email']).".".$data['ext'];
	if($data['lastlogin'] === "0000-00-00 00:00:00")$data['lastlogin'] = "first login";
	$sql = "UPDATE fatable SET lastlogin= now() where email = $mysqlemal";
	$result = mysqli_query($conn, $sql);
	echo("
		Name: {$data['name']}</br>
		Email: {$data['email']}</br>
		phone no: {$data['phone']}</br>
		College name: {$data['cname']}</br>
		Date of birth: {$data['dob']}</br>
		Signup data: {$data['sdate']}</br>
		ip address: {$data['ipad']}</br>
		lastlogin: {$data['lastlogin']}</br>
		<img src='$img' alt='Profile pic' height='42' width='42'>
		<form action='index.php' method='post'>
  		<input type='submit' value='log out' name='logout'>
		</form>");
}
else
echo "\ngo to hell";