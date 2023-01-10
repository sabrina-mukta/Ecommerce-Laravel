<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\brand;

class categoryController extends Controller
{
    public function categoryadd(){

        $data['brandData'] = brand::orderby('brand_name','ASC')->get();

        $data['cbjoinData'] = category::join('brands', 'categories.brand_id', '=', 'brands.brand_id')
            ->select('categories.*', 'brands.brand_name')
            ->orderby('categories.category_name','ASC')
            ->get();

        echo view('admin.inc.header');
        echo view('admin.inc.sidebar');
        echo view('admin.categoryadd',$data);
        echo view('admin.inc.footer');
    }


    public function categoryUpdateShow($id){

        $data['catshowData'] = category::where('category_id',$id)->get();
        $data['brandshowData'] = brand::orderby('brand_name',"ASC")->get();

        echo view('admin.inc.header');
        echo view('admin.inc.sidebar');
        echo view('admin.catshowData',$data);
        echo view('admin.inc.footer');
    }

    public function categorydataupdate(Request $addData){

         category::where('category_id',$addData->input('category_id'))->update([
            'category_name' => $addData->input('category_name'),
            'brand_id' => $addData->input('brand_id')
         ]);
         return redirect('categoryadd');
    }

    /*public function categorylist(){
        echo view('admin.inc.header');
        echo view('admin.inc.sidebar');
        echo view('admin.categoryadd');
        echo view('admin.inc.footer');
    }*/

    public function addCategory(Request $add){

        $validated = $add->validate([
            'brand_id' => 'required',
            'category_name' => 'required|unique:categories'
        ]);

        $insert = category::insert([
            'brand_id'=>$add->input('brand_id'),
            'category_name'=>$add->input('category_name')
        ]);

        if ($insert) {
            return back()->with('success','Data insert successfully.');
        }else{
            return back()->with('error','Data not inserted.');
        }

    }


    public function deleteCategory($id){
       category::where('category_id',$id)->delete();
    }


}
