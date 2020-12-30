<?php
require_once('koneksi.php');
if($_POST){
	try {
		$sql = "INSERT INTO cloudti1 (nim,nama,class) VALUES ('".$_POST['nim']."','".$_POST['nama']."','".$_POST['class']."')";
		if(!$koneksi->query($sql)){
			echo $koneksi->error;
			die();
		}

	} catch (Exception $e) {
		echo $e;
		die();
	}
	  echo "<script>
	alert('Data berhasil di simpan');
	window.location.href='index.php?page=crud/index';
	</script>";
}
?>
<div class="row">
	<div class="col-lg-6">
		<form action="" method="POST">
			<div class="form-group">
				<label>NIM</label>
				<input type="text" value="" class="form-control" name="nim">
			</div>
			<div class="form-group">
				<label>NAMA</label>
				<input type="text" value="" class="form-control" name="nama">
			</div>
			<div class="form-group">
				<label>CLASS</label>
				<input type="text" value="" class="form-control" name="class">
			</div>
			<input type="submit" class="btn btn-primary btn-sm" name="create" value="Create">
		</form>
	</div>
</div>