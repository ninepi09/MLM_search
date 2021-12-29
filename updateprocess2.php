<?php

include_once('config.php');
$user_fun = new Userfunction();

$json = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	if(isset($_POST['username']) 
	&& isset($_POST['alamat']) 
	&& isset($_POST['namaupline']) 
	&& isset($_POST['bod']) 
	&& isset($_POST['nomortelepon']) 
	&& isset($_POST['dataval'])){

		$username = $user_fun->htmlvalidation($_POST['username']);
		$alamat = $user_fun->htmlvalidation($_POST['alamat']);
		$namaupline = $user_fun->htmlvalidation($_POST['namaupline']);
		$bod = $user_fun->htmlvalidation($_POST['bod']);
		$nomortelepon = $user_fun->htmlvalidation($_POST['nomortelepon']);
		$update_id = $user_fun->htmlvalidation($_POST['dataval']);

		if((!preg_match('/^[ ]*$/', $username)) 
		&& (!preg_match('/^[ ]*$/', $alamat)) 
		&& (!preg_match('/^[ ]*$/', $namaupline)) 
		&& (!preg_match('/^[ ]*$/', $nomortelepon)) 
		&& ($bod != NULL)){

			$condition['u_id'] = $update_id;

			$field_val['u_name'] = $username;
			$field_val['u_alamat'] = $alamat;
			$field_val['u_nomortelepon'] = $nomortelepon;
			$field_val['u_namaupline'] = $namaupline;
			$field_val['u_bod'] = $bod;	

			$update = $user_fun->update("user", $field_val, $condition);

			if($update){
				$json['status'] = 101;
				$json['msg'] = "Data Successfully Updated";
			}
			else{
				$json['status'] = 102;
				$json['msg'] = "Data Not Updated";
			}

		}
		else{

			if(preg_match('/^[ ]*$/', $username)){

				$json['status'] = 103;
				$json['msg'] = "Please Enter Username";

			}
			if(preg_match('/^[ ]*$/', $alamat)){

				$json['status'] = 104;
				$json['msg'] = "Silahkan Masukkan Alamat";

			}
			if(preg_match('/^[ ]*$/', $namaupline)){

				$json['status'] = 105;
				$json['msg'] = "Pilih Nama Upline";

			}
			if(preg_match('/^[ ]*$/', $nomortelepon)){

				$json['status'] = 106;
				$json['msg'] = "Masukkan Nomor Telepon";

			}
			if($bod == NULL){

				$json['status'] = 107;
				$json['msg'] = "Please Enter BOD";

			}

		}

	}
	else{

		$json['status'] = 108;
		$json['msg'] = "Invalid Values Passed";

	}

}
else{

	$json['status'] = 109;
	$json['msg'] = "Invalid Method Found";

}


echo json_encode($json);

?>