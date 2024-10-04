<?php
include("Main/header.php");
include("Main/sidebar.php");
include("config.php");
?>


<?php
if (isset($_GET['ab-id'])) {
	$about_id = $_GET['ab-id'];

	$fetch_record = "SELECT * from `about` where `ab_id` = '$about_id'";
	$record_result = mysqli_query($connection, $fetch_record);
	if ($record_result) {
		if (mysqli_num_rows($record_result) > 0) {
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
										<li class="breadcrumb-item active" aria-current="page">About Edit Form</li>
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

					<div class="card border-top border-3 border-danger rounded-0">

						<div class="card">
							<div class="card-body p-4">
								<form class="row g-3" action="about-updatedata.php" method="POST" enctype="multipart/form-data">
									<?php
									while ($row = mysqli_fetch_assoc($record_result)) {
										?>

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
													placeholder="First Name" value="<?php echo $row["ab_name"] ?>" required>
											</div>
										</div>
										<div class="col-md-6">
											<label for="input27" class="form-label">Email</label>
											<div class="input-group">
												<span class="input-group-text"><i class="material-icons-outlined fs-5">mail</i></span>
												<input type="email" class="form-control" id="about-email" name="about-email"
													placeholder="Email" value="<?php echo $row["ab_email"] ?>" required>
											</div>
										</div>
										<div class="col-md-6">
											<label for="input28" class="form-label">Phone</label>
											<div class="input-group">
												<span class="input-group-text"><i class="material-icons-outlined fs-5">call</i></span>
												<input type="text" class="form-control" id="about-phone" name="about-phone"
													placeholder="Phone" value="<?php echo $row["ab_phone"] ?>" required>
											</div>
										</div>
										<div class="col-md-6">
											<label for="input26" class="form-label">D.O.B</label>
											<div class="input-group">
												<span class="input-group-text"><i
														class="material-icons-outlined fs-5">calendar_today</i></span>
												<input type="date" id="about-dob" name="about-dob" class="form-control"
													value="<?php echo $row["ab_dob"] ?>" required>
											</div>
										</div>
										<div class="col-md-6">
											<label for="input29" class="form-label">Address</label>
											<div class="input-group">
												<span class="input-group-text"><i
														class="material-icons-outlined fs-5">opacity</i></span>
												<input type="text" class="form-control" id="about-address" name="about-address"
													placeholder="Address" value="<?php echo $row["ab_address"] ?>" required>
											</div>
										</div>
										<div class="col-md-6">
											<label for="input31" class="form-label">Zip Code</label>
											<div class="input-group">
												<span class="input-group-text"><i
														class="material-icons-outlined fs-5">pin_drop</i></span>
												<input type="number" class="form-control" id="about-zipcode" name="about-zipcode"
													placeholder="Zip Code" value="<?php echo $row["ab_zipcode"] ?>" required>
											</div>
										</div>
										<div class="col-md-12">
											<label for="input32" class="form-label">Image</label>
											<div class="input-group">
												<input type="file" class="form-control" id="about-img" name="about-img"
													value="<?php echo $row["ab_img"] ?>" required>
												<label class="input-group-text" for="inputGroupFile02"><i
														class="material-icons-outlined fs-5">cloud_upload</i></label>
											</div>
											<?php if (!empty($row['ab_img'])): ?>
												<small class="form-text text-muted">
													Current image: <a
														href="../Adm-Portfolio/images/Portfolio/about-images/<?php echo $row['ab_img']; ?>"
														target="_blank">
														<?php echo $row['ab_img']; ?>
													</a>
												</small>
											<?php endif; ?>
										</div>
										<div class="col-md-12">
											<label for="input32" class="form-label">Upload CV</label>
											<div class="input-group">
												<input type="file" class="form-control" id="about-cv" name="about-cv"
													value="<?php echo $row["ab_cv"] ?>" required>
												<label class="input-group-text" for="inputGroupFile02"><i
														class="material-icons-outlined fs-5">cloud_upload</i></label>
											</div>
											<?php if (!empty($row['ab_cv'])): ?>
												<small class="form-text text-muted">
													Current image: <a
														href="../Adm-Portfolio/images/Portfolio/about-images/<?php echo $row['ab_cv']; ?>"
														target="_blank">
														<?php echo $row['ab_cv']; ?>
													</a>
												</small>
											<?php endif; ?>
										</div>
										<div class="col-md-12">
											<label class="about-desc">Description</label>
											<textarea class="form-control rounded-0" id="about-desc" name="about-desc"
												placeholder="Description ..." rows="3" required><?php echo $row["ab_desc"] ?></textarea>
										</div>
										<div class="col-md-12">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" id="input34" required>
												<label class="form-check-label" for="input34">Check me out</label>
											</div>
										</div>
										<div class="col-md-12">
											<div class="d-md-flex d-grid align-items-center gap-3">
												<input type="Submit" class="btn btn-grd-primary px-4" value="Submit" name="aboutupdate">
												<button type="reset" class="btn btn-grd-info px-4">Reset</button>
												<?php
									}
		}
	}
}
?>
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