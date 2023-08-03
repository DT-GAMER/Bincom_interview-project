    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url()."dists/"; ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url()."dists/"; ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url()."dists/"; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url()."dists/"; ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url()."dists/"; ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url()."dists/"; ?>plugins/jqvmap/jquery.vmap.min.js"></script>

<script src="<?php echo base_url()."dists/"; ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url()."dists/"; ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url()."dists/"; ?>plugins/moment/moment.min.js"></script>

<script src="<?php echo base_url()."dists/"; ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url()."dists/"; ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url()."dists/"; ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url()."dists/"; ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()."dists/"; ?>dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()."dists/"; ?>dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url()."dists/"; ?>dist/js/pages/dashboard.js"></script>

<script type="text/javascript" src="<?php echo base_url()."dists/"; ?>datatablesplugins/jquery-3.5.1.js"></script>

<script type="text/javascript" src="<?php echo base_url()."dists/"; ?>datatablesplugins/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="<?php echo base_url()."dists/"; ?>datatablesplugins/dataTables.bootstrap4.min.js"></script>

<script>
  function filterColumn ( i ) {
    $('#myDatatable').DataTable().column( i ).search(
        $('#col'+i+'_filter').val(),
        $('#col'+i+'_regex').prop('checked'),
        $('#col'+i+'_smart').prop('checked')
    ).draw();
  }

  $(document).ready( function () {
    $('#myDatatable').DataTable({
      // "paging": false,
      "lengthMenu": [[50, -1], [50, "All"]],
      "autoWidth": true,
      "footerCallback": function ( row, data, start, end, display ) {
        var api = this.api();
        nb_cols = api.columns().nodes().length;
        var j = 3;
        while(j < nb_cols){
          var pageTotal = api
                .column( j, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return Number(a) + Number(b);
                }, 0 );
          // Update footer
          $( api.column( j ).footer() ).html(pageTotal);
          j++;
        } 
      }
    });

    $('select.column_filter').on('click', function () {
      filterColumn( $(this).parents('tr').attr('data-column') );
    } );
  } );
</script>

<script>
  $(document).ready(function(){
    $('#statesnames').change(function(){
      var state_id = $('#statesnames').val();
      if(state_id != ''){
        $.ajax({
          url:"<?php echo base_url('welcome/fetchlgas_function');?>",
          method:"POST",
          data:{state_id:state_id},
          success:function(data){
            $('#lganames').html(data);
          }
        })
      }
    });

    $('#lganames').change(function(){
      var lga_id = $('#lganames').val();
      if(lga_id != ''){
        $.ajax({
          url:"<?php echo base_url('welcome/fetchwards_function');?>",
          method:"POST",
          data:{lga_id:lga_id},
          success:function(data){
            $('#wardsnames').html(data);
          }
        })
      }
    });

  });
</script>


</body>
</html>
