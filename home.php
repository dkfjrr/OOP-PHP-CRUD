<?php
include('koneksi.php');
$db = new Dbh();
$siswa = $db->tampil_data();
?>
<!DOCTYPE html>
<html>

<head>
	<title>CRUD OOP</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
		crossorigin="anonymous"></script>

	<div class="container p-5" id="data_siswa">
		<div class="card">
			<div class="card-header">
				Data Siswa
			</div>
			<div class="card-body">

				<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modulTambah">
					Tambah Data
				</button>

				<div class=" text-center">
					<div class="table-responsive">
						<table class="table table-hover table-bordered table-sm">
							<thead>
								<tr class="table-primary">
									<th scope="col">No</th>
									<th scope="col">Nama</th>
									<th scope="col">Jenis Kelamin</th>
									<th scope="col">Kota</th>
									<th colspan="2">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
                    $no = 1;
                    foreach ($siswa as $row) {
                    ?>
								<tr>
									<td>
										<?php echo $no++; ?>
									</td>
									<td>
										<?php echo $row['nama']; ?>
									</td>
									<td>
										<?php echo $row['jk']; ?>
									</td>
									<td>
										<?php echo $row['kota']; ?>
									</td>
									<td>
                                        <a href="#" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#siswaUbah<?= $no ?>">Edit</a>
                                        <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#siswaHapus<?= $no ?>">Delete</a>
                                    </td>
								</tr>
								   <!-- Modal Ubah Siswa-->
								   <div class="modal fade" id="siswaUbah<?= $no ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5">Edit Data Warga</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="proses.php?action=update">
                                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                <div class="mb-3">
                                                    <label class="form-label">Id</label>
                                                    <input type="text" class="form-control" name="id"
                                                        value="<?= $row['id'] ?>" name="id">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Nama</label>
                                                    <input type="text" class="form-control" name="nama"
                                                        value="<?= $row['nama'] ?>" name="nama">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Jenis Kelamin</label>
                                                    <input type="text" class="form-control" name="jk"
                                                        value="<?= $row['jk'] ?>" name="jk">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Kota</label>
                                                    <input type="text" class="form-control" name="kota"
                                                        value="<?= $row['kota'] ?>" name="kota">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        name="bubah">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    <!-- Modal Ubah Akhir -->
					<!-- Modal Hapus Siswa-->
                    <div class="modal fade" id="siswaHapus<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5">Hapus Data Siswa</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form method="POST" action="proses.php?action=delete&id=<?php echo $row['id']; ?>">

                                    <input type="hidden" name="nisn" value="<?= $row['id'] ?>">

                                    <div class="modal-body">
                                        <h5 class="text-center">Apakah anda yakin ingin menghapus data ini?
                                            <span class="text-danger">
                                                <?= $row['id'] ?> = <?= $row['nama'] ?>
                                            </span>
                                        </h5>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary" name="bhapus">Hapus</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
								<?php
                    }
                    ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<!-- Modal Tambah Data -->
			<div class="modal fade" id="modulTambah" tabindex="-1" aria-labelledby="exampleModalLabel"
				aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title fs-5">Tambah Data Warga</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<form method="POST" action="proses.php?action=add">
							<div class="modal-body">
								<div class="mb-3">
									<label class="form-label">Id</label>
									<input type="text" class="form-control" placeholder="Masukan Nisn" name="id">
								</div>
								<div class="mb-3">
									<label class="form-label">Nama</label>
									<input type="text" class="form-control" placeholder="Masukan Nama" name="nama">
								</div>
								<div class="mb-3">
									<label class="form-label">Jenis Kelamin</label>
									<select class="form-select" name="jk">
										<option></option>
										<option value="Laki-Laki">Laki-Laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
								</div>
								<div class="mb-3">
									<label class="form-label">Kota</label>
									<input type="text" class="form-control" placeholder="Masukan Kota" name="kota">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
								<button type="submit" class="btn btn-primary" name="submit">Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Modal Tambah Data Akhir -->

</body>

</html>