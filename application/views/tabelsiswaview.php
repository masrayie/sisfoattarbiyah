
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

			<div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body" style="font-size:13px;">
                  <h4 class="card-title">Data Siswa</h4>
                  <p class="card-description">
                    Data Siswa Al-Islamiyah Attarbiyah
                  </p>
                  <table class="table table-striped" id="example" >
                    <thead>
                      <tr>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Tgl Lahir</th>
                        <th>Nama Wali</th>
                        <th>Alamat</th>
                        <th>Jenjang</th>
                        <th>Tingkat</th>
                        <th>Operation</th>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018 <a href="http://www.bootstrapdash.com/" target="_blank">Template by Bootstrapdash, </a> <a href="https://www.linkedin.com/in/rayiemas-manggala-putra-a0a0b5152" target="_blank"> Layouting by Masrayiemas</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
      <script src="<?php echo base_url("assets/node_modules/jquery/dist/jquery.min.js");?>"></script>
      <script src="<?php echo base_url("assets/vendor/Mdtpicker/mdtimepicker.js")?>"></script>
      <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script> -->
      <script src="<?php echo base_url("assets/vendor/Select2/dist/js/select2.min.js")?>"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url("assets/vendor/JTimePicker/dist/bootstrap-clockpickerr.min.js")?>"></script>
      <script>
      function doconfirm()
      {
          job=confirm("Are you sure to delete permanently?");
          if(job!=true)
          {
              return false;
          }
      }
      $("#example").DataTable({
        "ajax"    : "<?php echo base_url().'index.php/Siswa/jsonDataSiswa';?>",
        "columns" : [
          {"data":"nis", "className" : "dt-center"},
          {"data":"nama_siswa", "className" : "dt-center"},
          {"data":"nama_wali", "className" : "dt-center"},
          {"data":"tgl_lahir", "className" : "dt-center"},
          {"data":"alamat", "className" : "dt-center"},
          {"data":"jenjang", "className" : "dt-center"},
          {"data":"tingkat", "className" : "dt-center"},
          {"data":"buton", "className" : "dt-center"}
        ]
      });
      function editData(val){
        window.location="<?php echo base_url().'index.php/Siswa/viewEditSiswa/';?>"+val;
      }
      function deleteData(val){
        job=confirm("Are you sure to delete permanently?");
        if(job!=true)
        {
            return false;
        } else {
            window.location="<?php echo base_url().'index.php/Siswa/deleteDataSiswa/';?>"+val;
        }
      }
      </script>
