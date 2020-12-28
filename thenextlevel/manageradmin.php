<?php
// coded by [ironsix]
// The Next Level
// 
// Senin, 11:07:53 25-11-2019
//

$judul = "Management Admin";
include 'kepala.php';
?>
<h3>Panel admin -> Management Admin:</h3>
<?php
session_start();

if (isset($_SESSION['login'])) {
echo "<h4>Hati-hati!<br>Tidak ada fitur reset password!<br>Jika ingin ganti password username sendiri, pilih sesuai baris username!<br><br>Respect others admin!<br><br><small>Input password tidak dihidden!</small></h4>";
$sesiadmin = $_SESSION['id'];
$q = $db->query("SELECT * FROM admin WHERE admin_id = '$sesiadmin'");
$row = $q->fetchArray();
$usernameadmin = $row['username'];
echo "Halo, $usernameadmin<br><br>";
$qa = $db->query("SELECT * FROM admin");
echo "<div class=\"table\">
<table>
<tbody>
<tr><th>ID</th><th>Username</th><th>Ganti Password</th></tr>
";
while ($row = $qa->fetchArray()) {
$adminid = $row['admin_id'];
$adminusnm = $row['username'];
echo "<tr><td class=\"acenter\">$adminid</td><td>$adminusnm</td><td class=\"acenter\"><form action=\"\" method=\"POST\"><input type=\"text\" name=\"passgnt\" /><input type=\"hidden\" name=\"admid\" value=\"$adminid\"><input type=\"submit\" name=\"update\" value=\"Update\" /></form></td></tr>";
}
echo "
<tr><td style=\"background:transparent;height:20px;\"></td></tr>
<form action=\"\" method=\"POST\">
<tr><th colspan=\"3\">Tambah Admin</th></tr>
<tr><td colspan=\"3\" class=\"acenter\">Username: <input type=\"text\" name=\"userbaru\" /><br>Password: <input type=\"text\" name=\"passuserbaru\" /><br><input type=\"submit\" name=\"tambahadmin\" value=\"Tambah\" /></td></tr>
</form>
<tr><td style=\"background:transparent;height:20px;\"></td></tr>
<form action=\"\" method=\"POST\">
<tr><th colspan=\"3\">Hapus Admin</th></tr>
<tr><td colspan=\"3\" class=\"acenter\"><font class=\"smol\">(Tidak ada konfirmasi hapus!)</font><br>Admin ID: <input type=\"text\" name=\"idhapusadmin\" size=\"4\" placeholder=\"1234\" /><br><input type=\"submit\" name=\"hapusadmin\" value=\"Hapus\" /></td></tr>
</form>
</tbody>
</table>
</div>
";
if (isset($_POST['update'])) {
$passbr = $_POST['passgnt'];
$admid = $_POST['admid'];
$passbaru = password_hash($passbr, PASSWORD_BCRYPT);
$hbrt = $db->exec("UPDATE admin SET password = '$passbaru' WHERE admin_id = '$admid'");
if ($hbrt) {
echo "<div class=\"success\">Berhasil ganti password<br>Mohon tunggu...</div>";
?>
<script>
window.setTimeout(function() {
    window.location = 'manageradmin.php';
  }, 2000);
</script>
<?php
} else {
echo "<div class=\"error\">Password gagal update</div>";
}
} // update pass
if (isset($_POST['tambahadmin'])) {
$userbaru = $_POST['userbaru'];
$passuserbaru = $_POST['passuserbaru'];
$tmbhusr = $_POST['tambahadmin'];
$passuserbaru = password_hash($passuserbaru, PASSWORD_BCRYPT);
$tmbhadm = $db->exec("INSERT INTO admin (admin_id, username, password) VALUES (NULL, '$userbaru', '$passuserbaru')");
if ($tmbhadm) {
echo "<div class=\"success\">Berhasil tambah admin baru<br>Mohon tunggu...</div>";
?>
<script>
window.setTimeout(function() {
    window.location = 'manageradmin.php';
  }, 2000);
</script>
<?php
} else {
echo "<div class=\"error\">Gagal tambah admin baru</div>";
}
} // tambah admin
if (isset($_POST['hapusadmin'])) {
$idhapusadmin = $_POST['idhapusadmin'];
$hpsadm = $db->exec("DELETE FROM admin WHERE admin_id = '$idhapusadmin'");
if ($hpsadm) {
echo "<div class=\"success\">Berhasil hapus admin dengan ID $idhapusadmin<br>Mohon tunggu...</div>";
?>
<script>
window.setTimeout(function() {
    window.location = 'manageradmin.php';
  }, 2000);
</script>
<?php
} else {
echo "<div class=\"error\">Gagal hapus baru</div>";
}
} // hapus admin
?>
<a href="dasbot.php">Kembali ke dashboard</a>
<?php
} else {
header("Location: login.php");
}
include '../aset/kaki.php';
?>
