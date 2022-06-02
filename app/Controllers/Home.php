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
        $data = [
            'proc' => $this->namePC->showProc(),
            'mobo' => $this->namePC->showMobo(),
            'ram' => $this->namePC->showRAM(),
            'ssd' => $this->namePC->showSSD(),
            'hdd' => $this->namePC->showHDD(),
            'vga' => $this->namePC->showVGA(),
            'psu' => $this->namePC->showPSU(),
            'case' => $this->namePC->showCASE(),
        ];
        return view('index', $data);
    }
}
