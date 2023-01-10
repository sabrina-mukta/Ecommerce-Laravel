    <section id="home-icon" class="py-5 text-center">
      <div class="container">

        <div class="my-2 pb-2">
            <h2 class="text-left">Your Cart</h2>
            <hr>
        </div>

	    <div class="row">
	    	@if(count($cartProductData) > 0)
	    	<div class="col">
	    		<table class="table">
	    			<thead>
	    				<tr style="background: #666666;color: #fff;">
	    					<th width="10%">SL</th>
	    					<th width="20%">Product Name</th>
	    					<th width="15%">Image</th>
	    					<th width="10%">Price</th>
	    					<th width="20%">Quantity</th>
	    					<th width="10%">Total Price</th>
	    					<th width="15%">Action</th>
	    				</tr>
	    			</thead>
	    			<tbody>

	    			<?php

	    			 $i = 1;
	    			 $totalValue = 0;

	    			?>

	    			
	  				@foreach($cartProductData as $data)

	    				<tr>
	    					<td>{{$i++}}</td>
	    					<td>{{substr($data->cart_product_name, 0, 20)}}</td>
	    					<td><img height="40px" width="40px" src="{{$data->cart_product_image}}"></td>
	    					<td>TK. {{$data->cart_product_price}}</td>
	    					<td>

	    <form style="width: 160px;" action="{{url('/cartupdate')}}" method="post">
	    	@csrf
	    			<div class="input-group input-group-sm">
	    		
	    		<input type="hidden" name="cart_id" value="{{$data->cart_id}}">

	    		<input type="number" name="cart_product_qty" min="1" max="100" class="form-control" value="{{$data->cart_product_qty}}">

	    		<div class="input-group-append">
	    			<input type="submit" class="btn btn-primary" value="Update">
	    		</div>
	    			</div>
	    </form>
	    					<?php 

	    						$totalValue += $data->cart_product_price*$data->cart_product_qty

	    					?>
	    					</td>
	    					<td>TK. {{

	    							$data->cart_product_price*$data->cart_product_qty

	    					}}</td>
	    					<td>
	    						<button class="btn btn-danger" data-toggle="modal" onclick="setId('{{$data->cart_id}}')" data-target="#deleteBrand"><i style="font-size: 18px;" class="fa fa-trash"></i></button>
	    					</td>
	    				</tr>
	    				@endforeach
	    				



	    				

	    			</tbody>
	    		</table>
	    		<hr>
	    		<div class="">
	    			
	    			<table style="float: right;margin-right: 150px;font-size: 18px;">
	    				<tr>
	    					<th width="40%">Sub Total</th>
	    					<th width="20%">:</th>
	    					<th width="40%">{{$totalValue}} TK</th>
	    				</tr>
	    				<tr>
	    					<th>Vat</th>
	    					<th>:</th>
	    					<th><?php 

	    						$toVat = (int)$totalValue;
	    						$vat = $toVat/100;
	    						$vat *= 10;
	    						echo $vat;

	    				?> TK</th>
	    				</tr>
	    				<tr>
	    					<th>Grand Total</th>
	    					<th>:</th>
	    					<th>{{$totalValue+$vat}} TK</th>
	    				</tr>
	    			</table>

	    		</div>
	    	</div>
	    	<div class="col-md-12">
	    		<hr>
	    		<div class="row mt-5 mb-5">
	    			<div class="col-md-6">
	    				<a href="{{url('/shoping')}}" class="btn btn-outline-info">Continue Shopping</a>
	    			</div>

	    			@if(Session::get('customerLogin'))

             <div class="col-md-6">
	    				<a href="{{url('/payment')}}" class="btn btn-outline-primary">Check Out</a>
	    			</div>

            @else

            <div class="col-md-6">
	    				<a class="btn btn-outline-primary" data-toggle="modal" data-target="#loginModal" href="">Login</a>
	    			</div>

     

            @endif

	    			


	    		</div>
	    		<hr>
	    	</div>
	    	@else
	    	<script type="text/javascript">
	    		window.location.assign('shoping');
	    	</script>
	    	@endif
	    </div>
		</div>
	</section>


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
          url : "cartDelete/"+id,
          processData : false,
          contentType : false,
          success : function(data){
            window.location.assign("cart");
          }
      });
    }

    function setId(getId){
      $("#delId").val(getId);
    }
  

    

  </script>