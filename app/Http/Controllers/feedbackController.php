<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\feedbackCustomer;

class feedbackController extends Controller
{
    public function messageSent(Request $add){

        $add->validate([
            'feedback_first_name'   => 'required',
            'feedback_last_name'    => 'required',
            'feedback_email'        => 'required',
            'feedback_phone'        => 'required',
            'feedback_message'      => 'required|max:300'
        ]);

        $data = $add->all();
        $row = feedbackCustomer::create($data);

        if ($row) {
                return redirect()->back()->with('msgSuccess','Message sent Successfully.');
        }else{
            return redirect()->back()->with('msgError','Message is not Successfully.');
        }

    }




    public function inbox(){
        $data['inboxData'] = feedbackCustomer::orderby('feedback_id','DESC')->get();
        echo view('admin.inc.header');
        echo view('admin.inc.sidebar');
        echo view('admin.inbox',$data);
        echo view('admin.inc.footer');

    }
}
