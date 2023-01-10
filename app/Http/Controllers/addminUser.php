<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;

class addminUser extends Controller
{
    public function adduser(){
        $data['li'] = user::orderby('user_id','DESC')->get();
        echo view('admin.inc.header');
        echo view('admin.inc.sidebar');
        echo view('admin.userAdd',$data);
        echo view('admin.inc.footer');
    }


    public function userInsert(Request $addData){

       $row = user::where('user_email', $addData->input('user_email'))->get();
       
        if (count($row) > 0) {
           echo 1;
        }else{
            $row = $addData->all();
            $result = user::create($row);
        }
    }



    public function userUpdate(Request $addData){

        user::where('user_id', $addData->input('user_full_id_up'))->update([
            'user_full_name'=>$addData->input('user_full_name_up'),
            'user_name'=>$addData->input('user_name_up'),
            'user_phone'=>$addData->input('user_phone_up'),
            'user_role_id'=>$addData->input('user_role_id_up')
        ]);

       /*$row = user::where('user_email', $addData->input('user_email'))->get();
       
        if (count($row) > 0) {
           echo 1;
        }else{
            $row = $addData->all();
            $result = user::create($row);
        }*/
    }



    public function userPassChnage(){
        echo view('admin.inc.header');
        echo view('admin.inc.sidebar');
        echo view('admin.userPassChnage');
        echo view('admin.inc.footer');
    }

    public function passwordChange(Request $add){


        $add->validate([
            'password_old' => 'required',
            'password_new' => 'required|min:6|max:20',
            'password_retype' => 'required|min:6|max:20'
        ]);

        $cusPass = user::where('user_id',session()->get('user_id'))
        ->value('user_password');

        if ($cusPass !== $add->input('password_old')) {
             return redirect()->back()->with('passError','Old Password wrong!');
        }else if($add->input('password_new') !== $add->input('password_retype')){
            return redirect()->back()->with('passError','Confirm password no match!');
        }else{

            $row = user::where('user_id',session()->get('user_id'))->update([
                'user_password' => $add->input('password_retype')
            ]);

            if ($row) {
                return redirect()->back()->with('passSuccess','Password change Successfully.');
            }else{
                return redirect()->back()->with('passError','Password not changed!');
            }
            
        }

    }



    public function userprofileuniqUpdateshow($id){
        $data['getUserDataShow'] = user::where('user_id',$id)
                    ->get();
        echo view('admin.inc.header');
        echo view('admin.inc.sidebar');
        echo view('admin.userDataShow',$data);
        echo view('admin.inc.footer');
    }


    public function userprofileuniqUpdate(Request $addData){
         user::where('user_id', $addData->input('user_id'))->update([
            'user_full_name'=>$addData->input('user_full_name'),
            'user_name'=>$addData->input('user_name'),
            'user_phone'=>$addData->input('user_phone')
        ]);
        return redirect('profile');
    }



    public function deleteUser($id){
        user::where('user_id',$id)->delete();
    }


    public function logout(){
            session()->flush('login');
            session()->flush('user_name');
            session()->flush('user_full_name');
            session()->flush('user_email');
            session()->flush('user_phone');
            session()->flush('user_role_id');
            return redirect('login');
    }


    public function changeimage(){
        echo view('admin.inc.header');
        echo view('admin.inc.sidebar');
        echo view('admin.userImage');
        echo view('admin.inc.footer');
    }

    public function profile(){
        echo view('admin.inc.header');
        echo view('admin.inc.sidebar');
        echo view('admin.userProfile');
        echo view('admin.inc.footer');
    }


    public function loginUser(Request $addData){
        //print_r($addData->input());

        $email      = trim($addData->input('email'));
        $password   = trim($addData->input('password'));

        $row = user::where('user_email','=',$email)
                    ->where('user_password','=',$password)
                    ->count();


        $result = user::where('user_email','=',$email)
                    ->where('user_password','=',$password)
                    ->first();

        if ($row > 0) {
            session()->put('login',1);
            session()->put('user_id', $result->user_id);
            session()->put('user_name', $result->user_name);
            session()->put('user_full_name', $result->user_full_name);
            session()->put('user_email', $result->user_email);
            session()->put('user_phone', $result->user_phone);
            session()->put('user_role_id', $result->user_role_id);
           echo 1;
        }else{
            echo 0;
        }



    }

    public function imageUpload(Request $image){

        $file = $image->file('user_image');

        if ($file == "") {
            return redirect()->back()->with('errorImage',"Please  select any image.");
        }else{
            $permission     = array("jpg","png");
            $extension      = strtolower($file->getClientOriginalExtension());
            $destination    = "uploads/";
            $getFile        = time().".".$extension;

            $fullFile       = $destination.time().".".$extension;

            if (!in_array($extension, $permission)) {
               return redirect()->back()->with('errorImage',"You can upload jpg, png formate.");
            }else{

                $row = user::where('user_id',$image->input('user_id'))->first();
                $user_image = $row->user_image;

                if (file_exists($user_image)) {
                    unlink($user_image);
                }
                $file->move($destination, $getFile);
                user::where('user_id',$image->input('user_id'))->update([
                    'user_image'=>$fullFile
                ]);
                return redirect('/profile');
            }
        }
    }


}
