<!DOCTYPE html>
<html lang="en">
<head>
	<title>Table V01</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('Table_Responsive_v1') }}/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('Table_Responsive_v1') }}/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('Table_Responsive_v1') }}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('Table_Responsive_v1') }}/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('Table_Responsive_v1') }}/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('Table_Responsive_v1') }}/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('Table_Responsive_v1') }}/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('Table_Responsive_v1') }}/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
                            <th>SL no</th>
                            <th>Product Name</th>
                            <th>Company Name</th>
                            <th>Group Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Product Need</th>
                            <th> total </th>
                            {{--  <th>Action</th>  --}}
							</tr>
						</thead>
						<tbody>
                        @php($i = 0)
                        @php($sum = 0)
                        @foreach($cartProducts as $cartProduct)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>
                                          @if( $cartProduct->options-> image!=null)
                                    <img src="{{ asset($cartProduct->options-> image) }}" class="img-thumbnail" alt="image" style="height:50px;wide:50px">
                                    @else 
                                    <img src="{{ asset('images/medicine.png') }}" class="img-thumbnail" alt="image" style="height:50px;wide:50px">
                                    @endif
                                    {{ $cartProduct-> name}}</td>
                                <td>{{ $cartProduct->options-> company_name}}</td>
                                <td>{{ $cartProduct->options-> group_name}}</td>
                                <td>{{ $cartProduct-> price}}</td>
                                <td>{{ $cartProduct-> qty}}</td>
                                <td>{{ $cartProduct->options-> product_need}}</td>
                                <td>
                                    @php($sum+=$cartProduct-> qty* $cartProduct-> price) 
                                     
                                    {{ $cartProduct-> qty* $cartProduct-> price }}
                                </td>
                                {{--  <td>
                                    <a href="{{ route('delete-cart-item', ['rowId'=>$cartProduct->rowId]) }}"data-toggle="tooltip" data-placement="top"
                                       class="btn btn-danger btn-xs" title="Delete">
                                        <span class="fa fa-trash"></span>
                                    </a>
                                 </td>  --}}
                            </tr>
                        @endforeach 
							
					
								
						</tbody>
                    </table>
                    
                    <div class="card" style="margin-top: 20px" >
                         <div class="form-group card-body text-center"style="background-color:white; ">
                                {{--  <div class="row">  --}}
                                    {{--  <div class="col-md-6">  --}}
                                        <p class="h4 text-dark"> Total Cost: {{ $sum }}</p>
                                    {{--  </div>  --}}

                                {{--  </div>  --}}
                        </div>
                           
                    </div>
				</div>
			</div>
		</div>
	</div>




<!--===============================================================================================-->	
	<script src="{{ asset('Table_Responsive_v1') }}/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('Table_Responsive_v1') }}/vendor/bootstrap/js/popper.js"></script>
	<script src="{{ asset('Table_Responsive_v1') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('Table_Responsive_v1') }}/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="{{ asset('Table_Responsive_v1') }}/js/main.js"></script>
    

<script>

   setTimeout(function(){
       location.reload();
   },5000);

    {{-- setInterval(function(){
   $('#my_div').load('/');
}, 2000) /* time in milliseconds (ie 2 seconds)*/ --}}


</script>
</body>
</html>