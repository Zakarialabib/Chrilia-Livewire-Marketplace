<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class VendorController extends Controller
{
    public string $search = '';
    
    public int $perPage;

    public $show;

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function __construct(){
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 10;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new Product())->orderable;

    }

    public function show($company_name)
    {
        $vendor = User::where('company_name', $company_name)
                      ->where('status', '=', 1)->first();

                      
        $products = Product::where('vendor_id',$vendor->id)
                            ->advancedFilter([
            's' => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
            ])
            ->paginate($this->perPage);
        
        views($vendor)->record();

        $vendor_views = views($vendor)->unique()->count();
        
        return view('frontend.vendor-page', compact('vendor', 'products', 'vendor_views'));

    }
    public function showModal(Product $product)
    {
        views($product)->record();

        $product_views = views($product)->unique()->count();

        return view('frontend.show-product',compact('product','product_views'));

    }
}