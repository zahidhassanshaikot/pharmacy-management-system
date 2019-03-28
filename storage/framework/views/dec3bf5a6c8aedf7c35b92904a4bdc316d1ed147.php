   

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
                <li><span>Customer Info</span></li>
            </ol>
    
            
        </div>
    
        <h2>Customer Info</h2>
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
                        <form action="<?php echo e(route('add-customer-info')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <?php echo e(csrf_field()); ?>



                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label"> Customer Name</label>
                                    </div>

                                    <div class="form-group col-md-9" >
                                        <input type="text" class="form-control"  name="customer_name" required>
                                        <span class="text-danger"><?php echo e($errors->has('customer_name') ? $errors->first('customer_name') : ' '); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label"> Customer Phone</label>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <input type="text" class="form-control" name="customer_phone" >
                                        <span class="text-danger"><?php echo e($errors->has('customer_phone') ? $errors->first('customer_phone') : ' '); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label"> customer_email</label>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <input type="email" class="form-control" name="customer_email">
                                        <span class="text-danger"><?php echo e($errors->has('customer_email') ? $errors->first('customer_email') : ' '); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label">Gender</label>
                                    </div> 
                                    <div class="form-group col-md-9">
                                        <select class="form-control" name="gender" >
                                            <option value="">Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option> 
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label">Date Of Birth</label>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <input type="date" class="form-control" name="date_of_birth">
                                        <span class="text-danger"><?php echo e($errors->has('date_of_birth') ? $errors->first('date_of_birth') : ' '); ?></span>
                                    </div>
                                </div>
                            </div>
          
                            <div class="form-group">
                                <div class="row">
                                    <label class="control-label col-md-3"></label>
                                    <div class="form-group col-md-9">
                                        <input type="submit" value="Next"
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



<?php $__env->stopSection(); ?>
<?php echo $__env->make('back-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>