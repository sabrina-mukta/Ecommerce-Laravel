<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cart;

class cartController extends Controller
{
         public function cart(){
            session_start();
            session_id();
            $data['cartProductData'] = cart::where('cart_product_session_id',session_id())->orderby('cart_product_name','ASC')->get();
            echo view('inc.header');
            echo view('cart',$data);
            echo view('inc.footer');
        }


        public function cartupdate(Request $add){

            cart::where('cart_id',$add->input('cart_id'))
            ->update([
            	'cart_product_qty' => $add->input('cart_product_qty')
            ]);

           return redirect()->back();
        }

        public function cartDelete($id){

           cart::where('cart_id',$id)
           ->delete();
        }


}
