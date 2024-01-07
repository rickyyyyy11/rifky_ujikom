<?php

session_start();

//menghancurkan atau menghapus session
session_destroy();

//diarahkan ke halaman login dengan pesan logout
header("Location: ../login.php?pesan=logout")

?>