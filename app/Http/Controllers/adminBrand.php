<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\brand;

class adminBrand extends Controller
{

    public function addBrand(){

        $data['li'] = brand::orderby('brand_name','ASC')->get();

        echo view('admin.inc.header');
        echo view('admin.inc.sidebar');
        echo view('admin.brandAdd',$data);
        echo view('admin.inc.footer');
    }

    public function brandInsert(Request $addData){

        $row = brand::where('brand_name', $addData->input('brand_name'))->get();

        if (count($row) > 0) {
           echo 1;
        }else{
            $row = $addData->all();
            $result = brand::create($row);
        }

        
    }


    public function brandUpdate(Request $addData){

        //print_r($addData->input());

        $data = brand::where('brand_id', $addData->input('brand_id'))->value('brand_name');

        $row = brand::where('brand_name', $addData->input('brand_name_up'))->get();

        if ($data == $addData->input('brand_name_up')) {
           echo 0;
        }else if(count($row) > 0){
           echo 1;
        }else{
             $result = brand::where('brand_id',  $addData->input('brand_id'))->update([
                'brand_name' => $addData->input('brand_name_up')
            ]);
        }


       
    }


/*    public function brandUpdate(Request $addData){

        //print_r($addData->input());

        $result = brand::where('brand_id',  $addData->input('brand_id'))->update([
            'brand_name' => $addData->input('brand_name_up')
        ]);
    }*/

    

    public function deleteBand($id){
        brand::where('brand_id',$id)->delete();
    }


}
