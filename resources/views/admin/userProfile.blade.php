<?php 

      $getUserId = session('user_id');
      use App\Models\user;
      $unidata = user::where('user_id','=',$getUserId)->first();


?>

<style type="text/css">


      @media print{
            html, body {
                  visibility: hidden;
                  height:100vh; 
                  margin: 0 !important; 
                  padding: 0 !important;
                  overflow: hidden;
            }

          .print{
              visibility: visible;
              border-collapse:collapse;
              border-spacing:0;
              top: 0;
              left: 0;
              position: absolute;
              width: 100%;
              margin-left: -100px;
          }

          .print_button{
            visibility: hidden;
          }

          @media page{
            size: a3;
          }
      }
</style>


<div class="col-md-10">
      <div class="card my-5 print">

            <div class="row p-5">
                  <div class="col-md-4 text-center">
                        <a href="changeimage">
                        <img style="height:200px;width: 200px" title="Change profile picture." src="{{$unidata->user_image}}" alt="User Profile" class="img-thumbnail rounded mx-auto rounded-circle">
                        </a>
                  </div>
                  <div class="col-md-8">
                        <div class="float-left">
                              <h3 class="my-2">User Profile</h3>
                        </div>
                        <div class="float-right print_button">
                              <button class="btn btn-primary" onclick="window.print()">Print</button>
                               <a href="{{url('/userprofileuniqUpdateshow/'.$unidata->user_id)}}" class="btn btn-primary">Update Profile</a>
                        </div>

                        <table class="table p-5">
                                    <tr>
                                          <td>Name</td>
                                          <td>:</td>
                                          <td>
                                                @if(isset($unidata->user_name)){{
                                                  $unidata->user_full_name
                                                }}@endif
                                          </td>
                                    </tr>

                                    <tr>
                                          <td>Username</td>
                                          <td>:</td>
                                          <td>
                                                @if(isset($unidata->user_name)){{
                                                  $unidata->user_name
                                                }}@endif
                                          </td>
                                    </tr>

                                    <tr>
                                          <td>Email</td>
                                          <td>:</td>
                                          <td>
                                                @if(isset($unidata->user_name)){{
                                                  $unidata->user_email
                                                }}@endif
                                          </td>
                                    </tr>

                                    <tr>
                                          <td>Phone</td>
                                          <td>:</td>
                                          <td>
                                                @if(isset($unidata->user_name)){{
                                                  $unidata->user_phone
                                                }}@endif
                                          </td>
                                    </tr>

                                    <tr>
                                          <td>Account Create Date</td>
                                          <td>:</td>
                                          <td>
                                                @if(isset($unidata->user_name)){{
                                                  date('d-F-Y',strtotime($unidata->user_creation_date))
                                                }}@endif
                                          </td>
                                    </tr>

                                    <tr>
                                          <td>Role</td>
                                          <td>:</td>
                                          <td>
                  @if(isset($unidata->user_status))

                        @if($unidata->user_status == 1)
                              Admin
                        @elseif($unidata->user_status == 2)
                              Editor
                        @else
                              Author
                        @endif

                  @endif
                                          </td>
                                    </tr>

                                    
                              </table>


                  </div>
            </div>
            
      </div>


      

 </div>