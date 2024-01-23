<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Data</h4>
				<ul class="breadcrumbs">
					<li class="nav-home">
						<a href="#">
							<i class="flaticon-home"></i>
						</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Pinjam</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Ruangan</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Data Pinjam Ruangan</h4>

							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Ruangan</th>
											<th>Tanggal Mulai</th>
											<th>Tanggal Selesai</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>

									<tbody>
										<?php
										$no = 1;
										$query = mysqli_query($conn, 'SELECT pemakaian.id_pemakaian, pemakaian.ruangan_id, pemakaian.user_id, pemakaian.tanggal_mulai, pemakaian.tanggal_selesai, pemakaian.status, ruangan.nama_ruangan from pemakaian inner join ruangan on ruangan.id_ruangan=pemakaian.ruangan_id inner join user on user.id_user=pemakaian.user_id');
										while ($pemakaian = mysqli_fetch_array($query)) {
										?>
											<tr>
												<td><?php echo $no++ ?></td>
												<td><?php echo $pemakaian['nama_ruangan'] ?></td>
												<td><?php echo $pemakaian['tanggal_mulai'] ?></td>
												<td><?php echo $pemakaian['tanggal_selesai'] ?></td>
												<td>
													<?php if ($pemakaian['status'] == 'menunggu') { ?>
														<div class="badge badge-danger"><?php echo $pemakaian['status'] ?></div>
													<?php } else { ?>
														<div class="badge badge-success"><?php echo $pemakaian['status'] ?></div>
													<?php } ?>
												</td>
												<td>
													<?php if ($pemakaian['status'] == 'menunggu') { ?>
														<a href="?view=detailpinjamruangan&id=<?php echo $pemakaian['id_pemakaian'] ?>" title="Detail" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
														<a href="#modalApprovePinjamRuangan<?php echo $pemakaian['id_pemakaian'] ?>" data-toggle="modal" title="Batal Pinjam" class="btn btn-xs btn-success"><i class="fa fa-check-circle"></i> Approve</a>
													<?php } else { ?>
														<a href="?view=detailpinjamruangan&id=<?php echo $pemakaian['id_pemakaian'] ?>" title="Detail" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
														<div class="badge badge-success"><?php echo $pemakaian['status'] ?></div>
													<?php } ?>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php
$c = mysqli_query($conn, 'SELECT pemakaian.id_pemakaian, pemakaian.ruangan_id, pemakaian.user_id, pemakaian.tanggal_mulai, pemakaian.tanggal_selesai, pemakaian.status, ruangan.nama_ruangan, user.email from pemakaian inner join ruangan on ruangan.id_ruangan=pemakaian.ruangan_id inner join user on user.id_user=pemakaian.user_id');
while ($row = mysqli_fetch_array($c)) {
?>

	<div class="modal fade" id="modalApprovePinjamRuangan<?php echo $row['id_pemakaian'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">
							Approve</span>
						<span class="fw-light">
							Pinjaman
						</span>
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="POST" enctype="multipart/form-data" action="">
					<div class="modal-body">
						<input type="hidden" name="id_pemakaian" value="<?php echo $row['id_pemakaian'] ?>">
						<input type="hidden" name="id_ruangan" value="<?php echo $row['ruangan_id'] ?>">
						<input type="hidden" name="tanggal_mulai" value="<?php echo $row['tanggal_mulai'] ?>">
						<input type="hidden" name="tanggal_selesai" value="<?php echo $row['tanggal_selesai'] ?>">
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" placeholder="Email ...">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" placeholder="Password ...">
						</div>
						<input type="hidden" name="status" value="approve">
						<input type="hidden" name="nama_ruangan" value="<?php echo $row['nama_ruangan'] ?>">
					</div>
					<div class="modal-footer no-bd">
						<button type="submit" name="ubah" class="btn btn-danger"><i class="fa fa-check-circle"></i> Approve</button>
						<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php } ?>

<?php
if (isset($_POST['ubah'])) {
	$id_pemakaian = $_POST['id_pemakaian'];
	$ruangan_id = $_POST['id_ruangan'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$status = $_POST['status'];
	$stat = 'dipinjam';
	$nama_ruangan = $_POST['nama_ruangan'];

	$selSto = mysqli_query($conn, "SELECT * FROM ruangan WHERE id_ruangan='$ruangan_id'");
	$sto    = mysqli_fetch_array($selSto);
	$stok   = $sto['status'];
	$sisa    = 'free';

	mysqli_query($conn, "UPDATE ruangan SET status='$stat' WHERE id_ruangan='$ruangan_id'");
	mysqli_query($conn, "UPDATE pemakaian SET status='$status' WHERE id_pemakaian='$id_pemakaian'");
	echo "<script>alert ('Pinjaman berhasil approve') </script>";
	echo"<meta http-equiv='refresh' content=0; URL=?view=datapinjamruangan>";
}
?>