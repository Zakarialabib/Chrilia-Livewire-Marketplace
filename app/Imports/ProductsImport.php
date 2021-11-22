<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $product = new Product([
           'code' => $row[0],
           'name' => $row[1],
           'image' => $row[2],
           'description' => $row[3],
           'status' => $row[4],
           'price' => $row[5],
        ]);

        Auth::user()->products()->save($product);
    }
}
