
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
 			     <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                      <div class="row">
                          <div class="col-md-10 stretch-card">
                            <h3 class="card-title"> Edit Jadwal Pelajaran</h3>
                          </div>
                      </div>
                  <form class="form-control" style="border:0px;" action="" method="post">
                    <div class="row" id="tabeldata">
                      <div name='elementabel' class='col-lg-12 grid-margin stretch-card' style='margin-bottom:-20px;'> <div class='card'> <div class='card-body'> <h4 class='card-title'>Jadwal <?php echo $objJadwal->getJenjang() == 0 ? "Taman Kanak-Kanak" : ($objJadwal->getJenjang() == 1 ? "Madrasah Ibtidaiyah" : "Madrasah Tsanawiyah"); ?> /  Hari <?php echo $objJadwal->getHari() ?>  / Kelas <?php echo $objJadwal->getKelas() ?></h4>
                        <table class='table table-bordered' name='jadwaltabel' id='tabeljadwal'>
                          <thead>
                            <tr style='vertical-align:top;'>
                              <th width='20%'>ID Jadwal</th>
                              <th width='15%'>Matapelajaran</th>
                              <th width='15%'>Kode Guru</th>
                              <th width='10%'>Shift</th>
                              <th width='10%'>Jam Mulai</th>
                              <th width='10%'>Jam Selesai</th>
                              <th width='10%'>Keterangan</th>
                            </tr>
                          </thead>
                          <tbody id='bodyjadwal'>
                              <tr>
                                <td> <input type='hidden' name='kelas' value='<?php echo $objJadwal->getKelas();?> '/> <input type='hidden' name='jenjang' value='<?php echo $objJadwal->getJenjang();?>'/> <input type='hidden' name='hari' value='<?php echo $objJadwal->getHari(); ?>'/>
                                  <input type='text' class='col-sm-12' id='idjadwal' value='<?php echo $objJadwal->getIdJadwal(); ?>' name='id_jadwal' readonly style='border:none;font-size:11.5px;' /> </td>
                                <td> <select name='selectmapelku' id='selectmapel' class='form form-control-sm col-lg-12'> <option></option> </select> </td>
                                <td> <select id='selectguru' class='form form-control-sm col-lg-12' name='selectguru'><option></option></select> </td>
                                <td> <select id='selectshift'name='selectshift' class='form form-control-sm col-lg-12'> <option></option> </select> </td>
                                <td> <input type='text' class='col-sm-12' id='jam_mulai'  name='jam_mulai' value='' readonly style='border:none;font-size:12px;'/> </td>
                                <td> <input type='text' class='col-sm-12' id='jam_selesai' name='jam_selesai' value='' readonly style='border:none;font-size:12px;'/> </td>
                                <td> <input type='text' class='col-sm-12' name='keterangan' id='keterangan' value='' readonly style='border:none;' /> </td>
                              </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                    </div>
                    <div class="row" id="rowbtnsubmit" align="right" style="margin-top:20px; padding-left:35px;">
                      <button type="button" onclick="sendJSONEdit(<?php echo "'".$objJadwal->getIdJadwal()."'";?>)" class="btn btn-success btn-fw">Save</button>
                      <button type="button" class="btn btn-outline-danger btn-fw" style="margin-left:20px;" onclick="btnreset()"><i class="mdi mdi-arrow-left-thick"></i>Cancel</button>
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
        $(document).ready(function(){
            dataMapel(<?php echo $objJadwal->getMapel();?>);
            dataGuru(<?php echo "'".$objJadwal->getGuru()."'";?>);
            dataShift(<?php echo $objJadwal->getJam();?>);
            $("#selectshift").on('change', function(e){
              var val = $(this).val();
              outJam(val, '#jam_mulai', '#jam_selesai', '#keterangan');
            });
        });
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

          function dataMapel(id){
            $.ajax({
              type: 'post',
              url : "<?php echo base_url().'index.php/JadwalSeluruh/jsonMapel';?>",
              data : '',
              dataType : 'JSON',
              success : function(data){
                $("#selectmapel").select2({placeholder:'Pilih MataPelajaran', data:data}).val(id).trigger("change");
              },
              error : function(data){
                console.log('error di controller');
              }
            });
          }

          function outJam(id, idtype1, idtype2, idtype3){
            $.ajax({
              type :'post',
              url :"<?php echo base_url().'index.php/JadwalSeluruh/getJam/'?>"+id,
              data : '',
              dataType : 'JSON',
              success : function(data){
                $(idtype1).val(data.jam_mulai);
                $(idtype2).val(data.jam_selesai);
                $(idtype3).val(data.keterangan);
              },
              error : function(data){
                console.log('error getting');
              }
            });
          }

          function dataGuru(id){
            $.ajax({
              type: 'post',
              url : "<?php echo base_url().'index.php/JadwalSeluruh/jsonGuru';?>",
              data : '',
              dataType : 'JSON',
              success : function(data){
                $("#selectguru").select2({placeholder:'Pilih Kode Guru', data:data}).val(id).trigger("change");
              },
              error : function(data){
                console.log('error di controller');
              }
            });
          }

          function dataShift(id){
            $.ajax({
              type: 'post',
              url : "<?php echo base_url().'index.php/JadwalSeluruh/jsonShift';?>",
              data : '',
              dataType : 'JSON',
              success : function(data){
                $("#selectshift").select2({placeholder:'Pilih Shift', data:data}).val(id).trigger("change");
                $.ajax({
                  type :'post',
                  url :"<?php echo base_url().'index.php/JadwalSeluruh/getJam/'?>"+id,
                  data : '',
                  dataType : 'JSON',
                  success : function(data){
                    $("#jam_mulai").val(data.jam_mulai);
                    $("#jam_selesai").val(data.jam_selesai);
                    $("#keterangan").val(data.keterangan);
                  },
                  error : function(data){
                    console.log('error getting');
                  }
                });
              },
              error : function(data){
                console.log('error di controller');
              }
            });
          }

            function btnreset(){
              window.location="<?php echo base_url().'index.php/JadwalSeluruh/viewJadwalSeluruh';?>"
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

            function sendJSONEdit(id){
                var val = getAllValue();
                $.ajax({
                  method:'POST',
                  contentType :'application/json',
                  url : "<?php echo base_url().'index.php/JadwalSeluruh/updateJadwalSingle/';?>"+id,
                  data : val,
                  success: function(resp){
                    window.location="<?php echo base_url().'index.php/JadwalSeluruh/viewJadwalSeluruh';?>";
                    // console.log(resp);
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
