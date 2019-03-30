   

<?php $__env->startSection('title'); ?>
Manage Stock
<?php $__env->stopSection(); ?>

<?php $__env->startSection('activeCustomerList'); ?>
active
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
                
                <li><span>Customer List</span></li>
            </ol>
    
            
        </div>
    
        <h2>Customer List</h2>
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
             
                <div class="container-fluid">
                    <div class="panel-body col-md-12 ">
                        <br/>
                    <section class="card">
									<header class="card-header">
										<div class="card-actions">
											<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
											<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
										</div>
						
										<h2 class="card-title">Basic</h2>
									</header>
									<div class="card-body">
										<table class="table table-borderedless table-striped mb-0" id="datatable-default">
											<thead>
												<tr>
													<th>Id</th>
													<th>Name</th>
													<th>Phone No</th>
													<th>Email</th>
													<th>Gender</th>
													<th>Address</th>
												</tr>
											</thead>
											<tbody>
											<?php $__currentLoopData = $obj_customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<tr>
													<td><?php echo e($customer->id); ?></td>
													<td><?php echo e($customer->customer_name); ?></td>
													<td><?php echo e($customer->customer_phone); ?></td>
													<td ><?php echo e($customer->customer_email); ?></td>
													<td ><?php echo e($customer->gender); ?></td>
													<td ><?php echo e($customer->address); ?></td>
												</tr>
		                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												
											</tbody>
										</table>
									</div>
								</section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('back-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>