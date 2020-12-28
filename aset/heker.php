<?php
$uri = $_SERVER['REQUEST_URI'];
if (strpos($uri, "'") || strpos($uri, "\"") || strpos($uri, "(") || strpos($uri, ")") || strpos($uri, ";") || strpos($uri, "%27") || strpos($uri, "%22") || strpos($uri, "%28") || strpos($uri, "%29") || strpos($uri, "%3B")) {
header("Location: heker.php");
}
?>
