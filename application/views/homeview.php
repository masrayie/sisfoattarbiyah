
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-4">Jadwal Pelajaran Hari Ini</h5>
                  <table class="table table-striped" id="example" >
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>ID Jadwal</th>
                        <th>MataPelajaran</th>
                        <th>Kode Guru</th>
                        <th>Jenjang</th>
                        <th>Kelas</th>
                        <th>Hari</th>
                        <th>Jam Pelajaran</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        if(!$jadwal){
                            echo "<td colspan='9' align='center' >No Data Found</td>";
                        } else {
                          $no=0;
                          for ($i=0 ; $i < sizeof($jadwal) ;$i++) {
                            $no = $no + 1;
                        ?>
                          <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo $jadwal[$i]['id_jadwal']; ?></td>
                                  <td><?php echo $jadwal[$i]['mapel']; ?></td>
                                  <td><?php echo $jadwal[$i]['kode_guru']; ?></td>
                                  <td><?php echo $jadwal[$i]['jenjang']; ?></td>
                                  <td><?php echo $jadwal[$i]['kelas']; ?></td>
                                  <td><?php echo $jadwal[$i]['hari']; ?></td>
                                  <td><?php echo $jadwal[$i]['jam_pel']; ?></td>
                          </tr>
                        <?php }
                      } ?>
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
        <script src="<?php echo base_url("assets/node_modules/jquery/dist/jquery.min.js");?>"></script>
        <script src="<?php echo base_url("assets/vendor/Mdtpicker/mdtimepicker.js")?>"></script>
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script> -->
        <script src="<?php echo base_url("assets/vendor/Select2/dist/js/select2.min.js")?>"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/vendor/JTimePicker/dist/bootstrap-clockpickerr.min.js")?>"></script>
        <script type="text/javascript">

        </script>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
