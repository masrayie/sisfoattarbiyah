
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12  stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                      <div class="col-md-10  stretch-card">

                        <h3 class="card-title">Tabel Jadwal Keseluruhan</h3>
                      </div>
                  </div>
              <form class="form-control" style="border:0px;" method="post">
                <div class="row" style="margin-top:-25px;">
                  <div class="col-lg-12 ">
                    <div class="card">
                      <div class="card-body">
                        <p class="card-description">
                          Jadwal Pembelajaran Keseluruhan
                        </p>
                        <table class="table table-striped" id="example">
                          <thead>
                            <tr>
                              <th>ID Jadwal</th>
                              <th>MataPelajaran</th>
                              <th>Kode Guru</th>
                              <th>Jenjang</th>
                              <th>Kelas</th>
                              <th>Hari</th>
                              <th>Jam Pelajaran</th>
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
              </form>
                <!-- <h4><a href="<?php echo base_url('index.php/JadwalSeluruh/jsonDataJadwal'); ?>" style="margin-right:10px; "><i class="mdi mdi-arrow-left-bold-circle-outline">Back</i></a></h4> -->
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
        <script src="<?php echo base_url("assets/node_modules/jquery/dist/jquery.min.js");?>"></script>
        <script src="<?php echo base_url("assets/vendor/Mdtpicker/mdtimepicker.js")?>"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/vendor/JTimePicker/dist/bootstrap-clockpickerr.min.js")?>"></script>

        <script type="text/javascript">
          $("#example").DataTable({
            "ajax"    : "<?php echo base_url().'index.php/JadwalSeluruh/jsonDataJadwal';?>",
            "columns" : [
              {"data":"id_jadwal", "className" : "dt-center"},
              {"data":"mapel", "className" : "dt-center"},
              {"data":"kode_guru", "className" : "dt-center"},
              {"data":"jenjang", "className" : "dt-center"},
              {"data":"kelas", "className" : "dt-center"},
              {"data":"hari", "className" : "dt-center"},
              {"data":"jam_pel", "className" : "dt-center"},
              {"data":"buton", "className" : "dt-center"}
            ]
          });
          function editData(val){
            alert("edit "+val);
          }
          function deletetData(val){
            alert("delete "+val);
          }
        </script>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
