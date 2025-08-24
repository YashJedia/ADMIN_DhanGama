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
					<div class="col-sm-6">
						<h1>Bet Number (Game: <?= $game->gt_name ?>) </h1>

					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Bet Number</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<div class="row">
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
					<div class="col-12">
						<div class="card">
							<!-- /.card-header -->
							<div class="card-header">
								<button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addBetNumber"><i class="fa fa-plus"></i> Add Bet Number</button>
							</div>
							<div class="card-body table-responsive">
								<table id="example2" class="table table-bordered table-hover">
									<thead>
									<tr>
										<th>Sno.</th>
										<th>Game Name</th>
										<th>Number</th>
										<th>Action</th>
									</tr>
									</thead>
									<tbody>
									<?php foreach ($numbers as $key => $num): ?>
										<tr>
											<td><?= ++$key ?></td>
											<td><?= $game->gt_name ?></td>
											<td><?= $num->bn_number ?></td>
											<td><a href="<?php echo base_url().'delete-numbers/'.$num->bn_id.'/'.$game->gt_id?>" onclick="return confirm('Are you sure you want to delete this item')"><i class="fa fa-trash"></i></a> </td>
										</tr>
									<?php endforeach; ?>
									</tbody>

								</table>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->

						<!-- Add Bet Number -->
						<div class="modal fade" id="addBetNumber">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Add Bet Number</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>

									</div>
									<div class="add-settings-alert"></div>
									<form id="add_bet_number" method="post">
										<div class="modal-body">

											<div class="form-group">
												<label for="number" class="col-form-label">Number:</label>
												<input type="text" class="form-control" name="number" id="number">
												<input type="hidden" name="gametype" value="<?= $this->uri->segment(5) ?>">
											</div>

										</div>
										<div class="modal-footer justify-content-between">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Save</button>
										</div>
									</form>
								</div>
								<!-- /.modal-content -->
							</div>
							<!-- /.modal-dialog -->
						</div>


					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>
</div>
	<!-- /.content-wrapper -->
	<?php include "include/footer.php" ?>

	<script type="text/javascript">
		$(document).ready(function(){

			$('#add_bet_number').on('submit', function(e){

				e.preventDefault()

				let fd = new FormData(this)

				$.ajax({

					type       : 'POST',
					url        : "<?= base_url('admin/add-bet-number') ?>",
					dataType   : 'json',
					data       : fd,
					processData: false,
					contentType: false,
					success    : function(data) {

						if(data.status)
						{
							// $("html, body").animate({ scrollTop: 0 }, "slow");
							$('.add-settings-alert').html('<i class="fa fa-check"></i> Successfully Added');
							setTimeout(function () {

								window.location.reload()
							}, 500);
						}
						else
						{
							alert(data.msg);
						}

					},
					error: function(jqXHR, exception) {
						console.log('bye');
						console.log(jqXHR.responseText);
					}

				});
			})
		})
	</script>

	</body>
	</html>
