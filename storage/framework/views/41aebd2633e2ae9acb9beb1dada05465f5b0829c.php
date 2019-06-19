<?php $__env->startSection('title'); ?>
User
<?php $__env->stopSection(); ?>

<?php $__env->startSection('activeUser'); ?>
active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <section class="card">
                    <div class="card-header">
                        
                        <h3 class="center">Profile</h3>
                    </div>
                    <div class="card-body">

                        <?php if(Session::get('message')): ?>
                            <div class="alert alert-success" id="message">
                                <h3 class=" text-center text-success"> <?php echo e(Session::get('message')); ?></h3>
                            </div>
                        <?php endif; ?>
                        <div class="row">
                         <div class="col-md-8">
                            <table class="table" width="100%">
                                <tr class="">
                                    <th style="width: 50%" class="" scope="col">Name</th>
                                    <td style="width: 50%" data-title="Name"><?php echo e(Auth::user()->name); ?></td>

                                </tr>
                                <tr class="">
                                    <th scope="col">Email</th>
                                    <td data-title="Email"><?php echo e(Auth::user()->email); ?></td>
                                </tr>
                                <tr class="">
                                    <th scope="col">Phone No</th>
                                    <td data-title="Email"><?php echo e(Auth::user()->phone_no); ?></td>
                                </tr>
                                <tr class="">
                                    <th scope="col">Address</th>
                                    <td data-title="Email"><?php echo e(Auth::user()->address); ?></td>
                                </tr>
                                <tr class="">
                                    <th scope="col">Role</th>
                                    <td data-title="Role">
                                        <?php if(Auth::user()->hasRole('Super Admin')): ?>
                                        Super Admin
                                        <?php elseif(Auth::user()->hasRole('Admin')): ?>
                                        Admin
                                        <?php elseif(Auth::user()->hasRole('Editor')): ?>
                                        Editor
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr class="">
                                    <th scope="col">
                                        <a class="btn btn-block btn-facebook" href="<?php echo e(route('password-change')); ?>">Change Password</a>
                                    </th>
                                    <td data-title="">

                                        <a class="btn btn-block btn-info" href="<?php echo e(route('edit-admin-profile')); ?>">Edit Profile</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                         <div class="col-md-4 float-right">
                             <?php if(!empty(Auth::user()->image)): ?>
                            <img src="<?php echo e(asset(Auth::user()->image)); ?>" style="height: 300px;" class="img-thumbnail">
                            <?php else: ?>
                            <img src="<?php echo e(asset('images/d_profilePic.png')); ?>" style="height: 300px;" class="img-thumbnail">
                            <?php endif; ?>
                        </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('back-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>