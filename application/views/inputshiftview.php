
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
                      <div class="col-sm-2 stretch-card" style="text-align: right;">
                          <button class="btn btn-primary btn-sm mr-6" onclick="openRow()" id="btnopen"><i class="mdi mdi-plus-box-outline"></i> New</button>
                          <button class="btn btn-danger btn-sm" onclick="closeRow()" id="btnclose"> Close X </button>
                      </div>
                  </div>
                  <div id="rowinput" style="padding-left:30px; margin-top:15px;">
                    <div class="col-md-10 stretch-card">
                      <form class="forms-sample" method="POST">
                        <div class="form-group">
                          <label for="exampleInputName1">ID Shift</label>
                          <input type="text" class="form-control" name="id_jadwal" placeholder="ID Jadwal">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword4">Jam Mulai & Jam Selesai</label>
                          <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="jam_mulai" placeholder="Jam Mulai">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="jam_selesai" placeholder="Jam Selesai">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword4">Keterangan</label>
                          <input type="text" class="form-control" name="kelas" placeholder="Keterangan">
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-success mr-2">Submit</button>
                        </div>
                      </form>
                    </div>
                  </div>
              <form class="form-control" style="border:0px;">
                <div class="row" style="margin-top:-25px;">
                  <div class="col-lg-10 ">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Daftar Shift Pembelajaran</h4>
                        <p class="card-description">
                          Shift-shift waktu pembelajaran
                        </p>
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>User</th>
                              <th>Product</th>
                              <th>Sale</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Jacob</td>
                              <td>Photoshop</td>
                              <td class="text-danger"> 28.76% <i class="mdi mdi-arrow-down"></i></td>
                              <td><label class="badge badge-danger">Pending</label></td>
                            </tr>
                            <tr>
                              <td>Messsy</td>
                              <td>Flash</td>
                              <td class="text-danger"> 21.06% <i class="mdi mdi-arrow-down"></i></td>
                              <td><label class="badge badge-warning">In progress</label></td>
                            </tr>
                            <tr>
                              <td>John</td>
                              <td>Premier</td>
                              <td class="text-danger"> 35.00% <i class="mdi mdi-arrow-down"></i></td>
                              <td><label class="badge badge-info">Fixed</label></td>
                            </tr>
                            <tr>
                              <td>Peter</td>
                              <td>After effects</td>
                              <td class="text-success"> 82.00% <i class="mdi mdi-arrow-up"></i></td>
                              <td><label class="badge badge-success">Completed</label></td>
                            </tr>
                            <tr>
                              <td>Dave</td>
                              <td>53275535</td>
                              <td class="text-success"> 98.05% <i class="mdi mdi-arrow-up"></i></td>
                              <td><label class="badge badge-warning">In progress</label></td>
                            </tr>
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

        <script type="text/javascript">
          document.getElementById("rowinput").style.display = "none";
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
