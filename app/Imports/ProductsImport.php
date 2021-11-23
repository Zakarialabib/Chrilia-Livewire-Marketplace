<?php

namespace App\Imports;

use App\Support\Helper;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    use Importable;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $product = new Product([
           'code' => Helper::genCode(),
           'name' => $row['name'],
           'price' => $row['price'],
           'wholesale_price' => $row['wholesale_price'],
           'status' => $row['status'],
           'stock' => $row['stock'],
        ]);

        Auth::user()->products()->save($product);
    }
}
