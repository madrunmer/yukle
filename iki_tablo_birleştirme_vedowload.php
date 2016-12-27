<html>
  <head>
  <title>İki Tabloyu Birleştirme</title>
    <script src="https://code.getmdl.io/1.2.1/material.min.js"></script>
    <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.indigo-pink.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  </head>
  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">Title</span>
          <div class="mdl-layout-spacer"></div>
          <nav class="mdl-navigation mdl-layout--large-screen-only">
            
            <a class="mdl-navigation__link" href="adminkayit.php">Admin Kaydet</a>
            <a class="mdl-navigation__link" href="index.php">Çıkış Yap</a>
          </nav>
        </div>
      </header>
      <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Title</span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="ogrencikayit.php">Ögrenci Gir</a>
          <a class="mdl-navigation__link" href="duyuru.php">Duyuru Gir</a>
          <a class="mdl-navigation__link" href="notgir.php">Not Gir</a>
          <a class="mdl-navigation__link" href="odevgir.php">Ödev Gir</a>
          <a class="mdl-navigation__link" href="odevy.php">Ödev Gir2</a>
          <a class="mdl-navigation__link" href="ogrenci.php">Ögrenci Listesi</a>
          <a class="mdl-navigation__link" href="adminduyurugor.php">Duyurulara Bak</a>
          <a class="mdl-navigation__link" href="adminnotgor.php">Notlara Bak</a>
          <a class="mdl-navigation__link" href="odevbak.php">Ödev Bak</a>
          <a class="mdl-navigation__link" href="odevcikti.php">Ödev Yeni Bak</a>

        </nav>
      </div>
      <main class="mdl-layout__content">
        <div class="page-content">
        
        
        <div id="contentic">
<center>
<br><br><br><br>

<?php
include_once("baglanti3.php");
error_reporting(0);
 $aera=$_POST['x'];
?>
<form method="post" action="">	
Ögrenci No:<input type="text" name="x" value="<?php echo $aera ?>"/>
<input type="submit" name="button"/>
</form>
<?php

echo "<table>";
 
echo '<tr><td>Ad</td><td>Soyad</td><td>Sınıf</td><td>No</td><td>Ders</td><td>Konu</td><td>Ödev</td><td>Puan</td><td>Tarih</td></tr>';

 if(isset($aera))
 {
//$sorgu=mysql_query("select ogrenci,odevy from ogrenci ınner joın  odevy on ogrenci.idnumara = odevy.idnumara where idnumara like '%$aera%' ");//isim sütununda a harfi geçenleri çektik.
//$sogru=mysql_query("select * from ogrenci where no like '%$aera%' ");//isim sütununda a harfi geçenleri çektik.
//$sorgu=mysql_query("select * from odevy where no like '%$aera%' ");//isim sütununda a harfi geçenleri çektik.
  $sorgu=mysql_query("SELECT ogrenci.idnumara, ogrenci.ad, ogrenci.soyad, ogrenci.sinif, odevy.ders, odevy.konu, odevy.odev, odevy.puan FROM ogrenci LEFT JOIN odevy ON (ogrenci.idnumara = odevy.idnumara) where ogrenci.idnumara like '%$aera%'");

 }else{
// $sorgu=mysql_query("select ogrenci.idnumara.ad.soyad.sinif,odevy.idnumara.ders.konu.odev.puan from ogrenci ınner joın odevy on ogrenci.idnumara = odevy.idnumara");
  // $sogru=mysql_query("select * from ogrenci");
   //$sorgu=mysql_query("select * from odevy");
  $sorgu=mysql_query("SELECT ogrenci.idnumara, ogrenci.ad, ogrenci.soyad, ogrenci.sinif, odevy.ders, odevy.konu, odevy.odev, odevy.puan FROM ogrenci LEFT JOIN odevy ON (ogrenci.idnumara = odevy.idnumara)");
	 }
//verilerin hepsini saydırdık.
if($sorgu){//eğer veri çekildiyse
echo "";
while($kayit=mysql_fetch_array($sorgu )){
    echo '<tr>';
	echo '<td>'.$kayit["ad"].'</td>';
	echo '<td>'.$kayit["soyad"].'</td>';
    echo '<td>'.$kayit["sinif"].'</td>';
    echo '<td>'.$kayit["idnumara"].'</td>';
	echo '<td>'.$kayit["ders"].'</td>';
	echo '<td>'.$kayit["konu"].'</td>';
    echo '<td>
	<a href="'.$kayit["odev"].'"download="'.$kayit["odev"].'"<a href="'.$kayit["odev"].'"/>İndir</a>
	<a  href="'.$kayit["odev"].'" download="'.$kayit["odev"].'">indir </a>
	
	</td>';
    echo '<td>'.$kayit["puan"].'</td>';

    echo '</tr>';
}
echo '</table>';
}
else{
echo "Veri çekilemedi";
}
?>




</center>
</div>
        
        
        
        </div>
      </main>
    </div>
  </body>
</html>
