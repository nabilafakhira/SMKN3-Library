<?php
session_start();
$_SESSION['admin'] = $_GET['id'];
$_SESSION['username'] = "";
?>
<script type="text/javascript">
	document.location='index.php'
</script>