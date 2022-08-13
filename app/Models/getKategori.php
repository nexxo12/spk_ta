<?php

namespace App\Models;

use CodeIgniter\Model;

class getKategori extends Model
{
    protected $table      = 'kategori';
    protected $useTimestamps = true;
    protected $allowedFields = ['ID_KATEGORI', 'KATEGORI'];

    public function showKategori()
    {
        return $this->select('*')->findAll();
    }
}
