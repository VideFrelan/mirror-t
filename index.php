<?php
// coded by [ironsix] & PawN0
// The Next Level
// 
// Minggu, 12:07:57 24-11-2019
//

include 'aset/kepala.php';
include 'aset/heker.php';
?>
<div class="table">
<table>
<tbody>
<tr><th colspan="3" nowrap>Statistik</th><td style="all:unset;padding-left:10px;"></td><th nowrap>Def. hari ini</th><th nowrap>Def. kemarin</th><th nowrap>Def. mgg ini</th></tr>
<tr>
<td>Total attacker</td><td class="acenter">:</td>
<?php
$q = $db->query("SELECT COUNT(*) FROM user");
$row = $q->fetchArray();
$totaldef = $row[0];
echo "<td class=\"acenter\">".$totaldef."</td>
";
?>
<td style="all:unset;padding-left:10px;"></td>
<td rowspan="3" class="acenter">
<?php
$tglh = date("Y-m-d");
$q = $db->query("SELECT COUNT(*) FROM mirror WHERE date LIKE '$tglh%'");
$row = $q->fetchArray();
$dfchariini = $row[0];
echo $dfchariini;
?>
</td>
<td rowspan="3" class="acenter">
<?php
$tglk = date("Y-m-d", strtotime("-1 days"));
$q = $db->query("SELECT COUNT(*) FROM mirror WHERE date LIKE '$tglk%'");
$row = $q->fetchArray();
$dfckemarin = $row[0];
echo $dfckemarin;
?>
</td>
<td rowspan="3" class="acenter">
<?php
$tglmg1 = date("Y-m-d", strtotime("-7 days"));
$tglmg2 = date("Y-m-d");
$q = $db->query("SELECT COUNT(*) FROM mirror WHERE date BETWEEN '$tglmg1%' AND '$tglmg2%'");
$row = $q->fetchArray();
$dfcmingguini = $row[0];
echo $dfcmingguini;
?>
</td>
</tr>
<tr>
<td>Total team</td><td class="acenter">:</td>
<?php
$q = $db->query("SELECT COUNT(*) FROM team");
$row = $q->fetchArray();
$totaltm = $row[0];
echo "<td class=\"acenter\">".$totaltm."</td>
";
?>
</tr>
<tr>
<td>Total defaced</td><td class="acenter">:</td>
<?php
$q = $db->query("SELECT COUNT(*) FROM mirror");
$row = $q->fetchArray();
$totaldef = $row[0];
echo "<td class=\"acenter\">".$totaldef."</td>
";
?>
</tr>
<tr>
<td>Total archived</td><td class="acenter">:</td>
<?php
$q = $db->query("SELECT COUNT(*) FROM mirror WHERE status = '0'");
$row = $q->fetchArray();
$totalarc = $row[0];
echo "<td class=\"acenter\">".$totalarc."</td>
";
?>
<td style="all:unset;padding-left:10px;"></td>
<td colspan="3" rowspan="3" class="acenter"><?php echo date("Y-m-d"); ?></td>
</tr>
<tr>
<td>Total special deface</td><td class="acenter">:</td>
<?php
$q = $db->query("SELECT COUNT(*) FROM mirror WHERE special = '1'");
$row = $q->fetchArray();
$totalspc = $row[0];
echo "<td class=\"acenter\">".$totalspc."</td>
";
?>
</tr>
<tr>
<td>Total onhold</td><td class="acenter">:</td>
<?php
$q = $db->query("SELECT COUNT(*) FROM mirror WHERE status = '1'");
$row = $q->fetchArray();
$totaloh = $row[0];
echo "<td class=\"acenter\">".$totaloh."</td>";
?>
</td>
</tr>
</tbody>
</table>
</div>
<br>

<b>Top 10 attacker:</b><br>
<?php
$q = $db->query("SELECT *,COUNT(*) FROM mirror INNER JOIN user ON mirror.defacer = user.user_id GROUP BY mirror.defacer ORDER BY COUNT(*) DESC LIMIT 0,10");
echo "<div class=\"table\">
<table>
<tbody>
<tr><th>Rank</th><th>Attacker</th><th>Home deface</th><th>Special deface</th><th>Total deface</th></tr>";
$i = 1;
while ($row = $q->fetchArray()) {
$user = $row['username'];
$userc = str_replace("'", "''", $user);
$username = htmlspecialchars($row['username'], ENT_QUOTES);
$defid = $row['defacer'];
$q1 = $db->query("SELECT COUNT(*) FROM mirror INNER JOIN user ON mirror.defacer = user.user_id WHERE user.username = '$userc'");
$row1 = $q1->fetchArray();
$q2 = $db->query("SELECT COUNT(*) FROM mirror INNER JOIN user ON mirror.defacer = user.user_id WHERE user.username = '$userc' AND mirror.home = '1'");
$row2 = $q2->fetchArray();
$q3 = $db->query("SELECT COUNT(*) FROM mirror INNER JOIN user ON mirror.defacer = user.user_id WHERE user.username = '$userc' AND mirror.special = '1'");
$row3 = $q3->fetchArray();
$totaldefaceuser = $row1[0];
$totaldefaceuserhome = $row2[0];
$totaldefaceuserspec = $row3[0];
echo "<tr><td align=\"center\">$i.</td><td><a href=\"attacker.php?id=$defid\">$username</a></td><td class=\"acenter\">$totaldefaceuserhome</td><td class=\"acenter\">$totaldefaceuserspec</td><td class=\"acenter\">$totaldefaceuser</td></tr>
";
$i++;
} // while
echo "</tbody>
</table>
</div>";
?>
<br>

