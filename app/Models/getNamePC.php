<?php

namespace App\Models;

use CodeIgniter\Model;

class getNamePC extends Model
{
    protected $table      = 'admin';
    protected $useTimestamps = true;
    // protected $username;
    // protected $password;
    protected $allowedFields = ['id_adm', 'username', 'password', 'nama_admin', 'email', 'no_hp'];
}
