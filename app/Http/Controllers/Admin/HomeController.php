<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\Language;
use App\Models\Payment;
use Carbon\Carbon;
use Gate, Storage;

class HomeController extends Controller
{
    public function index()
    {

        abort_if(Gate::denies('admin_dashboard'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $product_views = views(Product::class)->count();
        $vendor_views = views(User::class)->count();

        $orders_data = Order::with("orders")->count();
        $products_data = Product::with("products")->count();
        $users_data = User::with("users")->count();
                
        return view('admin.home', compact( 'orders_data','products_data','users_data','product_views','vendor_views'));
    }

    public function translations()
    {

        return view('admin.translations');

    }

    public function contacts()
    {

        return view('admin.contact');

    }

    public function smpt()
    {

        return view('admin.settings.smpt');

    }

    public function notification()
    {

        return view('admin.notification');

    }

    public function uploadImages(Request $request)
	{
        if($request->hasFile('file')) {
	        //get filename with extension
	        $filenamewithextension = $request->file('file')->getClientOriginalName();
	  
	        //get filename without extension
	        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
	  
	        //get file extension
	        $extension = $request->file('file')->getClientOriginalExtension();
	  
	        //filename to store
	        $filenametostore = $filename.'_'.time().'.'.$extension;
	  
	        //Upload File
	        $request->file('file')->storeAs('photos', $filenametostore);
	  
	        // you can save image path below in database
	        $path = asset('uploads/photos/'.$filenametostore);
	 
	        echo $path;
	        exit;
        }
	}


}