<?php

/**
 *
 */
class M_MataPelajaran
{
  private $kodeMapel;
  private $namaMapel;

  function __construct($kodeMapel=null, $namaMapel=null)
  {
    $this->kodeMapel = $kodeMapel;
    $this->namaMapel = $namaMapel;
  }

  public function getKodeMapel()
  {
    return $this->kodeMapel;
  }

  public function setKodeMapel($kodeMapel)
  {
    $this->kodeMapel = $kodeMapel;
    return $this;
  }
  public function getNamaMapel()
  {
    return $this->namaMapel;
  }

  public function setNamaMapel($namaMapel)
  {
    $this->namaMapel = $namaMapel;
    return $this;
  }
}

 ?>
