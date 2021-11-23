<?php

namespace App\Imports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class OrdersImport implements ToModel
{
     /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $order = new Order([
           'code' => $row[0],
           'name' => $row[1],
           'image' => $row[2],
           'description' => $row[3],
           'status' => $row[4],
           'price' => $row[5],
        ]);

        Auth::user()->products()->save($order);
    }
}
