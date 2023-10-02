<?php


function crop_foto($upload_name, 
					$target_width=640, 
					$target_height=480,
					$nama = "",
					$dir="") {

	$type = substr($_FILES[$upload_name]["type"],6);	
	$foto = $_FILES[$upload_name]["tmp_name"];
	if ($nama == "") $nama = time();
	else { $file = pathinfo($nama);
								$nama = $file["filename"]; }
	
	list($lebar, $tinggi) = getimagesize($foto);
	
	$rasio_lebar = $lebar / $target_width ; 
	$rasio_tinggi = $tinggi / $target_height ;
	
	$rasio = $rasio_lebar < $rasio_tinggi ? $rasio_lebar : $rasio_tinggi;
	
	$lebar_baru = $rasio * $target_width;
	$tinggi_baru = $rasio * $target_height;
		
	$sisa_lebar = $lebar - $lebar_baru;
	$sisa_tinggi = $tinggi - $tinggi_baru;

	if ($sisa_tinggi > 0) {
		$offset_x = 0;
		$offset_y = $sisa_tinggi/2;
	}
	else {
		$offset_x = $sisa_lebar/2;
		$offset_y = 0;
	}
	
	$gambar_target = imagecreatetruecolor ($target_width, $target_height);
	
	if ($type == "png") {
		$gambar_sumber = imagecreatefrompng ($foto);
	 $nama = "$nama.png";
	} else 
	if ($type == "jpeg") {
		$gambar_sumber = imagecreatefromjpeg ($foto);
	 $nama = "$nama.jpg";
	}

	$buat_gambar =  imagecopyresampled(
		$gambar_target,
		$gambar_sumber,
		0, //int $dst_x,
		0, //int $dst_y,
		$offset_x, // int $src_x,
		$offset_y, //int $src_y,
		$target_width, //int $dst_width,
		$target_height, //int $dst_height,
		$lebar_baru, //int $src_width,
		$tinggi_baru //int $src_height
	);

	
	imagejpeg($gambar_target, "$dir/$nama");
	imagedestroy($gambar_sumber);
	imagedestroy($gambar_target);

	return $nama;
}


function create_text_image ($text="123") {
	
}

function image_scale ($scale=50) {
	
}

function create_captcha () {
	
}

function image_rotate($degree=90) {
	
}