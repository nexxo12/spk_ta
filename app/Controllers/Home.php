<?php

namespace App\Controllers;

use App\Models\getNamePC;

class Home extends BaseController
{

    // jika model ingin dipakai banyak method, buat contruct
    protected $namePC;
    public function __construct()
    {
        $this->namePC = new getNamePC();
    }

    public function index()
    {
        return view('index');
    }
}
