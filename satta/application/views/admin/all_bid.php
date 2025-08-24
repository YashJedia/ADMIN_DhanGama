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
            <h1>All Bid</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">All Bid</li>
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Game</th>
                    <th>Bid Name</th>
                    <th>Number</th>
                    <th>Price</th>
                    <th>Type</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($all_bid_data as $key => $value): ?>
                  <tr>
                    <td><?php echo ++$key; ?></td>
                    <td><?php echo $value->user_username; ?></td>
                    <td><?php echo $value->user_email; ?></td>
                    <td><?php echo $value->created; ?></td>
                    <td><?php echo $value->title; ?></td>
                    <td><?php echo $value->gt_name; ?></td>
                    <td><?php echo $value->bid_number ; if($value->bid_panel) {echo ' - ' .$value->bid_panel;} ?></td>
                    <td><?php echo $value->bid_value; ?></td>
                    <td><?php echo $value->bid_type; ?></td>
                    
                  </tr>
                      <?php endforeach ?> 
                  <!-- <tr>
                    <td>2</td>
                    <td>Sainath patharkar</td>
                    <td>madansainath1@gmail.com</td>
                    <td>2020-12-10</td>
                    <td>SRIDEVI NIGHTS</td>
                    <td>single digits</td>
                    <td>3</td>
                    <td>1000</td>
                    <td>open</td>
                  </tr> -->
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Sno.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Game</th>
                    <th>Bid Name</th>
                    <th>Number</th>
                    <th>Price</th>
                    <th>Type</th>
                  </tr>
                  </tfoot>
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
