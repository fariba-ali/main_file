<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Permissions')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Permissions')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between w-100">
                        <h4><?php echo e(__('Manage Permissions')); ?></h4>
                        <a href="#" data-url="<?php echo e(route('permissions.create')); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Create New Permission')); ?>" class="btn btn-icon icon-left btn-warning btn-sm">
                            <i class="fa fa-plus"></i> <?php echo e(__('Create')); ?>

                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-body p-0">
                        <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                            <div class="table-responsive">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped table-bordered table-hover" id="dataTable">
                                            <thead>
                                            <tr>
                                                <th> <?php echo e(__('Permissions')); ?></th>
                                                <th class="" width="200px"> <?php echo e(__('Action')); ?></th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($permission->name); ?></td>

                                                    <td class="action">

                                                        <a href="#" class="mx-3 btn btn-sm align-items-center" data-url="<?php echo e(route('permissions.edit',$permission->id)); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Update permission')); ?>" class="btn btn-outline btn-xs blue-madison" data-bs-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>">
                                                            <i class="ti ti-edit text-white"></i>
                                                        </a>

                                                        <a href="#" class="mx-3 btn btn-sm align-items-center " data-bs-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($permission->id); ?>').submit();">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id],'id'=>'delete-form-'.$permission->id]); ?>

                                                        <?php echo Form::close(); ?>


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
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\main_file\resources\views/permission/index.blade.php ENDPATH**/ ?>
