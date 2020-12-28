<?php
// coded by [ironsix] & PawN0
// The Next Level
// 
// Minggu, 12:07:57 24-11-2019
//

set_time_limit(0);
error_reporting(E_ALL ^ E_NOTICE);
include 'koneksi_tnl.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- everythings in here is yang penting fungsional -->
<title><?php if ( !$judul ){ echo 'mirror-t'; } else { echo $judul . ' | mirror-t';} ?></title>
<meta charset="utf-8">
<meta name="description" content="Situs mirroring defacer">
<meta name="viewport" content="width=device=width, initial-scale=1">
<link rel="stylesheet" type="text/css" media="all, screen" href="../aset/ironsix_solar.css">
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
</div>
<div class="kelir"></div>
<div class="content">
