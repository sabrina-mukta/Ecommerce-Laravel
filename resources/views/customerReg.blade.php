    <style type="text/css">
    	body{
    		background: #f3f3f3;
    	}
    </style>
    <section id="home-icon" class="py-4 text-center">
      <div class="container">

        <div class="my-1 pb-2">
            <h2 class="text-left">Registration Form</h2>
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
			    <form action="customerInsert" method="post">
			    	@csrf
			    		<div class="row text-left">
					    			<div class="col-md-6 form-group">

				               <input type="text" class="form-control" name="customers_name" placeholder="Enter name" value="{{ old('customers_name') }}">

				                @error('customers_name')
				                  <small class="text-danger">{{ $message }}</small>
				                @enderror

				            </div>


				            <div class="col-md-6 form-group">
				               <input type="text" class="form-control" name="customers_username" placeholder="Enter username" value="{{ old('customers_username') }}">
				                @error('customers_username')
				                  <small class="text-danger">{{ $message }}</small>
				                @enderror
				            </div>

				            <div class="col-md-6 form-group">
				               <input type="text" class="form-control" name="customers_email" placeholder="Email address" value="{{ old('customers_email') }}">
				                @error('customers_email')
				                  <small class="text-danger">{{ $message }}</small>
				                @enderror

				            </div>


				            <div class="col-md-6 form-group">
				               <input type="text" class="form-control" name="customers_phone" maxlength="11" placeholder="Phone" value="{{ old('customers_phone') }}">
				                @error('customers_phone')
				                  <small class="text-danger">{{ $message }}</small>
				                @enderror
				            </div>

				            <div class="col-md-6 form-group">
				               <input type="password" class="form-control" name="customers_password" placeholder="Password" value="{{ old('customers_password') }}">
				                @error('customers_password')
				                  <small class="text-danger">{{ $message }}</small>
				                @enderror
				            </div>

				            <div class="col-md-6 form-group">
				               <input type="number" class="form-control" name="customers_zipcode" placeholder="Zip Code" value="{{ old('customers_zipcode') }}">
				                @error('customers_zipcode')
				                  <small class="text-danger">{{ $message }}</small>
				                @enderror
				            </div>

				            <div class="col-md-6 form-group">
				               <input type="text" class="form-control" name="customers_address_line" placeholder="Address line-1" value="{{ old('customers_address_line') }}">

				                @error('customers_address_line')
				                  <small class="text-danger">{{ $message }}</small>
				                @enderror

				            </div>


				            <div class="col-md-6 form-group">
				               <input type="text" class="form-control" name="customers_address_line_two" placeholder="Address line-2 (Optional)" value="{{ old('customers_address_line_two') }}">
				            </div>

				            <div class="col-md-6 form-group">
				               <input type="text" class="form-control" name="customers_district" placeholder="District" value="{{ old('customers_district') }}">
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
				            	<input type="submit" value="Submit" class="btn btn-dark float-left">
				            </div>
			    		</div>
			    </form>
	    	</div>

	    </div>
	    	
		</div>
	</section>