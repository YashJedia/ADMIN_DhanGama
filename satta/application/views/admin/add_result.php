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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Result</h1>
            <h6><?= date('d M, Y') ?></h6>
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
        <div class="row">
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
              <div class="card-header">
                <button class="btn btn-primary btn-sm float-right"  data-toggle="modal" data-target="#add-result">Add Result</button>
                                  
              </div>
              
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Sno.</th>
                    <th>Name</th>
                    <th>Open Panel</th>
                    <th>Jodi</th>
                    <th>Close Panel</th>
					<th>Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
				  <?php foreach ($result as  $key => $results) {
				  	if($results->result_close_panel > 0){
				  		$bg = '';
					}
				  	else{
				  		$bg = 'bg-danger';
					}
						echo '<tr class="'.$bg.'">
                    <td>'.($key+1).'</td>
                    <td>'.$results->title.'</td>
                    <td>'.$results->result_open_panel.'</td>
                    <td>'.$results->result_jodi.'</td>
                    <td>'.$results->result_close_panel.'</td>
                    <td>'.date('d-m-Y' , strtotime($results->result_date)).'</td>
                    <td><button class="btn btn-primary edit-result" data-id="'.$results->result_id.'" data-game="'.$results->result_game_id.'" data-open="'.$results->result_open_panel.'" data-close="'.$results->result_close_panel.'" data-jodi="'.$results->result_jodi.'" data-date="'.$results->result_date.'"><i class="far fa-edit"></i></button> 
                    | <a  href="javascript:void(0)" onclick="method('.$results->result_id.')"> <button class="btn btn-danger"><i class="fa fa-trash"></i></button></a></td>
                  </tr> ';
					}
                  ?>
				  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- Add Result Modal -->
            <div class="modal fade" id="add-result">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Add Result</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <div id="msg"></div>
                  </div>
                  <form class="addResult">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Select Game</label>
                      <select class="form-control" name="game" required="">
                          <option value="">--Select Game--</option>
                          <?php foreach($games as $key => $game): ?>
                              <option value="<?= $game->id ?>"><?= $game->title ?></option>
                          <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Open Panel</label>
                          <input type="number" name="openpanel" id="open_panel" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                            <label>Jodi</label>
                            <input type="number" name="jodi" class="form-control" id="jodi_data" readonly>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                            <label>Close Panel</label>
                            <input type="number" name="closepanel" class="form-control" id="close_panel">
                          </div>
                      </div>

						<div class="col-md-4">
							<div class="form-group">
								<label>Result Date </label>
								<input type="date" name="date" class="form-control" id="date_is" required>
							</div>
						</div>
                    </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  <button type="button" class="btn btn-primary save ok_button">Ok</button>
                    <button type="submit" class="btn btn-primary save_changes">Save changes</button>
                  </div>
                </form>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
