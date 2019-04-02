<?php $__env->startSection('title'); ?>
User
<?php $__env->stopSection(); ?>

<?php $__env->startSection('activeUser'); ?>
active
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <br/>
    <br/>
    <br/>

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <section class="card">
                    <div class="card-header">
                        
                        <h3 class="center">Profile</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?php echo e(route('update-password')); ?>">
                            <?php echo csrf_field(); ?>

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right"><?php echo e(__('Old Password')); ?></label>

                                <div class="col-md-6">
                                    <input id="old_password" type="password"
                                           class="form-control<?php echo e($errors->has('old_password') ? ' is-invalid' : ''); ?>" name="old_password"
                                           value="<?php echo e(old('old_password')); ?>" required>
                                    <?php if(Session::get('message')): ?>
                                    <strong class="text-center text-danger" id="message"> <?php echo e(Session::get('message')); ?></strong>
                                    <?php endif; ?>
                                    <?php if($errors->has('old_password')): ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('old_password')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right"><?php echo e(__('New Password')); ?></label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>"
                                           name="password" title="Must contain at least one number and one uppercase and lowercase letter,spacial character and at least 6 or more characters" required>

                                    <?php if($errors->has('password')): ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right"><?php echo e(__('Confirm Password')); ?></label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>
                                    <span class="text-danger"><?php echo e($errors->has('password_confirmation') ? $errors->first('password_confirmation') : ' '); ?></span>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <input type="submit" value="Change Password" name="btn" class="btn btn-facebook btn-block"/>

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