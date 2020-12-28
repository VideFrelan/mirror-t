<?php
// coded by [ironsix] & PawN0
// The Next Level
// 
// Minggu, 12:07:57 24-11-2019
//

$judul = "Archived";
include 'aset/kepala.php';
include 'aset/heker.php';
?>
<table style="width: 100px !important">
<tr><th colspan="2">Statistik</th></tr>
<tr>
<td>Total archived:</td>
<?php
$q = $db->query("SELECT COUNT(*) FROM mirror WHERE status = '0'");
$row = $q->fetchArray();
$totalarc = $row[0];
echo "<td class=\"acenter\">".$totalarc."</td>";
?>
</tr>
<tr>
<td>Home deface:</td>
<?php
$q = $db->query("SELECT COUNT(*) FROM mirror WHERE status = '0' AND home = '1'");
$row = $q->fetchArray();
$totalhm = $row[0];
echo "<td class=\"acenter\">".$totalhm."</td>";
?>
</tr>
<tr>
<td>Special deface:</td>
<?php
$q = $db->query("SELECT COUNT(*) FROM mirror WHERE status = '0' AND special = '1'");
$row = $q->fetchArray();
$totalspc = $row[0];
echo "<td class=\"acenter\">".$totalspc."</td>";
?>
</tr>
</table>
<br>

<b>Mirror archived:</b><br>
<?php
$hal = 30;
$halid = $_GET['hal'];
if (($halid) && (is_numeric($halid))) {
$phal = $halid;
} else {
$halid = 1;
$phal = 1;
}
$offset = ($phal - 1) * $hal;
$halno = 1+$offset;
$q = $db->query("SELECT * FROM mirror LEFT JOIN team ON mirror.team = team.team_id INNER JOIN user ON mirror.defacer = user.user_id WHERE mirror.status = '0' ORDER BY date DESC LIMIT $offset, $hal");
$q1 = $db->query("SELECT COUNT(*) FROM mirror LEFT JOIN team ON mirror.team = team.team_id INNER JOIN user ON mirror.defacer = user.user_id WHERE mirror.status = '0'");
$th = $q1->fetchArray();
$thal = $th[0];
$totalhal = ceil($thal/$hal);
echo "<div class=\"table\">
<table>
<tbody>
<tr><th>Tanggal</th><th>Attacker</th><th>Team</th><th>Special</th><th>Home</th><th>URL</th><th>WEB IP</th><th>Mirror</th></tr>";
while ($row = $q->fetchArray()) {
$site = htmlspecialchars($row['site'], ENT_QUOTES);
if (preg_match("/(https:)/", $site)) {
$site = substr($site, 8);
} else if (preg_match("/(http:)/", $site)) {
$site = substr($site, 7);
}
$site = (strlen($site) > 30) ? substr($site,0,30).'...' : $site;
$teamid = $row['team'];
$team = $row['teamname'];
if ($team) {
$team = "<a href=\"team.php?id=$teamid\">".htmlspecialchars($row['teamname'], ENT_QUOTES)."</a>";
} else {
$team = '<div class="acenter">-</div>';
}
$special = $row['special'];
if ($special == 1) {
$special = "<div class=\"containercb\"><label><input type=\"checkbox\" name=\"special\" disabled readonly checked><b></b><span></span></label></div>";
} else {
$special = "<div class=\"containercb\"><label><input type=\"checkbox\" name=\"special\" disabled readonly><b></b><span></span></label></div>";
}
$home = $row['home'];
if ($home == 1) {
$home = "<div class=\"containercb\"><label><input type=\"checkbox\" name=\"home\" disabled readonly checked><b></b><span></span></label></div>";
} else {
$home = "<div class=\"containercb\"><label><input type=\"checkbox\" name=\"home\" disabled readonly><b></b><span></span></label></div>";
}
$date = $row['date'];
$ip = $row['ip'];
$mirrorid = $row['mirror_id'];
$username = htmlspecialchars($row['username'], ENT_QUOTES);
$defid = $row['defacer'];
echo "<tr><td>$date</td><td><a href=\"attacker.php?id=$defid\">$username</a></td><td>$team</td><td class=\"acenter\">$special</td><td class=\"acenter\">$home</td><td>$site</td><td>$ip</td><td class=\"acenter\"><a href=\"mirror.php?id=$mirrorid\">Lihat</td></tr>
";
$halno++;
} // while
echo "</tbody>
</table>
</div>
<br>";
echo "Halaman <b>$halid</b> dari <b>$totalhal</b>: ";
for ($i = 1; $i <= $totalhal; $i++) {
if ((($i >= $phal - 3) && ($i <= $phal + 3)) || ($i == 1) || ($i == $totalhal)) {
if (($jhal == 1) && ($i != 2)) {
if (($halid != 2) || $halid == $totalhal - 1) {
echo " <a href=\"?hal=".($halid-1)."\"><span><<</span></a>"; 
}
}
if (($jhal != ($totalhal - 1)) && ($i == $totalhal)) {
echo " <a href=\"?hal=".($halid+1)."\"><span>>></span></a>"; 
}
if ($i == $totalhal) {
echo " <a href=\"?hal=$totalhal\">" . $totalhal . "</a>";
}
else if ($i != $halid){
echo " <a href=\"?hal=$i\"> " . $i . "</a>";
$jhal = $i;
} else {
echo " <b>$i</b>";
}
}
} // hal
?>
<form action="<?php $_PHP_SELF ?>" method="GET">
Pergi ke halaman: <input type="text" size="4" value="<?php echo $halid; ?>" name="hal" />
<input type="submit" value="Gass" />
</form>

<?php
include 'aset/kaki.php';
?>
