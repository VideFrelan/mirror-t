<?php
// coded by [ironsix] & PawN0
// The Next Level
// 
// Minggu, 12:07:57 24-11-2019
//

$judul = "Notify";
include 'aset/kepala.php';
include 'aset/heker.php';
?>
<div class="notifyinfo">
<strong>Disclaimer:</strong>
<br>
All the information contained in <font color="orange">mirror-t</font>.ga Hacked Website Archive were either collected online from public sources or directly notified anonymously to us.
<br>
<font color="orange">mirror-t</font>.ga is neither responsible for the reported computer crimes nor it is directly or indirectly involved with them.
<br>
You might find some offensive contents in the mirrored defacements.
<br>
<font color="orange">mirror-t</font>.ga didn't produce them so we cannot be responsible for such contents.
<br>
If you are the administrator of an hacked website which is mirrored in <font color="orange">mirror-t</font>.ga, please note that <font color="orange">mirror-t</font>.ga is not related at all with the defacements itself.
<br>
<br>
<font color="orange">mirror-t</font>.ga is not responsible for the use/misuse of the published information, you can use it at your own risk. 
<br>
<br>
<br>
<strong>Rules:</strong>
<br>
1. Hanya 1 URL ditiap baris textarea.
<br>
2. Special defacement berlaku untuk situs pemerintahan & pendidikan. (contoh: <b><i>.go, .gov, .mil, .ac, .edu, .sch</i></b>)
<br>
3. Hanya subdomain dari special deface yg masuk <b>archive</b>.
<br>
4. Home defacement tidak perlu ditambah "<font color="orange">/index.asp</font>", "<font color="orange">/index.html</font>", "<font color="orange">/index.php</font>" & semacamnya, cukup URL domain saja. (contoh: <b><i>http://situsweb.com/</i></b>)
<br>
5. Directory defacement wajib tambah "<font color="orange">/</font>" diakhir URL, berlaku juga untuk situs yg menggunakan <i>mod_rewrite</i>. (contoh: <b><i>http://situsweb.com/dir1/dir2/</i></b>)
<br>
6. File deface yg valid berformat "<font color="orange">.asp</font>", "<font color="orange">.aspx</font>", "<font color="orange">.htm</font>", "<font color="orange">.html</font>", "<font color="orange">.php</font>", "<font color="orange">.txt</font>", berkuran tidak lebih dari 4MB & file MIME berupa <b>text/html</b>. (contoh: <b><i>https://situsweb.com/filedeface.html</i></b>)
<br>
7. Domain yg sama yg pernah disubmit akan masuk <b>onhold</b>.
<br>
8. Nick attacker tidak ada dalam file deface juga akan masuk <b>onhold</b>.
</div>
<br>
<form action="<?php $_PHP_SELF; ?>" method="POST">
<b>Attacker:</b> <font class="smol">(case sensitive!)</font><br>
<input type="text" name="defacer" placeholder="attacker" /><br>
<b>Team:</b> <font class="smol">(case sensitive!)</font><br>
<input type="text" name="team" placeholder="The Next Level" /><br>
<b>Vulnerability:</b><br>
<select name="vulntype">
<option value="">Wajib pilih....</option>
<option value="0">Lain-lain</option>
<option value="1">Known vulnerability</option>
<option value="2">Undisclosed (new) vulnerability</option>
<option value="3">Poor password</option>
<option value="4">Admin mistakes / miss configuration</option>
<option value="5">File inclusion</option>
<option value="6">Server intrusion</option>
<option value="7">RCE / RCI</option>
<option value="8">SQL injection</option>
<option value="9">Brute force</option>
<option value="10">DNS hijack</option>
<option value="11">URL Poisoning</option>
<option value="12">Cross Site Scripting (XSS)</option>
<option value="13">CSRF File Upload</option>
<option value="14">WEB applicaton bug</option>
<option value="15">Dorking shell</option>
<option value="16">Social Engineering</option>
</select><br>
<b>Alasan:</b><br>
<select name="reason">
<option value="">Wajib pilih....</option>
<option value="0">Lain-lain</option>
<option value="1">Bersenang-senang</option>
<option value="2">Uji skill / sebagai tantangan</option>
<option value="3">Keseharian defacer / gabut</option>
<option value="4">Balas dendam</option>
<option value="5">Politik</option>
<option value="6">Hacktivist</option>
</select><br>
<b>URL:</b><br>
<textarea cols="30" rows="8" name="urlb" placeholder="http://situsweb.com
https://situsweb.com/
www.situsweb.com
situsweb.com/deface.php
http://situsweb.com/dir1/dir2/
situsweb.com/rewrite-url/">
</textarea><br>
<input type="submit" name="submit" value="Notify" />
</form>

<?php
set_time_limit(0);
$defacer = $_POST['defacer'];
$team = $_POST['team'];
$defacers = SQLite3::escapeString($_POST['defacer']);
$teams = SQLite3::escapeString($_POST['team']);
$vulntype = $_POST['vulntype'];
$reason = $_POST['reason'];
$urlb = $_POST['urlb'];
$regip = $_SERVER['REMOTE_ADDR'];
$ldefacer = strtolower($defacer);
$udefacer = strtoupper($defacer);
if ($defacer) {
if (is_numeric($vulntype)) {
if (is_numeric($reason)) {

function extract_domain($domain) {
if (preg_match("/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i", $domain, $matches)) {
return $matches['domain'];
} else {
return $domain;
}
}

function extract_subdomains($domain) {
$subdomains = $domain;
$domain = extract_domain($subdomains);
$subdomains = rtrim(strstr($subdomains, $domain, true), '.');
return $subdomains;
} // thx https://stackoverflow.com/a/12372310

$arr = explode("\r\n", trim($urlb));
for ($i6 = 0; $i6 < count($arr); $i6++) {
   $site = $arr[$i6];

if ($site) {

$q = $db->query("SELECT COUNT(*) FROM team WHERE teamname = '$team'");
$row = $q->fetchArray();
$cekteam = $row[0];
if (!$cekteam > 0) {
$teamsc = str_replace("'", "''", $teams);
$db->exec("INSERT INTO team (team_id, teamname) VALUES (NULL, '$teamsc')");
} // cekteam

$q = $db->query("SELECT COUNT(*) FROM user WHERE username = '$defacer'");
$row = $q->fetchArray();
$cekuser = $row[0];
if (!$cekuser > 0) {
$defacersc = str_replace("'", "''", $defacers);
$db->exec("INSERT INTO user (user_id, username) VALUES (NULL, '$defacersc')");
} // cekuser

if ($site) {
$protokol = preg_match_all("%^((http://)|(https://))%", $site);
if ($protokol) {
$url = $site;
} else {
$url = "http://".$site;
} // cek protokol

$parse = parse_url($url);
$host = $parse['host']; // cek domain
$path = $parse['path']; // cek path
$domain = $host;

if ((strstr($domain, ".go")) || (strstr($domain, ".gov")) || (strstr($domain, ".mil")) || (strstr($domain, ".ac")) || (strstr($domain, ".edu")) || (strstr($domain, ".sch"))) {
$special = 1;
$qcekdomspecexist = $db->query("SELECT COUNT(*) FROM mirror WHERE site = '$domain'");
$row = $qcekdomspecexist->fetchArray();
$cekdomspec = $row[0];
if ($cekdomspec > 0) {
$cekdomspec = 0;
}
else {
$cekdomspec = 1;
}
} else {
$special = 0;
} // cek special

$subdo = extract_subdomains($domain);
if ($subdo) {
$jmlsubdo = (strlen($subdo)+1);
} else {
$jmlsubdo = (strlen($subdo));
}
$domainutama = substr($domain, $jmlsubdo);

$qcekdomexist = $db->query("SELECT COUNT(*) FROM mirror WHERE site LIKE '%$domainutama%'");
$row = $qcekdomexist->fetchArray();
$cekdeface = $row[0];
if ($cekdeface > 0) {
$cekwww = substr($domain , 3);
$cekwwwd = (strlen($cekwww)+1);
$cekdomain = substr($domain, $cekwwwd);
if ($cekdomain == $domainutama) {
$cekdfc = 0;
} else {
$cekdfc = 1;
} // cek www
} else {
$cekdfc = 0;
} // cek dup domain
$tempfile = fopen('php://temp', 'r+');
$cinit = curl_init();
curl_setopt($cinit, CURLOPT_TIMEOUT, "300");
curl_setopt($cinit, CURLOPT_USERAGENT, "");
curl_setopt($cinit, CURLOPT_URL, "$url");
curl_setopt($cinit, CURLOPT_HEADER, true);
curl_setopt($cinit, CURLOPT_RETURNTRANSFER, true);
curl_setopt($cinit, CURLOPT_VERBOSE, true);
curl_setopt($cinit, CURLOPT_STDERR, $tempfile);
curl_setopt($cinit, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($cinit, CURLOPT_RETURNTRANSFER, true);
curl_setopt($cinit, CURLOPT_HEADER, true);

$response = curl_exec($cinit);
$header_size = curl_getinfo($cinit, CURLINFO_HEADER_SIZE);
$header = substr($response, 0, $header_size);
$body = substr($response, $header_size);
$content = SQLite3::escapeString($body);
$bodyc = str_replace("'", "''", $content);
$mime = curl_getinfo($cinit, CURLINFO_CONTENT_TYPE);
curl_close($cinit);
fclose($tempfile);
if ($body == "") {
echo "<div class=\"error\">URL: $url<br>Domain tidak aktif / blank page</div>";
} else {
$cekdefacer = array("$ldefacer", "$udefacer", "$defacer");
$hitung = count($cekdefacer);
for ($i = 0; $i < $hitung; $i++) {
if (stristr($body, $cekdefacer[$i])) {
$cekdnm = 0;
} else {
$cekdnm = 1;
}
} // cek blank page

$cekmime = preg_match("/text\/html/i" , $mime);
if (!$cekmime) {
echo "<div class=\"error\">URL: $url<br>Defacement tidak valid</div>";
} else {

$encode_content = mb_strlen($content, 'utf8'); 
$ceksizedfc = ($encode_content > 4096000);
if ($ceksizedfc == 1) {
echo "<div class=\"error\">URL: $url<br>Size data deface terlalu besar</div>";
} else {

$q = $db->query("SELECT COUNT(*) FROM scdeface WHERE sc = '$content'");
$row = $q->fetchArray();
$ceksc = $row[0];
if (!$ceksc > 0) {
$db->exec("INSERT INTO scdeface (sc_id, sc) VALUES (NULL, '$content')");
} // cek sc deface


$q = $db->query("SELECT * FROM scdeface WHERE sc = '$content'");
$row = $q->fetchArray();
$contentid = $row['sc_id'];

if ($cekdfc == 0 && $cekdnm == 0) {
$status = 0;
} else if ($cekdfc == 1 && $cekdnm == 0) {
if (($special == 1) && ($cekdomspec == 1) && ($cekdnm == 0)) {
$status = 0;
} else if (($special == 1) && ($cekdomspec == 0) && ($cekdnm == 1)) {
$status = 1;
} else if (($special == 1) && ($cekdomspec == 0) && ($cekdnm == 0)) {
$status = 1;
} else {
$status = 1;
}
} else if ($cekdfc == 0 && $cekdnm == 1) {
$status = 1;
} else if ($cekdfc == 1 && $cekdnm == 1) {
$status = 1;
} // cek onhold

$home = 1;
if ($path) {
$hkpath = (strlen($path) > 1);
if ($hkpath) {
$home = 0;
if (strstr($path, ".asp") || strstr($path, ".aspx") || strstr($path, ".htm") || strstr($path, ".html") || strstr($path, ".php") || strstr($path, ".txt") || strstr(substr($path, -1), "/")) {
$cekext = 1;
} else {
$cekext = 0;
}
}
} // cek home defacement
if (($cekext == 0) && ($hkpath)) {
echo "<div class=\"error\">URL: $url<br>Ekstensi file deface tidak valid</div>";
} else {


$qcekexist = $db->query("SELECT COUNT(*) FROM mirror WHERE site = '$url'");
$row = $qcekexist->fetchArray();
$cekurl = $row[0];
if ($cekurl > 0) {
echo "<div class=\"error\">URL: $url<br>URL pernah disubmit</div>";
}
else
{
$ip = gethostbyname($host);
if (preg_match_all("/apache/i", $header)) {
$server = 'Apache';
} else if (preg_match_all("/nginx/i", $header)) {
$server = 'nginx';
} else if (preg_match_all("/iis/i", $header)) {
$server = 'Microsoft-IIS';
} else if (preg_match_all("/cloudflare/i", $header)) {
$server = 'Cloudflare Server';
} else if (preg_match_all("/litespeed/i", $header)) {
$server = 'LiteSpeed';
} else if (preg_match_all("/tengine/i", $header)) {
$server = 'Tengine';
} else if (preg_match_all("/(google)|(gws)|(ghs)/i", $header)) {
$server = 'Google Server';
} else { $server = "unknown"; } // cek server

$url = SQLite3::escapeString($url); // final url
if (isset($_POST['submit'])) {
$date = date("Y-m-d H:i:s");
}
$q = $db->query("SELECT user_id FROM user WHERE username = '$defacers'");
$row = $q->fetchArray();
$defacerid = $row[0];
if (strlen($team) == 0) {
$teamid = 0;
} else {
$q = $db->query("SELECT team_id FROM team WHERE teamname = '$teams'");
$row = $q->fetchArray();
$teamid = $row[0];
if (!$teamid) {
$teamid = 0;
}
}
// ironsix was here
$submit = $db->exec("INSERT INTO mirror (mirror_id, site, content, vuln, reason, defacer, team, ip, regip, server, status, special, home, date) VALUES (NULL, '$url', '$contentid', $vulntype, $reason, $defacerid, $teamid, '$ip', '$regip', '$server', $status, $special, $home, '$date')");
if ($submit) {
if ($status == 0) {
echo "<div class=\"success\">URL: $url<br>Domain dimasukan ke archive</div>";
} else if ($status == 1) {
echo "<div class=\"error\">URL: $url<br>URL dimasukan ke onhold</div>";
} // notify
} else {
echo "<div class=\"error\">URL: $url<br>Gagal submit URL</div>";
} // submit // imahere

// tidak ada yg berurutan dibawah ini, abaikan comments
// mungkin ada lebih dari satu junk variable, biarkanlah apa adanya :)
} // cek ekstensi sc deface
} // cek path
} // cek size sc deface
} // cek valid sc deface
} // cek url db
} // curl get content
} else { echo "<div class=\"error\">URL wajib diisi</div>"; } // site
} // mass deface, thx https://www.askingbox.com/question/php-read-textarea-line-by-line-as-array
} else { echo "<div class=\"error\">Wajib pilih alasan deface</div>"; } // vulntype
} else { echo "<div class=\"error\">Wajib pilih tipe Vulnerability</div>"; } // vulntype
} else { echo "<div class=\"error\">Wajib isi nama attacker</div>"; } // defacer
?>
<?php
include 'aset/kaki.php';
?>
