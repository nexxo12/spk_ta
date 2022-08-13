<?php

namespace App\Controllers;

use App\Models\getNamePC;
use App\Models\fuzzyM;
use App\Models\getKategori;

class Home extends BaseController
{

    // jika model ingin dipakai banyak method, buat contruct
    protected $namePC;
    protected $fuzzyM;
    protected $Kategori;
    public function __construct()
    {
        $this->namePC = new getNamePC();
        $this->fuzzyM = new fuzzyM();
        $this->Kategori = new getKategori();
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

    public function inputData()
    {

        $data = [
            'title' => "Input Master Barang",
            "kategori" => $this->Kategori->showKategori(),
            'itemid' => $this->namePC->ItemNameId()
        ];
        return view('input-data', $data);
    }

    public function saveBarang()
    {
        $this->namePC->insert([
            'item_NAMEID' => $this->request->getVar('itemID'),
            'ID_KATEGORI' => $this->request->getVar('kategori'),
            'NAMA_BARANG' => $this->request->getVar('nama-barang'),
        ]);
        // return redirect()->to('/');
        return redirect()->route('/');
    }
}
