<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\product;
use App\Models\customer;
use App\Models\cart;
use App\Models\user;
use App\Models\brand;
use App\Models\category;

class adminHome extends Controller
{
    public function addminPage(){

        $data['ordersCount'] = orders::where('orders_date_only',date('Y-m-d'))
        ->where('orders_status',2)
        ->where('order_work_status',3)
        ->get();


        $data['totalBalance'] = orders::where('orders_status',2)
        ->where('order_work_status',3)
        ->get();

        $data['userCount'] = user::count();
        $data['customerCount'] = customer::count();
        $data['productCount'] = product::count();
        $data['penddingOrdersCount'] = orders::where('orders_status',1)
        ->count();

        $data['penddingConfirmOrdersCount'] = orders::where('orders_status',2)
        ->where('order_work_status',2)
        ->count();

        $data['completeOrdersCount'] = orders::where('orders_status',2)
        ->where('order_work_status',3)
        ->count();

        $data['brandCount'] = brand::count();
        $data['categoryCount'] = category::count();

        echo view('admin.inc.header');
        echo view('admin.inc.sidebar');
        echo view('admin.index',$data);
        echo view('admin.inc.footer');
    }

    public function addminLogin(){
        echo view('admin.login');
    }
    
}
