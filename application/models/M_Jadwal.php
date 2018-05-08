<?php

/**
 *
 */
class M_Jadwal
{
  private $idJadwal;
  // private $mapel = new MataPelajaran();
  // private $guru = new Guru();
  private $hari;
  private $jam;
  private $kelas;
  private $jadwalSiswa = [];

  function __construct($idJadwal=null, $mapel=null, $guru=null, $hari=null, $jam=null, $kelas=null, $jadwalSiswa=null)
  {
    $this->idJadwal = $idJadwal;
    $this->mapel = $mapel;
    $this->guru = $guru;
    $this->hari = $hari;
    $this->jam = $jam;
    $this->kelas = $kelas;
    $this->jadwalSiswa = $jadwalSiswa;
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
  public function getMapel()
  {
    return $this->mapel;
  }

  public function setMapel($mapel)
  {
    $this->mapel = $mapel;
    return $this;
  }
  public function getGuru()
  {
    return $this->guru;
  }

  public function setGuru($guru)
  {
    $this->guru = $guru;
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
  public function getJam()
  {
    return $this->jam;
  }

  public function setJam($jam)
  {
    $this->jam = $jam;
    return $this;
  }
  public function getKelas()
  {
    return $this->kelas;
  }

  public function setKelas($kelas)
  {
    $this->kelas = $kelas;
    return $this;
  }
  public function getJadwalSiswa()
  {
    return $this->jadwalSiswa;
  }

  public function setJadwalSiswa($jadwalSiswa)
  {
    $this->jadwalSiswa = $jadwalSiswa;
    return $this;
  }
}

 ?>
