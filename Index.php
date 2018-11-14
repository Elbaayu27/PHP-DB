<!DOCTYPE html>
<?php 
session_start();
if(!isset($_SESSION['db_is_logged_in'])){

 header('Location: Login2.php');
 //exit;
 }
 
?>
<html>
<head>
	<title>CRUD PHP dan MySQLi - Procedural</title>
</head>
<body>

	<h2>CRUD DATA MAHASISWA</h2>
	<br/>
	<a href="Tambah.php">+ TAMBAH MAHASISWA</a>
	<br/>
	<br/>
	<table border="1">
		<tr>
			<th>NO</th>
			<th>Nama</th>
			<th>NIM</th>
			<th>Alamat</th>
			<th>OPSI</th>
		</tr>
		<?php 
		include 'Koneksi.php';
		$no = 1;
		$data = mysqli_query($koneksi,"select * from mahasiswa");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['nama']; ?></td>
				<td><?php echo $d['nim']; ?></td>
				<td><?php echo $d['alamat']; ?></td>
				<td>
					<a href="edit.php?id=<?php echo $d['id']; ?>">EDIT</a>
					<a href="hapus.php?id=<?php echo $d['id']; ?>">HAPUS</a>
				</td>
			</tr>
			<?php 
		}
		?>
	</table>
	<p><a href="Logout1.php">Logout</a></p>
</body>
</html>