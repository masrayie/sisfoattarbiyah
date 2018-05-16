
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12  stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                      <div class="col-md-10  stretch-card">
                        <h3 class="card-title">Set Jadwal Siswa</h3>
                      </div>
                      <div class="col-md-2 grid-margin stretch-card" style="text-align: right;">
                          <a href="<?php echo base_url('index.php/JadwalSeluruh/searchsiswakelas'); ?>" style="color:#ffa632;"> <h4 class="card-title">Siswa Per Kelas <i class="mdi mdi-arrow-right-bold"></i></h4></a>
                      </div>
                  </div>
                <div class="row" id="tabeldata">
                  <div class="col-lg-12 ">
                    <div class="card">
                      <div class="card-body" style="font-size:13px;">
                        <p class="card-description">
                          Daftar Siswa
                        </p>
                        <table class="table table-striped" id="example" >
                          <thead>
                            <tr>
                              <th>NIS</th>
                              <th>Nama Siswa</th>
                              <th>Jenjang</th>
                              <th>Tingkat</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row" style="margin-top:10px; padding-left:10px;" id="rowoperation2">
                  <div class="col-md-2" id="rowjenjang">
                      <div class="form-group" style="font-size:12px;">
                        <label for="exampleInputName1" style="font-size:13px;">Jenjang Pendidikan</label>
                          <div class="form-group">
                            <select class="js-example-placeholder-single form-control form-control-sm select2-results__options" id="selectjenjangku" name="jenjang">
                              <option value="-">--Pilih Jenjang--</option>
                              <option value="0">Taman Kanak-Kanak</option>
                              <option value="1">Madrasah Ibtidaiyah</option>
                              <option value="2">Madrasah Tsanawiyah</option>
                            </select>
                          </div>
                      </div>
                  </div>
                    <div class="col-md-2" id="rowdftkelas" style="flex:0 0 10.5%;">
                        <div class="form-group" style="font-size:12px;">
                          <label for="exampleInputName1" style="font-size:13px;">Daftar Kelas</label>
                              <select class="js-example-placeholder-single form-control form-control-sm select2-results__options" id="selectdftkelas" name="kelas" >
                                <option></option>
                              </select>
                        </div>
                    </div>
                    <div class="col-md-2" id="rowjumlahanak">
                        <div class="form-group" style="font-size:12px;">
                          <label for="exampleInputName1" style="font-size:13px;">Jumlah Anak</label>
                            <div class="form-group">
                              <input type="number" min="1" class="form-control form-control-sm" name="jumlahanak" id="jumlahanak" placeholder="Jumlah Anak" style="padding:6px 5px; border: 1px solid #aaa;" />
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group" style="padding-top:21px;">
                          <button type="button" id="btngo" class="btn btn-success btn-sm" onclick="setSiswa()" disabled>Set</button>
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
        <script src="<?php echo base_url("assets/node_modules/jquery/dist/jquery.min.js");?>"></script>
        <script src="<?php echo base_url("assets/vendor/Mdtpicker/mdtimepicker.js")?>"></script>
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script> -->
        <script src="<?php echo base_url("assets/vendor/Select2/dist/js/select2.min.js")?>"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/vendor/JTimePicker/dist/bootstrap-clockpickerr.min.js")?>"></script>

        <script type="text/javascript">
        document.getElementById("rowdftkelas").style.display="none";
        document.getElementById("rowjumlahanak").style.display="none";

        $("#selectopsi").on("change", function(){
            var opsi = $(this).val();
            if(opsi == 0){
              $("#rowhari").show();
              $("#rowjenjang").show();
            } else if(opsi == 1){
              $("#rowjenjang").show();
              $("#selectjenjangku").removeAttr("disabled");
              $("#rowhari").hide();
            } else {
              document.getElementById("rowjenjang").style.display="none";
              document.getElementById("rowdftkelas").style.display="none";
              document.getElementById("rowbtnsubmit").style.display="none";
            }
        });

        $("#selecthari").on("change", function(){
          $("#selectjenjangku").removeAttr("disabled");
        });
        $("#example").DataTable({
          "ajax"    : "<?php echo base_url();?>"+"index.php/jadwalsiswa/jsonSiswaBy",
          "columns" : [
            {"data":"nis", "className" : "dt-center"},
            {"data":"nama_siswa", "className" : "dt-center"},
            {"data":"jenjang", "className" : "dt-center"},
            {"data":"tingkat", "className" : "dt-center"}
          ]
        });

        function dataKelas(idjenjang){
          $.ajax({
            type: 'post',
            url : "<?php echo base_url().'index.php/JadwalSeluruh/readDataKelas/';?>"+idjenjang,
            data : '',
            dataType : 'JSON',
            success : function(data){
              $("#selectdftkelas").html('<option></option>');
              $("#selectdftkelas").select2({placeholder:'Daftar Kelas', data:data});
            },
            error : function(data){
                $("#selectdftkelas").select2({placeholder:'Daftar Kelas'}, 'val', '');
                $("#selectdftkelas").html('<option></option>');

            }
          });
        }

        $("#selectjenjangku").on("change", function(){
            if($(this).val()==0){
              $("#rowdftkelas").show();
              $("#rowjumlahanak").show();
              dataKelas($(this).val());
              $("#btngo").removeAttr("disabled");
            }else if($(this).val()==1){
              $("#rowdftkelas").show();
              $("#rowjumlahanak").show();
              dataKelas($(this).val());
              $("#btngo").removeAttr("disabled");
            }else if($(this).val()==2){
              $("#rowjumlahanak").show();
              $("#rowdftkelas").show();
              dataKelas($(this).val());
              $("#btngo").removeAttr("disabled");
            }else{
              $("#rowdftkelas").hide();
              $("#rowjumlahanak").hide();
              $("#btngo").prop("disabled",true);
            }
        });


          function setSiswa(){
            var  jenjang, kelas, jumlah
            jenjang = document.getElementById("selectjenjangku").value;
            kelas = document.getElementById("selectdftkelas").value;
            jumlah = document.getElementById("jumlahanak").value;
            window.location="<?php echo base_url()?>"+"index.php/jadwalsiswa/getRandomSiswa?jenjang="+jenjang+"&kelas="+kelas+"&jumlah="+jumlah;
            // $.ajax({
            //   method:'POST',
            //   contentType :'application/json',
            //   url : "<?php echo base_url().'index.php/JadwalSeluruh/getDataJadwal';?>",
            //   data : JSON.stringify(komponen),
            //   success: function(resp){
            //     window.location="<?php echo base_url().'index.php/JadwalSeluruh/viewEditOpsional';?>";
            //     // console.log(resp);
            //   },
            //   error: function(resp){
            //     console.log('gagal parsing');
            //   }
            // });
          }
        </script>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
