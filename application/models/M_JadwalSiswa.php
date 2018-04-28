<?php

/**
 *
 */
class M_JadwalSiswa 
{
  private $idJadwalSiswa;
  private $siswa = new Siswa;
  private $jadwalSeluruh = new Jadwal;
  private $tahunAjaran = new TahunAjaran;
  private $nilaiTugas;
  private $nilaiUTS;
  private $nilaiUAS;
  private $guru = new Guru;

  function __construct($idJadwalSiswa, $siswa, $jadwalSeluruh, $tahunAjaran, $nilaiTugas, $nilaiUTS, $nilaiUAS)
  {
    $this->idJadwalSiswa = $idJadwalSiswa;
    $this->siswa = $siswa;
    $this->jadwalSeluruh = $jadwalSeluruh;
    $this->tahunAjaran = $tahunAjaran;
    $this->nilaiTugas = $nilaiTugas;
    $this->nilaiUTS = $nilaiUTS;
    $this->nilaiUAS = $nilaiUAS;
    $this->guru = $guru;
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
  public function getSiswa()
  {
    return $this->siswa;
  }

  public function setSiswa($siswa)
  {
    $this->siswa = $siswa;
    return $this;
  }
  public function getJadwalSeluruh()
  {
    return $this->jadwalSeluruh;
  }

  public function setJadwalSeluruh($jadwalSeluruh)
  {
    $this->jadwalSeluruh = $jadwalSeluruh;
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
  public function getGuru()
  {
    return $this->guru;
  }

  public function setGuru($guru)
  {
    $this->guru = $guru;
    return $this;
  }
}

 ?>
