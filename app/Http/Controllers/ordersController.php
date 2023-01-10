<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\product;
use App\Models\customer;
use App\Models\cart;

class ordersController extends Controller
{
    public function confirmorder(){
        session_start();
        session_id();
        $getCartData = cart::where('cart_product_session_id',session_id())->orderby('cart_product_name','ASC')->get();

        $customers_id = session()->get('customers_id');

        $total = 0;

        foreach($getCartData as $data){

            $cart_product_id = $data->cart_product_id;
            $cart_product_name = $data->cart_product_name;
            $cart_product_image = $data->cart_product_image;
            $cart_product_qty = $data->cart_product_qty;
            $cart_product_price = $data->cart_product_price;

            $counttotal = $data->cart_product_qty*$data->cart_product_price;
            $price = $counttotal/100;
            $price = $price*10;
            $price = $price+$counttotal;

            orders::insert([
                'orders_customer_id'    => $customers_id,
                'orders_product_id'     => $cart_product_id,
                'orders_product_name'   => $cart_product_name,
                'orders_product_image'  => $cart_product_image,
                'orders_product_qty'    => $cart_product_qty,
                'orders_product_price'  => $price
            ]);

            $total += $price;
        }

        cart::where('cart_product_session_id',session_id())->delete();

        return redirect('/paymentSuccessfully')->with('confirmOderPrice',$total);

    }



    public function paymentSuccessfully(){
        session_start();
        $customers_id = session()->get('customers_id');

        $data['customerPaymentData'] = customer::where('customers_id',$customers_id)
        ->limit(1)
        ->get();

        echo view('inc.header');
        echo view('paymentSuccessfully',$data);
        echo view('inc.footer');
    }

    public function orderDelete($id){
        orders::where('orders_id',$id)->delete();
    }



    public function reportbytoday(Request $data){

        $data['actionData'] = $data->input('action');

        $data['todayorderData'] = orders::where('orders_date_only',date('Y-m-d'))
        ->where('order_work_status',3)
        ->orderby('orders_id','DESC')
        ->get();

        echo view('admin.inc.header');
        echo view('admin.inc.sidebar');
        echo view('admin.reportbytoday',$data);
        echo view('admin.inc.footer');

    }

    public function reportbydatewish(Request $data){

        $data['actionData'] = $data->input('action');

        $data['todayorderData'] = orders::where('orders_date_only',$data->input('data'))
        ->where('order_work_status',3)
        ->orderby('orders_id','DESC')
        ->get();

        echo view('admin.inc.header');
        echo view('admin.inc.sidebar');
        echo view('admin.reportbydatewish',$data);
        echo view('admin.inc.footer');

    }

    public function reportbydaterange(Request $add){

        $data['actionData'] = $add->input('action');

        $data['rangeData'] = orders::

        whereBetween('orders_date_only',[$add->input('date_start'), $add->input('date_end')])

        ->where('order_work_status',3)
        ->orderby('orders_id','DESC')
        ->get();

        echo view('admin.inc.header');
        echo view('admin.inc.sidebar');
        echo view('admin.reportbydaterange',$data);
        echo view('admin.inc.footer');

    }




    public function orderlist(){

        $data['orders_customer_id'] = orders::distinct()
        ->select('orders_customer_id')
        ->where('orders_status',1)
        ->orderby('orders_id','DESC')
        ->get();

        echo view('admin.inc.header');
        echo view('admin.inc.sidebar');
        echo view('admin.orderlist',$data);
        echo view('admin.inc.footer');
    }

    public function ordercomlist(){

        $data['orders_customer_id'] = orders::distinct()
        ->select('orders_customer_id')
        ->where('orders_status',2)
        ->where('order_work_status',2)
        ->orderby('orders_id','DESC')
        ->get();

        echo view('admin.inc.header');
        echo view('admin.inc.sidebar');
        echo view('admin.ordercomlist',$data);
        echo view('admin.inc.footer');
    }

    public function orderview($id){



        /*$data['orderCusoterJoinData'] = orders::join('customers', 'customers.customers_id', '=', 'orders.orders_customer_id')
            ->select('orders.*', 'customers.*')
            ->where('orders.orders_customer_id',$id)
            ->get();*/

            $data['orderDataList'] = orders::where('orders_customer_id',$id)
            ->where('orders_status',1)
            ->orderby('orders_id','DESC')
            ->get();

            $data['customerInfo'] = customer::where('customers_id',$id)
            ->limit(1)
            ->get();


        echo view('admin.inc.header');
        echo view('admin.inc.sidebar');
        echo view('admin.orderview',$data);
        echo view('admin.inc.footer');
    }



    public function ordercomview($id){

            $data['orderDataList'] = orders::where('orders_customer_id',$id)
            ->where('orders_status',2)
            ->where('order_work_status',2)
            ->orderby('orders_id','DESC')
            ->get();

            $data['customerInfo'] = customer::where('customers_id',$id)
            ->limit(1)
            ->get();


        echo view('admin.inc.header');
        echo view('admin.inc.sidebar');
        echo view('admin.ordercomview',$data);
        echo view('admin.inc.footer');
    }

    public function orderCompleted($id){

            $data['orderDataList'] = orders::where('orders_customer_id',$id)
            ->where('orders_status',2)
            ->where('order_work_status',3)
            ->orderby('orders_id','DESC')
            ->get();

            $data['customerInfo'] = customer::where('customers_id',$id)
            ->limit(1)
            ->get();

        echo view('admin.inc.header');
        echo view('admin.inc.sidebar');
        echo view('admin.orderCompleted',$data);
        echo view('admin.inc.footer');
    }


    public function ordercompletelist(){

         $data['orders_customer_id'] = orders::distinct()
        ->select('orders_customer_id')
        ->where('orders_status',2)
        ->where('order_work_status',3)
        ->orderby('orders_id','DESC')
        ->get();

        echo view('admin.inc.header');
        echo view('admin.inc.sidebar');
        echo view('admin.ordercompletelist',$data);
        echo view('admin.inc.footer');

    }


    public function orderShifted($id){

        orders::where('orders_id',$id)->update([
            'orders_status' => 2,
            'order_work_status' => 2,
        ]);

        return redirect()->back();
    }

    public function confirmComplteorder($id){
         orders::where('orders_customer_id',$id)
         ->where('order_work_status',2)
         ->update([
            'order_work_status' => 3,
        ]);

        return redirect()->back();
    }




}
