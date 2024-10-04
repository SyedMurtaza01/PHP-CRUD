<?php
include("Main/header.php");
include("Main/sidebar.php");
include("config.php");

if (isset($_SESSION['success'])) {
	echo '
    <div id="backdrop" class="custom-backdrop"></div> <!-- Backdrop to block other interactions -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 offset-md-2 alert alert-border-success alert-dismissible fade show custom-alert" style="max-width: 80%;">
                <div class="d-flex align-items-center">
                    <div class="font-35 text-success">
                        <span class="material-icons-outlined fs-2">check_circle</span>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-success">Success</h6>
                        <div class="text-white">' . $_SESSION['success'] . '</div>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close" id="close-alert-btn"></button>
            </div>
        </div>
    </div>';
	unset($_SESSION['success']);
}

if (isset($_SESSION['delete'])) {
	echo '
    <div id="backdrop" class="custom-backdrop"></div> <!-- Backdrop to block other interactions -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 offset-md-2 alert alert-border-danger alert-dismissible fade show custom-alert" style="max-width: 80%;">
				<div class="d-flex align-items-center">
					<div class="font-35 text-danger">
						<span class="material-icons-outlined fs-2">report_gmailerrorred</span>
					</div>
					<div class="ms-3">
						<h6 class="mb-0 text-danger">Deleted</h6>
						<div class="text-white">' . $_SESSION['delete'] . '</div>
					</div>
				</div>
				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close" id="close-alert-btn"></button>
			</div>
        </div>
    </div>';
	unset($_SESSION['delete']);
}
?>

<!-- JavaScript to manage the alert and backdrop -->
<script>
	document.addEventListener("DOMContentLoaded", function () {
		// When the alert close button is clicked, hide the backdrop
		const closeBtn = document.getElementById("close-alert-btn");
		const backdrop = document.getElementById("backdrop");

		closeBtn.addEventListener("click", function () {
			backdrop.style.display = "none"; // Hide the backdrop when alert is closed
		});
	});
</script>

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
							<li class="breadcrumb-item active" aria-current="page">About Data</li>
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

				/* Move alert down further */
				.custom-alert {
					margin-top: 120px;
					z-index: 1050;
					/* Adjust this value to move it lower */
				}

				/* Backdrop to cover the screen and block interactions */
				.custom-backdrop {
					position: fixed;
					top: 0;
					left: 0;
					width: 100%;
					height: 100%;
					background-color: rgba(0, 0, 0, 0.5);
					/* Semi-transparent backdrop */
					z-index: 1040;
					/* Z-index higher than the rest of the page elements */
				}

				/* White close button */
				.btn-close-white {
					filter: invert(1);
				}

				/* Mobile alert styling */
				@media (max-width: 576px) {
					.alert {
						margin-left: 0;
						max-width: 100%;
					}
				}

				/* Desktop-specific adjustments */
				@media (min-width: 768px) {
					.alert {
						margin-left: 20px;
						max-width: 90%;
					}
				}
			</style>

			<div class="d-flex gap-2 flex-grow-1 justify-content-end">

				<a href="about-trashdata.php"> <button type="button" class="btn btn-grd btn-grd-primary btn-sm"><i
							class="lni lni-trash me-2"></i>Trash</button></a>
				<a href="about.php"> <button type="button" class="btn btn-grd btn-grd-deep-blue btn-sm"><i
							class="fa-solid fa-plus me-2"></i>Add Form</button></a>

			</div>

		</div>
		<!--end breadcrumb-->

		<h6 class="mb-0 text-uppercase">All About List</h6>
		<hr>
		<div class="card" id="emailList">
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
							$fetch_about_join = "SELECT * from `about` where `status` = 1";
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
												<a class="btn btn-grd btn-grd-info px-1" title="Edit"
													href="about-update.php?ab-id=<?php echo $row["ab_id"] ?>"><i
														class="lni lni-pencil-alt"></i></a>
												<a class="btn btn-grd btn-grd-danger px-1" title="Trash"
													href="about-trash.php?ab-id=<?php echo $row["ab_id"] ?>"><i
														class="lni lni-trash"></i></a>
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