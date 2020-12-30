<?php
require_once('koneksi.php');
if($_POST){

	$sql = "UPDATE cloudti1 SET nim='".$_POST['nim']."', nama='".$_POST['nama']."', class='".$_POST['class']."' WHERE id=".$_POST['id'];

	if ($koneksi->query($sql) === TRUE) {
	    echo "<script>
	alert('Data berhasil di update');
	window.location.href='index.php?page=crud/index';
	</script>";
	} else {
	    echo "Gagal: " . $koneksi->error;
	}

	$koneksi->close();
	
}else{
	$query = $koneksi->query("SELECT * FROM tb_mahaiswa WHERE id=".$_GET['id']);

	if($query->num_rows > 0){
		$data = mysqli_fetch_object($query);
	}else{
		echo "data tidak tersedia";
		die();
	}
?>
<div class="row">
	<div class="col-lg-6">
		<form action="" method="POST">
			<input type="hidden" name="id" value="<?= $data->id ?>">
			<div class="form-group">
				<label>NIM</label>
				<input type="text" value="<?= $data->nim ?>" class="form-control" name="nim">
			</div>
			<div class="form-group">
				<label>NAMA/label>
				<input type="text" value="<?= $data->nama ?>" class="form-control" name="nama">
			</div>
			<div class="form-group">
				<label>CLASS/label>
				<input type="text" value="<?= $data->nama ?>" class="form-control" name="class">
			</div>
			<input type="submit" class="btn btn-primary btn-sm" name="Update" value="Update">
		</form>
	</div>
</div>
<?php
}
mysqli_close($koneksi);
?>