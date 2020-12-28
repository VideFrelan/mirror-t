<?php
// coded by [ironsix] & PawN0
// The Next Level
// 
// Minggu, 12:07:57 24-11-2019
//

$judul = "Mirror";
include 'aset/kepala.php';
include 'aset/heker.php';
?>
<?php
$mirrorid = $_GET['id'];
$q = $db->query("SELECT * FROM mirror LEFT JOIN team ON mirror.team = team.team_id INNER JOIN user ON mirror.defacer = user.user_id WHERE mirror_id = '$mirrorid'");
$row = $q->fetchArray();
$url = $row['site']; $urlt = htmlspecialchars($url, ENT_QUOTES);
$date = $row['date'];
$ip = $row['ip'];
$attip = $row['regip'];
$server = $row['server'];
$defacer = htmlspecialchars($row['username'], ENT_QUOTES);
$team = $row['teamname'];
if ($team) {
$team = htmlspecialchars($row['teamname'], ENT_QUOTES);
} else {
$team = '-';
}
$defid = $row['defacer'];
$teamid = $row['team'];
$vulnid = $row['vuln'];
if ($vulnid == "0") {
$vuln = "Lain-lain";
} else if ($vulnid == "1") {
$vuln = "Known vulnerability";
} else if ($vulnid == "2") {
$vuln = "Undisclosed (new) vulnerability";
} else if ($vulnid == "3") {
$vuln = "Poor password";
} else if ($vulnid == "4") {
$vuln = "Admin mistakes / miss configuration";
} else if ($vulnid == "5") {
$vuln = "File inclusion";
} else if ($vulnid == "6") {
$vuln = "Server intrusion";
} else if ($vulnid == "7") {
$vuln = "RCE / RCI";
} else if ($vulnid == "8") {
$vuln = "SQL injection";
} else if ($vulnid == "9") {
$vuln = "Brute force";
} else if ($vulnid == "10") {
$vuln = "DNS hijack";
} else if ($vulnid == "11") {
$vuln = "URL poisoning";
} else if ($vulnid == "12") {
$vuln = "Cross Site Scripting (XSS)";
} else if ($vulnid == "13") {
$vuln = "CSRF File Upload";
} else if ($vulnid == "14") {
$vuln = "WEB application bug";
} else if ($vulnid == "15") {
$vuln = "Dorking shell / uploader";
} else if ($vulnid == "16") {
$vuln = "Social Engineering";
}
$alasanid = $row['reason'];
if ($alasanid == "0") {
$alasan = "Lain-lain";
} else if ($alasanid == "1") {
$alasan = "Bersenang-senang";
} else if ($alasanid == "2") {
$alasan = "Uji skill / sebagai tantangan";
} else if ($alasanid == "3") {
$alasan = "Keseharian defacer / gabut";
} else if ($alasanid == "4") {
$alasan = "Balas dendam";
} else if ($alasanid == "5") {
$alasan = "Politik";
} else if ($alasanid == "6") {
$alasan = "Hacktivist";
}
$status = $row['status'];
if ($status == 0) {
$status = "Archived";
} else {
$status = "Onhold";
}
$special = $row['special'];
if ($special == 1) {
$special = "Ya";
} else {
$special = "Tidak";
}
$tampilmirror = htmlspecialchars($row['content'], ENT_QUOTES);
echo "<div class=\"table infomirror\">
<table>
<tbody>
<tr><th colspan=\"3\">Detail mirror</th></tr>
<tr><td><b>Tanggal submit<b></td><td class=\"acenter\"><b>:</b></td><td>$date</td></tr>
<tr><td><b>Mirror ID<b></td><td class=\"acenter\"><b>:</b></td><td>$mirrorid</td></tr>
<tr><td><b>URL<b></td><td class=\"acenter\"><b>:</b></td><td><a href=\"$url\" target=\"_BLANK\">$urlt</a></td></tr>
<tr><td><b>WEB IP<b></td><td class=\"acenter\"><b>:</b></td><td><a href=\"ipgeolocation.php?host=$ip\" target=\"_blank\">$ip</a></td></tr>
<tr><td><b>Server<b></td><td class=\"acenter\"><b>:</b></td><td>$server</td></tr>
<tr><td><b>Attacker<b></td><td class=\"acenter\"><b>:</b></td><td><a href=\"attacker.php?id=$defid\">$defacer</a></td></tr>
<tr><td><b>Attacker IP<b></td><td class=\"acenter\"><b>:</b></td><td><a href=\"ipgeolocation.php?host=$attip\" target=\"_blank\">$attip</a></td></tr>
<tr><td><b>Team<b></td><td class=\"acenter\"><b>:</b></td><td><a href=\"team.php?id=$teamid\">$team</a></td></tr>
<tr><td><b>Vulnerability<b></td><td class=\"acenter\"><b>:</b></td><td>$vuln</td></tr>
<tr><td><b>Alasan<b></td><td class=\"acenter\"><b>:</b></td><td>$alasan</td></tr>
<tr><td><b>Special<b></td><td class=\"acenter\"><b>:</b></td><td>$special</td></tr>
<tr><td><b>Status<b></td><td class=\"acenter\"><b>:</b></td><td>$status</td></tr>
</tbody>
</table>
</div>
<br>
<div class=\"tampilmirror\">
<div class=\"kelir\"></div>
<iframe src=\"lihatmirror.php?id=$mirrorid\" allowtransparency=\"true\" frameborder=\"0\"></iframe>
<div class=\"kelir\"></div>
</div>";
?>

<?php
include 'aset/kaki.php';
?>
