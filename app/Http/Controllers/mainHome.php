<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;

class mainHome extends Controller
{
    public function home(){

        $data['productLatestData'] = product::orderby('product_id','DESC')
        ->limit(4)
        ->get();

        $data['categoryData'] = product::distinct()
        ->select('product_category_id')
        ->orderby('product_category_id','DESC')
        ->limit(4)
        ->get();

        $data['brandData'] = product::distinct()
        ->select('product_brand_id')
        ->limit(4)
        ->get();

        /*echo view('inc.header');
        echo view('inc.slider');*/
        return view('index', $data);
        /*echo view('inc.footer');*/
    }


    public function contact(){
        echo view('inc.header');
        echo view('contact');
        echo view('inc.footer');
    }


}
