<html>
<head>
<meta charset=utf-8 >
<title></title>
</head>
<body>
<?php
include_once("baglanti.php");
?>

<?php

if($_POST){//Form gönderildi mi?
	
	if ($_FILES["resim"]["type"]=="image/jpeg"){//dosya tipi jpeg olsun
		$okulno=$_POST["okulno"];
		$ogrenciadi=$_POST["ogrenciadi"];
		$ogrencisoyadi=$_POST["ogrencisoyadi"];
		$path=$_POST["path"];
		$dosya_adi=$_FILES["resim"]["name"];
		//Dosyaya yeni bir isim oluşturuluyor
		$uret=array("as","rt","ty","yu","fg");
		$uzanti=substr($dosya_adi,-4,4);
		$sayi_tut=rand(1,10000);
		$nokta=(".");
		$yeni_ad="dosya/".$uret[rand(0,4)].$sayi_tut.$nokta.$uzanti;
		//Dosya yeni adıyla dosyalar klasörüne kaydedilecek
		if (move_uploaded_file($_FILES["resim"]["tmp_name"],$yeni_ad)){
			echo 'Dosya başarıyla yüklendi.';
			//Bilgiler veri tabanına kaydedilsin
				
		try{
			$sorgu=mysql_query("insert into ogrenci (okulno,ogrenciadi,ogrencisoyadi,odev,path) values ('$okulno','$ogrenciadi','$ogrencisoyadi','$yeni_ad','$path')");
		
					
			}
		catch(Exception $e)
		{
			var_dump($e);	
		}
				
			if ($sorgu){
				echo 'Veritabanına kaydedildi. :'.mysql_error($baglanti);
			}else{
				echo 'Kayıt sırasında hata oluştu!';
			}
		}else{
			echo 'Dosya Yüklenemedi!';
		}
	}else{
		echo 'Dosya yalnızca jpeg formatında olabilir!';
		}
	
}
?>
<form action="" method="post" name="form1" enctype="multipart/form-data">
okulno:<input type="text" name="okulno"/><br/>
adi:<input type="text" name="ogrenciadi"/><br/>
soyad:<input type="text" name="ogrencisoyadi"/><br/>
odev:<input type="file" name="resim"/><br/>
not:<input type="text" name="path"/><br/>
<input type="submit" name="gonder" value="Kaydet"/>
</form>


</body>
</html>
