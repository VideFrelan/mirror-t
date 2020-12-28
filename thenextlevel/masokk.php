<?php
// coded by [ironsix]
// The Next Level
// 
// Senin, 11:07:53 25-11-2019
//

$judul = "Login";
include 'kepala.php';
?>
<div class="acenter">
<table>
<tbody>
<tr><th>Login panel admin:</th></tr>
<tr>
<td>
<form action="<?php $_PHP_SELF ?>" method="POST">
Username: <input type="text" name="username" pattern="[A-Za-z0-9]{5,}" title="A-Z a-z, Minimal 5 digit" /><br>
Password: <input type="password" name="password" /><br>
<input type="submit" name="login" value="Login" />
</form>
</td>
</tr>
</tbody>
</table>
</div>
<?php
$user = $_POST['username'];
$pass = $_POST['password'];
$login = $_POST['login'];

if (isset($login)) {
if ($user) {
if ($pass) {
session_start();
$q = $db->query("SELECT * FROM admin WHERE username = '$user'");
$row = $q->fetchArray();
$passdb = $row['password'];
$adminid = $row['admin_id'];
if (password_verify($pass, $passdb)) {
echo "<div class=\"success\">Kombinasi username & password benar</div>";
$_SESSION['login'] = TRUE;
$_SESSION['name'] = $user;
$_SESSION['id'] = $adminid;
header("Location: dasbot.php");
} else {
echo "<div class=\"error\">Kombinasi username & password tidak valid</div>";
}
} else { echo "<div class=\"error\">Password wajib diisi</div>"; }
} else { echo "<div class=\"error\">Username wajib diisi</div>"; }
}


include '../aset/kaki.php';
?>
