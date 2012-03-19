<html>
<head>
<title>Upload Form</title>
</head>
<body>

<!-- 
<ul>
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>
 -->
 
 <?php 
 		$myFile = $upload_data['full_path'];
		$f = fopen($myFile, 'r');
		$podaci = fread($f, filesize($myFile));
		fclose($f);
		
		echo $podaci;
 ?>
 
<p><?php echo anchor('upload', 'Upload Another File!'); ?></p>

</body>
</html>