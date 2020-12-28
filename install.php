<?php
// coded by [ironsix]
// The Next Level
// 
// Senin, 11:07:53 25-11-2019
//
// run "install.php" sekali saja, lalu hapus file "install.php"

fopen("mirror_tnl.db", "w");
include 'aset/koneksi.php';

// table admin
$db->exec("CREATE TABLE admin (
	admin_id	INTEGER PRIMARY KEY AUTOINCREMENT,
	username	TEXT,
	password	TEXT
)");
$pass = password_hash("1234abc", PASSWORD_BCRYPT); 
$db->exec("INSERT INTO admin (
    admin_id,
    username,
    password
)
VALUES (
    NULL,
    'ironsix',
    '$pass'
)");
$db->exec("INSERT INTO admin (
    admin_id,
    username,
    password
)
VALUES (
    NULL,
    'pawno',
    '$pass'
)");
$db->exec("INSERT INTO admin (
    admin_id,
    username,
    password
)
VALUES (
    NULL,
    'admin',
    '$pass'
)");

// table berita
$db->exec("CREATE TABLE berita (
	id	INTEGER PRIMARY KEY AUTOINCREMENT,
	berita	TEXT
)");
$db->exec("INSERT INTO berita (
    id,
    berita
)
VALUES (
    NULL,
    ''
)");

// table mirror
$db->exec("CREATE TABLE mirror (
	mirror_id	INTEGER PRIMARY KEY AUTOINCREMENT,
	site	TEXT,
	content	TEXT,
	vuln	INTEGER,
	reason	INTEGER,
	defacer	INTEGER,
	team	INTEGER,
	ip	TEXT,
	regip	TEXT,
	server	TEXT,
	status	INTEGER,
	special	INTEGER,
	home	INTEGER,
	date	TEXT
)");
$db->exec("INSERT INTO mirror (
	mirror_id,
	site,
	content,
	vuln,
	reason,
	defacer,
	team,
	ip,
	regip,
	server,
	status,
	special,
	home,
	date
)
VALUES (
    NULL,
    'http://mirror-t.ga',
    1,
    0,
    1,
    1,
    1,
    '127.0.0.1',
    '127.0.0.63',
    'nginx',
    0,
    0,
    1,
    '2019-11-25 17:27:44'
)");

// table notice
$db->exec("CREATE TABLE notice (
	id	INTEGER PRIMARY KEY AUTOINCREMENT,
	notice	TEXT
)");
$db->exec("INSERT INTO notice (
    id,
    notice
)
VALUES (
    NULL,
    ''
)");

$db->exec("INSERT INTO notice (
    id,
    notice
)
VALUES (
    NULL,
    ''
)");

// table kontak
$db->exec("CREATE TABLE kontak (
	kontak_id	INTEGER PRIMARY KEY AUTOINCREMENT,
	mirrorid	INT,
	user	TEXT,
	mailuser	TEXT,
	pesan	TEXT
)");

// table scdeface
$content = "<h1>Iron Six was here</h1>";
$sc = SQLite3::escapeString($content);
$db->exec("CREATE TABLE scdeface (
	sc_id	INTEGER PRIMARY KEY AUTOINCREMENT,
	sc	TEXT
)");
$db->exec("INSERT INTO scdeface (
    sc_id,
    sc
)
VALUES (
    NULL,
    '$sc'
)");

// table team
$db->exec("CREATE TABLE team (
	team_id	INTEGER PRIMARY KEY AUTOINCREMENT,
	teamname	TEXT
)");
$db->exec("INSERT INTO team (
    team_id,
    teamname
)
VALUES (
    NULL,
    'The Next Level'
)");

// table user
$db->exec("CREATE TABLE user (
	user_id	INTEGER PRIMARY KEY AUTOINCREMENT,
	username	TEXT
)");
$db->exec("INSERT INTO user (
    user_id,
    username
)
VALUES (
    NULL,
    'Iron Six'
)");

// Done
echo "==========<br>
Silahkan hapus file install.php<br>==========<br><br>";
$res = $db->query("PRAGMA table_info(admin)");
echo "table admin<br>";
while ($row = $res->fetchArray(SQLITE3_NUM)) {
    echo "{$row[0]} {$row[1]} {$row[2]}<br>";
}
echo "<br><br>";

$res = $db->query("PRAGMA table_info(berita)");
echo "table berita<br>";
while ($row = $res->fetchArray(SQLITE3_NUM)) {
    echo "{$row[0]} {$row[1]} {$row[2]}<br>";
}
echo "<br><br>";

$res = $db->query("PRAGMA table_info(mirror)");
echo "table mirror<br>";
while ($row = $res->fetchArray(SQLITE3_NUM)) {
    echo "{$row[0]} {$row[1]} {$row[2]}<br>";
}
echo "<br><br>";

$res = $db->query("PRAGMA table_info(notice)");
echo "table notice<br>";
while ($row = $res->fetchArray(SQLITE3_NUM)) {
    echo "{$row[0]} {$row[1]} {$row[2]}<br>";
}
echo "<br><br>";

$res = $db->query("PRAGMA table_info(report)");
echo "table report<br>";
while ($row = $res->fetchArray(SQLITE3_NUM)) {
    echo "{$row[0]} {$row[1]} {$row[2]}<br>";
}
echo "<br><br>";

$res = $db->query("PRAGMA table_info(scdeface)");
echo "table scdeface<br>";
while ($row = $res->fetchArray(SQLITE3_NUM)) {
    echo "{$row[0]} {$row[1]} {$row[2]}<br>";
}
echo "<br><br>";

$res = $db->query("PRAGMA table_info(team)");
echo "table team<br>";
while ($row = $res->fetchArray(SQLITE3_NUM)) {
    echo "{$row[0]} {$row[1]} {$row[2]}<br>";
}
echo "<br><br>";

$res = $db->query("PRAGMA table_info(user)");
echo "table user<br>";
while ($row = $res->fetchArray(SQLITE3_NUM)) {
    echo "{$row[0]} {$row[1]} {$row[2]}<br>";
}
