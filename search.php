<?php
// coded by [ironsix] & PawN0
// The Next Level
// 
// Minggu, 12:07:57 24-11-2019
//

error_reporting(E_ALL ^ E_NOTICE);
if (NULL == $_REQUEST['q']) {
$cari = "";
}
$cariraw = $_REQUEST['q'];
$carit = htmlspecialchars($cariraw, ENT_QUOTES);
$judulpencarian = (strlen($carit) > 15) ? substr($carit, 0, 15).'...' : $carit;
$judul = "Pencarian $judulpencarian";
include 'aset/kepala.php';
$uri = $_SERVER['REQUEST_URI'];
if (strpos($uri, "'") || strpos($uri, "\"") || strpos($uri, "(") || strpos($uri, ")") || strpos($uri, ";") || strpos($uri, "%27") || strpos($uri, "%22") || strpos($uri, "%28") || strpos($uri, "%29") || strpos($uri, "%3B") || strpos($uri, "cript>")) {
echo "<div class=\"error\">1Tidak ada hasil untuk $carit</div>";
// not fixed
?>
<?php
} else {
if ($carit) {
$cari = str_replace("'", "''", $cariraw);
$qhuser = $db->query("SELECT COUNT(*) FROM user WHERE user.username LIKE '%$cari%'");
$row = $qhuser->fetchArray();
$huser = $row[0];
$qhteam = $db->query("SELECT COUNT(*) FROM team WHERE team.teamname LIKE '%$cari%'");
$row = $qhteam->fetchArray();
$hteam = $row[0];
$qhurl = $db->query("SELECT COUNT(*) FROM mirror WHERE mirror.site LIKE '%$cari%'");
$row = $qhurl->fetchArray();
$hurl = $row[0];
if ($huser || $hteam || $hurl) {
echo "<div class=\"success\">Hasil pencarian $carit</div><br>";
if ($huser > "0") {
$i = 1;
echo "Ditemukan $huser attacker:
<div class=\"table\">
<table>
<tbody>
";
$q = $db->query("SELECT * FROM user WHERE username LIKE '%$cari%' ORDER BY username ASC");
while ($row = $q->fetchArray()) {
$username = htmlspecialchars($row['username'], ENT_QUOTES);
$defid = $row['user_id'];
echo "<tr><td class=\"acenter\" style=\"width:1px;\">$i.</td><td><a href=\"attacker.php?id=$defid\">$username</a></td></tr>";

$i++;
}
echo "</tbody>
</table>
</div>
<br>
";
} // user
if ($hteam > "0") {
$i = 1;
echo "Ditemukan $hteam team:
<div class=\"table\">
<table>
<tbody>
";
$q = $db->query("SELECT * FROM team WHERE teamname LIKE '%$cari%' ORDER BY teamname ASC");
while ($row = $q->fetchArray()) {
$teamname = htmlspecialchars($row['teamname'], ENT_QUOTES);
$teamid = $row['team_id'];
echo "<tr><td class=\"acenter\" style=\"width:1px;\">$i.</td><td><a href=\"team.php?id=$teamid\">$teamname</a></td></tr>";

$i++;
}
echo "</tbody>
</table>
</div>
<br>
";
} // team
if ($hurl > "0") {
$i = 1;
echo "Ditemukan $hurl URL:
<div class=\"table\">
<table>
<tbody>
";
$q = $db->query("SELECT * FROM mirror WHERE site LIKE '%$cari%' ORDER BY site ASC");
while ($row = $q->fetchArray()) {
$url = htmlspecialchars($row['site'], ENT_QUOTES);
$mirrorid = $row['mirror_id'];
echo "<tr><td class=\"acenter\" style=\"width:1px;\">$i.</td><td><a href=\"mirror.php?id=$mirrorid\">$url</a></td></tr>";

$i++;
}
echo "</tbody>
</table>
</div>
";
} // url
} else { echo "<div class=\"error\">Tidak ada hasil untuk $carit</div>"; } // cek hasil
} else { echo "<div class=\"error\">Tidak ada query pencarian</div>"; } // cari
} // cek input
?>

<?php
include 'aset/kaki.php';
?>
