
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">


          <div class="row">
            <div class="col-md-10 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                      <div class="col-md-10 grid-margin stretch-card">
                        <h3 class="card-title">Form Input Data Guru</h3>
                      </div>
                      <div class="col-lg-2 grid-margin stretch-card" style="text-align: right;">
                          <a href="" style="color:#ffa632;"> <h7 class="card-title">Upload File</h7></a>
                      </div>
                  </div>
                  <form class="forms-sample" method="POST" action="<?php echo base_url().'index.php/guru/inputdataguru' ?>">
                    <div class="form-group">
                      <label for="exampleInputName1">Nomor Induk Pegawai</label>
                      <input type="text" pattern="[a-zA-Z0-9]{10}" class="form-control" name="nip" placeholder="Nomor Induk Pegawai">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Nama Lengkap Guru</label>
                      <input type="text" pattern="[a-zA-Z\s]{1,}" class="form-control" name="nama_guru" placeholder="Nama Lengkap Guru">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Kode Guru</label>
                      <input type="text" pattern="[a-zA-Z]{3}"class="form-control" name="kode_guru" placeholder="Kode Guru">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Alamat</label>
                      <input type="text" pattern="{1,}" class="form-control" name="alamat" placeholder="Alamat">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Email</label>
                      <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Password</label>
                      <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label>Foto Diri</label>
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Unggah Foto">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info" type="browse">Upload</button>
                        </span>
                      </div>
                    </div>
                    <div class="panel-footer">
                      <button type="submit" class="btn btn-success mr-2">Submit</button>
                    </div>
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
