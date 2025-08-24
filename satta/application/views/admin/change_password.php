<?php include "include/header.php" ?>
<div class="wrapper">
  <!-- Navbar -->
  <?php include "include/navbar.php" ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include "include/sidebar.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-body">
          <div class="card-header">
            <h2 class="text-muted text-center mb-md-3">Change Admin  Password</h2>
          </div>
          <div class="row">
          <div class="col-sm-3">
          </div>
          <div class="col-sm-6">
            <?php
                if($this->session->flashdata('errors')){
                    echo $this->session->flashdata('errors'); 
                }
                 if($this->session->flashdata('success')){
                    echo $this->session->flashdata('success'); 
                }
              ?>

             <form class="editResult" method="post" action="<?=base_url();?>admin/change_password_submit">
                <div class="">
                  <div class="form-group">
                    <label>Old Password</label>
                    <input type="password" class="form-control" name="old_password" id="result_id" required>
                  </div>
                  </div>
                  <div class="">
                  <div class="form-group">
                    <label>New Password</label>
                    <input type="password" class="form-control" name="new_password" id="result_id" required>
                  </div>
                  </div>
                  <div class="">
                  <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_password" id="result_id" required>
                  </div>
                  </div>
                 
                <div class="modal-footer justify-content-between">
                  <button type="submit" name="change_password" class="btn btn-default" data-dismiss="modal">Submit</button>
                </div>
              </form>
            
          </div>
         
            <!-- /.card -->

            <!-- Add Result Modal -->

            <!-- /.modal -->
<!--        Edit Modal-->

        
                         <!-- /.modal-content -->
        
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
  
</body>
</html>
