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
						<h1>GAME</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active"><a href="#">Game</a></li>
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

						<!-- /.card -->

						<div class="card">
							<div class="card-header">
								<h3 class="card-title">All Game Data</h3>
								<a href="<?=base_url();?>admin-create_game2" class="nav-link"><button class="float-right btn btn-primary">ADD GAME</button>
								</a>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<div class="tabele table-responsive">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
									<tr>
										<th>Sno.</th>
										<th>Name</th>
										<th>Sunday</th>
										<th>Monday</th>
										<th>Tuesday</th>
										<th>Wednesday</th>
										<th>Thursday</th>
										<th>Friday</th>
										<th>Saturday</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
									</thead>
									<tbody>
									<?php foreach($games as $key => $game): ?>
										<tr>
											<td><?= ++$key ?></td>
											<td><?= $game->title ?></td>
											<td><?= date('h:i a',strtotime($game->sunday_start_time)) .' - '. date('h:i a',strtotime($game->sunday_close_time)) ?></td>
											<td><?= date('h:i a',strtotime($game->monday_start_time)) .' - '. date('h:i a',strtotime($game->monday_close_time)) ?></td>
											<td><?= date('h:i a',strtotime($game->tuesday_start_time)) .' - '. date('h:i a',strtotime($game->tuesday_close_time)) ?></td>
											<td><?= date('h:i a',strtotime($game->wednesday_start_time)) .' - '. date('h:i a',strtotime($game->wednesday_close_time)) ?></td>
											<td><?= date('h:i a',strtotime($game->thursday_start_time)) .' - '. date('h:i a',strtotime($game->thursday_close_time)) ?></td>
											<td><?= date('h:i a',strtotime($game->friday_start_time)) .' - '. date('h:i a',strtotime($game->friday_close_time)) ?></td>
											<td><?= date('h:i a',strtotime($game->saturday_start_time)) .' - '. date('h:i a',strtotime($game->saturday_close_time)) ?></td>
											<td><?php echo $game->status === '1' ? '<a href="'.base_url().'admin/change_game_status/'.$game->id.'/0"> <span class="btn btn-success">Start</span></a>' : '<a href="'.base_url().'admin/change_game_status/'.$game->id.'/1"><span class="btn btn-danger">Stop</a></span>'?></td>
											<td class="text-center">
												<a href="<?= base_url("admin/edit-game/$game->id")?>" title="Edit"><i class="fa fa-edit text-success"></i></a>&emsp;|&emsp;
												<a href="#" class="removeGame" title="Delete" data-id="<?= $game->id ?>"><i class="fa fa-trash text-danger"></i></a></td>
										</tr>

									<?php endforeach; ?>
									</tbody>
									<!-- <tfoot>
									<tr>
									  <th>Sno.</th>
									  <th>Name</th>
									  <th>Start Time</th>
									  <th>End Time</th>
									  <th>Action</th>
									</tr>
									</tfoot> -->
								</table>
								</div>
							</div>
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

	<script type="text/javascript">
		$(document).ready(function(){

			$('.removeGame').on('click', function(e){

				e.preventDefault()

				if(confirm("Are you sure, you want to delete this Game ?") === true)
				{
					var gameid = $(this).attr('data-id');

					$.ajax({

						url: "<?= base_url('admin/delete-game/')?>" + gameid,
						type: "GET",
						dataType: "json",

					})

							.done(function (result) {



								window.location.reload()

							})
							.fail(function (jqXHR, exception) {
								console.log(jqXHR.responseText);
							})
				}

			})
		})
	</script>
