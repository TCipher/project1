<?php
session_start();
session_destroy();

header("Location: http://localhost/cipher/store.php");
exit;

?>