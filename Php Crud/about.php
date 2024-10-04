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
							<li class="breadcrumb-item active" aria-current="page">About Form</li>
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

				<a href="admin-about.php"> <button type="button" class="btn btn-grd btn-grd-deep-blue btn-sm"><i
							class="lni lni-angle-double-left me-2"></i>Back</button></a>

			</div>

		</div>
		<!--end breadcrumb-->

		<div class="card border-top border-3 border-danger rounded-0">

			<div class="card">
				<div class="card-body p-4">
					<!-- <h5 class="mb-4">About Form</h5> -->
					<form class="row g-3" action="insert-about.php" method="POST" enctype="multipart/form-data">

						<div class="input-group">
							<input type="hidden" class="form-control" id="about-id" name="about-id" placeholder="id"
								value="<?php echo $row["ab_id"] ?>">
						</div>

						<div class="col-md-6">
							<label for="input25" class="form-label">Name</label>
							<div class="input-group">
								<span class="input-group-text"><i
										class="material-icons-outlined fs-5">person_outline</i></span>
								<input type="text" class="form-control" id="about-name" name="about-name"
									placeholder="Name" required>
							</div>
						</div>
						<div class="col-md-6">
							<label for="input27" class="form-label">Email</label>
							<div class="input-group">
								<span class="input-group-text"><i class="material-icons-outlined fs-5">mail</i></span>
								<input type="email" class="form-control" id="about-email" name="about-email"
									placeholder="Email" required>
							</div>
						</div>
						<div class="col-md-6">
							<label for="input28" class="form-label">Phone</label>
							<div class="input-group">
								<span class="input-group-text"><i class="material-icons-outlined fs-5">call</i></span>
								<input type="text" class="form-control" id="about-phone" name="about-phone"
									placeholder="Phone" required>
							</div>
						</div>
						<div class="col-md-6">
							<label for="input26" class="form-label">D.O.B</label>
							<div class="input-group">
								<span class="input-group-text"><i
										class="material-icons-outlined fs-5">calendar_today</i></span>
								<input type="date" id="about-dob" name="about-dob" class="form-control" required>
							</div>
						</div>
						<div class="col-md-6">
							<label for="input29" class="form-label">Address</label>
							<div class="input-group">
								<span class="input-group-text"><i
										class="material-icons-outlined fs-5">opacity</i></span>
								<input type="text" class="form-control" id="about-address" name="about-address"
									placeholder="Address" required>
							</div>
						</div>
						<div class="col-md-6">
							<label for="input31" class="form-label">Zip Code</label>
							<div class="input-group">
								<span class="input-group-text"><i
										class="material-icons-outlined fs-5">pin_drop</i></span>
								<input type="number" class="form-control" id="about-zipcode" name="about-zipcode"
									placeholder="Zip Code" required>
							</div>
						</div>
						<div class="col-md-12">
							<label for="input32" class="form-label">Image</label>
							<div class="input-group">
								<input type="file" class="form-control" id="about-img" name="about-img" required>
								<label class="input-group-text" for="inputGroupFile02"><i
										class="material-icons-outlined fs-5">cloud_upload</i></label>
							</div>
						</div>
						<div class="col-md-12">
							<label for="input32" class="form-label">Upload CV</label>
							<div class="input-group">
								<input type="file" class="form-control" id="about-cv" name="about-cv" required>
								<label class="input-group-text" for="inputGroupFile02"><i
										class="material-icons-outlined fs-5">cloud_upload</i></label>
							</div>
						</div>
						<div class="col-md-12">
							<label class="form-label">Description</label>
							<textarea class="form-control rounded-0" id="about-desc" name="about-desc"
								placeholder="Description ..." rows="3" required></textarea>
						</div>
						<div class="col-md-12">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="input34" required>
								<label class="form-check-label" for="input34">Check me out</label>
							</div>
						</div>
						<div class="col-md-12">
							<div class="d-md-flex d-grid align-items-center gap-3">
								<input type="Submit" class="btn btn-grd-primary px-4" value="Submit" name="addabout">
								<button type="reset" class="btn btn-grd-info px-4">Reset</button>
							</div>
						</div>
					</form>
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
<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="assets/js/main.js"></script>


</body>

</html>