<?php include "include/header.php" ?>
<div class="wrapper">
	<!-- Navbar -->
	??<?php include "include/navbar.php" ?>
	<!-- /.navbar -->

	<!-- Main Sidebar Container -->
	<?php include "include/sidebar.php" ?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
						<h1>Setting</h1><br>
						<h6>Manage Setting</h6>
					</div>
					<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Setting</li>
							<li class="breadcrumb-item active">Setting Manage</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">

				<div class="row mb-2">

					<div class="col-12">
						<div class="col-12" id="hideMsg">
							<?php if ($this->session->flashdata('error')) : ?>
								<div class="alert alert-danger">
									<?= $this->session->flashdata('error') ?>
								</div>
							<?php endif; ?>

							<?php if ($this->session->flashdata('success')) : ?>
								<div class="alert alert-success">
									<?= $this->session->flashdata('success') ?>
								</div>
							<?php endif; ?>
						</div>
						<div class="card container">

							<form action="<?=base_url()?>update_setting" method="post">
								<div class="card-header">
									Setting
								</div>
								<div class="row">
									<div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
										<div class="form-group">
											<label for="user_address">Mobile Number</label>
											<input type="text" class="form-control" id="user_address" placeholder="User Address" name="mobile" value="<?= $result->mobile ?>">
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
										<div class="form-group">
											<label for="user_address">Email</label>
											<input type="text" class="form-control" id="user_address" placeholder="Email" name="email" value="<?= $result->email ?>">
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
										<div class="form-group">
											<label for="user_city">Show Wallet</label>
											<input type="checkbox" class="form-control" id="user_city" placeholder="Enter City" name="show_wallet" <?php if($result->show_wallet) { echo 'checked';}?> >
										</div>
									</div>
								</div>
								<div class="card-footer">
									<button type="submit" class="btn btn-primary float-sm-right">Update</button>
								</div>
							</form>
						</div>
						<!-- /.card-body -->


						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "include/footer.php" ?>

</body>
</html>
