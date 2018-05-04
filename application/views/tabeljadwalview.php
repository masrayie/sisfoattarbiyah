
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

			<div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                        <h3 class="card-title">Input Jadwal Pelajaran</h3>
                        <p class="card-description">
                          Input Jadwal Attarbiyah Al-Islamiyah
                        </p>
                        <div class="row">
                          <form class="form-control" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="display:flex; border:0px;">
                            <div class="col-md-1">
                                <div class="form-group" style="font-size:12px;">
                                      <select class="js-example-placeholder-single form-control form-control-sm select2-results__options" id="selecthari" name="hari">
                                          <option></option>
                                          <option value="Senin">SENIN</option>
                                          <option value="Selasa">SELASA</option>
                                          <option value="Rabu">RABU</option>
                                          <option value="Kamis">KAMIS</option>
              														<option value="Jumat">JUMAT</option>
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group" style="font-size:12px;">
                                      <select class="js-example-placeholder-single form-control form-control-sm select2-results__options" id="selectjenjang" name="jenjang" disabled>
                                        <option></option>
                                        <option value="0">Taman Kanak-Kanak</option>
                                        <option value="1">Madrasah Ibtidaiyah</option>
                                        <option value="2">Madrasah Tsanawiyah</option>
                                      </select>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                      <input type="number" min="1" class="form-control form-control-sm" name="jumlah_kelas" id="jumlahkelas" placeholder="Jumlah Kelas" style="padding:6px 5px; border: 1px solid #aaa;" disabled/>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                      <a href="" class="btn btn-primary btn-xs">Go !</a>
                                </div>
                            </div>
                          </form>
                        </div>
                  <div class="row">
                    <form class="form-control" style="border:0px;">
                    <div class="col-lg-10 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">Jadwal Kelas Hari </h4>
                          <?php
                          if(isset($_POST['submit']))

  {

    $name = $_POST['hari'];

    echo "User Has submitted the form and entered this name : <b> $name </b>";

    echo "<br>You can use the following form again to enter a new name.";

  } else{
    echo "jancok";
  }

                           ?>
                          <p class="card-description">
                            Add class <code>.table-hover</code>
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
                    <div class="col-lg-10 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">Hoverable Table</h4>
                          <p class="card-description">
                            Add class <code>.table-hover</code>
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
                  </form>
                  </div>
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
