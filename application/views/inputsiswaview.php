
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">


          <div class="row">
            <div class="col-md-10 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                      <div class="col-md-10 grid-margin stretch-card">
                        <h3 class="card-title">Form Input Siswa</h3>
                      </div>
                      <div class="col-md-2 grid-margin stretch-card" style="text-align: right;">
                          <a href="" style="color:#ffa632;"> <h7 class="card-title">Upload File</h7></a>
                      </div>
                  </div>
                  <form class="forms-sample" method="POST" action="<?php echo base_url().'index.php/siswa/inputdatasiswa' ?>" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Nomor Induk Siswa</label>
                      <input type="text" pattern="[a-zA-Z0-9]{10}" maxlength="10" class="form-control" name="nis" placeholder="Nomor Induk Siswa [10 Karakter]">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Nama Lengkap Siswa</label>
                      <input type="text" pattern="[a-zA-Z\s]{1,}" class="form-control" name="nama_siswa" placeholder="Nama Lengkap Siswa">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Tanggal Lahir</label>
                      <input type="date" class="form-control" name="tgl_lahir" placeholder="Tanggal Lahir">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Alamat</label>
                      <input type="text" pattern="{1,}" class="form-control" name="alamat" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Nama Orang Tua</label>
                      <input type="text" pattern="[a-zA-Z\s]{1,}" class="form-control" name="nama_orangtua" placeholder="Nama Orang Tua">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Jenjang Pendidikan</label>
                      <select class="form-control form-control-sm" name="jenjang" id="jenjang" onchange="return dochange()">
                        <option value="0" selected="selected">Pilih Jenjang Pendidikan</option>
                        <option value="1">Taman Kanak-Kanak</option>
                        <option value="2">Madrasah Ibtida'iyah</option>
                        <option value="3">Madrasah Tsanawiyah</option>
                      </select>
                    </div>
                    <div class="form-group" style="display:none" id="idjenjang2">
                      <label for="exampleInputPassword4">Tingkat Pendidikan</label>
                      <select class="form-control form-control-sm" name="tingkat">
                        <option value="0" selected="selected">Pilih Tingkat Pendidikan</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                      </select>
                    </div>
                    <div class="form-group" style="display:none" id="idjenjang3">
                      <label for="exampleInputPassword4">Tingkat Pendidikan</label>
                      <select class="form-control form-control-sm" name="tingkat">
                        <option value="0" selected="selected">Pilih Tingkat Pendidikan</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Foto Siswa</label>
                      <?php if ($error = $this->session->flashdata('upload_failed')):?>
                        <div class="row" >
                          <div class="col-lg-4">
                            <div class="alert alert-dismissible alert-danger" align="center">
                              <?= $error ?>
                            </div>
                          </div>
                        </div>
                      <?php endif ?>
                      <div class="input-group col-xs-12">
                        <input class="btn" type="file" name="filefoto" size="20" accept=".jpg"/>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <!-- <button class="btn btn-light">Cancel</button> -->
                  </form>
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

      <script>
      function dochange()
      {
        $('#idjenjang2').hide();
        $('#idjenjang3').hide();

        var jenjang = $( "#jenjang option:selected" ).val();
        $('#idjenjang'+jenjang).show();
      }
      </script>
