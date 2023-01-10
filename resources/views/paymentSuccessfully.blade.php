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

	   <div class="row">
	   	<div class="col-md-6 mx-auto">
		   	<div class="card">
		    	<div class="card-body my-5 py-5">

		    		<h5 class="text-success">Order Success!</h5>
		    		<hr>

		    			@foreach($customerPaymentData as $data)
		    			 <p class="m-0">Your total price (include vat) : 
		    			 	@if(Session::get('confirmOderPrice'))
		    			 		{{Session::get('confirmOderPrice')}} taka.
		    			 	@else
		    			 		<script type="text/javascript">
		    			 			window.location.assign("shoping");
		    			 		</script>
		    			 	@endif
		    			 </p>	
		    			 <p class="m-0">Thank you <strong>{{$data->customers_name}}</strong> for your purchase.</p>
		    			 <p class="m-0">Receive your order successfully. We will contact you as soon as with delivery details. Here is your order details....<a href="{{url('/customerProfile')}}">Visit Here</a></p>
		    			@endforeach
		    	</div>
		    </div>
	   	</div>
	   </div>
	    	
		</div>
	</section>