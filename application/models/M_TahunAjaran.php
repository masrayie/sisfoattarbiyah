<?php

/**
 *
 */
class M_TahunAjaran 
{

  private $idTahunAjaran;
  private $semester;
  private $tahunAjaran;

  function __construct($idTahunAjaran, $semester, $tahunAjaran)
  {
    $this->idTahunAjaran = $idTahunAjaran;
    $this->semester = $semester;
    $this->tahunAjaran = $tahunAjaran;
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
  public function getSemester()
  {
    return $this->semester;
  }

  public function setSemester($semester)
  {
    $this->semester = $semester;
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
}


 ?>
