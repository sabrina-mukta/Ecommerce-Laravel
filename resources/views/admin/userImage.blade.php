
<div class="col-md-10">
      <div class="card mt-5">
            <div class="card-body" style="max-height: 250px;margin: auto;">

      @if(session('errorImage'))
      <p class="text-danger text-center">{{session('errorImage')}}</p>
      @endif

                  <form method="post" action="imageUpload" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="user_id" value="{{session('user_id')}}">

                        <div class="form-group">
                              <label>Image</label>
                              <input type="file" name="user_image" class="form-control-file">
                        </div>
                        <input type="submit" value="Submit" class="btn btn-primary">
                  </form>
            </div>
      </div>
 </div>