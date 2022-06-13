<?php

namespace App\Controllers;

use App\Models\getNamePC;
use App\Models\fuzzyM;

class Home extends BaseController
{

    // jika model ingin dipakai banyak method, buat contruct
    protected $namePC;
    protected $fuzzyM;
    public function __construct()
    {
        $this->namePC = new getNamePC();
        $this->fuzzyM = new fuzzyM();
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
            'itemid' => $this->fuzzyM->AutoitemID(),
        ];
        return view('index', $data);
    }
}
