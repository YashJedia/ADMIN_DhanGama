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
            <h1>Credit</h1>
            <h6>All Credit Data</h6>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Credit</li>
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
              <div class="card-body table-responsive">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Sno.</th>
                    <th>User Name</th>
                    <!-- <th>Market name/Type</th> -->
                    <!-- <th>Game Type</th> -->
                    <!-- <th>Bid</th> -->
                    <th>Detail</th>
                    <th>Transaction Amount</th>
                    <th>Requested Amount</th>
                    <th>Date</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($userCredit as $key => $credit): ?>
                  <tr>
                    <td><?= ++$key ?></td>
                    <td><?= $credit->name ?></td>
                    <td><?= $credit->txn_details ?></td>
                    <td><?= $credit->txn_amount ?></td>
                    <td><?= $credit->txn_req_amt ?></td>
                    <td><?= $credit->txn_req_date ?></td>
                    <td>
                      <?php if($credit->txn_status === "PENDING"){ ?>
                          <button class="btn btn-warning btn-sm">PENDING</button>
                      <?php }else{ ?>
                          <button class="btn btn-success btn-sm">ACCEPTED</button>

                      <?php } ?>
                    </td>
                  </tr>
                  <?php endforeach; ?>
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

  </body>
</html>
