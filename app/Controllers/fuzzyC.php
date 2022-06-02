<?php

namespace App\Controllers;

use App\Models\fuzzyM;

class fuzzyC extends BaseController
{

    // jika model ingin dipakai banyak method, buat contruct
    protected $namePC;
    public function __construct()
    {
        $this->namePC = new fuzzyM();
    }

    public function fuzzyproc()
    {
        $procp = $this->request->getVar('price_proc'); //terima input harga ajax
        $procu = $this->request->getVar('use_proc'); //terima input pemakaian ajax
        //input harga proc
        //set nilai atas - bawah
        $ba = 100;
        $bb = 900;
        //menghitung linear kurva turun (murah)
        $murah = ($bb - $procp) / ($bb - $ba);
        //menghitung kurva mahal
        $mahal = ($procp - $ba) / ($bb - $ba);

        return json_encode($mahal);
    }
}
