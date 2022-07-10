<?php
    $host = '//localhost/orcl';
    $db   = 'hr';
    // $user = '';
    $pass = 'hr';
    $charset = 'utf8';
    $conn = oci_connect($db, $pass, $host, $charset);
    if (!$conn){
        echo "Không kết nối được CSDL!!!";
    }
?>