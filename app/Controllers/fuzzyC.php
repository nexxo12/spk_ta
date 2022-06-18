<?php

namespace App\Controllers;

use App\Models\fuzzyM;

class fuzzyC extends BaseController
{

    // jika model ingin dipakai banyak method, buat contruct
    protected $fuzzyModel;
    public function __construct()
    {
        $this->fuzzyModel = new fuzzyM();
    }

    public function insertHasilFuzzy()
    {
        $itemID = $this->request->getVar('itemID');
        $itemNAME = $this->request->getVar('itemNAME[]');
        $itemPRICE = $this->request->getVar('itemPRICE[]');
        $itemUSE = $this->request->getVar('itemUSE[]');
        $itemOutMamdani = $this->request->getVar('itemOutMamdani[]');
        $itemOutSugeno = $this->request->getVar('itemOutSugeno[]');
        $this->fuzzyModel->insertHasilFuzzyDB($itemID, $itemNAME, $itemPRICE, $itemUSE, $itemOutMamdani, $itemOutSugeno);
        // dd($this->request->getVar());
        return redirect()->to('/');
    }

    public function showitems()
    {
        $itemID = $this->request->getVar('itemID');
        $result = $this->fuzzyModel->ShowItemsDB($itemID);
        return json_encode($result);
    }

    public function delete()
    {
        $id = $this->request->getVar('itemid');
        $result = $this->fuzzyModel->deletelist($id);
        return json_encode($result);
    }

    public function gtotal_pricebuy()
    {
        $id = $this->request->getVar('itemID');
        $result = $this->fuzzyModel->gtotalbuy($id);
        return json_encode($result);
    }

    public function gtotal_pricemamdani()
    {
        $id = $this->request->getVar('itemID');
        $result = $this->fuzzyModel->gtotalpriceM($id);
        return json_encode($result);
    }

    public function gtotal_pricesugeno()
    {
        $id = $this->request->getVar('itemID');
        $result = $this->fuzzyModel->gtotalpriceS($id);
        return json_encode($result);
    }
}
