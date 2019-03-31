   

<?php $__env->startSection('title'); ?>
Manage Stock
<?php $__env->stopSection(); ?>
<?php $__env->startSection('activeStock'); ?>
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
                <li><span>update Stock</span></li>
            </ol>
    
            
        </div>
    
        <h2>Update Stock</h2>
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
                        <form action="<?php echo e(route('update-product')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <?php echo e(csrf_field()); ?>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label"> Product Name</label>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <input type="text" class="form-control" value="<?php echo e($obj_product->product_name); ?>" name="product_name" required>
                                        <input type="hidden" class="form-control"value="<?php echo e($obj_product->id); ?>" name="product_id" required>
                                        <span class="text-danger"><?php echo e($errors->has('product_name') ? $errors->first('product_name') : ' '); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label"> Product Price</label>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <input type="text" class="form-control" value="<?php echo e($obj_product->product_price); ?>" name="product_price" required>
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
                                        <input type="text" class="form-control"value="<?php echo e($obj_product->product_quantity); ?>" name="product_quantity" required>
                                        <span class="text-danger"><?php echo e($errors->has('product_quantity') ? $errors->first('product_quantity') : ' '); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label class="control-label col-md-3"> Product Description</label>

                                    <div class="form-group col-md-9">
                                        <textarea class="form-control" name="product_description" ><?php echo e($obj_product->product_description); ?></textarea>
                                        <span class="text-danger"><?php echo e($errors->has('product_description') ? $errors->first('product_description') : ' '); ?></span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="row">
                                    <label class="control-label col-md-3"> Product Image</label>

                                    <div class="form-group col-md-9">
                                        <input type="file" class="form-control" title="Image Should be 400*400 px" name="product_image">
                                        <span class="text-danger"><?php echo e($errors->has('product_image') ? $errors->first('product_image') : ' '); ?></span>
                                         <?php if( $obj_product-> product_image!=null): ?>
                                        <img src="<?php echo e(asset($obj_product-> product_image)); ?>" class="img-thumbnail" alt="image" style="height:80px;wide:80px">
                                        <?php endif; ?> 
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="control-label col-md-3">publication status</label>

                                    <div class="form-group col-md-9">
                                        <label> <input type="radio" name="publication_status"
                                                       value="1" checked>Published</label>&nbsp;
                                        <label> <input type="radio" name="publication_status"
                                                       value="0">Unpublished</label>
                                        <span class="text-danger"><?php echo e($errors->has('publication_status') ? $errors->first('publication_status') : ' '); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="control-label col-md-3"></label>
                                    <div class="form-group col-md-9">
                                        <input type="submit" value="update Product Info"
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


   
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('back-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>