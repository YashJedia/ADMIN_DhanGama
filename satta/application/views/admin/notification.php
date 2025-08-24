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
						<h1>Notification</h1><br>

					</div>
					<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Notification</li>
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
							<?php if ($this->session->flashdata('success')) : ?>
								<div class="alert alert-success">
									<?= $this->session->flashdata('success') ?>
								</div>
							<?php endif; ?>
						</div>
						<div class="card container">

							<form action="<?=base_url()?>send_notification" method="post">
								<div class="card-header">
									Notification
								</div>
								<div class="row">
									<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
										<div class="form-group">
											<label for="user_city">Message</label>
											<textarea  class="form-control" id="user_city" rows="10" placeholder="Notification" name="message"></textarea>
										</div>
									</div>
								</div>
								<div class="card-footer">
									<button type="submit" class="btn btn-primary float-sm-right">Send</button>
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
