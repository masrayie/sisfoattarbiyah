
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

			<div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                      <div class="row">
                          <div class="col-md-10 stretch-card">
                            <h3 class="card-title"> Input Jadwal Pelajaran</h3>
                          </div>
                          <div class="col-md-2 stretch-card">
                              <a class="btn  btn-outline-danger" href="<?php echo base_url('index.php/JadwalSeluruh/viewSettingShift'); ?>" style=" padding:15px 13px;"> <i class="mdi mdi-settings"></i><h7 class="card-title">Set Shift</h7></a>
                          </div>
                      </div>
                        <div class="row" style="margin-bottom:-10px; margin-top:10px;">
                            <div class="col-md-2">
                                <div class="form-group" style="font-size:12px;">
                                      <select class="js-example-placeholder-single form-control form-control-sm select2-results__options" id="selecthariku" name="hari">
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
                                      <select class="js-example-placeholder-single form-control form-control-sm select2-results__options" id="selectjenjangku" name="jenjang" disabled>
                                        <option></option>
                                        <option value="0">Taman Kanak-Kanak</option>
                                        <option value="1">Madrasah Ibtidaiyah</option>
                                        <option value="2">Madrasah Tsanawiyah</option>
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-2" id="rowmi" style="flex:0 0 10.5%;">
                                <div class="form-group" style="font-size:12px;">
                                      <select class="js-example-placeholder-single form-control form-control-sm select2-results__options" id="selecttingkatmi" name="tingkatmi" >
                                        <option></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-2" id="rowmts" style="flex:0 0 10.5%;">
                                <div class="form-group" style="font-size:12px;">
                                      <select class="js-example-placeholder-single form-control form-control-sm select2-results__options" id="selecttingkatmts" name="tingkatmts" >
                                        <option></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-1" id="rowjumkelas">
                                <div class="form-group">
                                      <input type="number" min="1" class="form-control form-control-sm" name="jumlah_kelas" id="jumlahkelas" placeholder="Jumlah Kelas" style="padding:6px 5px; border: 1px solid #aaa;" />
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                      <button type="button" class="btn btn-primary btn-xs" onclick="outputTabel()">Go !</button>
                                </div>
                            </div>
                          </form>
                        </div>
                  <form class="form-control" style="border:0px;">
                  <div class="row" id="tabeldata">

                  </div>
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
          <script src="<?php echo base_url("assets/node_modules/jquery/dist/jquery.min.js");?>"></script>
            <script src="<?php echo base_url("assets/vendor/Select2/dist/js/select2.min.js")?>"></script>
        <script type="text/javascript">
          document.getElementById("rowmi").style.display="none";
          document.getElementById("rowmts").style.display="none";
          document.getElementById("rowjumkelas").style.display="none";
          $("#selecthariku").select2({
            placeholder: "Pilih Hari",
            allowClear : true,
          });

          $("#selectjenjangku").select2({
            placeholder: "Pilih Hari",
            allowClear : true,
          });

          $("#selecthariku").on("change", function(){
              $("#selectjenjangku").removeAttr("disabled");
          });

          $("#selectjenjangku").on("change", function(){
              var jenjang
              jenjang = document.getElementById("selectjenjangku").value;
              if(jenjang == 0){
                $("#rowjumkelas").show();
              } else if(jenjang == 1){
                $("#rowmi").show();
                $("#rowmts").hide();
                $("#rowjumkelas").show();
              } else {
                $("#rowmts").show();
                $("#rowmi").hide();
                $("#rowjumkelas").show();
              }
          });

          var data = [
              {
                  id: 0,
                  text: 'enhancement'
              },
              {
                  id: 1,
                  text: 'bug'
              },
              {
                  id: 2,
                  text: 'duplicate'
              },
              {
                  id: 3,
                  text: 'invalid'
              },
              {
                  id: 4,
                  text: 'wontfix'
              }
          ];

          function outputTabel(){
            var hari, jenjang, jumlahkelas
            hari = document.getElementById("selecthariku").value;
            jenjang = document.getElementById("selectjenjangku").value;
            switch (jenjang) {
              case 0:
                  jenjang2 = "Taman Kanak-Kanak";
                break;
                case 1:
                    jenjang2 = "Madrasah Ibtidaiyah";
                  break;
                  case 2:
                      jenjang2 = ">Madrasah Tsanawiyah";
                    break;
              default:
            }

            jumlahkelas = document.getElementById("jumlahkelas").value;
            for (var i = 0; i < jumlahkelas; i++) {
                $("#tabeldata").append("<div class='col-lg-12 stretch-card'> <div class='card'> <div class='card-body'> <h4 class='card-title'>Jadwal Kelas Hari </h4> <table class='table table-bordered'> <thead> <tr style='vertical-align:top;'> <th width='10%'>ID Jadwal</th> <th width='20%'>Matapelajaran</th> <th width='15%>Kode Guru</th> <th width='10%'>Shift</th> <th width='5%'>Jam Mulai</th> <th width='5%'>Jam Selesai</th> <th width='15%'>Keterangan</th> <th width='15%'>Operation</th> </tr> </thead> <tbody> <tr> <td> </td> <td> <select id='selectmapelku"+ i +"' class='col-sm-12'> <option></option> </select> </td> <td> <select name='selectguru' class='col-sm-12'> <option></option> </select> </td> <td> <select id='selectshift' class='col-sm-12'> <option></option> </select> </td> <td></td> <td></td> <td></td> </tr> </tbody> </table> </div> </div> </div>");

                $("#selectmapelku"+i).select2({
                  placeholder: "Pilih Matapelajaran",
                  allowClear : true,
                  data : data
                });
              }
            }

            $("#selectmapelku").select2({
              placeholder: "Pilih Matapelajaran",
              allowClear : true,
            });

            $("#selecttingkatmi").select2({
              placeholder: "Pilih Tingkat",
              allowClear : true,
            });

            $("#selecttingkatmts").select2({
              placeholder: "Pilih Tingkat",
              allowClear : true,
            });

            document.getElementByName('selectguru').select2({
              placeholder: "Pilih Guru",
              allowClear : true,
            });

            $("#selectshift").select2({
              placeholder: "Pilih Shift",
              allowClear : true,
            });
        </script>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
