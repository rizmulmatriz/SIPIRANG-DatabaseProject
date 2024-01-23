<?php
$query = mysqli_query($conn,"SELECT pemakaian.id_pemakaian, pemakaian.ruangan_id, pemakaian.user_id, pemakaian.tanggal_mulai, pemakaian.tanggal_selesai, pemakaian.status, pemakaian.kegiatan_id, ruangan.nama_ruangan, ruangan.deskripsi, user.username, kegiatan.jenis_kegiatan from pemakaian inner join ruangan on ruangan.id_ruangan=pemakaian.ruangan_id inner join kegiatan on kegiatan.id_kegiatan=pemakaian.kegiatan_id inner join user on user.id_user=pemakaian.user_id and pemakaian.id_pemakaian='$_GET[id]'");
$d = mysqli_fetch_array($query);
?>

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
										<h4 class="card-title">Detail Pinjam Ruangan</h4>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table">											
											<tr>
												<td>Nama Peminjam</td>
												<td>:</td>
												<td><?php echo $d['username'] ?></td>
											</tr>
											<tr>
												<td>Jenis Kegiatan</td>
												<td>:</td>
												<td><?php echo $d['jenis_kegiatan'] ?></td>
											</tr>
											<tr>
												<td>Nama Ruangan</td>
												<td>:</td>
												<td><?php echo $d['nama_ruangan'] ?></td>
											</tr>
											<tr>
												<td>Tanggal Mulai</td>
												<td>:</td>
												<td><?php echo $d['tanggal_mulai'] ?></td>
											</tr>
											<tr>
												<td>Tanggal Selesai</td>
												<td>:</td>
												<td><?php echo $d['tanggal_selesai'] ?></td>
											</tr>
											<tr>
												<td>Status</td>
												<td>:</td>
												<td><?php echo $d['status'] ?></td>
											</tr>
											<tr>
												<td>Deskripsi</td>
												<td>:</td>
												<td><?php echo $d['deskripsi'] ?></td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>