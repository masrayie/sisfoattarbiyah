<?php

/**
 *
 */
class M_JadwalSiswa
{
  private $idJadwalSiswa;
  private $nis;
  private $idJadwal;
  private $idTahunAjaran;
  private $nip;
  private $mapel;
  private $nilaiTugas;
  private $nilaiUTS;
  private $nilaiUAS;

  function __construct($idJadwalSiswa=null, $nis=null, $idJadwal=null, $idTahunAjaran=null, $nip=null, $mapel=null, $nilaiTugas=null, $nilaiUTS=null, $nilaiUAS=null)
  {
    $this->idJadwalSiswa = $idJadwalSiswa;
    $this->nis = $nis;
    $this->idJadwal = $idJadwal;
    $this->idTahunAjaran = $idTahunAjaran;
    $this->nip = $nip;
    $this->mapel = $mapel;
    $this->nilaiTugas = $nilaiTugas;
    $this->nilaiUTS = $nilaiUTS;
    $this->nilaiUAS = $nilaiUAS;
  }

  public function getIdJadwalSiswa()
  {
    return $this->idJadwalSiswa;
  }

  public function setIdJadwalSiswa($idJadwalSiswa)
  {
    $this->idJadwalSiswa = $idJadwalSiswa;
    return $this;
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

  public function getMapel()
  {
    return $this->mapel;
  }

  public function setMapel($mapel)
  {
    $this->mapel = $mapel;
    return $this;
  }

  public function getIdJadwal()
  {
    return $this->idJadwal;
  }

  public function setIdJadwal($idJadwal)
  {
    $this->idJadwal = $idJadwal;
    return $this;
  }
  public function getIdTahunAjaran()
  {
    return $this->idTahunAjaran;
  }

  public function setIdTahunAjaran($idTahunAjaran)
  {
    $this->idTahunAjaran = $idTahunAjaran;
    return $this;
  }
  public function getNilaiTugas()
  {
    return $this->nilaiTugas;
  }

  public function setNilaiTugas($nilaiTugas)
  {
    $this->nilaiTugas = $nilaiTugas;
    return $this;
  }
  public function getNilaiUTS()
  {
    return $this->nilaiUTS;
  }

  public function setNilaiUTS($nilaiUTS)
  {
    $this->nilaiUTS = $nilaiUTS;
    return $this;
  }
  public function getNilaiUAS()
  {
    return $this->nilaiUAS;
  }

  public function setNilaiUAS($nilaiUAS)
  {
    $this->nilaiUAS = $nilaiUAS;
    return $this;
  }
  public function getNip()
  {
    return $this->nip;
  }

  public function setNip($nip)
  {
    $this->nip = $nip;
    return $this;
  }
}

 ?>
