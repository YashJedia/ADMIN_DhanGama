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
				<div class="row">
					<div class="col-12" id="hideMsg">
						<?php if ($this->session->flashdata('add_fund_reject')) : ?>
							<div class="alert alert-danger">
								<?= $this->session->flashdata('add_fund_reject') ?>
							</div>
						<?php endif; ?>

						<?php if ($this->session->flashdata('add_fund_approve')) : ?>
							<div class="alert alert-success">
								<?= $this->session->flashdata('add_fund_approve') ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Add Fund Request</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Add fund request</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body table-responsive">
								<table id="example2" class="table table-bordered table-hover text-center">
									<thead>
									<tr>
										<th>Sno.</th>
										<th>Name</th>
										<th>Email</th>
										<th>Mobile</th>
										<th>Amount</th>
										<th>Date</th>
										<th>Approved Date</th>
										<th>Payment Method</th>
										<th>Payment Request Username</th>
										<th>Payment Transaction Id Or Image</th>
										<th>Status</th>
									</tr>
									</thead>
									<tbody>
									<?php foreach ($depositedTransaction as $key => $value): ?>
										<tr>
											<td><?= ++$key ?></td>
											<td><?= $value->user_username ?></td>
											<td><?= $value->user_email ?></td>
											<td><?= $value->user_mobile ?></td>
											<td><?= $value->txn_amount ?></td>
											<td><?= $value->txn_req_date ?></td>
											<td><?= $value->txn_req_approve_date ?></td>
											<td><?= $value->payment_method ?></td>
											<td><?= $value->user_name ?></td>
											<td>
												<?php if (!empty($value->payment_image)): ?>
													<a href="<?= base_url($value->payment_image) ?>" target="_blank">
														<img src="<?= base_url($value->payment_image) ?>"
															 class="img-fluid" width="100">
													</a>
													<br>
												<?php endif ?>
												<?php if (!empty($value->payment_txn_id)): ?>
													<b>TXN ID : </b> <?= $value->payment_txn_id ?>
												<?php endif ?>
											</td>
											<td>
												<button class="<?php if ($value->txn_status === 'PENDING') {
													echo 'btn btn-warning btn-block btn-sm';
												} else if ($value->txn_status === 'REJECT') {
													echo 'btn btn-danger btn-sm btn-block';
												} else {
													echo 'btn btn-success btn-block btn-sm';
												} ?>" data-toggle="modal"
														data-target="#add_fund_modal_<?= $value->txn_id ?>"
														id="<?= $value->txn_id ?>"><?= $value->txn_status ?></button>
											</td>
										</tr>
										<?php if ($value->txn_status === 'PENDING') { ?>
											<div class="modal " id="add_fund_modal_<?= $value->txn_id ?>" role="dialog"
												 aria-labelledby="walletModelLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<form action="<?= base_url() . 'admin/add-refund' ?>" method="post">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="walletModelLabel">Fund
																	Request</h5>
																<button type="button" class="close" data-dismiss="modal"
																		aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<label>Transaction Amount</label>
																<input class="form-control" type="number"
																	   name="txn_amount"
																	   max="<?= $value->txn_req_amt ?>"
																	   placeholder="Amount" aria-label="Amount"
																	   value="<?= $value->txn_req_amt ?>">
																<label>Transaction Request Amount</label>
																<input class="form-control" type="number"
																	   name="txn_req_amount"
																	   placeholder="Request Amount"
																	   aria-label="Request Amount"
																	   value="<?= $value->txn_req_amt ?>" readonly>
															</div>

															<div class="modal-footer">
																<input type="hidden" name="txn_id"
																	   value="<?= $value->txn_id ?>">
																<input type="hidden" name="txn_user_id"
																	   value="<?= $value->txn_user_id ?>">
																<input type="submit" name="approveAddFund"
																	   value="Approve" class="btn btn-success btn-sm">
																<input type="submit" name="rejectAddFund" value="Reject"
																	   class="btn btn-danger btn-sm">
															</div>
														</div>
													</form>
												</div>
											</div>
										<?php } ?>
									<?php endforeach ?>

								</table>
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
