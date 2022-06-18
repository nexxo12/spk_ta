<?php

namespace App\Models;

use CodeIgniter\Model;

class fuzzyM extends Model
{
    protected $table      = 'output';
    protected $allowedFields = ['', 'item_ID', 'item_NAMEID', 'item_PRICE', 'item_USE', 'item_OutMamdani', 'item_OutSugeno', ''];


    public function AutoitemID()
    {
        $id = $this->selectMax('id_tbl')->findAll();
        foreach ($id as $key) {
            $id_n = $key['id_tbl'] + 1;
        }
        return $id_n;
    }

    public function insertHasilFuzzyDB($itemID, $itemNAME, $itemPRICE, $itemUSE, $itemOutMamdani, $itemOutSugeno)
    {

        for ($i = 0; $i < count($itemNAME); $i++) {
            $result[] = array(
                'item_ID' => $itemID,
                'item_NAMEID' => $itemNAME[$i],
                'item_PRICE' => $itemPRICE[$i],
                'item_USE' => $itemUSE[$i],
                'item_OutMamdani' => $itemOutMamdani[$i],
                'item_OutSugeno' => $itemOutSugeno[$i]
            );
            // dd($result);
        }
        $this->insertBatch($result);
    }

    public function ShowItemsDB($itemID)
    {
        // return $this->select('*')->where('item_ID', $itemID)->findAll();
        return $this->table('output')->select('*')->join('master_barang', 'master_barang.item_NAMEID = output.item_NAMEID')->where('item_ID', $itemID)->findAll();
    }

    public function deletelist($id)
    {
        return $this->where('item_ID', $id)->delete();
    }

    public function gtotalbuy($id)
    {
        return $this->selectSum('item_PRICE')->where('item_ID', $id)->findAll();
    }

    public function gtotalpriceM($id)
    {
        return $this->selectSum('item_OutMamdani')->where('item_ID', $id)->findAll();
    }

    public function gtotalpriceS($id)
    {
        return $this->selectSum('item_OutSugeno')->where('item_ID', $id)->findAll();
    }
}
