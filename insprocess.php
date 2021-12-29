<?php

include_once('config.php');
$user_fun = new Userfunction();

$json = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	if(isset($_POST['username']) 
	&& isset($_POST['alamat']) 
	&& isset($_POST['namaupline']) 
	&& isset($_POST['bod'])
	&& isset ($_POST['sudah_upline'])
	&& isset ($_POST['sudah_downline'])
	&& isset($_POST['nomortelepon'])){

		$username = $user_fun->htmlvalidation($_POST['username']);
		$alamat = $user_fun->htmlvalidation($_POST['alamat']);
		$namaupline = $user_fun->htmlvalidation($_POST['namaupline']);
		$bod = $user_fun->htmlvalidation($_POST['bod']);
		$sudah_upline = $user_fun->htmlvalidation($_POST['sudah_upline']);
		$sudah_downline = $user_fun->htmlvalidation($_POST['sudah_downline']);
		$nomortelepon = $user_fun->htmlvalidation($_POST['nomortelepon']);

		if((!preg_match('/^[ ]*$/', $username)) 
		&& (!preg_match('/^[ ]*$/', $alamat)) 
		&& (!preg_match('/^[ ]*$/', $namaupline)) 
		&& (!preg_match('/^[ ]*$/', $nomortelepon)) 
		&& ($bod != NULL)){

			$field_val['u_name'] = $username;
			$field_val['u_alamat'] = $alamat;
			$field_val['u_nomortelepon'] = $nomortelepon;
			$field_val['u_namaupline'] = $namaupline;
			$field_val['sudah_upline'] = $sudah_upline;
			$field_val['sudah_downline'] = $sudah_downline;
			$field_val['u_bod'] = $bod;	

			$insert = $user_fun->insert("user", $field_val);

			if($insert){
				$json['status'] = 101;
				$json['msg'] = "Data Successfully Inserted";
			}
			else{
				$json['status'] = 102;
				$json['msg'] = "Data Not Inserted";
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
			if(preg_match('/^[ ]*$/', $username)){

				$json['status'] = 105;
				$json['msg'] = "Pilih Nama User Sebagai Upline";

			}
			if(preg_match('/^[ ]*$/', $nomortelepon)){

				$json['status'] = 106;
				$json['msg'] = "Silahkan Masukkan Nomor Telepon";

			}
			if($bod == NULL){

				$json['status'] = 107;
				$json['msg'] = "BOD Pilih 2 Nama User Sebagai Downline";

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