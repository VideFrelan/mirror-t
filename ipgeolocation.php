<?php
// coded by [ironsix]
// The Next Level
// 
// Senin, 11:07:53 25-11-2019
//

$judul = "IP Geolocation";
include 'aset/kepala.php';
include 'aset/heker.php';
$host = $_REQUEST['host'];
$ua = array('http' => array('user_agent' => 'TNL-Browser'));
$context  = stream_context_create($ua);
$content = file_get_contents("http://ip-api.com/json/$host", false, $context);
$match = preg_match_all("/success/i", $content, $count);
if ($host) {
if(trim($host)) {
if($match) {
$data = json_decode($content, true);
$query = $data['query'];
$as = $data['as'];
$country = $data['country'];
$countrycode = $data['countryCode'];
$regionname = $data['regionName'];
$region = $data['region'];
$city = $data['city'];
$zip = $data['zip'];
$timezone = $data['timezone'];
$isp = $data['isp'];
$org = $data['org'];
$lat = $data['lat'];
$long = $data['lon'];
if ($query == "") {
$query = "-";
}
if ($as == "") {
$as = "-";
}
if ($country == "") {
$country = "-";
}
if ($countrycode == "") {
$countrycode = "-";
}
if ($regionname == "") {
$regionname = "-";
}
if ($region == "") {
$region = "-";
}
if ($city == "") {
$city = "-";
}
if ($zip == "") {
$zip = "-";
}
if ($timezone == "") {
$timezone = "-";
}
if ($isp == "") {
$isp = "-";
}
if ($org == "") {
$org = "-";
}
echo "<div class=\"infogeo\">";
echo "<table>
<tbody>";
echo "<tr><th colspan=\"3\">IP Geolocation</th></tr>";
echo "<tr><td><b>IP</b></td><td class=\"acenter\"><b>:</b></td><td>$query</td></tr>";
echo "<tr><td><b>ASN</b></td><td class=\"acenter\"><b>:</b></td><td>$as</td></tr>";
echo "<tr><td><b>Negara</b></td><td class=\"acenter\"><b>:</b></td><td>$country</td></tr>";
echo "<tr><td><b>Kode negara</b></td><td class=\"acenter\"><b>:</b></td><td>$countrycode</td></tr>";
echo "<tr><td><b>Negara bagian</b></td><td class=\"acenter\"><b>:</b></td><td>$regionname</td></tr>";
echo "<tr><td><b>Kode negara bagian</b></td><td class=\"acenter\"><b>:</b></td><td>$region</td></tr>";
echo "<tr><td><b>Kota</b></td><td class=\"acenter\"><b>:</b></td><td>$city</td></tr>";
echo "<tr><td><b>Kode pos</b></td><td class=\"acenter\"><b>:</b></td><td>$zip</td></tr>";
echo "<tr><td><b>Zona waktu</b></td><td class=\"acenter\"><b>:</b></td><td>$timezone</td></tr>";
echo "<tr><td><b>Service provider</b></td><td class=\"acenter\"><b>:</b></td><td>$isp</td></tr>";
echo "<tr><td><b>Perusahaan</b></td><td class=\"acenter\"><b>:</b></td><td>$org</td></tr>";
echo "<tr><td><b>Koordinat latlong</b></td><td class=\"acenter\"><b>:</b></td><td>$lat, $long</td></tr>";
echo "<tr><td colspan=\"3\"><b><a href=\"http://www.google.com/maps/place/$lat,$long/@$lat,$long,16z\" target=\"_blank\">Google Maps</a></b></td></tr>";
echo "</tbody>
</table>";
echo "</div>";
}
else
{
echo "<div class=\"error\">Gagal<br>Host tidak valid <b>".htmlspecialchars($host)."</b></div>";
}
}
} else {
?>
<div class="acenter">
<b>Masukkan domain / IP:</b><br>
<form action="<?php $_PHP_SELF; ?>" method="POST">
<input type="text" name="host" size="30" value="<?php if ($host) { echo $host; } ?>" placeholder="google.com / 216.58.201.238" /><br>
<input type="submit" value="Cek" />
</form>
</div>
<?php
}
?>

<?php
include 'aset/kaki.php';
?>
