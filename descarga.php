<?php
    header("Content-disposition: attachment; filename=archivo.txt");
    header("Content-type: MIME");
    readfile("archivo.txt");
?>