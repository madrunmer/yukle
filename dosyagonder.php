<?php

if(isset($_FILES['dosya'])) {
   echo '<br>Dosya gönderilmiş';
} else {
   echo 'Lütfen bir dosya gönderin';
}
if(isset($_FILES['dosya'])){
   $hata = $_FILES['dosya']['error'];
   if($hata != 0) {
      echo 'Yüklenirken bir hata gerçekleşmiş.';
   }  else {
         $tip = $_FILES['dosya']['type'];
         $isim = $_FILES['dosya']['name'];
         $uzanti = explode('.', $isim);
         $uzanti = $uzanti[count($uzanti)-1];
         if( $uzanti != 'pdf') {
            echo '<br>Yanlızca PDF dosyaları gönderebilirsiniz.';
         } else {
            $dosya = $_FILES['dosya']['tmp_name'];
            copy($dosya, 'dosya/' . $_FILES['dosya']['name']);
            echo '<br>Dosyanız upload edildi!';
			$_FILES=$_POST['dosya'];
		$k=$db->query("insert into odev (dosya) values('$dosya')");
		if(!$k)
	{
		echo"DOSYA İSMİ KAYIT YAPILMAMAMITIR";	
	}
	else
	{	
		echo"DOSYA İSMİ KAYIT YAPILMIŞTIR";	
	};
         }
      }
   
}
?>
