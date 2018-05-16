<?php

/**
 *
 */
class M_Siswa
{
  private $nis;
  private $namaSiswa;
  private $tglLahir;
  private $alamat;
  private $namaOrangTua;
  private $jenjang;
  private $tingkat;
  private $dataKehadiran = [];

  function __construct($nis=null, $namaSiswa=null, $tglLahir=null, $alamat=null, $namaOrangTua=null, $jenjang=null, $tingkat=null)
  {
    $this->nis = $nis;
    $this->namaSiswa = $namaSiswa;
    $this->tglLahir = $tglLahir;
    $this->alamat = $alamat;
    $this->namaOrangTua = $namaOrangTua;
    $this->jenjang = $jenjang;
    $this->tingkat = $tingkat;
  }

  public function getNis()
  {
    return $this->nis;
  }

  public function setNis($nis)
  {
    $this->nis = $nis;
    return $this;
  }

  public function getTingkat()
  {
    return $this->tingkat;
  }

  public function setTingkat($tingkat)
  {
    $this->tingkat = $tingkat;
    return $this;
  }

  public function getNamaSiswa()
  {
    return $this->namaSiswa;
  }

  public function setNamaSiswa($namaSiswa)
  {
    $this->namaSiswa = $namaSiswa;
    return $this;
  }
  public function getTglLahir()
  {
    return $this->tglLahir;
  }

  public function setTglLahir($tglLahir)
  {
    $this->tglLahir = $tglLahir;
    return $this;
  }
  public function getAlamat()
  {
    return $this->alamat;
  }

  public function setAlamat($alamat)
  {
    $this->alamat = $alamat;
    return $this;
  }
  public function getNamaOrangTua()
  {
    return $this->namaOrangTua;
  }

  public function setNamaOrangTua($namaOrangTua)
  {
    $this->namaOrangTua = $namaOrangTua;
    return $this;
  }
  public function getJenjang()
  {
    return $this->jenjang;
  }

  public function setJenjang($jenjang)
  {
    $this->jenjang = $jenjang;
    return $this;
  }
  public function getDataKehadiran()
  {
    return $this->dataKehadiran;
  }

  public function setDataKehadiran($dataKehadiran)
  {
    $this->dataKehadiran = $dataKehadiran;
    return $this;
  }
}

 ?>
