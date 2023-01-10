<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\brand;
use App\Models\category;
use App\Models\cart;


class productController extends Controller
{

    public function productadd(){

        $data['brandData'] = brand::orderby('brand_name','ASC')->get();
        $data['categoryData'] = category::orderby('category_name','ASC')->get();

        /*$data['cbjoinData'] = category::join('brands', 'categories.brand_id', '=', 'brands.brand_id')
            ->select('categories.*', 'brands.brand_name')
            ->orderby('categories.category_name','ASC')
            ->get();*/

        echo view('admin.inc.header');
        echo view('admin.inc.sidebar');
        echo view('admin.productadd',$data);
        echo view('admin.inc.footer');
    }


    public function productlist(){

        $data['productData'] = product::join('categories', 'categories.category_id', '=', 'products.product_category_id')

            ->join('brands', 'brands.brand_id', '=', 'products.product_brand_id')

            ->select('products.*', 'brands.brand_name','categories.category_name')
            ->orderby('products.product_name','ASC')
            ->get();

        echo view('admin.inc.header');
        echo view('admin.inc.sidebar');
        echo view('admin.productlist',$data);
        echo view('admin.inc.footer');
    }


    public function addProduct(Request $add){

        $validated = $add->validate([
            'product_name' => 'required',
            'product_sort_des' => 'required',
            'product_regular_price' => 'required',
            'product_price' => 'required',
            'product_brand_id' => 'required',
            'product_category_id' => 'required',
            'product_image' => 'required',
            'product_description' => 'required'
        ]);

          $file = $add->file('product_image');
            $permission     = array("jpg","png","jpeg");
            $extension      = strtolower($file->getClientOriginalExtension());
            $destination    = "uploads/";
            $getFile        = time().".".$extension;
            $fullFile       = $destination.time().".".$extension;

            if (!in_array($extension, $permission)) {
               return back()->with('error','You can upload jpg, png formate.');
            }else{
                $file->move($destination, $getFile);
                $insert = product::insert([
                    'product_name'=>$add->input('product_name'),
                    'product_sort_des'=>$add->input('product_sort_des'),
                    'product_regular_price'=>$add->input('product_regular_price'),
                    'product_price'=>$add->input('product_price'),
                    'product_brand_id'=>$add->input('product_brand_id'),
                    'product_category_id'=>$add->input('product_category_id'),
                    'product_image'=>$fullFile,
                    'product_description'=>$add->input('product_description')
                ]);

                if ($insert) {
                    return back()->with('success','Data insert successfully.');
                }else{
                    return back()->with('error','Data not inserted.');
                }
            }

        }



        public function deleteProduct($id){
            
            $row = product::where('product_id',$id)->first();
            $product_image = $row->product_image;

            if (file_exists($product_image)) {
                unlink($product_image);
            }

           product::where('product_id',$id)->delete();
        }


        public function porductupdate($id){
            
            $data['productshowData'] = product::where('product_id',$id)->get();
            $data['categoryshowData'] = category::orderby('category_name',"ASC")->get();
            $data['brandshowData'] = brand::orderby('brand_name',"ASC")->get();

            echo view('admin.inc.header');
            echo view('admin.inc.sidebar');
            echo view('admin.porductupdate',$data);
            echo view('admin.inc.footer');
        }










        public function updateProduct(Request $add){


        $add->validate([
            'product_name' => 'required',
            'product_sort_des' => 'required',
            'product_regular_price' => 'required',
            'product_price' => 'required',
            'product_brand_id' => 'required',
            'product_category_id' => 'required',
            'product_description' => 'required'
        ]);

        if ($add->file('product_image')) {




            $file           = $add->file('product_image');
            $permission     = array("jpg","png","jpeg");
            $extension      = strtolower($file->getClientOriginalExtension());
            $destination    = "uploads/";
            $getFile        = time().".".$extension;
            $fullFile       = $destination.time().".".$extension;

            if (!in_array($extension, $permission)) {
               return back()->with('error','You can upload jpg,jpeg, png formate.');
            }else{

                $product_image = product::where("product_id",$add->input('product_id'))->value('product_image');
                @unlink($product_image);
                $file->move($destination, $getFile);
                $insert = product::where("product_id",$add->input('product_id'))->update([
                    'product_name'=>$add->input('product_name'),
                    'product_sort_des'=>$add->input('product_sort_des'),
                    'product_regular_price'=>$add->input('product_regular_price'),
                    'product_price'=>$add->input('product_price'),
                    'product_brand_id'=>$add->input('product_brand_id'),
                    'product_category_id'=>$add->input('product_category_id'),
                    'product_image'=>$fullFile,
                    'product_description'=>$add->input('product_description')
                ]);

                if ($insert) {
                    return redirect("productlist");
                }else{
                    return back()->with('error','Data not inserted.');
                }
            }

            
        }else{
            

        $insert = product::where("product_id",$add->input('product_id'))->update([
            'product_name'=>$add->input('product_name'),
            'product_sort_des'=>$add->input('product_sort_des'),
            'product_regular_price'=>$add->input('product_regular_price'),
            'product_price'=>$add->input('product_price'),
            'product_brand_id'=>$add->input('product_brand_id'),
            'product_category_id'=>$add->input('product_category_id'),
            'product_description'=>$add->input('product_description')
        ]);

         return redirect("productlist");



        }
            
    }









