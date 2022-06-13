<?php

namespace App\Models;

use CodeIgniter\Model;

class getNamePC extends Model
{
    protected $table      = 'master_barang';
    protected $useTimestamps = true;
    protected $allowedFields = ['item_NAMEID', 'ID_KATEGORI', 'NAMA_BARANG'];

    public function showProc()
    {
        return $this->select('*')->where('ID_KATEGORI', 1)->orderBy('NAMA_BARANG', 'ASC')->findAll();
    }
    public function showMobo()
    {
        return $this->select('*')->where('ID_KATEGORI', 3)->orderBy('NAMA_BARANG', 'ASC')->findAll();
    }

    public function showRAM()
    {
        return $this->select('*')->where('ID_KATEGORI', 2)->orderBy('NAMA_BARANG', 'ASC')->findAll();
    }

    public function showSSD()
    {
        return $this->select('*')->where('ID_KATEGORI', 10)->orderBy('NAMA_BARANG', 'ASC')->findAll();
    }

    public function showHDD()
    {
        return $this->select('*')->where('ID_KATEGORI', 4)->orderBy('NAMA_BARANG', 'ASC')->findAll();
    }

    public function showVGA()
    {
        return $this->select('*')->where('ID_KATEGORI', 6)->orderBy('NAMA_BARANG', 'ASC')->findAll();
    }

    public function showPSU()
    {
        return $this->select('*')->where('ID_KATEGORI', 5)->orderBy('NAMA_BARANG', 'ASC')->findAll();
    }

    public function showCASE()
    {
        return $this->select('*')->where('ID_KATEGORI', 7)->orderBy('NAMA_BARANG', 'ASC')->findAll();
    }
}
