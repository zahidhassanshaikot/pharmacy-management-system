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
                    <a><h3 class="center"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp Add New User</h3></a>
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
                                name="password"
                                title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters"
                                required>

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
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <section class="card">
                <div class="card-header">
                    
                    <h3 class="center"><?php echo e($roleRequested); ?></h3>
                </div>
                <div class="card-body">

                    
                        <table class="table table-striped" width="100%">
                            <tr class="">
                                <th scope="col">SL no</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <?php if (\Entrust::hasRole('Super Admin')) : ?>
                                <th scope="col">Action</th>
                                <?php endif; // Entrust::hasRole ?>
                            </tr>
                            <?php ($i = $userList->perPage() * ($userList->currentPage() - 1)); ?>
                            <?php $__currentLoopData = $userList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="">
                                <td data-title="SL no"><?php echo e(++$i); ?></td>
                                <td data-title="Name"><?php echo e($user->name); ?></td>
                                <td data-title="Email"><?php echo e($user->email); ?></td>
                                <?php if (\Entrust::hasRole('Super Admin')) : ?>
                                <td data-title="Action">

                                    <div class="row ">

                                        <div class="col-md-3">
                                            <span data-toggle="modal" data-target="#changeRole-<?php echo e($user->id); ?>">
                                                <a data-toggle="tooltip" href="#" title="Change User Role"
                                                data-placement="top"
                                                class="btn btn-warning btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </span>
                                    </div>
                                    <div class="col-md-3">
                                      <span data-toggle="modal" data-target="#changePassword-<?php echo e($user->id); ?>">
                                        <a data-toggle="tooltip" href="#" title="Change User Password"
                                        data-placement="top"
                                        class="btn btn-info btn-xs">
                                        <i class="fas fa-unlock-alt"></i>
                                        
                                        
                                    </a>
                                </span>
                            </div>
                            <div class="col-md-3">
                                
                            <a href="<?php echo e(route('delete-user-by-SAdmin',['id'=>$user->id])); ?>"
                             class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Delete User" onclick="return confirm('Are you sure?')">
                             <i class="fa fa-trash"></i>
                        </a>
                     </div>
                 </div>

             </td>
             <?php endif; // Entrust::hasRole ?>
         </tr>
         <div class="modal fade" id="changePassword-<?php echo e($user->id); ?>" role="dialog" tabIndex="-1">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title text-center">Change User Password</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo e(route('change-user-password-by-SAdmin')); ?>" method="post"
                        role="form"
                        class="contactForm">
                        <?php echo e(csrf_field()); ?>

                        <div class="row">
                            <div class=" col-md-3 form-group">
                                <label>Password</label>
                                <input type="hidden" value="<?php echo e($user->id); ?>" name="user_id">
                            </div>
                            <div class=" col-md-8 form-group">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-3 form-group">
                                <label>Confirm Password</label>
                            </div>
                            <div class=" col-md-8 form-group">
                                <input type="password" class="form-control" name="password_confirmation">
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
    </div>
    <div class="modal fade" id="changeRole-<?php echo e($user->id); ?>" role="dialog" tabIndex="-1">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Change User Role</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('change-user-role-by-SAdmin')); ?>" method="post"
                    role="form"
                    class="contactForm">
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class=" col-md-8 form-group">
                            <input type="hidden" value="<?php echo e($user->id); ?>" name="id">
                            
                            <select class="form-control" name="userRole">
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($role->name !='Super Admin'): ?>
                                <option value="<?php echo e($role->name); ?>"><?php echo e($role->name); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <input type="submit" class="btn btn-warning" value="Submit"
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
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

</div>


</section>
<div class="float-right">
    <?php echo e($userList->links()); ?>

</div>
</div>
</div>
</div>
<br/>&nbsp;
<br/>&nbsp;
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('back-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>