<?php
// coded by [ironsix]
// The Next Level
// 
// Senin, 11:07:53 25-11-2019
//

$judul = "Notice";
include 'kepala.php';
?>
<h3>Panel admin -> Notice:</h3>
<?php
session_start();

if (isset($_SESSION['login'])) {
$sesiadmin = $_SESSION['id'];
$q = $db->query("SELECT * FROM admin WHERE admin_id = '$sesiadmin'");
$row = $q->fetchArray();
$usernameadmin = $row['username'];
echo "Halo, $usernameadmin<br><br>";
$q = $db->query("SELECT * FROM notice WHERE id = '1'");
$row = $q->fetchArray();
$notice = $row['notice'];
echo "<form action=\"\" method=\"POST\">
<b>Notice:</b><br>
<input type=\"text\" name=\"ntc\" value=\"$notice\" /><br>
<input type=\"submit\" name=\"update\" value=\"Update\" />
</form>";
if (isset($_POST['update'])) {
$ntcb = SQLite3::escapeString($_POST['ntc']);
$hntc = $db->exec("UPDATE notice SET notice = '$ntcb' WHERE id = '1'");
if ($hntc) {
echo "<div class=\"success\">Notice diupdate<br>Mohon tunggu...</div>";
?>
<script>
window.setTimeout(function() {
    window.location = 'notice.php';
  }, 2000);
</script>
<?php
} else {
echo "<div class=\"error\">Notice gagal update</div>";
}
}
?>
<a href="dasbot.php">Kembali ke dashboard</a>
<?php
} else {
header("Location: login.php");
}
include '../aset/kaki.php';
?>
