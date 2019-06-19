<!DOCTYPE html>
<html lang="en">
<head>
	<title>Table V01</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo e(asset('Table_Responsive_v1')); ?>/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('Table_Responsive_v1')); ?>/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('Table_Responsive_v1')); ?>/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('Table_Responsive_v1')); ?>/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('Table_Responsive_v1')); ?>/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('Table_Responsive_v1')); ?>/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('Table_Responsive_v1')); ?>/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('Table_Responsive_v1')); ?>/css/main.css">
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
                            
							</tr>
						</thead>
						<tbody>
                        <?php ($i = 0); ?>
                        <?php ($sum = 0); ?>
                        <?php $__currentLoopData = $cartProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(++$i); ?></td>
                                <td>
                                          <?php if( $cartProduct->options-> image!=null): ?>
                                    <img src="<?php echo e(asset($cartProduct->options-> image)); ?>" class="img-thumbnail" alt="image" style="height:50px;wide:50px">
                                    <?php else: ?> 
                                    <img src="<?php echo e(asset('images/medicine.png')); ?>" class="img-thumbnail" alt="image" style="height:50px;wide:50px">
                                    <?php endif; ?>
                                    <?php echo e($cartProduct-> name); ?></td>
                                <td><?php echo e($cartProduct->options-> company_name); ?></td>
                                <td><?php echo e($cartProduct->options-> group_name); ?></td>
                                <td><?php echo e($cartProduct-> price); ?></td>
                                <td><?php echo e($cartProduct-> qty); ?></td>
                                <td><?php echo e($cartProduct->options-> product_need); ?></td>
                                <td>
                                    <?php ($sum+=$cartProduct-> qty* $cartProduct-> price); ?> 
                                     
                                    <?php echo e($cartProduct-> qty* $cartProduct-> price); ?>

                                </td>
                                
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
							
					
								
						</tbody>
                    </table>
                    
                    <div class="card" style="margin-top: 20px" >
                         <div class="form-group card-body text-center"style="background-color:white; ">
                                
                                    
                                        <p class="h4 text-dark"> Total Cost: <?php echo e($sum); ?></p>
                                    

                                
                        </div>
                           
                    </div>
				</div>
			</div>
		</div>
	</div>




<!--===============================================================================================-->	
	<script src="<?php echo e(asset('Table_Responsive_v1')); ?>/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(asset('Table_Responsive_v1')); ?>/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo e(asset('Table_Responsive_v1')); ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(asset('Table_Responsive_v1')); ?>/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="<?php echo e(asset('Table_Responsive_v1')); ?>/js/main.js"></script>
    

<script>

   setTimeout(function(){
       location.reload();
   },5000);

    


</script>
</body>
</html>