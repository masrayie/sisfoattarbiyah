
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

			<div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Mata Pelajaran</h4>
                  <p class="card-description">
                    Data Mata Pelajaran Al-Islamiyah Attarbiyah
                  </p>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>
                          Kode Mata Pelajaran
                        </th>
                        <th>
                          Nama Mata Pelajaran
                        </th>
                        <th>Operation</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no=0;
                        foreach ($mapelArr as $as) {
                        $no = $no + 1;
                        ?>
                          <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $as->getKodeMapel(); ?></td>
                            <td><?php echo $as->getNamaMapel(); ?></td>
                            <td>
                              <a href="" class="btn btn-warning mr-2">UBAH</a>
                              <a href="<?php echo base_url('index.php/MataPelajaran/deleteDataMapel/'.$as->getKodeMapel()); ?>" class="btn btn-danger mr-2">HAPUS</a>
                            </td>
                            <td>
                        <!-- <?php
                              if($as->status==0){
                              echo "<label class='label label-danger' style='font-size: 10px;'>BELUM KEMBALI </label>";
                              } elseif ($as->status==1) {
                              echo "<label class='label label-success'style='font-size: 10px;' >SUDAH KEMBALI </label>";
                              }
                              ?>   -->
                            </td>
                          </tr>
                        <?php } ?>
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
