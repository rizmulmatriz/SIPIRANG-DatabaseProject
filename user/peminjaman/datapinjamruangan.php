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
										<a href="?view=createpinjamruangan" class="btn btn-primary btn-round ml-auto">
											<i class="fa fa-plus"></i>
											Tambah Data
										</a>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
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
													$query = mysqli_query($conn,'SELECT pemakaian.id_pemakaian, pemakaian.ruangan_id, pemakaian.user_id, pemakaian.tanggal_mulai, pemakaian.tanggal_selesai, pemakaian.status, ruangan.nama_ruangan from pemakaian inner join ruangan on ruangan.id_ruangan=pemakaian.ruangan_id inner join user on user.id_user=pemakaian.user_id');
													while ($pemakaian = mysqli_fetch_array($query)) {
												?>
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $pemakaian['nama_ruangan'] ?></td>
													<td><?php echo $pemakaian['tanggal_mulai'] ?></td>
													<td><?php echo $pemakaian['tanggal_selesai'] ?></td>
													<td>
														<?php if($pemakaian['status'] == 'menunggu') { ?>
														<div class="badge badge-danger"><?php echo $pemakaian['status'] ?></div>
														<?php }else { ?>
															<div class="badge badge-success"><?php echo $pemakaian['status'] ?></div>
														<?php } ?>
													</td>
													<td>
														<?php if($pemakaian['status'] == 'menunggu') { ?>
														<a href="?view=detailpinjamruangan&id=<?php echo $pemakaian['id_pemakaian'] ?>" title="Detail" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
														<a href="#modalHapusPinjamRuangan<?php echo $pemakaian['id_pemakaian'] ?>" data-toggle="modal" title="Batal" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Batal</a>
													<?php }elseif($pemakaian['status'] == 'approve') { ?>
														<a href="?view=detailpinjamruangan&id=<?php echo $pemakaian['id_pemakaian'] ?>" title="Detail" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
														<a href="#modalKembalikanPinjamRuangan<?php echo $pemakaian['id_pemakaian'] ?>" data-toggle="modal" title="Batal" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Kembalikan</a>
													<?php }else { ?>
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
										$c = mysqli_query($conn,'SELECT pemakaian.id_pemakaian, pemakaian.ruangan_id, pemakaian.user_id, pemakaian.tanggal_mulai, pemakaian.tanggal_selesai, pemakaian.status, ruangan.nama_ruangan from pemakaian inner join ruangan on ruangan.id_ruangan=pemakaian.ruangan_id inner join user on user.id_user=pemakaian.user_id');
										while ($row = mysqli_fetch_array($c)) {
									?>

									<div class="modal fade" id="modalHapusPinjamRuangan<?php echo $row['id_pemakaian'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Batalkan</span> 
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
													<input type="hidden" name="ruangan_id" value="<?php echo $row['ruangan_id'] ?>">
													<h4>Apakah Anda Ingin Membatalkan Pinjamanan Ini ?</h4>
												</div>
												<div class="modal-footer no-bd">
													<button type="submit" name="hapus" class="btn btn-danger"><i class="fa fa-trash"></i> Batal Pinjam</button>
													<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
												</div>
												</form>
											</div>
										</div>
									</div>

									<?php } ?>


									<?php 
										$c = mysqli_query($conn,'SELECT pemakaian.id_pemakaian, pemakaian.ruangan_id, pemakaian.user_id, pemakaian.tanggal_mulai, pemakaian.tanggal_selesai, pemakaian.status, ruangan.nama_ruangan from pemakaian inner join ruangan on ruangan.id_ruangan=pemakaian.ruangan_id inner join user on user.id_user=pemakaian.user_id');
										while ($row = mysqli_fetch_array($c)) {
									?>

									<div class="modal fade" id="modalKembalikanPinjamRuangan<?php echo $row['id_pemakaian'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Kembalikan</span> 
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
													<input type="hidden" name="ruangan_id" value="<?php echo $row['ruangan_id'] ?>">
													<h4>Apakah Anda Ingin Mengembalikan Pinjamanan Ini ?</h4>
												</div>
												<div class="modal-footer no-bd">
													<button type="submit" name="ubah" class="btn btn-danger"><i class="fa fa-trash"></i> Kembalikan Pinjam</button>
													<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
												</div>
												</form>
											</div>
										</div>
									</div>

									<?php } ?>

		<?php 
			if(isset($_POST['hapus']))
			{
				$id_pemakaian = $_POST['id_pemakaian'];
				$ruangan_id = $_POST['ruangan_id'];

				$selSto = mysqli_query($conn, "SELECT * FROM ruangan WHERE id_ruangan='$ruangan_id'");
			    $sto    = mysqli_fetch_array($selSto);
			    $sisa    = 'free';

		        mysqli_query($conn, "UPDATE ruangan SET status='$sisa' WHERE id_ruangan='$ruangan_id'");
		        mysqli_query($conn,"DELETE from pemakaian where id_pemakaian='$id_pemakaian'");
		        echo "<script>alert ('Data Berhasil Dihapus') </script>";
                echo"<meta http-equiv='refresh' content=0; URL=?view=datapinjamruangan>";
			
			}elseif (isset($_POST['ubah'])) {
				$id_pemakaian = $_POST['id_pemakaian'];
				$ruangan_id = $_POST['ruangan_id'];

				$selSto = mysqli_query($conn, "SELECT * FROM ruangan WHERE id_ruangan='$ruangan_id'");
			    $sto    = mysqli_fetch_array($selSto);
			    $sisa   = 'free';
			    $status = 'selesai';

		        mysqli_query($conn, "UPDATE ruangan SET status='$sisa' WHERE id_ruangan='$ruangan_id'");
		        mysqli_query($conn, "UPDATE pemakaian SET status='$status' where id_pemakaian='$id_pemakaian'");
		        echo "<script>alert ('Data Berhasil Dikembalikan') </script>";
                echo"<meta http-equiv='refresh' content=0; URL=?view=datapinjamruangan>";
			}
		?>