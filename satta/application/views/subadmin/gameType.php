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
            <h1>Game Type</h1>
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Game Type</li>
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
              <div class="card-header">
                <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addGameResult"><i class="fa fa-plus"></i> Add Game Type</button>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Sno.</th>
                    <th>Game Name</th>
                    <th>Game Min Bet Price</th>
                    <th>Game Rate</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($gameType as $key => $game): ?>
                    <tr>
                      <td><?= ++$key ?></td>
                      <td><?= $game->gt_name ?></td>
                      <td><?= $game->gt_min_price ?></td>
                      <td><?= $game->gt_min_price.":".$game->gt_rate ?></td>
                      <td><a href="<?= base_url("admin/game-type/bet/numbers/$game->gt_id") ?>" class="btn btn-primary btn-sm">Bet Numbers</a>&emsp;|&emsp;<a href="#" class="btn btn-success btn-sm editGameType" data-name="<?= $game->gt_name ?>" data-id="<?= $game->gt_id?>" data-minprice="<?= $game->gt_min_price ?>" data-rate="<?= $game->gt_rate ?>">Edit</a></td>
                    </tr>
                  <?php endforeach; ?>
                 
                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- Add Result Modal -->
            <div class="modal fade" id="addGameResult">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Add Game Type</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="add-settings-alert"></div>
                  </div>
                  <form id="add_game_type" method="post">
                  <div class="modal-body">
                    
                    <div class="form-group">
                    <label for="game_name" class="col-form-label">Game Name:</label>
                    <input type="text" class="form-control" name="game_name" id="game_name">
                  </div>
                   <div class="form-group">
                    <label for="game_min" class="col-form-label">Game Min Bet Price:</label>
                    <input type="number" class="form-control" name="game_min" id="game_min">
                  </div>
                   <div class="form-group">
                    <label for="game_rate" class="col-form-label">Game Win Price:</label>
                    <input type="number" class="form-control" name="game_rate" id="game_rate">
                  </div>
                    
            
                    
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </form>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>

            <!-- Edit Result Modal -->
            <div class="modal fade" id="editGameType">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Edit Game Type</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="add-settings-alert"></div>
                  </div>
                  <form id="edit_game_type" method="post">
                  <div class="modal-body">
                    
                    <div class="form-group">
                    <label for="gamename" class="col-form-label">Game Name:</label>
                    <input type="text" class="form-control" name="game_name" id="gamename">
                    <input type="hidden" name="gameid" id="gameid">
                  </div>
                   <div class="form-group">
                    <label for="gamemin" class="col-form-label">Game Min Bet Price:</label>
                    <input type="number" class="form-control" name="game_min" id="gamemin">
                  </div>
                   <div class="form-group">
                    <label for="gamerate" class="col-form-label">Game Win Price:</label>
                    <input type="number" class="form-control" name="game_rate" id="gamerate">
                  </div>
                    
            
                    
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
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

    <!-- Add Game Type -->

  
  </div>
</div>
  <!-- /.content-wrapper -->
  <?php include "include/footer.php" ?>

  <script type="text/javascript">
    $(document).ready(function(){

       $('#add_game_type').on('submit', function(e){

               e.preventDefault()

               let fd = new FormData(this)

                     $.ajax({

                        type       : 'POST',
                        url        : "<?= base_url('admin/add-game-type') ?>",
                        dataType   : 'json',
                        data       : fd,
                        processData: false,
                        contentType: false,
                        success    : function(data) {

                               if(data.status)
                               {
                                 // $("html, body").animate({ scrollTop: 0 }, "slow");
                               $('.add-settings-alert').html('<i class="fa fa-check"></i> Successfully Added');
                               setTimeout(function () {
                              
                                window.location.reload()
                           }, 2000);
                               }
                               else
                               {
                                 alert(data.msg);
                               }
                               
                       },
                        error: function(jqXHR, exception) {
                         console.log('bye');
                         console.log(jqXHR.responseText);
                       }

                     });
             })


            $('.editGameType').on('click', function(e){

                e.preventDefault();

                let id = $(this).attr('data-id')
                let name = $(this).attr('data-name')
                let min = $(this).attr('data-minprice')
                let rate = $(this).attr('data-rate')

                $('#gameid').val(id)
                $('#gamename').val(name)
                $('#gamemin').val(min)
                $('#gamerate').val(rate)

                $('#editGameType').modal('show')

            })

            $('#edit_game_type').on('submit', function(e){

                    e.preventDefault()

                    let fd = new FormData(this)

                          $.ajax({

                             type       : 'POST',
                             url        : "<?= base_url('admin/edit-game-type') ?>",
                             dataType   : 'json',
                             data       : fd,
                             processData: false,
                             contentType: false,
                             success    : function(data) {

                                    if(data.status)
                                    {
                                      // $("html, body").animate({ scrollTop: 0 }, "slow");
                                    $('.add-settings-alert').html('<i class="fa fa-check"></i> Successfully Added');
                                    setTimeout(function () {
                                   
                                     window.location.reload()
                                }, 2000);
                                    }
                                    else
                                    {
                                      alert(data.msg);
                                    }
                                    
                            },
                             error: function(jqXHR, exception) {
                              console.log('bye');
                              console.log(jqXHR.responseText);
                            }

                          });
                  })


    })
  </script>
 



  </body>
</html>