<!--			  Edit Modal-->

			  <div class="modal fade" id="edit-result-modal">
				  <div class="modal-dialog modal-md">
					  <div class="modal-content ">
						  <div class="modal-header">
							  <h4 class="modal-title">Edit Result</h4>
							  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								  <span aria-hidden="true">&times;</span>
							  </button>
							  <div id="msg_edit"></div>
						  </div>
						  <form class="editResult">
							  <div class="modal-body">
								  <div class="form-group">
									  <input type="hidden" name="result_id" id="result_id">
									  <label>Select Game</label>
									  <select class="form-control" name="game" required="" id="game">
										  <option value="">--Select Game--</option>
										  <?php foreach($games as $key => $game): ?>
											  <option value="<?= $game->id ?>"><?= $game->title ?></option>
										  <?php endforeach; ?>
									  </select>
								  </div>
								  <div class="row">
									  <div class="col-md-4">
										  <div class="form-group">
											  <label>Open Panel</label>
											  <input type="number" name="openpanel" class="form-control open_panel_edit" id="open">
										  </div>
									  </div>
									  <div class="col-md-4">
										  <div class="form-group">
											  <label>Jodi</label>
											  <input type="number" name="jodi" class="form-control jodi_data_edit" id="jodi" readonly>
										  </div>
									  </div>
									  <div class="col-md-4">
										  <div class="form-group">
											  <label>Close Panel</label>
											  <input type="number" name="closepanel" class="form-control close_panel_edit" id="close">
										  </div>
									  </div>

									  <div class="col-md-4">
										  <div class="form-group">
											  <label>Result Date </label>
											  <input type="date" name="date" class="form-control" id="date" required>
										  </div>
									  </div>
								  </div>
							  </div>
							  <div class="modal-footer justify-content-between">
								  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								  <button type="button" class="btn btn-primary save ok_button_edit">Ok</button>
								  <button type="submit" class="btn btn-primary save save_changes_edit ">	Save changes</button>
							  </div>
						  </form>
					  </div>
					  <!-- /.modal-content -->
				  </div>
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
  <?php include "include/footer.php" ?>

  <script type="text/javascript">

	  function method(id){
		  var get =  confirm('Are you sure you want to delete this item');
		  if (get)
			  window.location.href = "<?=base_url('admin-delete-result/')?>"+id;
		  else
			  return false;
	  }

	  $('.save_changes').hide();
	  $('.save_changes_edit').hide();

	  $('.edit-result').on('click' , function (e){
	  	var id = $(this).data('id');
	  	var game = $(this).data('game');
	  	var open = $(this).data('open');
	  	var jodi = $(this).data('jodi');
	  	var close = $(this).data('close');
		var date = $(this).data('date');

	  	$('#result_id').val(id);
	  	$('#game').val(game);
	  	$('#jodi').val(jodi);
	  	$('#open').val(open);
	  	$('#close').val(close);
		$('#date').val(date)
	  	$('#edit-result-modal').modal('toggle');

	  })

	  var openSum = 0;
	  //

	  $('#close_panel , #open_panel').on('keyup' , function (){
		  $('.save_changes').hide();
	  	$('.ok_button').show();

	  })

	  $('.ok_button').on('click' , function (e){
		  var values = $('#open_panel').val();
		  var digits = (values).split("");
		  var num = digits.map(i=>Number(i));
		  // for(var i in digits) { openSum += digits[i]; }
		  var sum = num.reduce((a, b) => a + b, 0);
		  var open_jodi = sum % 10;

		  var values_close = $('#close_panel').val();
		  var digits_close = (values_close).split("");
		  var num_close = digits_close.map(i=>Number(i));
		  // for(var i in digits) { openSum += digits[i]; }
		  var sum_close = num_close.reduce((a, b) => a + b, 0);
		  var close_jodi = sum_close % 10;

		if(close_jodi > 0) {
			$('#jodi_data').val(open_jodi + '' + close_jodi);
		}
		else{
			$('#jodi_data').val(open_jodi);
		}
		  $('.ok_button').hide();
		  $('.save_changes').show();
	  });


	  $('.close_panel_edit , .open_panel_edit').on('keyup' , function (){
		  $('.save_changes_edit').hide();
		  $('.ok_button_edit').show();
	  })

	  $('.ok_button_edit').on('click' , function (e){
		  var values = $('.open_panel_edit').val();
		  var digits = (values).split("");
		  var num = digits.map(i=>Number(i));
		  // for(var i in digits) { openSum += digits[i]; }
		  var sum = num.reduce((a, b) => a + b, 0);
		  var open_jodi = sum % 10;

		  var values_close = $('.close_panel_edit').val();
		  var digits_close = (values_close).split("");
		  var num_close = digits_close.map(i=>Number(i));
		  // for(var i in digits) { openSum += digits[i]; }
		  var sum_close = num_close.reduce((a, b) => a + b, 0);
		  var close_jodi = sum_close % 10;


		  $('.jodi_data_edit').val(open_jodi+''+close_jodi);
		  $('.ok_button_edit').hide();
		  $('.save_changes_edit').show();
	  });



	  $('.addResult').on('submit', function(e){

        e.preventDefault()

        let fd = new FormData(this)

              $.ajax({

                url: "<?= base_url('admin/add-game-result')?>",
                type: "POST",
                dataType: "json",
                data: fd,
                contentType: false,
                processData: false,
				beforeSend: function() {
				$(".save_changes").addClass('disabled')
				$(".save_changes").html('<i class="fa fa-spinner fa-spin"></i> Save Changes')
            }
              })

               .done(function (result) {
                            if(result.status)
                            {
                             window.location.reload()
                            }
                            else
                            {
								$(".save_changes").removeClass('disabled')
								$(".save_changes").html('Save Changes')

                              $('#msg').html(`<span class="alert alert-danger">${result.msg}</span>`)

                        setTimeout(function () {
                             $('#msg').html('')

                         }, 2500);
                            }

                        })
                        .fail(function (jqXHR, exception) {
							$(".save_changes").removeClass('disabled')
							$(".save_changes").html('Save Changes')
                            console.log(jqXHR.responseText);
                        })
    })

	  $('.editResult').on('submit', function(e){

		  e.preventDefault()

		  let fd = new FormData(this)

		  $.ajax({

			  url: "<?= base_url('admin-edit-result')?>",
			  type: "POST",
			  dataType: "json",
			  data: fd,
			  contentType: false,
			  processData: false,
			  beforeSend: function() {
				$(".save_changes_edit").addClass('disabled')
				$(".save_changes_edit").html('<i class="fa fa-spinner fa-spin"></i> Save Changes')
            }
		  })

				  .done(function (result) {
				  	
					  if(result.status)
					  {
						  window.location.reload()
					  }
					  else
					  {

						$(".save_changes_edit").removeClass('disabled')
						$(".save_changes_edit").html('Save Changes')
						  $('#msg_edit').html(`<span class="alert alert-danger">${result.msg}</span>`)

						  setTimeout(function () {
							  $('#msg_edit').html('')

						  }, 2500);
						  
					  }
				  })
				  .fail(function (jqXHR, exception) {
						$(".save_changes_edit").removeClass('disabled')
						$(".save_changes_edit").html('Save Changes')
					  	console.log(jqXHR.responseText);
				  })
	  })
  </script>

</body>
</html>
