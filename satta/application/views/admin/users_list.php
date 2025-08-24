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
            <h1>USERS</h1>
            <h6>All User Data</h6>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">USER</li>
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
              
              <!-- /.card-header -->
              <div class="card-body table table-responsive">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Sno.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Wallet Credit</th>
                    <th>Wallet Debit</th>
                    <th>Details</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($users as $key => $user): ?>
                  <tr>
                    <td><?= ++$key ?></td>
                    <td><?= $user->user_username ?></td>
                    <td><?= $user->user_email ?></td>
                    <td><?= $user->user_mobile ?></td>
                    <td class="text-center">
                      <a href="<?=base_url("admin-credit/$user->user_id");?>" class="btn btn-primary btn-xs">
                        Credit</a>
                    </td>
                    <td class="text-center">
                      <a href="<?=base_url("admin-debit/$user->user_id");?>" class="btn btn-primary btn-xs">
                        Debit</a>
                      </td>
                    <td class="text-center">
                      <a href="<?= base_url("admin-user_detail/$user->user_id") ?>" class="btn btn-primary btn-xs">
                        View</a>
                      </td>
                    <td class="text-center">
                      <?php if($user->user_status == "ENABLED")
                      { ?>
                      <a href="<?= base_url("admin/change-user-status/$user->user_id/DISABLED") ?>" class="btn btn-success btn-xs">
                        Active </a>
                      <?php }else{ ?>
                        <a href="<?=base_url("admin/change-user-status/$user->user_id/ENABLED");?>" class="btn btn-danger btn-xs">
                        Deactivate </a>
                      <?php } ?>
                    </td>
                  </tr>
                 <?php endforeach; ?>
                 
                  </tbody>
                 
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
</div>
  <!-- /.content-wrapper -->
  <?php include "include/footer.php" ?>

  </body>
</html>