<b>Top 10 team:</b><br>
<?php
$q = $db->query("SELECT *,COUNT(*) FROM mirror INNER JOIN team ON mirror.team = team.team_id GROUP BY mirror.team ORDER BY COUNT(*) DESC LIMIT 0,10");
echo "<div class=\"table\">
<table>
<tbody>
<tr><th>Rank</th><th>Team</th><th>Home deface</th><th>Special deface</th><th>Total deface</th></tr>";
$i = 1;
while ($row = $q->fetchArray()) {
$teamname = htmlspecialchars($row['teamname'], ENT_QUOTES);
$teamid = $row['team'];
$q1 = $db->query("SELECT COUNT(*) FROM mirror INNER JOIN team ON mirror.team = team.team_id WHERE team.team_id = '$teamid'");
$row1 = $q1->fetchArray();
$q2 = $db->query("SELECT COUNT(*) FROM mirror INNER JOIN team ON mirror.team = team.team_id WHERE team.team_id = '$teamid' AND mirror.home = 1");
$row2 = $q2->fetchArray();
$q3 = $db->query("SELECT COUNT(*) FROM mirror INNER JOIN team ON mirror.team = team.team_id WHERE team.team_id = '$teamid' AND mirror.special = 1");
$row3 = $q3->fetchArray();
$totaldefaceteam = $row1[0];
$totaldefaceteamhome = $row2[0];
$totaldefaceteamspec = $row3[0];
if ($teamid > "0") {
echo "<tr><td align=\"center\">$i.</td><td><a href=\"team.php?id=$teamid\">$teamname</a></td><td class=\"acenter\">$totaldefaceteamhome</td><td class=\"acenter\">$totaldefaceteamspec</td><td class=\"acenter\">$totaldefaceteam</td></tr>
";
$i++;
}
} // while
echo "</tbody>
</table>
</div>";
?>
<br>

<b>Baru dideface:</b><br>
<?php
$q = $db->query("SELECT * FROM mirror LEFT JOIN team ON mirror.team = team.team_id INNER JOIN user ON mirror.defacer = user.user_id ORDER BY date DESC LIMIT 0,20");
echo "<div class=\"table\">
<table>
<tbody>
<tr><th>Tanggal</th><th>Attacker</th><th>Team</th><th>Onhold</th><th>Special</th><th>Home</th><th>URL</th><th>WEB IP</th><th>Mirror</th></tr>";
while ($row = $q->fetchArray()) {
$url = htmlspecialchars($row['site'], ENT_QUOTES);
if (preg_match("/(https:)/", $site)) {
$url = substr($url, 8);
} else if (preg_match("/(http:)/", $url)) {
$url = substr($url, 7);
}
$url = (strlen($url) > 30) ? substr($url,0,30).'...' : $url;
$team = $row['teamname'];
if ($team) {
$team = "<a href=\"team.php?id=$teamid\">".htmlspecialchars($row['teamname'], ENT_QUOTES)."</a>";
} else {
$team = '<div class="acenter">-</div>';
}
$status = $row['status'];
if ($status == 1) {
$status = "<div class=\"containercb\"><label><input type=\"checkbox\" name=\"status\" disabled readonly checked><b></b><span></span></label></div>";
} else {
$status = "<div class=\"containercb\"><label><input type=\"checkbox\" name=\"status\" disabled readonly><b></b><span></span></label></div>";
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
$teamid = $row['team'];
echo "<tr><td>$date</td><td><a href=\"attacker.php?id=$defid\">$username</a></td><td>$team</td><td class=\"acenter\">$status</td><td class=\"acenter\">$special</td><td class=\"acenter\">$home</td><td>$url</td><td>$ip</td><td class=\"acenter\"><a href=\"mirror.php?id=$mirrorid\">Lihat</td></tr>
";
} // while
echo "</tbody>
</table>
</div>";
?>

<?php
include 'aset/kaki.php';
?>
