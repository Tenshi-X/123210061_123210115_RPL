<?php
    $host       = "localhost";
    $username   = "root";
    $password   = "";
    $database   = "deliver";
     
    $konek = new mysqli($host, $username, $password, $database);

    function hapus($id_menu){
        global $konek;

        mysqli_query($konek, "DELETE FROM menu WHERE id = '$id_menu'");
        return mysqli_affected_rows($konek);
    }
