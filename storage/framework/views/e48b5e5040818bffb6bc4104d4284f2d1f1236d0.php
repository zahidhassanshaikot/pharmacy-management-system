   

<?php $__env->startSection('title'); ?>
Manage Stock
<?php $__env->stopSection(); ?>

<?php $__env->startSection('activeReport'); ?>
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
                <li><span>Product Report</span></li>
            </ol>
    
            
        </div>
    
        <h2>Manage Stock</h2>
    </header>

    <!-- start: page -->

    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class=" card panel-default">
                <div class="card-header">
                    <h3 class="center">Customers</h3>
                </div>
                <div class="card-body">

                    <table class="table table-borderedless table-striped mb-0" id="datatable-default">
                        <thead>
                        <tr class="text-primary">
                            <th>SL no</th>
                             
                            <th>Customer Name</th>
                            <th>Customer Phone No</th>
                            <th>Customer Email</th> 
                           
                           
                        </tr>
                        </thead>
                        <tbody>
                          <?php ($i = 0); ?>
                       <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(++$i); ?></td>
                                      
                                <td> <a href="<?php echo e(route('details-full-course',['id'=>$customer->id])); ?>" class="btn-link "> <?php echo e($customer-> customer_name); ?> </a></td>
                                <td><?php echo e($customer-> customer_phone); ?></td>
                                <td><?php echo e($customer-> customer_email); ?></td>
                                                    
  
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