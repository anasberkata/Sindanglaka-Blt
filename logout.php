<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

// header("Location: index.php?pesan=Anda berhasil keluar");
header("Location: index.php");
exit;
