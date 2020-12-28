<?php
// coded by [ironsix]
// The Next Level
// 
// Senin, 11:07:53 25-11-2019
//

$judul = "Dashboard";
include 'kepala.php';
?>
<h3>Dashboard panel admin:</h3>
<?php
session_start();

if (isset($_SESSION['login'])) {
echo "<h4>\"With great power comes great responsibility.\"<br>- Ben Parker<br><br>Hati-hati atas setiap tindakan yg dilakukan!</h4>
<noscript>
<div class=\"error\">Mohon aktifkan JavaScript di browser<br>Pakai browser yg mendukung JavaScript!</div>
</noscript>";
$sesiadmin = $_SESSION['id'];
$q = $db->query("SELECT * FROM admin WHERE admin_id = '$sesiadmin'");
$row = $q->fetchArray();
$usernameadmin = $row['username'];
echo "Halo, $usernameadmin<br><br>";
?>
<a href="mirror.php">Mirror</a><br><br>
<a href="berita.php">Berita</a><br>
<a href="notice.php">Notice</a><br><br>
<a href="manageradmin.php">Management Admin</a> (Hati-hati!)<br><br>
<a href="logout.php">Logout</a>
<?php
} else {
header("Location: login.php");
}
include '../aset/kaki.php';
?>
