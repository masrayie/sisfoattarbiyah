<?php
/**
 *
 */
class M_Guru 
{
  private $nip;
  private $namaGuru;
  private $alamat;
  private $kode_guru;
  private $email;
  private $password;

  function __construct($nip=null, $namaGuru=null, $alamat=null, $kode_guru=null, $email=null, $password=null)
  {
      $this->nip = $nip;
      $this->namaGuru = $namaGuru;
      $this->alamat = $alamat;
      $this->kode_guru = $kode_guru;
      $this->email = $email;
      $this->password = $password;    
  }


  public function getNip()
  {
    return $this->nip;
  }

  public function setNip($nip)
  {
    $this->nip = $nip;
  }

  public function getNamaGuru()
  {
    return $this->namaGuru;
  }

  public function setNamaGuru($namaGuru)
  {
    $this->namaGuru = $namaGuru;
  }
  public function getAlamat()
  {
    return $this->alamat;
  }

  public function setAlamat($alamat)
  {
    $this->alamat = $alamat;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function setPassword($password)
  {
    $this->password = $password;
  }

  public function getKodeGuru()
  {
    return $this->kode_guru;
  }

  public function setKodeGuru($kode_guru)
  {
    $this->kode_guru = $kode_guru;
  }

}

 ?>
