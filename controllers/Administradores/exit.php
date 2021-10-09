<?php
session_unset();
session_destroy(); 
header("location: ../../login.php?result=1");

