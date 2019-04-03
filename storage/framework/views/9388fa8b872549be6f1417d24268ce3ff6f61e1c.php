   

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
                <li><span>Manage Stock</span></li>
            </ol>
    
            
        </div>
    
        <h2>Manage Stock</h2>
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
                <div onclick="btnToggleFunction()" class="panel-header btn btn-default btn-block" style="padding: 0px 6px;font-size: 12px;">
                    <a><h4 class="center"><i class="fa fa-plus" aria-hidden="true" ></i> &nbsp Add New Product</h4></a>
                </div>
                <div class="container">
                    <div id="IdToggleBtn" style="display:none" class="panel-body col-md-12 ">
                        <br/>
                        <form action="<?php echo e(route('add-product')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <?php echo e(csrf_field()); ?>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label"> Product Name</label>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <input type="text" class="form-control" name="product_name" required>
                                        <span class="text-danger"><?php echo e($errors->has('product_name') ? $errors->first('product_name') : ' '); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label">Company Name</label>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <input type="text" class="form-control" name="company" required>
                                        <span class="text-danger"><?php echo e($errors->has('company') ? $errors->first('company') : ' '); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label">Group Name</label>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <input type="text" class="form-control" name="product_group" required>
                                        <span class="text-danger"><?php echo e($errors->has('product_group') ? $errors->first('product_group') : ' '); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label"> Product Price</label>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <input type="text" class="form-control" name="product_price" required>
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
                                    <label class="control-label col-md-3"> Product Description</label>

                                    <div class="form-group col-md-9">
                                        <textarea class="form-control" name="product_description" ></textarea>
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
                                        <input type="submit" value="Save Product Info"
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

                    <table class="table table-borderedless table-striped mb-0" id="datatable-default">
                        <thead>
                        <tr class="text-primary">
                            <th>SL no</th>
                            <th>Product Name</th>
                            <th>Company Name</th>
                            <th>Group Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Product description</th>
                            <th>Product Image</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php ($i = 0); ?>
                       <?php $__currentLoopData = $obj_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(++$i); ?></td>
                                <td><?php echo e($product-> product_name); ?></td>
                                <td><?php echo e($product-> company_name); ?></td>
                                <td><?php echo e($product-> group_name); ?></td>
                                <td><?php echo e($product-> product_price); ?></td>
                                <td><?php echo e($product-> product_quantity); ?></td>
                                <td><?php echo e($product-> product_description); ?></td>
                                <td>
                                    <?php if( $product-> product_image!=null): ?>
                                    <img src="<?php echo e(asset($product-> product_image)); ?>" class="rounded-circle" alt="image" style="height:50px;wide:50px">
                                    <?php else: ?> 
                                    <img src="<?php echo e(asset('images/medicine.png')); ?>" class="rounded-circle" alt="image" style="height:50px;wide:50px">
                                    <?php endif; ?>
                                    </td>
                                <td><?php echo e($product-> publication_status==1 ? 'Published':'Unpublished'); ?></td>

                                <td>
                                    <?php if($product-> publication_status==1): ?>
                                        <a href="<?php echo e(route('unpublished-product',['id'=>$product->id])); ?>" data-toggle="tooltip" data-placement="top"
                                           class="btn btn-info btn-xs" title="Unpublished">
                                            <span class="fa fa-arrow-up"></span>
                                        </a>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('published-product',['id'=>$product->id])); ?>" data-toggle="tooltip" data-placement="top"
                                           class="btn btn-warning btn-xs"title="Published">
                                            <span class="fa fa-arrow-down"></span>
                                        </a>
                                    <?php endif; ?>
                                    <a href="<?php echo e(url('admin/product/edit/'.$product->id)); ?>" data-toggle="tooltip" data-placement="top"
                                       class="btn btn-success btn-xs" title="Edit">
                                        <span class="fa fa-edit"></span>
                                    </a> 
                                    <a href="<?php echo e(route('delete-product',['id'=>$product->id])); ?>"data-toggle="tooltip" data-placement="top"
                                       class="btn btn-danger btn-xs" title="Delete">
                                        <span class="fa fa-trash"></span>
                                    </a>
                                 </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        </tbody>
                    </table>
                 
                </div>

            </div>
        </div>
    </div>
    </div>

   
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('back-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>