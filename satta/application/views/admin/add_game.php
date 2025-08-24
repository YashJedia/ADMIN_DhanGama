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
            <h1>Game Price</h1><br>
            <h6>Add Game Price</h6>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Game Price</li>
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
            <div class="card">
              <form>
                  <div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Game</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Game">
                  </div>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Open Result</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Please Enter Result Number">
                  </div>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Close Result</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Please Enter close results">
                  </div>
                  </div>
                
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
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
