<?php
// coded by [ironsix] & PawN0
// The Next Level
// 
// Minggu, 12:07:57 24-11-2019
//

set_time_limit(0);
error_reporting(E_ALL ^ E_NOTICE);
include 'koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php if ( !$judul ){ echo 'mirror-t'; } else { echo $judul . ' | mirror-t';} ?></title>
<meta charset="utf-8">
<meta name="description" content="Situs mirroring defacer">
<meta name="viewport" content="width=device=width, initial-scale=1">
<link rel="stylesheet" type="text/css" media="all, screen" href="aset/ironsix_solar.css">
<script type="text/javascript">
function vacFunction(strAction)
{
if(deptMgrId!=""){
  document.vacNotificationEdit.hidAction.value = strAction;
  document.vacNotificationEdit.action ="vacationNotification";
  document.vacNotificationEdit.submit();
}
}
</script>
</head>
<body>
<div class="head">
<h3>mirror-t</h3>
<hr>
<div class="nav">
<form action="">
<select onchange="window.open(this.options[this.selectedIndex].value,'_top')" style="max-width:90% !important;" class="selectnav">
<option value="">--- Navigasi ---</option>
<option value="index.php">Beranda</option>
<option value="archive.php">Archive</option>
<option value="onhold.php">Onholds</option>
<option value="special.php">Special deface</option>
<option value="notify.php">Notify</option>
<option value="ipgeolocation.php">IP Geolocation</option>
<option value="berita.php">Berita</option>
</select>
</form>
</div>
<div class="atas acenter">
<div class="pencarian">
<form action="search.php" class="f" method="REQUEST">
<input type="text" style="width:90%;" name="q" placeholder="Cari attacker, team, URL" value="<?php echo $_REQUEST['q']; ?>" />
<input type="submit" class="shead" value="search" />
</form>
</div>
</div>
<br>
<?php
$q = $db->query("SELECT * FROM notice WHERE id = '1'");
$row = $q->fetchArray();
$notice = $row['notice'];
if ($notice =="") {
// pengumuman kosong
} else {
echo "<hr><div class=\"notice\"><b>Pengumuman:</b> <marquee scrollamount=\"2.5\">$notice</marquee></div>";
}
?>
</div>
<div class="kelir"></div>
<div class="content">
