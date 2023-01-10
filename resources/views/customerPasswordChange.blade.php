    @if(!Session::get('customerLogin'))
        <script type="text/javascript">
            window.location.assign('/isdb-ecommerce/project-isdb/public/');
        </script>
    @endif
    <style type="text/css">
    	body{
    		background: #f3f3f3;
    	}
    </style>

    <section id="home-icon" class="py-4 text-center">
      <div class="container">

   <div class="my-1 pb-2">

	    <div class="card">
	    	<div class="card-body my-5 py-5">

	    			<div class="row">
	    				<div class="col-md-6 mx-auto">
	    					<div class="card">
	    						<div class="card-body">
	    									<h4 class="text-left">Password Change</h4>
							    			<hr>
							    			@if(Session::get('passError'))
							    			<p class="text-center text-danger">{{Session::get('passError')}}</p>
							    			@endif

							    			@if(Session::get('passSuccess'))
							    			<p class="text-center text-success">{{Session::get('passSuccess')}}</p>
							    			@endif

							    			<form class="text-left" action="{{url('/passChange')}}" method="post">

							    				@csrf

							    				<div class="form-group">
							    					<input type="password" name="customers_password" placeholder="Old password" class="form-control" value="{{ old('customers_password') }}">
							                @error('customers_password')
							                  <small class="text-danger">{{ $message }}</small>
							                @enderror
							    				</div>

							    				<div class="form-group">
							    					<input type="password" name="customers_password_new" placeholder="New password" class="form-control" value="{{ old('customers_password_new') }}">
							    					@error('customers_password_new')
							                  <small class="text-danger">{{ $message }}</small>
							                @enderror
							    				</div>

							    				<div class="form-group">
							    					<input type="password" name="customers_password_confirm" placeholder="Retype password" class="form-control" value="{{ old('customers_password_confirm') }}">
							    					@error('customers_password_confirm')
							                  <small class="text-danger">{{ $message }}</small>
							                @enderror
							    				</div>
							    				<input type="submit" value="Change" class="btn btn-dark">

							    			</form>
	    						</div>
	    					</div>
	    				</div>
	    				
	    			</div>

	    	</div>

	    </div>
	    	
		</div>
	</section>