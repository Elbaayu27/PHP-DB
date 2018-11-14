
<?php
// we must never forget to start the session 

$errorMessage = '';
if (isset($_POST['txtUserId']) && isset($_POST['txtPassword'])) {
include 'Library/Config.php'; include 'Library/Opendb.php';

$userId	= $_POST['txtUserId'];
$password = $_POST['txtPassword'];

// check if the user id and password combination exist in database
$sql = "SELECT user_id
FROM tbl_auth_user
WHERE user_id = '$userId' AND user_password = '$password'";

$result = mysqli_query($conn, $sql) or die('Query failed. ' . mysqli_error());

if (mysqli_num_rows($result) == 1) {
// the user id and password match,

// set the session
session_start();
$_SESSION['db_is_logged_in'] = true;
// after login we move to the main page 
header('Location: Index.php');
exit;
} else {
$errorMessage = 'Sorry, wrong user id / password';
 }

include 'Library/Closedb.php';
}
?>
<html>
<head>
<title>Basic Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
if ($errorMessage != '') {
?>
<p align="center"><strong><font color="#990000"><?php echo $errorMessage; ?></font></strong></p>
<?php
}
?>
<form action="" method="post" name="frmLogin" id="frmLogin">
<table width="400" border="1" align="center" cellpadding="2" cellspacing="2">
<tr>
<td width="150">User Id</td>
<td><input name="txtUserId" type="text" id="txtUserId"></td>
</tr>
<tr>
<td width="150">Password</td>
<td><input name="txtPassword" type="password" id="txtPassword"></td>
</tr>
<tr>
<td width="150">&nbsp;</td>
<td><input name="btnLogin" type="submit" id="btnLogin" value="Login"></td>
</tr>
</table>
</form>
</body>
</html>


 
