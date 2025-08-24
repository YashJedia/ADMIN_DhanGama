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
            <h2 class="text-muted text-center mb-md-3">Upload Video</h2>
          </div>
          <div class="row">
          <div class="col-sm-6">
             <form method="post" action="<?=base_url();?>admin/video_upload_submit" enctype="multipart/form-data">
                <div class="">
                  <div class="form-group">
                    <label>Browse Video <small class="text-danger">Upload only mp4 videos</small></label>
                    <input type="file" class="form-control" name="file" required>
                  </div>
                  </div>

                <div class="modal-footer justify-content-between">
                  <button type="submit" class="btn btn-default" data-dismiss="modal">Submit</button>
                </div>
              </form>
            
          </div>

			  <div class="col-sm-6">
				  <video width="320" height="240" controls>
					  <source src="<?php echo base_url($video->video_browse)?>" type="video/mp4">
				  </video>
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