        public function category($id){

            $data['catbyIdData'] = product::where('product_category_id',$id)->orderby('product_id','DESC')->get();

            $data['catName'] = category::where('category_id',$id)
            ->get();

            echo view('inc.header');
            echo view('categoryIdby',$data);
            echo view('inc.footer');
        }





        public function shopingPage(){

            $data['productData'] = product::orderby('product_id','DESC')->get();

            echo view('inc.header');
            echo view('shopping',$data);
            echo view('inc.footer');
        }


        public function productview($id){

            $data['productData'] = product::join('categories', 'categories.category_id', '=', 'products.product_category_id')
            ->join('brands', 'brands.brand_id', '=', 'products.product_brand_id')
            ->select('products.*', 'brands.brand_name','categories.category_name')
            ->orderby('products.product_name','ASC')
            ->where('products.product_id',$id)
            ->limit(1)
            ->get();

            $data['categoryData'] = category::orderby('category_name','ASC')->get();


            echo view('inc.header');
            echo view('productview',$data);
            echo view('inc.footer');
        }


        public function customerReg(){

            /*$data['productData'] = product::join('categories', 'categories.category_id', '=', 'products.product_category_id')
            ->join('brands', 'brands.brand_id', '=', 'products.product_brand_id')
            ->select('products.*', 'brands.brand_name','categories.category_name')
            ->orderby('products.product_name','ASC')
            ->where('products.product_id',$id)
            ->limit(1)
            ->get();

            $data['categoryData'] = category::orderby('category_name','ASC')->get();*/


            echo view('inc.header');
            echo view('customerReg');
            echo view('inc.footer');
        }



        public function categorywishData(){

            /*$data['productData'] = product::join('categories', 'categories.category_id', '=', 'products.product_category_id')
            ->join('brands', 'brands.brand_id', '=', 'products.product_brand_id')
            ->select('products.*', 'brands.brand_name','categories.category_name')
            ->orderby('products.product_name','ASC')
            ->where('products.product_id',$id)
            ->limit(1)
            ->get();

            $data['categoryData'] = category::orderby('category_name','ASC')->get();*/

        /*$data['productLatestData'] = product::orderby('product_id','DESC')
        ->limit(4)
        ->get();*/


        $data['categoryData'] = category::distinct()
        ->select('category_id')
        ->get();


        /*$data['brandData'] = product::distinct()
        ->select('product_brand_id')
        ->limit(4)
        ->get();*/

            echo view('inc.header');
            echo view('categorywishData',$data);
            echo view('inc.footer');
        }



        public function brand(){

            /*$data['productData'] = product::join('categories', 'categories.category_id', '=', 'products.product_category_id')
            ->join('brands', 'brands.brand_id', '=', 'products.product_brand_id')
            ->select('products.*', 'brands.brand_name','categories.category_name')
            ->orderby('products.product_name','ASC')
            ->where('products.product_id',$id)
            ->limit(1)
            ->get();

            $data['categoryData'] = category::orderby('category_name','ASC')->get();*/

        /*$data['productLatestData'] = product::orderby('product_id','DESC')
        ->limit(4)
        ->get();*/


        $data['brandData'] = brand::distinct()
        ->select('brand_id')
        ->get();


        /*$data['brandData'] = product::distinct()
        ->select('product_brand_id')
        ->limit(4)
        ->get();*/

            echo view('inc.header');
            echo view('brand',$data);
            echo view('inc.footer');
        }



       /* public function search(Request $add){



            $data['searchResult'] = product::where('product_name','like','%'.$add->input('search'))
            ->get();

            $data['searchData'] = $add->input('search');

            echo view('inc.header');
            echo view('search',$data);
            echo view('inc.footer');
        }*/


        public function search(Request $add){

            $data['searchResult'] = product::where('product_name','like','%'.$add->input('search'))
            ->get();
            $data['searchData'] = $add->input('search');
            echo view('inc.header');
            echo view('search',$data);
            echo view('inc.footer');

        }

        public function buyproduct(Request $add){

            session_start();
            $session_id = session_id();

           $row = product::where('product_id',$add->input('product_id'))
            ->limit(1)
            ->first();

            $cart_product_id    = $row->product_id;
            $product_name       = $row->product_name;
            $product_image      = $row->product_image;
            $product_price      = $row->product_price;
            $qty                = $add->input('qty');

            $carRow = cart::where('cart_product_id',$add->input('product_id'))
            ->where('cart_product_session_id',session_id())
            ->limit(1)
            ->first();

        if ($carRow) {
                return redirect()->back()->with('product_added_exist','Product already added.');
        }else{

            $row = cart::insert([
                'cart_product_id' => $cart_product_id,
                'cart_product_name' => $product_name,
                'cart_product_image' => $product_image,
                'cart_product_price' => $product_price,
                'cart_product_session_id' => $session_id,
                'cart_product_qty' => $qty
            ]);

            if ($row) {
                return redirect("cart");
            }else{
                return redirect()->back()->with('product_added_error','Successfully added.');
            }

        }

            



        }





}
