
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-10  stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                      <div class="col-md-10  stretch-card">

                        <h3 class="card-title">Set up Shift Pembelajaran</h3>
                      </div>
                      <div class="col-sm-2 stretch-card" style="text-align: right;" hidden>
                          <button class="btn btn-primary btn-sm mr-6" onclick="openRow()" id="btnopen"><i class="mdi mdi-plus-box-outline"></i> New</button>
                          <button class="btn btn-danger btn-sm" onclick="closeRow()" id="btnclose"> Close X </button>
                      </div>
                  </div>
                  <div id="rowinput" style="padding-left:30px; margin-top:15px;">
                    <div class="col-md-10 stretch-card">
                      <form class="forms-sample" method="POST" action="<?php echo base_url().'index.php/JadwalSeluruh/updateShift/'.$objShift->getIdShift(); ?>">
                        <div class="form-group">
                          <label for="exampleInputName1">ID Shift</label>
                          <input type="text" class="form-control" name="id_shift" placeholder="ID Jadwal" value="<?php echo $objShift->getIdShift(); ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword4">Jam Mulai & Jam Selesai</label>
                          <div class="row">
                            <div class="col-md-6">
                                <div class="input-group clockpicker">
                                  <input type="text" class="form-control" name="jam_mulai" placeholder="Jam Mulai" value="<?php echo $objShift->getJamMulai(); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group clockpicker">
                                  <input type="text" class="form-control" name="jam_selesai" placeholder="Jam Selesai" value="<?php echo $objShift->getJamSelesai();?>">
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword4">Keterangan</label>
                          <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" value="<?php echo $objShift->getKeterangan(); ?>">
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-success mr-2">Save</button>
                          <a href="<?php echo base_url('index.php/JadwalSeluruh/viewSettingShift');?>" class="btn btn-danger mr-2">Cancel</a>
                        </div>
                      </form>
                    </div>
                  </div>
              <form class="form-control" style="border:0px;" method="post">
                <div class="row" style="margin-top:-25px;">
                  <div class="col-lg-10 ">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Daftar Shift Pembelajaran</h4>
                        <p class="card-description">
                          Shift-shift waktu pembelajaran
                        </p>
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>ID Shift</th>
                              <th>Jam Mulai</th>
                              <th>Jam Selesai</th>
                              <th>Keterangan</th>
                              <th>Operation</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $no=0;
                              foreach ($dataShift as $as) {
                              $no = $no + 1;
                              ?>
                                <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $as->id_shift; ?></td>
                                        <td><?php echo $as->jam_mulai; ?></td>
                                        <td><?php echo $as->jam_berakhir; ?></td>
                                        <td><?php echo $as->keterangan; ?></td>
                                        <td>
                                          <a href="<?php echo base_url('index.php/JadwalSeluruh/viewEditShift/'.$as->id_shift); ?>" class="badge badge-warning mr-2">UBAH</a>
                                          <a href="<?php echo base_url('index.php/JadwalSeluruh/deleteShift/'.$as->id_shift); ?>" class="badge badge-danger mr-2">HAPUS</a>
                                        </td>
                                </tr>
                              <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
                <h4><a href="<?php echo base_url('index.php/JadwalSeluruh/viewTabelJadwalAll'); ?>" style="margin-right:10px; "><i class="mdi mdi-arrow-left-bold-circle-outline">Back</i></a></h4>
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
        <script type="text/javascript" src="<?php echo base_url("assets/vendor/JTimePicker/dist/bootstrap-clockpickerr.min.js")?>"></script>

        <script type="text/javascript">
          $('.clockpicker').clockpicker();
          document.getElementById("btnclose").style.display = "none";
          function openRow(){
            $("#rowinput").show();
            $("#btnopen").hide();
            $("#btnclose").show();
          }
          function closeRow(){
            $("#rowinput").hide();
            $("#btnopen").show();
            $("#btnclose").hide();
          }

        </script>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
