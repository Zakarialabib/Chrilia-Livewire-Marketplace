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

        $orders_data = Order::with("orders")->count();
        $products_data = Product::with("products")->count();
        $users_data = User::with("users")->count();

        $data = array(
            'today' => array(
                'orders' => Order::whereDate('created_at', '>=' , Carbon::now())->count(),
                'products' => Product::whereDate('created_at', '>=' , Carbon::now())->count(),
                'users' => User::whereDate('created_at', '>=' , Carbon::now())->count(),
                'orderTotal' => Order::whereDate('created_at', '>=' , Carbon::now())->sum('total'),
                'paymentTotal' => Payment::whereDate('created_at', '>=' , Carbon::now())->sum('amount_received'),
                'STATUS_PENDING' => Order::where('status', '=' , 0)->whereDate('created_at', '>=' , Carbon::now())->count(),
                'STATUS_PROCESSING' => Order::where('status', '=' , 1)->whereDate('created_at', '>=' , Carbon::now())->count(),
                'STATUS_COLLECTING' => Order::where('status', '=' , 2)->whereDate('created_at', '>=' , Carbon::now())->count(),
                'STATUS_CONFIRMED' => Order::where('status', '=' , 3)->whereDate('created_at', '>=' , Carbon::now())->count(),
                'STATUS_SHIPPING' => Order::where('status', '=' , 4)->whereDate('created_at', '>=' , Carbon::now())->count(),
                'STATUS_CANCELED' => Order::where('status', '=' , 5)->whereDate('created_at', '>=' , Carbon::now())->count(),
                'STATUS_COMPLETED' => Order::where('status', '=' , 6)->whereDate('created_at', '>=' , Carbon::now())->count(),
                'STATUS_RETURNED' => Order::where('status', '=' , 7)->whereDate('created_at', '>=' , Carbon::now())->count(),
                'STATUS_PAID' => Order::where('status', '=' , 8)->whereDate('created_at', '>=' , Carbon::now())->count(),
            ),
            'month' => array(
                'orders' => Order::whereDate('created_at', '>=' , Carbon::now()->subMonth())->count(),
                'products' => Product::whereDate('created_at', '>=' , Carbon::now()->subMonth())->count(),
                'users' => User::whereDate('created_at', '>=' , Carbon::now()->subMonth())->count(),
                'orderTotal' => Order::whereDate('created_at', '>=' , Carbon::now()->subMonth())->sum('total'),
                'paymentTotal' => Payment::whereDate('created_at', '>=' , Carbon::now()->subMonth())->sum('amount_received'),
                'STATUS_PENDING' => Order::where('status', '=' , 0)->whereDate('created_at', '>=' , Carbon::now()->subMonth())->count(),
                'STATUS_PROCESSING' => Order::where('status', '=' , 1)->whereDate('created_at', '>=' , Carbon::now()->subMonth())->count(),
                'STATUS_COLLECTING' => Order::where('status', '=' , 2)->whereDate('created_at', '>=' , Carbon::now()->subMonth())->count(),
                'STATUS_CONFIRMED' => Order::where('status', '=' , 3)->whereDate('created_at', '>=' , Carbon::now()->subMonth())->count(),
                'STATUS_SHIPPING' => Order::where('status', '=' , 4)->whereDate('created_at', '>=' , Carbon::now()->subMonth())->count(),
                'STATUS_CANCELED' => Order::where('status', '=' , 5)->whereDate('created_at', '>=' , Carbon::now()->subMonth())->count(),
                'STATUS_COMPLETED' => Order::where('status', '=' , 6)->whereDate('created_at', '>=' , Carbon::now()->subMonth())->count(),
                'STATUS_RETURNED' => Order::where('status', '=' , 7)->whereDate('created_at', '>=' , Carbon::now()->subMonth())->count(),
                'STATUS_PAID' => Order::where('status', '=' , 8)->whereDate('created_at', '>=' , Carbon::now()->subMonth())->count(),
            ),
            'semi' => array(
                'orders' => Order::whereDate( 'created_at', '>=' , Carbon::now()->subMonths(6))->count(),
                'products' => Product::whereDate('created_at', '>=' , Carbon::now()->subMonths(6))->count(),
                'users' => User::whereDate('created_at', '>=' , Carbon::now()->subMonths(6))->count(),
                'orderTotal' => Order::whereDate('created_at', '>=' , Carbon::now()->subMonths(6))->sum('total'),
                'paymentTotal' => Payment::whereDate('created_at', '>=' , Carbon::now()->subMonths(6))->sum('amount_received'),
                'STATUS_PENDING' => Order::where('status', '=' , 0)->whereDate('created_at', '>=' , Carbon::now()->subMonths(6))->count(),
                'STATUS_PROCESSING' => Order::where('status', '=' , 1)->whereDate('created_at', '>=' , Carbon::now()->subMonths(6))->count(),
                'STATUS_COLLECTING' => Order::where('status', '=' , 2)->whereDate('created_at', '>=' , Carbon::now()->subMonths(6))->count(),
                'STATUS_CONFIRMED' => Order::where('status', '=' , 3)->whereDate('created_at', '>=' , Carbon::now()->subMonths(6))->count(),
                'STATUS_SHIPPING' => Order::where('status', '=' , 4)->whereDate('created_at', '>=' , Carbon::now()->subMonths(6))->count(),
                'STATUS_CANCELED' => Order::where('status', '=' , 5)->whereDate('created_at', '>=' , Carbon::now()->subMonths(6))->count(),
                'STATUS_COMPLETED' => Order::where('status', '=' , 6)->whereDate('created_at', '>=' , Carbon::now()->subMonths(6))->count(),
                'STATUS_RETURNED' => Order::where('status', '=' , 7)->whereDate('created_at', '>=' , Carbon::now()->subMonths(6))->count(),
                'STATUS_PAID' => Order::where('status', '=' , 8)->whereDate('created_at', '>=' , Carbon::now()->subMonths(6))->count(),
            ),
            'year' => array(
                'orders' => Order::whereDate('created_at', '>=' , Carbon::now()->subYear())->count(),
                'products' => Product::whereDate('created_at', '>=' , Carbon::now()->subYear())->count(),
                'users' => User::whereDate('created_at', '>=' , Carbon::now()->subYear())->count(),
                'orderTotal' => Order::whereDate('created_at', '>=' , Carbon::now()->subYear())->sum('total'),
                'paymentTotal' => Payment::whereDate('created_at', '>=' , Carbon::now()->subYear())->sum('amount_received'),
                'STATUS_PENDING' => Order::where('status', '=' , 0)->whereDate('created_at', '>=' , Carbon::now()->subYear())->count(),
                'STATUS_PROCESSING' => Order::where('status', '=' , 1)->whereDate('created_at', '>=' , Carbon::now()->subYear())->count(),
                'STATUS_COLLECTING' => Order::where('status', '=' , 2)->whereDate('created_at', '>=' , Carbon::now()->subYear())->count(),
                'STATUS_CONFIRMED' => Order::where('status', '=' , 3)->whereDate('created_at', '>=' , Carbon::now()->subYear())->count(),
                'STATUS_SHIPPING' => Order::where('status', '=' , 4)->whereDate('created_at', '>=' , Carbon::now()->subYear())->count(),
                'STATUS_CANCELED' => Order::where('status', '=' , 5)->whereDate('created_at', '>=' , Carbon::now()->subYear())->count(),
                'STATUS_COMPLETED' => Order::where('status', '=' , 6)->whereDate('created_at', '>=' , Carbon::now()->subYear())->count(),
                'STATUS_RETURNED' => Order::where('status', '=' , 7)->whereDate('created_at', '>=' , Carbon::now()->subYear())->count(),
                'STATUS_PAID' => Order::where('status', '=' , 8)->whereDate('created_at', '>=' , Carbon::now()->subYear())->count(),
            ),
        );

        return view('admin.home', compact('data' , 'orders_data','products_data','users_data'));
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