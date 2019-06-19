   

<?php $__env->startSection('title'); ?>
Manage Stock
<?php $__env->stopSection(); ?>

<?php $__env->startSection('activeSaleProduct'); ?>
nav-expanded nav-active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<section role="main" class="content-body">
    <header class="page-header page-header-left-breadcrumb">
        <div class="right-wrapper">
            <ol class="breadcrumbs">
                <li>
                    <a href="<?php echo e(route('/')); ?>">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Layouts</span></li>
                <li><span>Sell Product</span></li>
            </ol>
    
            
        </div>
    
        <h2>Sell Product</h2>
    </header>

    <!-- start: page -->

    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <?php if(Session::get('message')): ?>
                <div class="alert alert-success" id="message">
                    <h3 class=" text-center text-success"> <?php echo e(Session::get('message')); ?></h3>
                </div>
            <?php endif; ?>
            
            <?php if(Session::get('er_message')): ?>
                <div class="alert alert-danger" >
                    <h3 class=" text-center text-danger"><?php echo e(Session::get('er_message')); ?> is not Available</h3>
                </div>
            <?php endif; ?>
            <div class=" card card-default">
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
             
                <div class="container">
                    <div class="panel-body col-md-12 ">
                        <br/>
                        <form action="<?php echo e(route('add-to-cart')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <?php echo e(csrf_field()); ?>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label"> Product Name</label>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <select class="form-control" name="product_id" onchange="productPrice(this.value)">
                                            <option value="">Select Product</option>
                                            <?php $__currentLoopData = $obj_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($product->id); ?>"><?php echo e($product->product_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
         
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label"> Product Price</label>
                                    </div>

                                    <div class="form-group col-md-9" id="product_price">
                                        <input type="text" class="form-control"  name="product_price" required>
                                        <span class="text-danger"><?php echo e($errors->has('product_price') ? $errors->first('product_price') : ' '); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label"> Product Quantity</label>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <input type="text" class="form-control" name="product_quantity" required>
                                        <span class="text-danger"><?php echo e($errors->has('product_quantity') ? $errors->first('product_quantity') : ' '); ?></span>
                                    </div>
                                </div>
                            </div>
          
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label">Total Product Need</label>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <input type="text" class="form-control" name="product_need" required>
                                        <span class="text-danger"><?php echo e($errors->has('product_need') ? $errors->first('product_need') : ' '); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label class="control-label col-md-3"></label>
                                    <div class="form-group col-md-9">
                                        <input type="submit" value="Add"
                                               class="btn btn-success btn-block" name="btn">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>






 <br/>
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class=" card panel-default">
                <div class="card-header">
                    <h3 class="center">Products</h3>
                </div>
                <div class="card-body">

                    <table class="table table-striped">
                        <tr class="text-primary">
                            <th>SL no</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Product need</th>
                            <th> total </th>
                            <th>Action</th>
                        </tr>
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
                                <td><?php echo e($cartProduct-> price); ?></td>
                                <td><?php echo e($cartProduct-> qty); ?></td>
                                <td><?php echo e($cartProduct->options-> product_need); ?></td>
                                <td>
                                    <?php ($sum+=$cartProduct-> qty* $cartProduct-> price); ?> 
                                     
                                    <?php echo e($cartProduct-> qty* $cartProduct-> price); ?>

                                </td>
                                <td>
                     
                                    
                                    <a href="<?php echo e(route('delete-cart-item', ['rowId'=>$cartProduct->rowId])); ?>"data-toggle="tooltip" data-placement="top"
                                       class="btn btn-danger btn-xs" title="Delete">
                                        <span class="fa fa-trash"></span>
                                    </a>
                                 </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    </table>
                    <div>
                         <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="h6 text-dark"> Total Cost: <?php echo e($sum); ?></p>
                                    </div>

                                </div>
                        </div>
                           
                    </div>
                 <div class="pull-right">
                        <a href="<?php echo e(route('remove-all-cart')); ?>"data-toggle="tooltip" data-placement="top"
                             class="btn btn-danger btn-xs" title="Delete">
                                <span class="fa fa-trash"></span> Remove All
                        </a>
                                    
                        <a href="#" data-toggle="modal" data-target="#vatAndDiscount"
                             class="btn btn-facebook btn-xs">
                         <span class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Invoice"></span> Invoice
                        </a>

                        <a href="<?php echo e(route('checkout',['id'=>$customer_id])); ?>"data-toggle="tooltip" data-placement="top"
                             class="btn btn-info btn-xs" title="Checkout">
                         <span class="fa fa-trash"></span> Checkout
                        </a>
                 </div>
                </div>

            </div>
        </div>
    </div>
    </div>





    
    <div class="modal fade" id="vatAndDiscount" role="dialog" tabIndex="-1">
        <div class="modal-dialog">

            <!-- Modal content-->
           <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title text-center">Add VAT And Discount</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo e(route('invoice')); ?>" method="post"
                        role="form"
                        class="contactForm">
                        <?php echo e(csrf_field()); ?>

                        <div class="row">
                            <div class=" col-md-3 form-group">
                                <label>VAT</label>
                                <input type="hidden" value="<?php echo e($customer_id); ?>" name="id">
                            </div>
                            <div class=" col-md-8 form-group">
                                <input type="number" class="form-control" name="vat">
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-3 form-group">
                                <label>Discount</label>
                            </div>
                            <div class=" col-md-8 form-group">
                                <input type="number" class="form-control" name="discount">
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-3 form-group">

                            </div>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-info float-right" value="Submit"
                                name="btn">
                            </div>
                        </div>
                    </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close
                </button>
            </div>
        </div>

    </div>







<script>

   

    


    function productPrice(id) {
        var xmlHttp = new XMLHttpRequest();
        var serverPage = 'http://127.0.0.1:8000/get-product-cost/'+id;
 //console.log(serverPage);
        xmlHttp.open('GET', serverPage);
        xmlHttp.onreadystatechange = function () {
             //console.log(xmlHttp.status == 200);
            if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                 //alert("Hello! I am an alert box!!");
                // console.log(xmlHttp.status == 200);
                document.getElementById('product_price').innerHTML = xmlHttp.responseText;
            }
        }
        xmlHttp.send(null);
    }
</script>
   
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('back-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>