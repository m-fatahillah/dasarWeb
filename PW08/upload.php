<?php
if (isset($_POST["submit"]) ) {
    $targetdir = "upload/"; //dir tujuan untuk menyimpan file
    $targetfile = $targetdir . basename($_FILES["myfile"]["name"]);

    if(move_uploaded_file($_FILES["myfile"]["tmp_name"], $targetfile)){
        echo "file berhasil diungggah.";
    }else {
        echo "Gagal mengunggah file."; 
    }        
}