
 <div class="col-md-10">
  <div class="m-2 my-4">
    <div class="card my-2">
      <div class="card-header">
        <h3>Customer feedback List</h3>
      </div>
      <div class="card-body">
        <table id="example" class="display" width="100%">
            <thead>
              <tr>
                <th width="10%">SL</th>
                <th width="20%">Name</th>
                <th width="20%">Email</th>
                <th width="20%">Phone</th>
                <th width="20%">Date</th>
                <th width="10%">Action</th>
              </tr>
            </thead>
            <tbody>

            <?php $i = 1; ?>

            @foreach($inboxData as $data)

            
              <tr>
                <td>{{$i++}}</td>
                <td>{{$data->feedback_first_name." ".$data->feedback_last_name}}</td>
                <td>{{$data->feedback_email}}</td>
                <td>{{$data->feedback_phone}}</td>
                <td><?php
                  echo date("h:i a d-M-y",strtotime($data->feedback_date));
              ?></td>
                
                <td>
                  <button data-target="#showFeedback" onclick='setId("{{$data->feedback_first_name}}","{{$data->feedback_last_name}}","{{$data->feedback_email}}","{{$data->feedback_phone}}","{{$data->feedback_message}}")' data-toggle="modal" class="btn btn-primary"><i class="fa fa-edit"></i></button>


                </td>
              </tr>

            @endforeach


            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>

  <!-- Modal for delete-->
  <div class="modal fade" id="showFeedback">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Message</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        
          <table class="table">
            <tr>
              <td>Name</td>
              <td>:</td>
              <td>
                <p class="m-0" id="name"></p>
              </td>
            </tr>
            <tr>
              <td>Email</td>
              <td>:</td>
              <td>
                <p class="m-0" id="email"></p>
              </td>
            </tr>
            <tr>
              <td>Phone</td>
              <td>:</td>
              <td>
                 <p class="m-0" id="phone"></p>
              </td>
            </tr>
            <tr>
              <td>Message</td>
              <td>:</td>
              <td>
                <p class="m-0" id="message"></p>
              </td>
            </tr>
          </table>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">





    function setId(firstname, lastname, email, phone, message){
      $("#name").html(firstname+" "+lastname);
      $("#email").html(email);
      $("#phone").html(phone);
      $("#message").html(message);
    }
  

    

  </script>