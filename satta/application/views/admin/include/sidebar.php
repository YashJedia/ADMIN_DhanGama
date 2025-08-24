<!-- Main Sidebar Container -->
<style>
	.Blink {
		animation: blinker 1s cubic-bezier(.5, 0, 1, 1) infinite alternate;
	}
	@keyframes blinker {
		from { opacity: 1; }
		to { opacity: 0; }
	}
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->


		<!-- Sidebar Menu -->
		<nav>
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
					 with font-awesome or any other icon font library -->

				<li class="nav-item">
					<a href="" class="nav-link">
						<p>
							GENERAL
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="<?= base_url(); ?>admin-dashboard" class="nav-link">
						<i class="nav-icon fas fa-home"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url(); ?>admin-users-list" class="nav-link">
						<i class="nav-icon fas fa-user-circle"></i>
						<p>
							Users
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-cube"></i>
						<p>
							Game Result
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url(); ?>admin-add_result" class="nav-link">
								<i class="far fa-circle nav-icon "></i>
								<p>Add Result</p>
							</a>
						</li>

					</ul>

				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-desktop"></i>
						<p>
							Game Management
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">

						<li class="nav-item">
							<a href="<?= base_url('admin/game-type'); ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Game Type</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url(); ?>admin-create_game" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Game</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="<?= base_url(); ?>admin-bid_type" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Bid Type</p>
							</a>
						</li>
					</ul>

				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-balance-scale"></i>
						<p>
							Wallet
							<i class="fas fa-angle-left right"></i>
							<?php if($this->deposit+$this->withdrawl>0) { echo '<i class="fa fa-circle text-danger Blink"></i>';} ?>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url(); ?>admin-add_fund" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Add Fund Request</p>
								<?php if($this->deposit>0) { echo '<i class="fa fa-circle text-danger Blink"></i>';} ?>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url(); ?>admin-withdraw_fund" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Withdrawal Fund Request</p>
								<?php if($this->withdrawl>0) { echo '<i class="fa fa-circle text-danger Blink"></i>';} ?>
							</a>
						</li>
						<!--      <li class="nav-item">
                <a href="<?= base_url(); ?>admin-sended_amt" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sended Amount Users</p>
                </a>
              </li> -->
					</ul>
				</li>

				<li class="nav-item">
					<a href="<?= base_url(); ?>admin-all_bid" class="nav-link">
						<i class="nav-icon fab fa-quora"></i>
						<p>
							All Bid
						</p>
					</a>
				</li>


				<li class="nav-item">
					<a href="<?= base_url(); ?>admin-winner_res" class="nav-link">
						<i class="nav-icon fab fa-superpowers"></i>
						<p>
							Winner Result
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url(); ?>admin-setting" class="nav-link">
						<i class="nav-icon fa fa-cogs"></i>
						<p>
							Setting
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="<?php echo base_url() ?>notification" class="nav-link">
						<i class="nav-icon fas fa-envelope"></i>
						<p>
							Send Notification
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="<?php echo base_url() ?>admin/change_password" class="nav-link">
						<i class="nav-icon fas fa-lock"></i>
						<p>
							Change Password
						</p>
					</a>
				</li>


				<li class="nav-item">
					<a href="<?php echo base_url() ?>admin/video_upload" class="nav-link">
						<i class="nav-icon fas fa-video"></i>
						<p>
							Upload Video
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="<?php echo base_url() ?>logout" class="nav-link">
						<i class="nav-icon fas fa-sign-out-alt"></i>
						<p>
							Logout
						</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
