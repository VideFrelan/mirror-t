<?php
// coded by [ironsix]
// The Next Level
// 
// Senin, 11:07:53 25-11-2019
//

$judul = "Hapus Mirror";
include 'kepala.php';
?>
<h3>Panel admin -> Mirror -> Hapus Mirror:</h3>
<?php
session_start();

if (isset($_SESSION['login'])) {
$sesiadmin = $_SESSION['id'];
$q = $db->query("SELECT * FROM admin WHERE admin_id = '$sesiadmin'");
$row = $q->fetchArray();
$usernameadmin = $row['username'];
echo "Halo, $usernameadmin<br><br>";
$mirrorid = $_REQUEST['id'];
if (is_numeric($mirrorid)) {
$q = $db->query("SELECT * FROM mirror LEFT JOIN team ON mirror.team = team.team_id INNER JOIN user ON mirror.defacer = user.user_id WHERE mirror_id = '$mirrorid'");
$row = $q->fetchArray();
$tanggal = $row['date'];
$defacer = htmlspecialchars($row['username'], ENT_QUOTES);
$defid = $row['defacer'];
$team = $row['teamname'];
if ($team) {
$team = "<a href=\"../team.php?id=$teamid\" target=\"_blank\">".htmlspecialchars($row['teamname'], ENT_QUOTES)."</a>";
} else {
$team = '-';
}
$url = $row['site'];
echo "<form action=\"\" method=\"POST\">
<b>Info Mirror:</b><br>
<div class=\"table\">
<table>
<tbody>
<tr><td>Mirror ID</td><td class=\"acenter\">:</td><td>$mirrorid</td></tr>
<tr><td>Tanggal submit</td><td class=\"acenter\">:</td><td>$tanggal</td></tr>
<tr><td>URL</td><td class=\"acenter\">:</td><td>$url</td></tr>
<tr><td>Attacker</td><td class=\"acenter\">:</td><td><a href=\"../attacker.php?id=$defid\" target=\"_blank\">$defacer</a></td></tr>
<tr><td>Team</td><td class=\"acenter\">:</td><td>$team</td></tr>
</tbody>
</table>
</div>
<div class=\"acenter\">
<input type=\"submit\" name=\"hapus\" value=\"HAPUS\" />
<input type=\"submit\" name=\"kembali\" value=\"KEMBALI\" />
</div>
</form>";
if (isset($_POST['hapus'])) {
$hpsmrr = $db->exec("DELETE FROM mirror WHERE mirror_id = '$mirrorid'");
if ($hpsmrr) {
echo "<div class=\"success\">Mirror berhasil dihapus<br>Kembali ke mirror...</div>";
?>
<script>
window.setTimeout(function() {
    window.location = 'mirror.php';
  }, 2000);
</script>
<?php
} else {
echo "<div class=\"error\">Mirror gagal dihapus</div>";
}
} else if (isset($_POST['kembali'])) {
echo "Kembali ke mirror...";
?>
<script>
window.setTimeout(function() {
    window.location = 'mirror.php';
  }, 2000);
</script>
<?php
}
} else {
echo "<div class=\"error\">Mirror ID tidak valid</div>";
}
?>
<br>
<a href="dasbot.php">Kembali ke dashboard</a>
<?php
} else {
header("Location: login.php");
}
include '../aset/kaki.php';
?>
