<?php  
if(isset($_FILES["fileNameBook"]) && $_FILES["fileNameBook"]["name"][0]!='')
{
	$filetypes		=$_FILES["fileNameBook"]["type"];//massiv
	$fileTotal=0;//daxil faylların sayı
	$file=0;//daxil edilən fayllrin sayı
	$AllowedFormat =  array('application/pdf','application/msword','application/vnd.openxmlformats-officedocument.wordprocessingml.document');
	foreach($filetypes as $filetype)
	{
		$fileTotal++;
		if(in_array($filetype, $AllowedFormat))
		{
			$file++;
		}
	}
	if($fileTotal!=$file)
	{
		$errorEbook="Yalnız 'pdf','doc','docx' faylları əlavə edə bilərsiniz.";
	}
	else
	{
		if($file>1)
		{
			$errorEbook="Maksimum fayl sayı 1";
		}
		else
		{
            include 'php-image-resize.php';
            $random=rand(1,10000000);
            $random=md5($random);

            
            $basename=pathinfo($_FILES['fileNameBook']['name'][0], PATHINFO_FILENAME);
            $x=explode(".", $_FILES["fileNameBook"]["name"][0]);
            $n = count($x);
            $extention = $x[$n-1];
            $filename = $random.$basename.".".$extention;
            $newname = $filename;

			$target_dir = "../assets/ebooks/";
			$target_dir = $target_dir.$newname;
            move_uploaded_file($_FILES['fileNameBook']['tmp_name'][0], $target_dir);


            
            $fileNames=$_FILES["fileName"]["name"];
            $tmpFilePath = $_FILES['fileName']['tmp_name'][0];	
            $photos.=$random.$fileNames[0];

            $image = new SimpleImage($tmpFilePath);
            $image->resize(269,300);
            $filePathA = "../assets/ebooks/" .$random.$fileNames[0];
            $image->save($filePathA);

            $download = rand(0,20);
			$save=$conn->prepare("INSERT INTO library(`title`, `image`, `download`, `booklink`, `created_at`, `updated_at`) VALUES (?,?,?,?,?,?)");
          	$save->execute([$title,$photos,$download,$newname,date("d/m/Y H:i:s"),date("d/m/Y H:i:s")]);
          	?>
<script type="text/javascript">
alert("Kitab uğurla əlavə edildi");
</script>
          	<?php
          	echo '<meta http-equiv="refresh" content="0;url=index.php?page=ebook">';
		}
	}
}
else
{
	$errorEbook="Kitabı daxil edin.";
}
?>