<?php
// coded by [ironsix]
// The Next Level
// 
// Senin, 11:07:53 25-11-2019
//

$judul = "Berita";
include 'kepala.php';
?>
<h3>Panel admin -> Berita:</h3>
<?php
session_start();

if (isset($_SESSION['login'])) {
$sesiadmin = $_SESSION['id'];
$q = $db->query("SELECT * FROM admin WHERE admin_id = '$sesiadmin'");
$row = $q->fetchArray();
$usernameadmin = $row['username'];
echo "Halo, $usernameadmin<br><br>";
$q = $db->query("SELECT * FROM berita WHERE id = '1'");
$row = $q->fetchArray();
$berita = $row['berita'];
echo "<form action=\"\" method=\"POST\">
<b>Berita:</b><br>
<textarea name=\"brt\" rows=\"10\" cols=\"30\">
$berita
</textarea><br>
<input type=\"submit\" name=\"update\" value=\"Update\" />
</form>";
if (isset($_POST['update'])) {
$brtb = SQLite3::escapeString($_POST['brt']);
$hbrt = $db->exec("UPDATE berita SET berita = '$brtb' WHERE id = '1'");
if ($hbrt) {
echo "<div class=\"success\">Berita diupdate<br>Mohon tunggu...</div>";
?>
<script>
window.setTimeout(function() {
    window.location = 'berita.php';
  }, 2000);
</script>
<?php
} else {
echo "<div class=\"error\">Berita gagal update</div>";
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
