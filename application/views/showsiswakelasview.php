
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">


          <div class="row">
            <div class="col-md-10  stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                      <div class="col-md-10  stretch-card">

                        <h3 class="card-title">Data Siswa Kelas <?php echo !$siswa ? '' : $siswa[0]->kelas;?> </h3>
                      </div>
                  </div>

              <form class="form-control" style="border:0px;" method="post" action="<?php echo base_url().'index.php/Nilai/updateNilai'; ?>">
                <div class="row" style="margin-top:-25px;">
                  <div class="col-lg-10 ">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title"> <?php echo !$siswa ? '' : 'Siswa Kelas '.$siswa[0]->kelas;?></h4>
                        <p class="card-description">

                        </p>
                        <table class="table table-striped" >
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>NIS</th>
                              <th>Nama Siswa</th>
                              <th>Jenjang</th>
                              <th>Kelas</th>
                              <th>Alamat</th>
                            </tr>
                          </thead>
                          <tbody >
                            <?php

                              if(!$siswa){
                                  echo "<td colspan='9' align='center' >No Data Found</td>";
                              } else {
                                $no=0;
                                foreach ($siswa as $as) {
                                  $no = $no + 1;

                              ?>
                                <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><input type="text" name="id[]" value="<?php echo $as->id; ?>" hidden/><?php echo $as->nis; ?></td>
                                        <td><?php echo $as->nama; ?></td>
                                        <td><?php echo $as->kode; ?></td>
                                        <td><?php echo $as->jenjang; ?></td>
                                        <td><?php echo $as->alamat; ?></td>
                                </tr>
                              <?php }
                            } ?>
                          </tbody>
                        </table>
                      </div>
                      <div class="row">
                        <div class="col-lg-12" align="right">
                          <div class="form-group">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
                <h4><a href="<?php echo base_url('index.php/JadwalSeluruh/searchsiswakelas'); ?>" style="margin-right:10px; "><i class="mdi mdi-arrow-left-bold-circle-outline">Kembali</i></a></h4>
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
