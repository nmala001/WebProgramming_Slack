<?php 
if ($_SERVER ['REQUEST_METHOD'] == "POST") {
	if (isset ( $_FILES ['image'] )) {
		$errors = array ();
		$file_name = $_FILES ['image'] ['name'];
		$file_size = $_FILES ['image'] ['size'];
		$file_tmp = $_FILES ['image'] ['tmp_name'];
		$file_type = $_FILES ['image'] ['type'];

		$file_Ext_split=explode ( '.', $_FILES ['image'] ['name'] ) ;
		$file_ext = strtolower ( end ($file_Ext_split ) );
	
		$new_file_name=uniqid()."_post".".".$file_ext;
		//echo $new_file_name;
		
		$expensions = array (
				"jpeg",
				"jpg",
				"png" 
		);
		
		if (in_array ( $file_ext, $expensions ) === false) {
			$errors [] = "extension not allowed, please choose a JPEG or PNG file.";
		}
		
		//echo "<script>alert(".$file_size.");</script>";
		if ($file_size > 2097152) {
			$errors [] = 'File size must be excately 2 MB';
		}
		
		if (count ( $errors ) === 0) {
			$status=move_uploaded_file ( $file_tmp, "uploads/" . $new_file_name );
			
		} else {
			echo($errors );
		}

		echo "uploads/".$new_file_name;
	}
	//echo "<script>window.parent.setUploadName('".$_POST["mceUpload"]."','profiles/".$new_file_name."');</script>";
}
?>