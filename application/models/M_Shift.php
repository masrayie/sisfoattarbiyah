<?php
  class M_Shift{

    private $id_shift;
    private $jam_mulai;
    private $jam_selesai;
    private $keterangan;

    function __construct($id_shift=null, $jam_mulai=null, $jam_selesai=null, $keterangan=null){
        $this->id_shift = $id_shift;
        $this->jam_mulai = $jam_mulai;
        $this->jam_selesai = $jam_selesai;
        $this->keterangan = $keterangan;
    }

    function setIdShift($id_shift){
        $this->id_shift = $id_shift;
        return $this;
    }

    function getIdShift(){
        return $this->id_shift;
    }

    function setJamMulai($jam_mulai){
        $this->jam_mulai = $jam_mulai;
        return $this;
    }

    function getJamMulai(){
        return $this->jam_mulai;
    }

    function setJamSelesai($jam_selesai){
        $this->jam_selesai = $jam_selesai;
        return $this;
    }

    function getJamSelesai(){
        return $this->jam_selesai;
    }

    function setKeterangan($keterangan){
        $this->keterangan = $keterangan;
        return $this;
    }

    function getKeterangan(){
        return $this->keterangan;
    }

  }
 ?>
