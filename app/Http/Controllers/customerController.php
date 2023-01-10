<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\cart;
use App\Models\orders;

class customerController extends Controller
{
    
    public function customerInsert(Request $add){

        $add->validate([
            'customers_name'            => 'required',
            'customers_username'        => 'required',
            'customers_email'           => 'required|email|unique:customers',
            'customers_phone'           => 'required',
            'customers_password'        => 'required',
            'customers_zipcode'         => 'required',
            'customers_address_line'    => 'required',
            'customers_district'        => 'required',
            'customers_country'         =>'required'
        ]);

        $data = $add->all();
        $row = customer::create($data);

        if ($row) {
                return redirect()->back()->with('RegSuccess','Registation Successfully.');
        }else{
            return redirect()->back()->with('regError','Registation is not Successfully.');
        }

    }


    public function loginCustomer(Request $add){

        $customers_email      = trim($add->input('customers_email'));
        $customers_password   = trim($add->input('customers_password'));

        $row = customer::where('customers_email','=',$customers_email)
                    ->where('customers_password','=',$customers_password)
                    ->count();


        $result = customer::where('customers_email','=',$customers_email)
                    ->where('customers_password','=',$customers_password)
                    ->first();

        if ($row > 0) {
            session()->put('customerLogin',1);
            session()->put('customers_id', $result->customers_id);
           echo 1;
        }else{
            echo 0;
        }

    }


    public function customerLogOut(){
            session_start();
            cart::where('cart_product_session_id',session_id())
            ->delete();
            session()->flush('customerLogin');
            session()->flush('customers_id');
            return redirect()->back();
    }

    public function customerUpdateData(){

        $data['customerData'] = customer::where('customers_id',session()->get('customers_id'))
        ->limit(1)
        ->get();

        echo view('inc.header');
        echo view('customerUpdateData',$data);
        echo view('inc.footer');
    }


    public function customerPasswordChange(){
        echo view('inc.header');
        echo view('customerPasswordChange');
        echo view('inc.footer');
    }

    public function customerlist(){
        $data['customerData'] = customer::orderby('customers_id',"DESC")
        ->get();
        echo view('admin.inc.header');
        echo view('admin.inc.sidebar');
        echo view('admin.customerlist',$data);
        echo view('admin.inc.footer');
    }



    public function deleteCustomer($id){
        customer::where('customers_id',$id)
        ->delete();
    }



    public function passChange(Request $add){

        $add->validate([
            'customers_password' => 'required',
            'customers_password_new' => 'required|min:6|max:20',
            'customers_password_confirm' => 'required|min:6|max:20'
        ]);

        $cusPass = customer::where('customers_id',session()->get('customers_id'))
        ->value('customers_password');

        if ($cusPass !== $add->input('customers_password')) {
             return redirect()->back()->with('passError','Old Password wrong!');
        }else if($add->input('customers_password_confirm') !== $add->input('customers_password_new')){
            return redirect()->back()->with('passError','Confirm password no match!');
        }else{

            $row = customer::where('customers_id',session()->get('customers_id'))->update([
                'customers_password' => $add->input('customers_password_confirm')
            ]);

            if ($row) {
                return redirect()->back()->with('passSuccess','Password change Successfully.');
            }else{
                return redirect()->back()->with('passError','Password not changed!');
            }
            
        }


       /* $data = $add->all();
        $row = customer::create($data);

        if ($row) {
                return redirect()->back()->with('RegSuccess','Data update Successfully.');
        }else{
            return redirect()->back()->with('regError','Data update is not Successfully.');
        }*/


    }


    public function customerUpdate(Request $add){

        $add->validate([
            'customers_name'            => 'required',
            'customers_username'        => 'required',
            'customers_phone'           => 'required',
            'customers_zipcode'         => 'required',
            'customers_address_line'    => 'required',
            'customers_district'        => 'required',
            'customers_country'         =>'required'
        ]);

        $row = customer::where('customers_id',$add->input('customers_id'))->update([
            'customers_name' => $add->input('customers_name'),
            'customers_username' => $add->input('customers_username'),
            'customers_phone' => $add->input('customers_phone'),
            'customers_zipcode' => $add->input('customers_zipcode'),
            'customers_address_line' => $add->input('customers_address_line'),
            'customers_address_line_two' => $add->input('customers_address_line_two'),
            'customers_district' => $add->input('customers_district'),
            'customers_country' => $add->input('customers_country')

        ]);

        $data = $add->all();
        $row = customer::create($data);

        if ($row) {
                return redirect()->back()->with('RegSuccess','Data update Successfully.');
        }else{
            return redirect()->back()->with('regError','Data update is not Successfully.');
        }
    }


    public function customerProfile(){
            /*session_start();
            cart::where('cart_product_session_id',session_id())
            ->delete();
            session()->flush('customerLogin');
            session()->flush('customers_id');
            return redirect()->back();*/

        $data['customerData'] = customer::where('customers_id',session()->get('customers_id'))
        ->limit(1)
        ->get();

        $data['buyproductData'] = orders::where('orders_customer_id',session()->get('customers_id'))
        ->where('orders_status',1)
        ->orderby("orders_id","DESC")
        ->get();

        $data['buyproductDataComplete'] = orders::where('orders_customer_id',session()->get('customers_id'))
        ->where('orders_status',2)
        ->orderby("orders_id","DESC")
        ->get();

        echo view('inc.header');
        echo view('customerProfile',$data);
        echo view('inc.footer');
    }

    public function payment(){
        echo view('inc.header');
        echo view('payment');
        echo view('inc.footer');
    }

    public function offlinepayment(){

        $data['customerData'] = customer::where('customers_id',session()->get('customers_id'))
        ->limit(1)
        ->get();

        session_start();
        session_id();
        $data['cartProductfinalData'] = cart::where('cart_product_session_id',session_id())->orderby('cart_product_name','ASC')->get();

        echo view('inc.header');
        echo view('offlinepayment',$data);
        echo view('inc.footer');
    }

    
}
