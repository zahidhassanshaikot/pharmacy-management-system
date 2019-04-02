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
                <?php if(Session::get('message')): ?>
                    <div class="alert alert-success" id="message">
                        <h3 class=" text-center text-success"> <?php echo e(Session::get('message')); ?></h3>
                    </div>
                <?php endif; ?>
                <section class="card">
                    <div class="card-header">

                        <h3 class="center">Profile</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?php echo e(route('update-admin-profile')); ?>" enctype='multipart/form-data'>
                            <?php echo csrf_field(); ?>

                            <div class="form-group row">
                                <label for="Name"
                                       class="col-md-4 col-form-label text-md-right"><?php echo e(__('Name')); ?></label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="border form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                                           name="name" value="<?php echo e(Auth::user()->name); ?>" required>

                                    <?php if($errors->has('name')): ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right"><?php echo e(__('Email')); ?></label>

                                <div class="col-md-6">
                                    <input id="old_password" type="text" value="<?php echo e(Auth::user()->email); ?>"
                                           class="border form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" readonly name="email"
                                           value="<?php echo e(old('email')); ?>" required>

                                    <?php if($errors->has('email')): ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone_no"
                                       class="col-md-4 col-form-label text-md-right"><?php echo e(__('Phone No')); ?></label>

                                <div class="col-md-6">
                                    <input id="phone_no" type="text" class="border form-control" value="<?php echo e(Auth::user()->phone_no); ?>"
                                           name="phone_no" required>
                                    <span class="text-danger"><?php echo e($errors->has('phone_no') ? $errors->first('phone_no') : ' '); ?></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address"
                                       class="col-md-4 col-form-label text-md-right"><?php echo e(__('Address')); ?></label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="border form-control" value="<?php echo e(Auth::user()->address); ?>"
                                           name="address" required>
                                    <span class="text-danger"><?php echo e($errors->has('address') ? $errors->first('address') : ' '); ?></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image"
                                       class="col-md-4 col-form-label text-md-right"><?php echo e(__('Profile Picture')); ?></label>

                                <div class="col-md-6">
                                    <input type="file" class="border form-control"
                                           name="image" accept="image/*" >
                                    <span class="text-danger"><?php echo e($errors->has('image') ? $errors->first('image') : ' '); ?></span>
                                </div>
                            </div>



                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <input type="submit" value="Save" name="btn" class="btn btn-info btn-block"/>

                                </div>
                            </div>
                        </form>
                    </div>
                </section>

            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('back-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>