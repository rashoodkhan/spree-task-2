<?php

if(isset($_POST['logout']))
{
unset($_COOKIE["springuser"]);unset($_COOKIE["springpass"]);
$res = setcookie("springpass", '', time() - 3600);
$res = setcookie("springuser", '', time() - 3600);
}

if(isset($_COOKIE["springuser"]))
header('Location: log.php');

echo("<form action='log.php' method='post'>
Email:
  <input type='email' name='emal'></br>
Password:
  <input type='password' name='pass'></br>
  <input type='checkbox' name='rme'>Remember me<br>
  <input type='submit' value='sign in' name='submit'>
</form>
</form>
<form action='act.php' method='post' enctype='multipart/form-data'>
  Name:
  <input type='text' name='name'></br>
  Email:
  <input type='email' name='emal'></br>
  Phone:
  <input type='number' name='phno'></br>
  Password:
  <input type='password' name='pass'></br>
  College Name:
  <input type='text' name='cname'></br>
  Birthday:
  <input type='date' name='bday'></br>
  Profile pic:
  <input type='file' name='file'></br>
  <input type='submit' value='register' name='submit'>
</form>");