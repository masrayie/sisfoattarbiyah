<?php

/**
 *
 */
class Kehadiran
{
  private $idPresensi;
  private $siswa = new Siswa;
  private $tahunAjaran = new TahunAjaran;
  private $hari;
  private $tanggal;
  private $status;

  function __construct($idPresensi, $siswa, $tahunAjaran, $hari, $tanggal, $status)
  {
    $this->idPresensi = $idPresensi;
    $this->siswa = $tahunAjaran;
    $this->tahunAjaran = $tahunAjaran;
    $this->hari = $hari;
    $this->tanggal = $tanggal;
    $this->status = $status
  }

  public function getIdPresensi()
  {
    return $this->idPresensi;
  }

  public function setIdPresensi($idPresensi)
  {
    $this->idPresensi = $idPresensi;
    return $this;
  }
  public function getSiswa()
  {
    return $this->siswa;
  }

  public function setSiswa($siswa)
  {
    $this->siswa = $siswa;
    return $this;
  }
  public function getTahunAjaran()
  {
    return $this->tahunAjaran;
  }

  public function setTahunAjaran($tahunAjaran)
  {
    $this->tahunAjaran = $tahunAjaran;
    return $this;
  }
  public function getHari()
  {
    return $this->hari;
  }

  public function setHari($hari)
  {
    $this->hari = $hari;
    return $this;
  }
  public function getTanggal()
  {
    return $this->tanggal;
  }

  public function setTanggal($tanggal)
  {
    $this->tanggal = $tanggal;
    return $this;
  }
  public function getStatus()
  {
    return $this->status;
  }

  public function setStatus($status)
  {
    $this->status = $status;
    return $this;
  }
}

 ?>
