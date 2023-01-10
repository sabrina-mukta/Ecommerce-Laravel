<?php 
  
  use App\Models\orders;
  use App\Models\customer;

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
  <div class="m-2 my-4">


        <div class="">
          <h3 class="d-inline-block">Range wish order report</h3>
          <button onclick="window.print()" class="float-right btn btn-primary">Print</button>
        </div>
        <hr>

        <div class="row">
          
          <div class="col-md-4 mx-auto">

            <h6 id="errmsg" class="text-center text-danger my-4"></h6>

            <form method="get" id="dateForm" class="text-center">
              <div class="form-group">
                <input type="hidden" name="action" value="datewish">
                <input type="date" name="date_start" id="date_start" class="form-control">
              </div>
              <div class="form-group">
                <input type="date" name="date_end" id="date_end" class="form-control">
              </div>
              <div class="form-group">
                <input type="submit" value="Get Report" class="btn btn-primary">
              </div>
            </form>

          </div>
          
        </div>

      <div class="row print">
        <div class="col-md-12">
           @if($actionData == "datewish")
           @if(count($rangeData) > 0)
          <div class="card">
            <div class="card-body">

              <p class="h5">Sales report list</p>
              
              <table class="table">
                <tr>
                  <th width="10%">SL</th>
                  <th width="20%">Product Name</th>
                  <th width="25%">Order Date</th>
                  <th width="20%">Qty</th>
                  <th width="25%">Price</th>
                </tr>
                <?php 
                  $i = 1;
                  $totalQty = 0;
                  $totalPrice = 0;
                ?>
                @foreach($rangeData as $data)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$data->orders_product_name}}</td>
                  <td>{{date('H:i a d-F-y',strtotime($data->orders_date))}}</td>
                  <td><?php 
                  $totalQty += $data->orders_product_qty;
                  echo $data->orders_product_qty;
                ?></td>
                  <td><?php 
                  $totalPrice += $data->orders_product_price;
                  echo $data->orders_product_price;
                ?></td>
                </tr>
                @endforeach
                 <tr>
                  <hr>
                  <th colspan="3" class="text-center">Sub Total</th>
                  <th>{{$totalQty}}</th>
                  <th>{{$totalPrice}}</th>
                </tr>
                
              </table>
            </div>
          </div>
          @else
            <hr>
            <h5 class="text-danger text-center">Data no found!</h5>
          @endif
          @endif
        </div>

      </div>
      


  </div>
</div>

<script type="text/javascript">

  $("#dateForm").submit(function(){
      var date_start  = $("#date_start").val();
      var date_end    = $("#date_end").val();

    if (date_start == "" || date_end == "") {
        return false;
    }else{
      if (date_start > date_end) {
        $("#errmsg").html("Invalid date range.");
        return false;
      }else{
        $("#errmsg").html("");
      }
    }


  });

  
</script>