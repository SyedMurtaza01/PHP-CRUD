<?php
include("Main/header.php");
include("Main/sidebar.php");
include("config.php");
?>

<!--start main wrapper-->
<main class="main-wrapper">
	<div class="main-content">

		  <!--breadcrumb-->
		  <div class="page-breadcrumb d-flex flex-column flex-sm-row align-items-center mb-3">
                        <div class="d-flex align-items-center mb-3">
                            <div class="breadcrumb-title pe-3">Forms</div>
                            <div class="ps-3">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0 p-0">
                                        <li class="breadcrumb-item active" aria-current="page">About Trash Data</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>

                        <style>
                            @media (max-width: 576px) {

                                .breadcrumb-title,
                                .ps-3 {
                                    margin-bottom: 0;
                                }
                            }
                        </style>

                        <div class="d-flex gap-2 flex-grow-1 justify-content-end">

                            <a href="admin-about.php"> <button type="button" class="btn btn-grd btn-grd-deep-blue btn-sm"><i
                                        class="lni lni-angle-double-left me-2"></i>Back</button></a>

                        </div>

                    </div>
                    <!--end breadcrumb-->

		<h6 class="mb-0 text-uppercase">All About Trash List</h6>
		<hr>
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="example2" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>D.O.B</th>
								<th>Address</th>
								<th>Zip-Code</th>
								<th>Image</th>
								<th>CV</th>
								<th>Description</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$fetch_about_join = "SELECT * from `about` where `status` = 0";
							$fetch_about_result = mysqli_query($connection, $fetch_about_join);
							if (mysqli_num_rows($fetch_about_result) > 0) {
								while ($row = mysqli_fetch_assoc($fetch_about_result)) {
									?>

									<tr>
										<td>
											<?php echo $row['ab_name'] ?>
										</td>

										<td>
											<?php echo $row['ab_email'] ?>
										</td>

										<td>
											<?php echo $row['ab_phone'] ?>
										</td>

										<td>
											<?php echo $row['ab_dob'] ?>
										</td>

										<td>
											<?php echo $row['ab_address'] ?>
										</td>

										<td>
											<?php echo $row['ab_zipcode'] ?>
										</td>

										<td>
											<img src="<?php echo '../Adm-Portfolio/images/Portfolio/about-images/' . $row["ab_img"] ?>"
												height="80px" width="50px" alt="img">
										</td>

										<td>
											<a class="btn btn-grd btn-grd-primary btn-sm d-flex align-items-center"
												href="<?php echo "../Adm-Portfolio/images/Portfolio/about-images/" . $row['ab_cv']; ?>"
												target="_blank">
												<i class="material-icons-outlined me-2">remove_red_eye</i>
												<span>View</span>
											</a>
										</td>

										<td>
											<?php echo $row['ab_desc'] ?>
										</td>

										<td>
											<div class="flex align-items-center list-user-action">
												<a class="btn btn-grd btn-grd-warning px-1" title="Restore"
													href="about-restore.php?ab-id=<?php echo $row["ab_id"] ?>"><i
														class="fa fa-undo"></i></a>
												<a class="btn btn-grd btn-grd-danger px-1" title="Delete"
													href="about-delete.php?ab-id=<?php echo $row["ab_id"] ?>"><i
														class="fa fa-trash"></i></a>
											</div>
										</td>
									</tr>
									<?php
								}
							}
							?>


						</tbody>
						<tfoot>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>D.O.B</th>
								<th>Address</th>
								<th>Zip-Code</th>
								<th>Image</th>
								<th>CV</th>
								<th>Description</th>
								<th>Action</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>

	</div>
</main>
<!--end main wrapper-->

<?php
include("Main/footer.php");
?>

<!--bootstrap js-->
<script src="assets/js/bootstrap.bundle.min.js"></script>

<!--plugins-->
<script src="assets/js/jquery.min.js"></script>
<!--plugins-->
<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="assets/plugins/metismenu/metisMenu.min.js"></script>
<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script>
	$(document).ready(function () {
		$('#example').DataTable();
	});
</script>
<script>
	$(document).ready(function () {
		var table = $('#example2').DataTable({
			lengthChange: false,
			buttons: ['copy', 'excel', 'pdf', 'print']
		});

		table.buttons().container()
			.appendTo('#example2_wrapper .col-md-6:eq(0)');
	});
</script>
<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="assets/js/main.js"></script>


</body>

</html>