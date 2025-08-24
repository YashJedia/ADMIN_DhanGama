    <!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url() ?>assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url() ?>assets/dist/js/pages/dashboard2.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      // "responsive": true,
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){

      setTimeout(function(){

          $("#hideMsg").fadeOut('slow'); 

      }, 2500)
  })
</script>
<!-- P Starts -->
<script type="text/javascript">

  const search = document.querySelector('.liveSearch input');
  const searchList = document.querySelector('.liveSearchResult');
  const addWalletAmount = document.querySelector('#addWalletForm');
  

  const searchInUser = serVal => {
    
    if(serVal != ''){
        $.ajax({
                url: "<?= base_url() ?>admin/search-user-detail/"+serVal,
                type: "POST",
                dataType:"json",
                data: {
                  name: serVal,
                },
                success: function(dataResult){
                  if(dataResult != ''){
                  // console.log(dataResult);  
                    $('.liveSearchResult').slideDown('slow');
                    $('.liveSearchResult').css('list-style-type','none');
                    $('.liveSearchResult').css('cursor','pointer');
                      var html = ``;
                      $.map(dataResult, function( val, i ) {
                        html += `<li class="list-group-item" id="${val.user_id}" onMouseOver="this.style.background='#eee'"
        onMouseOut="this.style.background='white'" style="padding-top: 5px;padding-bottom: 5px;border-bottom:0px;border-top:0px;user-select: none;" >${val.user_mobile}</li>`;
                      });
                      $('.liveSearchResult').html(html);
                      
                  } else {
                    $('.liveSearchResult').css('display','none');
                  }
                  
                }
              });
      } else {
        $('.liveSearchResult').css('display','none');
      }
  };

  const addWalletAmountUpdation = (credit_amount,user_id) => {
      if(credit_amount != ''){
        $.ajax({
                url: "<?= base_url() ?>admin/add-wallet-amount",
                type: "POST",
                dataType:"json",
                data: {
                  credit_amount: credit_amount,
                  user_id: user_id,
                },
                success: function(dataResult){
                  if(dataResult != ''){
                    setTimeout(() =>{
                      $('#walletModel').modal('hide');
                    },2000);
                    
                    $('#addMoney').css('color','green');
                    $('#addMoney').html('Successfully added money.');
                    location.reload();
                  } else {

                    $('#addMoney').css('color','red');
                    $('#addMoney').html('No changes made.');
                    setTimeout(() =>{
                      $('#walletModel').modal('hide');
                    },2000);
                    location.reload();
                  }
                }
              });
      } else {
          $('#addMoney').css('color','red');
          $('#addMoney').html('No changes made.');
      }
 
  };

  search.addEventListener('keyup', e => {
    e.preventDefault();
    const serVal = search.value.trim();
    searchInUser(serVal);
  });

  searchList.addEventListener('click', e => {
    e.preventDefault();
    if(e.target.id != ''){
    window.location.href = "<?= base_url() ?>admin-user_detail/"+e.target.id;
    } else {
    window.location.reload();
    }
  });

  addWalletAmount.addEventListener('submit', e => {
    e.preventDefault();
    addWalletAmountUpdation(addWalletAmount.credit_amount.value,addWalletAmount.user_id.value);
  });

  
</script>
<!-- P Ends -->

