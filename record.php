<?php

include_once('config.php');
$user_fun = new Userfunction();
$counter = 1;

if(isset($_POST['keyword']) && !empty(trim($_POST['keyword']))){

	$keyword = $user_fun->htmlvalidation($_POST['keyword']);

	$match_field['u_id'] = $keyword;
	$match_field['u_name'] = $keyword;
	$match_field['u_alamat'] = $keyword;
	$match_field['u_nomortelepon'] = $keyword;
	$match_field['u_namaupline'] = $keyword;
	$select = $user_fun->search("user", $match_field, "OR");

}
else{

	$select = $user_fun->select("user");

}


?>
Ada di record.php </br>
alamat add edit done </br>
update nomor telp done add blum </br>
pilih nama upline yang sudah upline = 0 done </br>
tambah pilihan : 1. pilih upline 
				2. pilih downline yang sudah_downlinenya bernilai 0 dan tampilkan namanya dengan
				SELECT nama_user FROM table_user WHERE sudah_downline = 0
				<table class="table" style="vertical-align: middle; text-align: center;">
				  <thead class="thead-dark">
					<tr>
					  	<th scope="col">No</th>
						<th scope="col">ID</th>
					  	<th scope="col">Nama</th>
					  	<th scope="col">Alamat</th>
						<th scope="col">Nomor Telepon</th>
					  	<th scope="col">Nama Upline</th>
						<th scope="col">Nama Downline</th>
						<th scope="col">Action</th>
					</tr>
				  </thead>
				  <tbody>
				  	<?php if($select){ foreach($select as $se_data){ ?>
					<tr>
							<th scope="row"><?php echo $counter; $counter++; ?></th>
							<td><?php echo $se_data['u_id']; ?></td>
					  		<td><?php echo $se_data['u_name']; ?></td>
					  		<td><?php echo $se_data['u_alamat']; ?></td>
					  	<td><?php echo $se_data['u_nomortelepon']; ?></td>
						<td><?php echo $se_data['u_namaupline']; ?></td>
						<td><ol><li><?php echo $se_data['u_bod']; ?></li></ol></td>
						<td>
							<button type="button" class="btn btn-danger editdata" data-dataid="<?php echo $se_data['u_id']; ?>" data-toggle="modal" data-target="#updateModalCenter">Update</button>
							<button type="button" class="btn btn-danger deletedata" data-dataid="<?php echo $se_data['u_id']; ?>" data-toggle="modal" data-target="#deleteModalCenter">Delete</button>
						</td>
					</tr>
					<?php }}else{ echo "<tr><td colspan='7'><h2>No Result Found</h2></td></tr>"; } ?>
				  </tbody>
				</table>	