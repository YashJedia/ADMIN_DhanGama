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
            <h1>User details</h1><br>
            <h6>All User Details</h6>
          </div>
          <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
              <li class="breadcrumb-item active">User Details</li>
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
            <div class="card container">
            
            <form action="" method="post">
              <div class="card-header">
                Personal Details
				  <a href="admin-dashboard" class="nav-link float-right" data-toggle="modal" data-target="#walletModel"><button class="btn btn-primary btn-sm">Add Wallet Money</button></a>
              </div>
              <div class="row">
                  <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                  <div class="form-group">
                    <label for="user_address">Address</label>
                    <input type="text" class="form-control" id="user_address" placeholder="User Address" name="user_address" value="<?= $userDetail->user_address ?>">
                  </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                  <div class="form-group">
                    <label for="user_city">City</label>
                    <input type="text" class="form-control" id="user_city" placeholder="Enter City" name="user_city" value="<?= $userDetail->user_city ?>">
                  </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                  <div class="form-group">
                    <label for="user_district">District</label>
                    <input type="text" class="form-control" id="user_district" placeholder="Enter District" name="user_district" value="<?= $userDetail->user_district ?>">
                  </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                  <div class="form-group">
                    <label for="user_state">State</label>
                    <input type="text" class="form-control" id="user_state" placeholder="Enter State" name="user_state" value="<?= $userDetail->user_state ?>">
                  </div>
                  </div>
                  </div>

                  <div class="row">
                  <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                  <div class="form-group">
                    <label for="user_pincode">Pin-code</label>
                    <input type="text" class="form-control" id="user_pincode" placeholder="Enter Pin-code" name="user_pincode" value="<?= $userDetail->user_pincode ?>">
                  </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                  <div class="form-group">
                    <label for="user_country">Country</label>
                    <input type="text" class="form-control" id="user_country" placeholder="Enter Country"
                    name="user_country" value="<?= $userDetail->user_country ?>">
                  </div>
                  </div>   
                  <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                  <div class="form-group">
                    <label for="user_country">Mobile No.</label>
                    <input type="number" class="form-control" id="user_mobile" placeholder="Enter Country"
                    name="user_mobile" value="<?= $userDetail->user_mobile ?>">
                  </div>
                  </div> 
                  <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                  <div class="form-group">
                    <label for="user_country">Email-id</label>
                    <input type="email" class="form-control" id="user_email" placeholder="Enter Email Address"
                    name="user_email" value="<?= $userDetail->user_email ?>">
                  </div>
                  </div>
                  </div>

                  <hr/>

            <div class="card-header">
                Account Details
              </div>                  <div class="row">
                  <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                  <div class="form-group">
                    <label for="user_bankaccount_name">Accholder Name</label>
                    <input type="text" class="form-control" id="user_bankaccount_name" placeholder="Enter Account Holder Name" name="user_bankaccount_name" value="<?= $userDetail->user_bankaccount_name ?>">
                  </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                  <div class="form-group">
                    <label for="user_bankaccount_no">Account Number</label>
                    <input type="text" class="form-control" id="user_bankaccount_no" placeholder="Enter Account Number" name="user_bankaccount_no" value="<?= $userDetail->user_bankaccount_no ?>">
                  </div>
                  </div>
                  </div>

                  <div class="row">
                  
                  <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                  <div class="form-group">
                    <label for="user_bank_ifsc">IFSC Code</label>
                    <input type="text" class="form-control" id="user_bank_ifsc" placeholder="Enter IFSC Code" name="user_bank_ifsc" value="<?= $userDetail->user_bank_ifsc ?>">
                  </div>
                  </div>
                 
                  <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                  <div class="form-group">
                    <label for="user_bank_name">Bank Name</label>
                    <input type="text" class="form-control" id="user_bank_name" placeholder="Enter Bank Name" name="user_bank_name" value="<?= $userDetail->user_bank_name ?>">
                  </div>
                  </div>

                   <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                  <div class="form-group">
                    <label for="user_bank_branch">Account Address</label>
                    <input type="text" class="form-control" id="user_bank_branch" placeholder="Enter Account Address" name="user_bank_branch" value="<?= $userDetail->user_bank_branch ?>">
                  </div>
                  </div>
                   <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                  <div class="form-group">
                    <label for="user_bank_branch">User Wallet Amount</label>
                    <input type="number" class="form-control" id="user_wallet" placeholder="Enter Amount" name="user_wallet" value="<?= $userDetail->user_wallet ?>" >
                  </div>
                  </div>
                  </div>

                 
                  <hr/>
            <div class="card-header">
                E-Payment Details
              </div> 
                  <div class="row">

                  <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                  <div class="form-group">
                    <label for="user_google_pay">Google Pay Number</label>
                    <input type="text" class="form-control" id="user_google_pay" placeholder="Enter Google pay number" name="user_google_pay" value="<?= $userDetail->user_google_pay ?>">
                  </div>
                  </div>

                  <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                  <div class="form-group">
                    <label for="user_paytm">Paytm Number</label>
                    <input type="text" class="form-control" id="user_paytm" placeholder="Enter Paytm number" name="user_paytm" value="<?= $userDetail->user_paytm ?>">
                  </div>
                  </div>

                   <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                  <div class="form-group">
                    <label for="user_phonepe">Phone Pe Number</label>
                    <input type="text" class="form-control" id="user_phonepe" placeholder="Enter Phone pay number" name="user_phonepe" value="<?= $userDetail->user_phonepe ?>">
                  </div>
                  </div>
                  </div>

                 
                
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-sm-right">Submit</button>
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

  </body>
</html>
