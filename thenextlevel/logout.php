<?php
// coded by [ironsix]
// The Next Level
// 
// Senin, 11:07:53 25-11-2019
//

session_start();
session_destroy();
header("Location: login.php");
