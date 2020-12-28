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
<form action="" method="POST">
<td>
Username: <input type="text" name="username" pattern="[A-Za-z0-9]{5,}" title="Abjad & angka, minimal 5 digit" /><br>
Password: <input type="password" name="password" /><br>
<input type="submit" name="login" value="Login" />
</td>
</form>
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
echo "<div class=\"error\">Kombinasi username & password tidak valid</div>";
} else { echo "<div class=\"error\">Password wajib diisi</div>"; }
} else { echo "<div class=\"error\">Username wajib diisi</div>"; }
}


include '../aset/kaki.php';
?>
