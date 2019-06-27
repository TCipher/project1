<?php
session_start();
session_destroy();

header("Location: http://localhost/cipher/index.php");
exit;

?>