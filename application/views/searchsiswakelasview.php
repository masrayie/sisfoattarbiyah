
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
 			     <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                      <div class="row">
                          <div class="col-md-10 stretch-card">
                            <h3 class="card-title"> Search Siswa Per Kelas </h3>
                          </div>
                      </div>
                        <div class="row" style="margin-bottom:-10px; margin-top:10px;" id="rowoperation">
                            <div class="col-md-2">
                                <div class="form-group" style="font-size:12px;">
                                  <label for="exampleInputName1" style="font-size:13px;">Jenjang Pendidikan</label>
                                      <select class="js-example-placeholder-single form-control form-control-sm select2-results__options" id="selectjenjangku" name="jenjang">
                                        <option value="-">--Pilih Jenjang--</option>
                                        <option value="0">Taman Kanak-Kanak</option>
                                        <option value="1">Madrasah Ibtidaiyah</option>
                                        <option value="2">Madrasah Tsanawiyah</option>
                                      </select>
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
                            <div class="col-sm-2">
                                <div class="form-group" style="padding-top:21px;">
                                  <button type="button" class="btn btn-primary btn-xs" onclick="getSiswa()">Show</button>
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
          <script src="<?php echo base_url("assets/vendor/Select2/dist/js/select2.min.js")?>"></script>
        <script type="text/javascript">
          function getSiswa(){
            var jenjang, kelas, mapel
            jenjang     = document.getElementById("selectjenjangku").value;
            kelas       = document.getElementById("selectdftkelas").value;
            window.location="<?php echo base_url().'index.php/JadwalSeluruh/viewSiswaKelas?jenjang=';?>"+jenjang+"&kelas="+kelas;
          }

          function dataMapel(idkelas){
            $.ajax({
              type: 'post',
              url : "<?php echo base_url().'index.php/JadwalSeluruh/readDataMapel/';?>"+idkelas,
              data : '',
              dataType : 'JSON',
              success : function(data){
                $("#selectdfmapel").html('<option></option>');
                $("#selectdfmapel").select2({placeholder:'Daftar Matapelajaran', data:data});
              },
              error : function(data){
                  $("#selectdfmapel").select2({placeholder:'Daftar Matapelajaran'}, 'val', '');
                  $("#selectdfmapel").html('<option></option>');
              }
            });
          }

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

          $(window).bind('beforeunload', function(){
            localStorage.removeItem("jumlahkelas");
          });

          //Hidden rowmi, rowmts, rowjumkelas, rowbtnsubmit
          document.getElementById("rowdftkelas").style.display="none";


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
                $("#btngo").prop("disabled",true);
              }
          });

          $("#selectdftkelas").on('change', function(e){
                dataMapel($(this).val());
          });


        </script>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
