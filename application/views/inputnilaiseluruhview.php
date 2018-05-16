
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
 			     <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                      <div class="row">
                          <div class="col-md-10 stretch-card">
                            <h3 class="card-title"> Input Penilaian </h3>
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
                            <div class="col-md-2" id="rowdfmapel" style="flex:0 0 10.5%;">
                                <div class="form-group" style="font-size:12px;">
                                  <label for="exampleInputName1" style="font-size:13px;">Daftar Mapel</label>
                                      <select class="js-example-placeholder-single form-control form-control-sm select2-results__options" id="selectdfmapel" name="mapel" >
                                        <option></option>
                                      </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group" style="padding-top:21px;">
                                  <button type="button" class="btn btn-primary btn-xs" onclick="getNilai()">Show</button>
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
          function getNilai(){
            var jenjang, kelas, mapel
            jenjang     = document.getElementById("selectjenjangku").value;
            kelas       = document.getElementById("selectdftkelas").value;
            mapel       = document.getElementById("selectdfmapel").value;
            window.location="<?php echo base_url().'index.php/Nilai/getDataNilai?jenjang=';?>"+jenjang+"&kelas="+kelas+"&mapel="+mapel;
          }
          function generateID(id, idtype){
            $.ajax({
                type: 'post',
                url : "<?php echo base_url().'index.php/JadwalSeluruh/generateIdJadwal/';?>"+id,
                data : '',
                dataType : 'JSON',
                success : function(data){
                    var id_jadwal;
                    id_jadwal = data.id_jadwal;
                    $(idtype).val(id_jadwal);
                    // console.log(data);
                },
                error : function(data){
                  console.log('error di controller');
                }
            });
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
          document.getElementById("rowdfmapel").style.display="none";
          document.getElementById("rowdftkelas").style.display="none";


          $("#selectjenjangku").on("change", function(){
              if($(this).val()==0){
                $("#rowdftkelas").show();
                $("#rowjumlahanak").show();
                dataKelas($(this).val());
                $("#selectdftkelas").on('change', function(e){
                    $("#rowdfmapel").show();
                      dataMapel($(this).val());
                });
                $("#btngo").removeAttr("disabled");
              }else if($(this).val()==1){
                $("#rowdfmapel").show();
                $("#rowdftkelas").show();
                $("#rowjumlahanak").show();
                dataKelas($(this).val());
                $("#selectdftkelas").on('change', function(e){
                    $("#rowdfmapel").show();
                      dataMapel($(this).val());
                });
                $("#btngo").removeAttr("disabled");
              }else if($(this).val()==2){
                $("#rowdfmapel").show();
                $("#rowjumlahanak").show();
                $("#rowdftkelas").show();
                dataKelas($(this).val());
                $("#selectdftkelas").on('change', function(e){
                    $("#rowdfmapel").show();
                      dataMapel($(this).val());
                });
                $("#btngo").removeAttr("disabled");
              }else{
                $("#rowdftkelas").hide();
                $("#rowdfmapel").hide();
                $("#btngo").prop("disabled",true);
              }
          });

          $("#selectdftkelas").on('change', function(e){
                dataMapel($(this).val());
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
            var jenjang, jenjang2, tingkat, jumlahkelas, alphabet, kelasstorage, jumlahbaris
            jenjang     = document.getElementById("selectjenjangku").value;
            kelas       = document.getElementById("selectdftkelas").value;
            mapel       = document.getElementById("selectdfmapel").value;

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
              tingkat = document.getElementById("selecttingkattk").value;
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

            $.ajax({
                type: 'post',
                url : "<?php echo base_url().'index.php/Nilai/getDataNilai?jenjang=';?>"+jenjang+"&kelas="+kelas+"&mapel="+mapel,
                data : '',
                dataType : 'JSON',
                success : function(data){
                    var id_jadwal;
                    id_jadwal = data.id_jadwal;
                    $(idtype).val(id_jadwal);
                    // console.log(data);
                },
                error : function(data){
                  console.log('error di controller');
                }
            });

                for(var j = 0; j < jumlahbaris; j++){
                    x = x+1;;
                    $("#tabeldata").append("<div name='elementabel' class='col-lg-12 grid-margin stretch-card' style='margin-bottom:-20px;'> <div class='card'> <div class='card-body'> <h4 class='card-title'>Jadwal <i>"+ jenjang2 +"</i> /  Hari "+ hari +" /  Kelas "+kelas+"</h4> <table class='table table-bordered' id='tabeljadwal'> <thead> <tr style='vertical-align:top;'> <th width='20%'>ID Jadwal</th> <th width='15%'>Matapelajaran</th> <th width='15%'>Kode Guru</th> <th width='10%'>Shift</th> <th width='10%'>Jam Mulai</th> <th width='10%'>Jam Selesai</th> <th width='10%'>Keterangan</th> </tr> </thead> <tbody id='bodyjadwal"+(counter+i)+"'> </tbody> </table> </div> </div> </div>");
                    dataMapel('#selectmapelku'+i+(counter+j));
                    dataShift('#selectshift'+i+(counter+j));
                    dataGuru('#selectguru'+i+(counter+j));
                    generateID(x,'#idjadwal'+i+(counter+j));
                    var rowjadwal = "<tr> <td> <input type='hidden' name='kelas' value='"+kelas+"'/> <input type='hidden' name='jenjang' value='"+jenjang+"'/> <input type='hidden' name='hari' value='"+hari+"'/> <input type='text' class='col-sm-12' id='idjadwal"+i+(counter+j)+"' name='id_jadwal' value='' readonly style='border:none;font-size:11.5px;'/> </td> <td> <select name='selectmapelku' id='selectmapelku" + i + (counter+j) + "' class='form form-control-sm'> <option></option> </select> </td> <td> <select id='selectguru" + i + (counter+j) + "' class='form form-control-sm' name='selectguru'><option></option></select> </td> <td> <select id='selectshift" + i + (counter+j) + "'name='selectshift' class='form form-control-sm'> <option></option> </select> </td> <td><input type='text' class='col-sm-12' id='jam_mulai"+i+(counter+j)+"' name='jam_mulai' value='' readonly style='border:none;font-size:12px;'/></td> <td><input type='text' class='col-sm-12' id='jam_selesai"+i+(counter+j)+"' name='jam_selesai' value='' readonly style='border:none;font-size:12px;'/></td> <td><input type='text' class='col-sm-12' name='keterangan'id='keterangan"+i+(counter+j)+"' value='' readonly style='border:none;' /></td> </tr>";
                    $("#bodyjadwal"+(counter+i)).append(rowjadwal);

                    $("#selectshift"+i+(counter+j)).on('change', function(e){
                      var val = $(this).val();
                      var id = this.id.substring(11);
                      outJam(val, '#jam_mulai'+id, '#jam_selesai'+id, '#keterangan'+id);
                    });
                  }
                    $("#rowbtnsubmit").show();
                    $("#rowoperation").hide();
                }

            function btnreset(){
              location.reload();
            }

            function getAllValue(){
              var objAll = {};
              objAll.id_jadwal = $.map($("input[name='id_jadwal']"), function(val, _) {
                  var newObj = {};
                  newObj = val.value;
                  return newObj;
                });
                objAll.mapel = $.map($("select[name='selectmapelku']"), function(val, _) {
                    var newObj = {};
                    newObj = val.value;
                    return newObj;
                  });
                  objAll.kodeguru = $.map($("select[name='selectguru']"), function(val, _) {
                      var newObj = {};
                      newObj = val.value;
                      return newObj;
                    });
                    objAll.shift = $.map($("select[name='selectshift']"), function(val, _) {
                        var newObj = {};
                        newObj = val.value;
                        return newObj;
                      });
                      objAll.jenjang = $.map($("input[name='jenjang']"), function(val, _) {
                          var newObj = {};
                          newObj = val.value;
                          return newObj;
                        });
                        objAll.kelas = $.map($("input[name='kelas']"), function(val, _) {
                            var newObj = {};
                            newObj = val.value;
                            return newObj;
                          });
                          objAll.hari = $.map($("input[name='hari']"), function(val, _) {
                              var newObj = {};
                              newObj = val.value;
                              return newObj;
                            });
              console.log(JSON.stringify(objAll));
              return JSON.stringify(objAll);
              // alert("cek");
            }

            function sendJSONJadwal(){
                var val = getAllValue();
                $.ajax({
                  method:'POST',
                  contentType :'application/json',
                  url : "<?php echo base_url().'index.php/JadwalSeluruh/insertJadwalAll';?>",
                  data : val,
                  success: function(resp){
                    window.location="<?php echo base_url().'index.php/JadwalSeluruh/viewTabelJadwalAll';?>";
                  },
                  error: function(resp){
                    console.log('gagal parsing');
                  }
                });
            }

        </script>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
