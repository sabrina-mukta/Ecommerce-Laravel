
 <div class="col-md-10">
  <div class="m-2 my-4">

    <div class="card my-4">
      

      <div class="card-body">
        <h3>Add Category</h3>
        <hr>
        @if(Session::get('success'))
          <p class="text-success h6 mb-3">{{Session::get('success')}}</p>
        @endif

        @if(Session::get('error'))
          <p class="text-danger h6">{{Session::get('error')}}</p>
        @endif

        <form action="addCategory" method="post">
          @csrf
          <div class="row">

            <div class="col-md-5">
              <select class="form-control" name="brand_id">
                <option value="">Select Brand</option>
                @foreach($brandData as $value)
                  <option value="{{$value->brand_id }}">{{$value->brand_name}}</option>
                @endforeach


              </select>
                @error('brand_id')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-5">
              <input type="text" class="form-control" name="category_name" placeholder="Category name" value="{{ old('category_name') }}">

            @error('category_name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            </div>

            <div class="col">
              <input type="submit" class="btn btn-primary" value="Save">
            </div>

          </div>
        </form>

      </div>
    </div>

    <div class="card my-2">
      

      <div class="card-body">
        <table id="example" class="display text-center" width="100%">
            <thead>
              <tr>
                <th width="10%">SL</th>
                <th width="30%">Category Name</th>
                <th width="30%">Brand Name</th>
                <th width="30%">Action</th>
              </tr>
            </thead>
            <tbody>

              <?php $i = 1; ?>
              @foreach($cbjoinData as $value)

              <tr>
                <td>{{$i++}}</td>
                <td>{{$value->category_name}}</td>
                <td>{{$value->brand_name}}</td>
                <td>
                  @if(session()->get('user_id') == 1)
                  <button class="btn btn-danger" data-toggle="modal" data-target="#deleteBrand" onclick="setId('{{$value->category_id}}')"><i class="fa fa-trash"></i></button>
                  @endif

                  <a href="{{url('/categoryUpdateShow/'.$value->category_id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
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

  <div class="modal fade" id="deleteBrand">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Brand Delete</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <p>Are you sure delete?</p>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="delId" onclick="deleteDdata(this.id)">Yes</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        </div>
        
      </div>
    </div>
  </div>




  <script type="text/javascript">




    function deleteDdata(id){
      var id = $("#"+id).val();
      $.ajax({
          url : "deleteCategory/"+id,
          processData : false,
          contentType : false,
          success : function(data){
            window.location.assign("categoryadd");
          }
      });
    }

    function setId(getId){
      $("#delId").val(getId);
    }
  

    

  </script>