    <style type="text/css">
    	body{
    		background: #f3f3f3;
    	}
    </style>
    <section id="home-icon" class="py-4 text-center">
      <div class="container">

        <div class="my-1 pb-2">
            <h2 class="text-left">Update Customer Information</h2>
            <hr>
            @if(Session::get('RegSuccess'))

  <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success! </strong>{{Session::get('RegSuccess')}}
  </div>
            @endif 

            @if(Session::get('regError'))

  <div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error! </strong>{{Session::get('regError')}}
  </div>
            @endif

        </div>

	
	    <div class="card">
	    	<div class="card-body">
	    		@foreach($customerData as $data)
			    <form action="customerUpdate" method="post">
			    	@csrf
			    		<div class="row text-left">
					    			<div class="col-md-6 form-group">

				               <input type="text" class="form-control" name="customers_name" placeholder="Enter name" value="{{$data->customers_name}}">

				               <input type="hidden" name="customers_id"  value="{{$data->customers_id}}">

				                @error('customers_name')
				                  <small class="text-danger">{{ $message }}</small>
				                @enderror

				            </div>


				            <div class="col-md-6 form-group">
				               <input type="text" class="form-control" name="customers_username" placeholder="Enter username" value="{{$data->customers_username}}">
				                @error('customers_username')
				                  <small class="text-danger">{{ $message }}</small>
				                @enderror
				            </div>


				            <div class="col-md-6 form-group">
				               <input type="text" class="form-control" name="customers_phone" maxlength="11" placeholder="Phone" value="{{$data->customers_phone}}">
				                @error('customers_phone')
				                  <small class="text-danger">{{ $message }}</small>
				                @enderror
				            </div>

				            <div class="col-md-6 form-group">
				               <input type="number" class="form-control" name="customers_zipcode" placeholder="Zip Code" value="{{$data->customers_zipcode}}">
				                @error('customers_zipcode')
				                  <small class="text-danger">{{ $message }}</small>
				                @enderror
				            </div>

				            <div class="col-md-6 form-group">
				               <input type="text" class="form-control" name="customers_address_line" placeholder="Address line-1" value="{{$data->customers_address_line}}">

				                @error('customers_address_line')
				                  <small class="text-danger">{{ $message }}</small>
				                @enderror

				            </div>


				            <div class="col-md-6 form-group">
				               <input type="text" class="form-control" name="customers_address_line_two" placeholder="Address line-2 (Optional)" value="{{$data->customers_address_line_two}}">
				            </div>

				            <div class="col-md-6 form-group">
				               <input type="text" class="form-control" name="customers_district" placeholder="District" value="{{$data->customers_district}}">
				                @error('customers_district')
				                  <small class="text-danger">{{ $message }}</small>
				                @enderror
				            </div>
				            <div class="col-md-6 form-group">
				               <input type="text" class="form-control" name="customers_country" placeholder="Country" readonly value="Bangladesh">
				                @error('customers_country')
				                  <small class="text-danger">{{ $message }}</small>
				                @enderror
				            </div>
				            <div class="col">
				            	<input type="submit" value="Update" class="btn btn-dark float-left">
				            </div>
			    		</div>
			    </form>
			    @endforeach
	    	</div>

	    </div>
	    	
		</div>
	</section>