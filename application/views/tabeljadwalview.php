
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
                          <a href="<?php echo base_url().'index.php/JadwalSeluruh/generateIdJadwal/1';?>">tes</a>
                          <div class="col-md-2 stretch-card">
                              <h7 class="card-title"><a  href="<?php echo base_url('index.php/JadwalSeluruh/viewSettingShift'); ?>" class="btn btn-danger "> <i class="mdi mdi-settings"></i>Set Shift</a></h7>
                          </div>
                      </div>
                        <div class="row" style="margin-bottom:-10px; margin-top:10px;" id="rowoperation">
                            <div class="col-md-2">
                                <div class="form-group" style="font-size:12px;">
                                    <label for="exampleInputName1" style="font-size:13px;">Hari</label>
                                      <select class="js-example-placeholder-single form-control form-control-sm select2-results__options" id="selecthariku" name="hari">
                                          <option value="-">-----Pilih Hari-----</option>
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
                                  <label for="exampleInputName1" style="font-size:13px;">Jenjang Pendidikan</label>
                                      <select class="js-example-placeholder-single form-control form-control-sm select2-results__options" id="selectjenjangku" name="jenjang" disabled>
                                        <option value="-">--Pilih Jenjang--</option>
                                        <option value="0">Taman Kanak-Kanak</option>
                                        <option value="1">Madrasah Ibtidaiyah</option>
                                        <option value="2">Madrasah Tsanawiyah</option>
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-2" id="rowmi" style="flex:0 0 10.5%;">
                                <div class="form-group" style="font-size:12px;">
                                  <label for="exampleInputName1" style="font-size:13px;">Tingkat</label>
                                      <select class="js-example-placeholder-single form-control form-control-sm select2-results__options" id="selecttingkatmi" name="tingkatmi" >
                                        <option value="-">-Tingkat-</option>
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
                                  <label for="exampleInputName1" style="font-size:13px;">Tingkat</label>
                                      <select class="js-example-placeholder-single form-control form-control-sm select2-results__options" id="selecttingkatmts" name="tingkatmts" >
                                        <option value="-">-Tingkat-</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                      </select>
                                </div>
                            </div>
                            <div class="col-sm-2" id="rowjumkelas" style="max-width:12.5%; line-height: 0.5;">
                                <div class="form-group">
                                  <label for="exampleInputName1" style="font-size:13px;">Jumlah Kelas</label>
                                      <input type="number" min="1" class="form-control form-control-sm" name="jumlahkelas" id="jumlahkelas" placeholder="Jumlah Kelas" style="padding:6px 5px; border: 1px solid #aaa;" />
                                </div>
                            </div>
                            <div class="col-sm-2" id="rowjumbaris" style="max-width:12.5%; line-height: 0.5">
                                <div class="form-group">
                                  <label for="exampleInputName1" style="font-size:13px;">Jumlah Baris</label>
                                      <input type="number" min="1" class="form-control form-control-sm" name="jumlahbaris" id="jumlahbaris" placeholder="Baris Jadwal" style="padding:6px 5px; border: 1px solid #aaa;" />
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group" style="padding-top:21px;">
                                  <button type="button" class="btn btn-primary btn-xs" onclick="outputTabel()">Go !</button>
                                </div>
                            </div>
                          </form>
                        </div>
                  <form class="form-control" style="border:0px;" action="" method="post">
                    <div class="row" id="tabeldata">
                    </div>
                    <div class="row" id="rowbtnsubmit" align="right" style="margin-top:20px; padding-left:35px;">
                      <button type="button" onclick="btnSubmit()"class="btn btn-success btn-fw">Save</button>
                      <button type="button" class="btn btn-outline-danger btn-fw" style="margin-left:20px;" onclick="btnreset()"><i class="mdi mdi-restart"></i>Reset</button>
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

          $.ajax({
              type: 'post',
              url : "<?php echo base_url().'index.php/JadwalSeluruh/generateIdJadwal/1';?>",
              data : '',
              dataType : 'JSON',
              success : function(data){
                  alert(data.id_jadwal);
                  console.log(data);
              },
              error : function(data){
                console.log('error di controller');
              }
          });

          $(window).bind('beforeunload', function(){
            localStorage.removeItem("jumlahkelas");
          });

          $(document).ready(function(){
            // if(!localStorage.getItem("jumlahkelas")){
            //   alert("gaadacuk");
            // } else{
            //   alert("ganok");
            // }
            // localStorage.removeItem("jumlahkelas");
          });

          //Hidden rowmi, rowmts, rowjumkelas, rowbtnsubmit
          document.getElementById("rowmi").style.display="none";
          document.getElementById("rowmts").style.display="none";
          document.getElementById("rowjumkelas").style.display="none";
          document.getElementById("rowjumbaris").style.display="none";
          document.getElementById("rowbtnsubmit").style.display="none";

          $("#selectmapelku").select2({
            placeholder: "Pilih Matapelajaran",
            allowClear : true,
          });

          $("#selectshift").select2({
            placeholder: "Pilih Shift",
            allowClear : true,
          });

          //handler select2
          $("#selecthariku").on("change", function(){
              $("#selectjenjangku").removeAttr("disabled");
          });

          $("#selectjenjangku").on("change", function(){
              var jenjang
              jenjang = document.getElementById("selectjenjangku").value;
              if(jenjang == 0){
                $("#rowmi").hide();
                $("#rowmts").hide();
                $("#rowjumkelas").show();
                $("#rowjumbaris").show();
              } else if(jenjang == 1){
                $("#rowmi").show();
                $("#rowmts").hide();
                $("#rowjumbaris").show();
                $("#rowjumkelas").show();
              } else {
                $("#rowmts").show();
                $("#rowmi").hide();
                $("#rowjumbaris").show();
                $("#rowjumkelas").show();
              }
          });

          function cekLocalStorage(){
            if(!localStorage.getItem("jumlahkelas")){
              alert("belum ada");
            } else{
              alert(localStorage.getItem("jumlahkelas"));
            }
          }

          //function output tabel dinamis
          function outputTabel(){
            var hari, jenjang, jenjang2, tingkat, jumlahkelas, alphabet, kelasstorage, jumlahbaris
            hari        = document.getElementById("selecthariku").value;
            jenjang     = document.getElementById("selectjenjangku").value;
            jumlahkelas = document.getElementById("jumlahkelas").value;
            jumlahbaris = document.getElementById("jumlahbaris").value;
            alphabet    = "ABCDEFGHIJKLMNOPQRSTUVWXYZ".split('');

            if(!localStorage.getItem("jumlahkelas")){
                kelasstorage = jumlahkelas;
                localStorage.setItem("jumlahkelas", kelasstorage);
            } else{
                kelasstorage = parseInt(localStorage.getItem("jumlahkelas")) + parseInt(jumlahkelas);
                localStorage.setItem("jumlahkelas", kelasstorage);
            }

            if(!localStorage.getItem("jumlahbaris")){
                barisstorage = jumlahbaris;
            } else {
                barisstorage = parseInt(localStorage.getItem("jumlahbaris") + parseInt(jumlahkelas));
                localStorage.setItem("jumlahbaris", barisstorage);
            }

            if(jenjang == 0){
              jenjang2 = "Taman Kanak-Kanak";
            } else if (jenjang==1) {
              jenjang2 = "Madrasah Ibtidaiyah";
              tingkat = document.getElementById("selecttingkatmi").value;
            } else {
              jenjang2 = "Madrasah Tsanawiyah";
              tingkat = document.getElementById("selecttingkatmts").value;
            }

            if(kelasstorage==jumlahkelas){
                counter = 0;
            } else {
                counter = kelasstorage-jumlahkelas;
            }

            if(barisstorage==jumlahbaris){
                counterrow = 0;
            } else {
                counterrow = barisstorage - jumlahbaris;
            }

            var datamapel = $.map(<?php echo $jsonMapel; ?>, function (obj) {
                              obj.id = obj.id || obj.kode_mapel;
                              obj.text = obj.text || obj.nama_mapel;
                              return obj;
                            });
            var dataguru = $.map(<?php echo $jsonGuru; ?>, function (obj) {
                              obj.id = obj.id || obj.kode_guru;
                              var label = obj.kode_guru + " - " + obj.nama_guru;
                              obj.text = obj.text || label;
                              return obj;
                            });
            var datashift = $.map(<?php echo $jsonShift; ?>, function (obj) {
                                obj.id = obj.id || obj.id_shift;
                                obj.text = obj.text || obj.id_shift;
                              return obj;
                            });

            for (var i = 0; i < jumlahkelas; i++) {
                if(jenjang == 0){
                    $("#tabeldata").append("<div name='elementabel' class='col-lg-12 grid-margin stretch-card' style='margin-bottom:-20px;'> <div class='card'> <div class='card-body'> <h4 class='card-title'>Jadwal <i>"+ jenjang2 +"</i>,  Hari "+ hari +" Kelas "+ alphabet[(counter+i)] +" </h4> <table class='table table-bordered' name='jadwaltabel' id='tabeljadwal'> <thead> <tr style='vertical-align:top;'> <th width='10%'>ID Jadwal</th> <th width='20%'>Matapelajaran</th> <th width='15%'>Kode Guru</th> <th width='12%'>Shift</th> <th width='5%'>Jam Mulai</th> <th width='5%'>Jam Selesai</th> <th width='15%'>Keterangan</th> <th width='15%'>Operation</th> </tr> </thead> <tbody id='bodyjadwal"+(counter+i)+"'> </tbody> </table> </div> </div> </div>");
                } else {
                    $("#tabeldata").append("<div name='elementabel' class='col-lg-12 grid-margin stretch-card' style='margin-bottom:-20px;'> <div class='card'> <div class='card-body'> <h4 class='card-title'>Jadwal <i>"+ jenjang2 +"</i>,  Hari "+ hari +",  Kelas "+ tingkat + "-" + alphabet[(counter+i)] +" </h4> <table class='table table-bordered' id='tabeljadwal'> <thead> <tr style='vertical-align:top;'> <th width='10%'>ID Jadwal</th> <th width='20%'>Matapelajaran</th> <th width='15%'>Kode Guru</th> <th width='10%'>Shift</th> <th width='5%'>Jam Mulai</th> <th width='5%'>Jam Selesai</th> <th width='15%'>Keterangan</th> <th width='15%'>Operation</th> </tr> </thead> <tbody id='bodyjadwal"+(counter+i)+"'> </tbody> </table> </div> </div> </div>");
                }

                for(var j = 0; j < jumlahbaris; j++){
                    var rowjadwal = "<tr> <td> </td> <td> <select name='selectmapelku[]' id='selectmapelku" + i + (counter+j) + "' class='col-sm-12'> <option></option> </select> </td> <td> <select id='selectguru" + i + (counter+j) + "' class='col-sm-12' name='selectguru[]'><option></option></select> </td> <td> <select id='selectshift" + i + (counter+j) + "'name='selectshift[]' class='col-sm-12'> <option></option> </select> </td> <td></td> <td></td> <td></td> <td>tes</td> </tr>";
                    $("#bodyjadwal"+(counter+i)).append(rowjadwal);
                    $("#selectmapelku"+i+(counter+j)).select2({
                      placeholder: "Pilih Matapelajaran",
                      data : datamapel
                    });
                    $("#selectshift"+i+(counter+j)).select2({
                      placeholder: "Pilih Shift",
                      data : datashift
                    });
                    $("#selectguru"+i+(counter+j)).select2({
                      placeholder: "Pilih Kode Guru",
                      data : dataguru
                    });
                  }
                    $("#rowbtnsubmit").show();
                    $("#rowoperation").hide();
                }
            }

            function btnreset(){
              $("div[name='elementabel']").remove();
              $("#rowoperation").show();
              $("#rowbtnsubmit").hide();
              $("#selecthariku").val("-");
              $("#selectjenjangku").val("-");
              $("#selectjenjangku").prop("disabled","disabled");
              $("#selecttingkatmi").val("-");
              $("#selecttingkatmi").val("-");
              $("#jumlahkelas").val("");
              $("#jumlahbaris").val("");
              document.getElementById("rowmi").style.display="none";
              document.getElementById("rowmts").style.display="none";
              document.getElementById("rowjumkelas").style.display="none";
              document.getElementById("rowjumbaris").style.display="none";
              document.getElementById("rowbtnsubmit").style.display="none";
              localStorage.removeItem("jumlahkelas");
              localStorage.removeItem("jumlahbaris");
              // alert("cek");
            }

            // function btnSubmit(){
            //   var valIdJadwal valMapel, valKode, valShift, valKet
            //   valMapel = $('select[name="selectmapelku[]"]').map(function() {
            //       return this.value;
            //     }).get();
            //   valKode = $('select[name="selectguru[]"]').map(function() {
            //       return this.value;
            //     }).get();
            //   valShift = $('select[name="selectshift[]"]').map(function() {
            //       return this.value;
            //   }).get();
            //   // alert("cek");
            // }

        </script>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
