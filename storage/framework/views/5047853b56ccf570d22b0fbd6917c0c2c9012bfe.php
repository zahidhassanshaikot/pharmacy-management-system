<?php $__env->startSection('title'); ?>
User
<?php $__env->stopSection(); ?>

<?php $__env->startSection('activeUser'); ?>
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
                <li><span>Layouts</span></li>
                <li><span>User Info</span></li>
            </ol>
    
            
        </div>
    
        <h2>User Info</h2>
    </header>

    <?php if(Auth::user()->hasRole(['Super Admin', 'Admin'])): ?>
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php if(Session::get('message')): ?>
                <div class="alert alert-success" id="message">
                    <h3 class=" text-center text-success"> <?php echo e(Session::get('message')); ?></h3>
                </div>
            <?php endif; ?>
            <div class=" panel panel-default">
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <div onclick="btnToggleFunction()" class="panel-header btn btn-default btn-block">
                    <a><h3 class="center"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Add New User</h3></a>
                </div>

                <div id="IdToggleBtn" style="display: none" class="panel-body ">
                    <br/>
                    <form method="POST" action="<?php echo e(route('register-new-user')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Name')); ?></label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                       class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name"
                                       value="<?php echo e(old('name')); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                   class="col-md-4 col-form-label text-md-right"><?php echo e(__('E-Mail Address')); ?></label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                       class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email"
                                       value="<?php echo e(old('email')); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                   class="col-md-4 col-form-label text-md-right"><?php echo e(__('Password')); ?></label>

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

                        <div class="form-group row">
                            <label for="user-type" class="col-md-4 col-form-label text-md-right">User Type</label>

                            <div class="col-md-6">
                                <select class="form-control" name="user_role">

                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($role->name !='Super Admin'): ?>
                                            <option value="<?php echo e($role->name); ?>"><?php echo e($role->name); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" name="btn" class="btn btn-facebook btn-block"/>

                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
   </div>
    <?php endif; ?>


    <br/>
    <br/>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 mb-3">
            <section class="card">
                <div class="card-header">
                    <h3 class="center">Manager</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-xl-12">
                            <table class="table table-striped">
                                <tr class="">
                                    <th>SL no</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    
                                </tr>
                                <?php ($i=1); ?>
                                <?php $__currentLoopData = $userEditors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userEditor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="">
                                        <th><?php echo e($i++); ?></th>
                                        <th><?php echo e($userEditor->name); ?></th>
                                        <th><?php echo e($userEditor->email); ?></th>
                                        
                                    </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                            <a href="<?php echo e(route('all-user-list',['role'=>'Manager'])); ?>" class="text-uppercase float-right">
                               (View all)</a>

                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-6 mb-3">
            <section class="card">
                <div class="card-header">
                    <h3 class="center">Admin</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-xl-12">
                            <table class="table table-striped">
                                <tr class="">
                                    <th>SL no</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    
                                </tr>
                                <?php ($i=1); ?>
                                <?php $__currentLoopData = $userAdmins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="">
                                        <th><?php echo e($i++); ?></th>
                                        <th><?php echo e($admin->name); ?></th>
                                        <th><?php echo e($admin->email); ?></th>
                                        
                                    </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                            <a href="<?php echo e(route('all-user-list',['role'=>'Admin'])); ?>" class="text-uppercase float-right">
                                (View all)</a>

                        </div>
                    </div>
                </div>
            </section>
        </div>

<div class="col-lg-6 mb-3">
            <section class="card">
                <div class="card-header">
                    <h3 class="center">Sells Man</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-xl-12">
                            <table class="table table-striped">
                                <tr class="">
                                    <th>SL no</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    
                                </tr>
                                <?php ($i=1); ?>
                                <?php $__currentLoopData = $userSellsMan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sellsMan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="">
                                        <th><?php echo e($i++); ?></th>
                                        <th><?php echo e($sellsMan->name); ?></th>
                                        <th><?php echo e($sellsMan->email); ?></th>
                                        
                                    </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                            <a href="<?php echo e(route('all-user-list',['role'=>'Salls Man'])); ?>" class="text-uppercase float-right">
                                (View all)</a>

                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
</div>

    <br/>
    <br/>
</section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('back-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>