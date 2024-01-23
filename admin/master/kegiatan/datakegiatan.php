<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Data Kegiatan</h4>
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
								<a href="#">Data</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Kegiatan</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Data Kegiatan</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddKegiatan">
											<i class="fa fa-plus"></i>
											Tambah Data
										</button>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>
													<th>Nama Kegiatan</th>
													<th>Action</th>
												</tr>
											</thead>
											
											<tbody>
												<?php
													$no = 1;
													$query = mysqli_query($conn,'SELECT * FROM kegiatan');
													while ($kegiatan = mysqli_fetch_array($query)) {
												?>
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $kegiatan['jenis_kegiatan'] ?></td>
													<td>
														<a href="#modalDetailKegiatan<?php echo $kegiatan['id_kegiatan'] ?>"  data-toggle="modal" title="Detail" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
														<a href="#modalEditKegiatan<?php echo $kegiatan['id_kegiatan'] ?>"  data-toggle="modal" title="Edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
														<a href="#modalHapusKegiatan<?php echo $kegiatan['id_kegiatan'] ?>"  data-toggle="modal" title="Hapus" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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

		<div class="modal fade" id="modalAddKegiatan" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Tambah</span> 
														<span class="fw-light">
															Data Kegiatan
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form method="POST" enctype="multipart/form-data" action="">
												<div class="modal-body">
													<div class="form-group">
														<label>Nama Kegiatan</label>
														<input type="text" name="jenis_kegiatan" class="form-control" placeholder="Nama Kegiatan..." required="">
													</div>
												</div>
												<div class="modal-footer no-bd">
													<button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
													<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
												</div>
												</form>
											</div>
										</div>
									</div>

									<?php 
										$p = mysqli_query($conn,'SELECT * FROM kegiatan');
										while($d = mysqli_fetch_array($p)) {
									?>

									<div class="modal fade" id="modalEditKegiatan<?php echo $d['id_kegiatan'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Edit</span> 
														<span class="fw-light">
															Kegiatan
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form method="POST" enctype="multipart/form-data" action="">
												<div class="modal-body">
													<input type="hidden" name="id_kegiatan" value="<?php echo $d['id_kegiatan'] ?>">
													<div class="form-group">
														<label>Nama Kegiatan</label>
														<input value="<?php echo $d['jenis_kegiatan'] ?>" type="text" name="jenis_kegiatan" class="form-control" placeholder="Nama Kegiatan ..." required="">
													</div>
												</div>
												<div class="modal-footer no-bd">
													<button type="submit" name="ubah" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
													<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
												</div>
												</form>
											</div>
										</div>
									</div>

									<?php } ?>

									<?php 
										$c = mysqli_query($conn,'SELECT * FROM kegiatan');
										while($row = mysqli_fetch_array($c)) {
									?>

									<div class="modal fade" id="modalHapusKegiatan<?php echo $row['id_kegiatan'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Hapus</span> 
														<span class="fw-light">
															Kegiatan
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form method="POST" enctype="multipart/form-data" action="">
												<div class="modal-body">
													<input type="hidden" name="id_kegiatan" value="<?php echo $row['id_kegiatan'] ?>">
													<h4>Apakah Anda Ingin Menghapus Data Ini?</h4>
												</div>
												<div class="modal-footer no-bd">
													<button type="submit" name="hapus" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
													<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
												</div>
												</form>
											</div>
										</div>
									</div>

									<?php } ?>

									<?php 
										$q = mysqli_query($conn,'SELECT * from kegiatan');
										while($k = mysqli_fetch_array($q)) {
									?>

									<div class="modal fade" id="modalDetailKegiatan<?php echo $k['id_kegiatan'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Detail</span> 
														<span class="fw-light">
															Kegiatan
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form method="POST" enctype="multipart/form-data" action="">
												<div class="modal-body">
													<input type="hidden" name="id_kegiatan" value="<?php echo $k['id_kegiatan'] ?>">
													<div class="form-group">
														<label>Nama Ruangan</label>
														<input readonly value="<?php echo $k['jenis_kegiatan'] ?>" type="text" name="jenis_kegiatan" class="form-control" placeholder="Nama Barang ..." required="">
													</div>
												</div>
												<div class="modal-footer no-bd">
													<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
												</div>
												</form>
											</div>
										</div>
									</div>

								<?php } ?>

		<?php
            if(isset($_POST['simpan']))
                {
                    $jenis_kegiatan = $_POST['jenis_kegiatan'];
                        
                    mysqli_query($conn,"INSERT INTO kegiatan VALUES ('','$jenis_kegiatan')");
                    echo "<script>alert ('Data Berhasil Disimpan') </script>";
                    echo"<meta http-equiv='refresh' content=0; URL=?view=dataruangan>";
                }

                elseif(isset($_POST['ubah']))
                {
                	$id_kegiatan = $_POST['id_kegiatan'];
                	$jenis_kegiatan = $_POST['jenis_kegiatan'];
                        
                    mysqli_query($conn,"UPDATE kegiatan SET id_kegiatan='$id_kegiatan', jenis_kegiatan='$jenis_kegiatan' WHERE id_kegiatan='$id_kegiatan'");
                    echo "<script>alert ('Data Berhasil Diubah') </script>";
                    echo"<meta http-equiv='refresh' content=0; URL=?view=dataruangan>";
                }

                elseif(isset($_POST['hapus']))
                {
                	$id_kegiatan = $_POST['id_kegiatan'];
					
                	mysqli_query($conn,"DELETE FROM kegiatan WHERE id_kegiatan='$id_kegiatan'");
                    echo "<script>alert ('Data Berhasil Dihapus') </script>";
                    echo"<meta http-equiv='refresh' content=0; URL=?view=dataruangan>";
                }
                ?>