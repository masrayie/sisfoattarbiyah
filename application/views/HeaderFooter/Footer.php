</div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="<?php echo base_url("assets/node_modules/jquery/dist/jquery.min.js");?>"></script>
  <script src="<?php echo base_url("assets/node_modules/popper.js/dist/umd/popper.min.js");?>"></script>
  <script src="<?php echo base_url("assets/node_modules/bootstrap/dist/js/bootstrap.min.js");?>"></script>
  <script src="<?php echo base_url("assets/vendor/Select2/dist/js/select2.min.js")?>"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="<?php echo base_url("assets/node_modules/chart.js/dist/Chart.min.js");?>"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?php echo base_url("assets/js/off-canvas.js");?>"></script>
  <script src="<?php echo base_url("assets/js/misc.js")?>"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo base_url("assets/js/dashboard.js");?>"></script>
  <script src="<?php echo base_url("assets/js/maps.js");?>"></script>
  <script type="text/javascript">

      $("#selectjenjang").select2({
        placeholder: "Pilih Jenjang Pendidikan",
        allowClear : true,
      });
      $("#selectmapel").select2({
        placeholder: "Pilih Mata Pelajaran",
        allowClear : true,
      });
      $("#selectkelas").select2({
        placeholder: "Pilih Kelas",
        allowClear : true,
      });
      $("#selecthari").select2({
        placeholder: "Pilih Hari",
        allowClear : true,
      });
      $("#selectjenjang").on("change", function(e){
        $("#selectmapel").removeAttr("disabled");
      });
      $("#selectmapel").on("change", function(e){
        $("#selectkelas").removeAttr("disabled");
      });

  </script>
  <!-- End custom js for this page-->
</body>

</html>
