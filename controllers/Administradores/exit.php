<?php
session_start();
session_unset($_SESSION["administrador"]);
session_destroy();
header("location: ../../index.php?result=1");
