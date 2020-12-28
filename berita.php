<?php
// coded by [ironsix] & PawN0
// The Next Level
// 
// Minggu, 12:07:57 24-11-2019
//

$judul = "Berita";
include 'aset/kepala.php';
include 'aset/heker.php';

$q = $db->query("SELECT * FROM berita WHERE id = '1'");
$row = $q->fetchArray();
$berita = $row['berita'];
echo $berita;

include 'aset/kaki.php';
?>
