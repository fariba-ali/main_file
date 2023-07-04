<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('allVacations')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Role')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card ">
        <div class="card-header" style="color: blue;font-weight: bold">
            Edit Vacation
        </div>
        <div class="card-body">
            <?php if($errors->any()): ?>
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill"/>
                    </svg>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div><?php echo e($error); ?></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('allVacations.update',$vacation->id)); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="mb-3">
                    <div class="mb-3">
                        <label for="username" class="form-label" style="font-weight: bold">user name</label>
                        <input type="text" class="form-control" id="username" aria-describedby="emailHelp"
                               name="user_name" value="<?php echo e($vacation->user_name); ?> ">
                    </div>
                    <div class="mb-3">
                        <label for="userid" class="form-label" style="font-weight: bold">user id</label>
                        <input type="text" class="form-control" id="userid" aria-describedby="emailHelp"
                               name="user_id" value="<?php echo e($vacation->id); ?> ">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="fromh" class="form-label" style="font-weight: bold">from hours</label>
                    <input type="text" class="form-control" id="fromh" aria-describedby="emailHelp"
                           name="fromH" value="<?php echo e($vacation->fromH); ?> ">
                </div>

                <div class="mb-3">
                    <label for="untilh" class="form-label" style="font-weight: bold">until hours</label>
                    <input type="text" class="form-control" id="untilh" aria-describedby="emailHelp"
                           name="untilH" value="<?php echo e($vacation->untilH); ?> ">
                </div>
                <div class="mb-3">
                    <label for="firstday" class="form-label" style="font-weight: bold">First Day</label>
                    <input type="text" class="form-control" id="firstday" aria-describedby="emailHelp"
                           name="firstDay" value="<?php echo e($vacation->firstDay); ?>">
                </div>
                <div class="mb-3">
                    <label for="lastday" class="form-label" style="font-weight: bold">last Day</label>
                    <input type="text" class="form-control" id="lastday" aria-describedby="emailHelp"
                           name="lastDay" value="<?php echo e($vacation->lastDay); ?>">
                </div>

                <button type="submit" class="btn btn-primary ">
                    edit
                </button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\main_file\resources\views/allVacations/create.blade.php ENDPATH**/ ?>
