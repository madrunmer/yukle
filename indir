<html>
<head>
<meta charset=utf-8>
<title></title>
</head>

<body>
<center>
<?php
include_once("baglanti.php");
?>
<form method="post" action="">	
Ögrenci No:<input type="text" name="x" />
<input type="submit" name="button"/>
</form>
<?php
$sorgu=mysql_query("select * from odev");
echo "<table>";
 
echo '<tr><td>Ad</td><td>Soyad</td><td>Sınıf</td><td>No</td><td>Ders</td><td>Konu</td><td>Ödev</td><td>Puan</td><td>Tarih</td></tr>';
 
while($kayit=mysql_fetch_array($sorgu)){
    echo '<tr>';
	echo '<td>'.$kayit["ad"].'</td>';
	echo '<td>'.$kayit["soyad"].'</td>';
    echo '<td>'.$kayit["sinif"].'</td>';
    echo '<td>'.$kayit["no"].'</td>';
	echo '<td>'.$kayit["ders"].'</td>';
	echo '<td>'.$kayit["konu"].'</td>';
    echo '<td>
	<a href="'.$kayit["odev"].'"download="'.$kayit["odev"].'"<a href="'.$kayit["odev"].'"/>İndir</a>
	<a  href="'.$kayit["odev"].'" download="'.$kayit["odev"].'">indir </a>
	
	</td>';
    echo '<td>'.$kayit["puan"].'</td>';
    echo '<td>'.$kayit["tarih"].'</td>';

    echo '</tr>';
}
echo '</table>';
 
?>
</center>
</body>

</html>
