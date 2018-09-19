<?php
$pre = $_GET['pre'];
session_start();
session_destroy();
echo "<script>location.href='".$pre."index.php'</script>";	

?>