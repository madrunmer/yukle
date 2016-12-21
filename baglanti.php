<?php
if (!@$baglanti=mysql_connect("localhost","root","")){
    die("Mysql'e bağlantı kurulamadı!".mysql_error());
}
 
if (!@mysql_select_db("test1",$baglanti)){
    die("Veritabanına bağlantı kurulamadı!".mysql_error());
}
?>