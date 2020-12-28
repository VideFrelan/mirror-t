<?php
// coded by [ironsix] & PawN0
// The Next Level
// 
// Minggu, 12:07:57 24-11-2019
//

$mirrorid = $_GET['id'];
include 'aset/heker.php';
$db = new SQLite3('mirror_tnl.db');
$q = $db->query("SELECT * FROM mirror LEFT JOIN team ON mirror.team = team.team_id INNER JOIN user ON mirror.defacer = user.user_id INNER JOIN scdeface ON mirror.content = scdeface.sc_id WHERE mirror_id = '$mirrorid'");
$row = $q->fetchArray();
$tampilmirror = $row['sc'];
echo $tampilmirror;
