<?php
session_start();

if (!isset($_SESSION['login'])) {
	header("location: index.php");
}

require 'functions.php';

$id = $_GET["id"];

if (blt_delete($id) > 0) {
	echo "
		<script>
			alert('Data berhasil dihapus');
			document.location.href = 'data_blt.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('Data gagal dihapus');
			document.location.href = 'data_blt.php';
		</script>

	";
}
