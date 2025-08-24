<?php include "include/header.php" ?>
<div class="wrapper">
  <!-- Navbar -->
  ??<?php include "include/navbar.php" ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include "include/sidebar.php" ?>
	<style>
		input[type="time"]::-webkit-calendar-picker-indicator {
			background: transparent;
			bottom: 0;
			color: transparent;
			cursor: pointer;
			height: auto;
			left: 0;
			position: absolute;
			right: 0;
			top: 0;
			width: auto;
		}
	</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Game</h1><br>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row mb-2">
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
            <div class="card">
             <div class="container">
              <form action="<?=base_url('admin/update-game/'.$game->id)?>" method="POST" enctype="multipart/form-data">
                  <div class="col-sm-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="Enter Title" value="<?= $game->title ?>" require>
                  </div>
                  </div>
                  <hr/>
                  <div class="row">
                  <div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">File Type</label>
                    <!-- <input type="File" class="form-control" name="file_type" id="exampleInputFile1" > -->
                  </div>
                  <div class="custom-file">
                        <input type="file" class="custom-file-input" name="choose_file" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="exampleInputEmail1">Preview</label>
                  </div>
                  <img id="blah" src="<?= base_url($game->file)?>" alt="your image" width="200"  />
                  <input type="hidden" name="old_image" value="<?= $game->file ?>">
                  </div>
                  </div>
                  <hr/>
                  <h6>DAYS</h6>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="sunday" name="Sunday"  <?= ($game->sunday)?"checked":"" ?>>
                    <label class="form-check-label" for="Sunday">Sunday</label>
                  </div>
                  <div id="sunday_time" class="s row d-none">
                    <div class="col-md-6">
                         <div class="form-group">
                    <label>Sunday Start Time:</label>

                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                      <input type="time" class="form-control datetimepicker-input" value="<?= $game->sunday_start_time ?>" name="sunday_open" data-target="#timepicker"/>
                      <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                          <!-- <div class="input-group-text"><i class="far fa-clock"></i></div> -->
                      </div>
                      </div>  
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                    <label>Sunday Close Time:</label>

                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                      <input type="time" class="form-control datetimepicker-input" value="<?= $game->sunday_close_time ?>" name="sunday_close" data-target="#timepicker"/>
                      <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                          <!-- <div class="input-group-text"><i class="far fa-clock"></i></div> -->
                      </div>
                      </div>  
                    </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="monday" name="Monday" <?= ($game->monday)?"checked":"" ?>>
                    <label class="form-check-label" for="Monday">Monday</label>
                  </div>
                  <div id="monday_time" class="s row d-none">
                    <div class="col-md-6">
                         <div class="form-group">
                    <label>Monday Start Time:</label>

                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                      <input type="time" class="form-control datetimepicker-input" value="<?= $game->monday_start_time ?>" name="monday_open" data-target="#timepicker"/>
                      <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                          <!-- <div class="input-group-text"><i class="far fa-clock"></i></div> -->
                      </div>
                      </div>  
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                    <label>Monday Close Time:</label>

                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                      <input type="time" class="form-control datetimepicker-input" value="<?= $game->monday_close_time ?>" name="monday_close" data-target="#timepicker"/>
                      <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                          <!-- <div class="input-group-text"><i class="far fa-clock"></i></div> -->
                      </div>
                      </div>  
                    </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="tuesday" name="Tuesday" <?= ($game->tuesday)?"checked":"" ?>>
                    <label class="form-check-label" for="Tuesday">Tuesday</label>
                  </div>
                  <div id="tuesday_time" class="s row d-none">
                    <div class="col-md-6">
                         <div class="form-group">
                    <label>Tuesday Start Time:</label>

                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                      <input type="time" class="form-control datetimepicker-input" value="<?= $game->tuesday_start_time ?>" name="tuesday_open" data-target="#timepicker"/>
                      <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                          <!-- <div class="input-group-text"><i class="far fa-clock"></i></div> -->
                      </div>
                      </div>  
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                    <label>Tuesday Close Time:</label>

                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                      <input type="time" class="form-control datetimepicker-input" value="<?= $game->tuesday_close_time ?>" name="tuesday_close" data-target="#timepicker"/>
                      <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                          <!-- <div class="input-group-text"><i class="far fa-clock"></i></div> -->
                      </div>
                      </div>  
                    </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="wednesday" name="Wednesday" <?= ($game->wednesday)?"checked":"" ?>>
                    <label class="form-check-label" for="Wednesday">Wednesday</label>
                  </div>
                  <div id="wednesday_time" class="s row d-none">
                    <div class="col-md-6">
                         <div class="form-group">
                    <label>Wednesday Start Time:</label>

                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                      <input type="time" class="form-control datetimepicker-input" value="<?= $game->wednesday_start_time ?>" name="wednesday_open" data-target="#timepicker"/>
                      <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                          <!-- <div class="input-group-text"><i class="far fa-clock"></i></div> -->
                      </div>
                      </div>  
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                    <label> WednesdayClose Time:</label>

                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                      <input type="time" class="form-control datetimepicker-input" value="<?= $game->wednesday_close_time ?>" name="wednesday_close" data-target="#timepicker"/>
                      <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                          <!-- <div class="input-group-text"><i class="far fa-clock"></i></div> -->
                      </div>
                      </div>  
                    </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="thursday" name="Thursday" <?= ($game->thursday)?"checked":"" ?>>
                    <label class="form-check-label" for="Thursday">Thursday</label>
                  </div>
                   <div id="thursday_time" class="s row d-none">
                    <div class="col-md-6">
                         <div class="form-group">
                    <label>Thursday Start Time:</label>

                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                      <input type="time" class="form-control datetimepicker-input" value="<?= $game->thursday_start_time ?>" name="thursday_open" data-target="#timepicker"/>
                      <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                          <!-- <div class="input-group-text"><i class="far fa-clock"></i></div> -->
                      </div>
                      </div>  
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                    <label>Thursday Close Time:</label>

                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                      <input type="time" class="form-control datetimepicker-input" value="<?= $game->thursday_close_time ?>" name="thursday_close" data-target="#timepicker"/>
                      <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                          <!-- <div class="input-group-text"><i class="far fa-clock"></i></div> -->
                      </div>
                      </div>  
                    </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="friday" name="Friday" <?= ($game->friday)?"checked":"" ?>>
                    <label class="form-check-label" for="Friday">Friday</label>
                  </div>
                  <div id="friday_time" class="s row d-none">
                    <div class="col-md-6">
                         <div class="form-group">
                    <label>Friday Start Time:</label>

                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                      <input type="time" class="form-control datetimepicker-input" value="<?= $game->friday_start_time ?>" name="friday_open" data-target="#timepicker"/>
                      <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                          <!-- <div class="input-group-text"><i class="far fa-clock"></i></div> -->
                      </div>
                      </div>  
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                    <label>Friday Close Time:</label>

                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                      <input type="time" class="form-control datetimepicker-input" value="<?= $game->friday_close_time ?>" name="friday_close" data-target="#timepicker"/>
                      <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                          <!-- <div class="input-group-text"><i class="far fa-clock"></i></div> -->
                      </div>
                      </div>  
                    </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="saturday" name="Saturday" <?= ($game->saturday)?"checked":"" ?>>
                    <label class="form-check-label" for="Saturday">Saturday</label>
                  </div>

                   <div id="saturday_time" class="s row d-none">
                    <div class="col-md-6">
                         <div class="form-group">
                    <label>Saturday Start Time:</label>

                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                      <input type="time" class="form-control datetimepicker-input" value="<?= $game->saturday_start_time ?>" name="saturday_open" data-target="#timepicker"/>
                      <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                          <!-- <div class="input-group-text"><i class="far fa-clock"></i></div> -->
                      </div>
                      </div>  
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                    <label>Saturday Close Time:</label>

                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                      <input type="time" class="form-control datetimepicker-input" value="<?= $game->saturday_close_time ?>" name="saturday_close" data-target="#timepicker"/>
                      <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                          <!-- <div class="input-group-text"><i class="far fa-clock"></i></div> -->
                      </div>
                      </div>  
                    </div>
                    </div>
                  </div>   
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
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
    
    if ($('input#sunday').is(':checked')) {

       $('#sunday_time').removeClass('d-none')
    }

    if ($('input#monday').is(':checked')) {

       $('#monday_time').removeClass('d-none')
    }

    if ($('input#tuesday').is(':checked')) {

       $('#tuesday_time').removeClass('d-none')
    }

    if ($('input#wednesday').is(':checked')) {

       $('#wednesday_time').removeClass('d-none')
    }

     if ($('input#thursday').is(':checked')) {

       $('#thursday_time').removeClass('d-none')
    }

     if ($('input#friday').is(':checked')) {

       $('#friday_time').removeClass('d-none')
    }

    if ($('input#saturday').is(':checked')) {

       $('#saturday_time').removeClass('d-none')
    }

    $("#sunday").change(function() {
        if(this.checked) {
            
            $('#sunday_time').removeClass('d-none')
        }
        else
        {
          $('#sunday_time').addClass('d-none')
        }
    });

    $("#monday").change(function() {
        if(this.checked) {
            
            $('#monday_time').removeClass('d-none')
        }
        else
        {
          $('#monday_time').addClass('d-none')
        }
    });

    $("#tuesday").change(function() {
        if(this.checked) {
            
            $('#tuesday_time').removeClass('d-none')
        }
        else
        {
          $('#tuesday_time').addClass('d-none')
        }
    });

    $("#wednesday").change(function() {
        if(this.checked) {
            
            $('#wednesday_time').removeClass('d-none')
        }
        else
        {
          $('#wednesday_time').addClass('d-none')
        }
    });

    $("#thursday").change(function() {
        if(this.checked) {
            
            $('#thursday_time').removeClass('d-none')
        }
        else
        {
          $('#thursday_time').addClass('d-none')
        }
    });

    $("#friday").change(function() {
        if(this.checked) {
            
            $('#friday_time').removeClass('d-none')
        }
        else
        {
          $('#friday_time').addClass('d-none')
        }
    });

    $("#saturday").change(function() {
        if(this.checked) {
            
            $('#saturday_time').removeClass('d-none')
        }
        else
        {
          $('#saturday_time').addClass('d-none')
        }
    });


      
     
   
  </script>


  <script>
  function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();

reader.onload = function (e) {
$('#blah').attr('src', e.target.result);
}

reader.readAsDataURL(input.files[0]);
}
}

$("#exampleInputFile").change(function(){
readURL(this);
});
</script>

</body>
</html>
