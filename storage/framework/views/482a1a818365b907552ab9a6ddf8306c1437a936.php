<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('vender Vacation')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('vender vaction')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card ">
        <div class="card-header" style="color: blue;font-weight: bold">

            <?php if(isset($allVacation)): ?>
            Edit Vacation
            <?php else: ?>
            Create Vacation
            <?php endif; ?>

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

            <form action="<?php echo e(isset($allVacation)? route('venderVacation.update',$allVacation->id) : route('venderVacation.store')); ?>" method="post" >
                <?php echo csrf_field(); ?>
                <?php if(isset($allVacation)): ?>
                    <?php echo method_field('PUT'); ?>
                <?php endif; ?>

                <div class="mb-3">
                    <label for="fromh" class="form-label" style="font-weight: bold">from hours</label>
                    <input type="text" class="form-control" id="fromh" aria-describedby="emailHelp"
                           name="fromH" value="<?php echo e(isset($allVacation) ? $allVacation->fromH : ''); ?> ">
                </div>

                <div class="mb-3">
                    <label for="untilh" class="form-label" style="font-weight: bold">until hours</label>
                    <input type="text" class="form-control" id="untilh" aria-describedby="emailHelp"
                           name="untilH" value="<?php echo e(isset($allVacation) ? $allVacation->untilH : ''); ?> ">
                </div>
                <div class="mb-3">
                    <label for="firstday" class="form-label" style="font-weight: bold">First Day</label>
                    <input type="text" class="form-control" id="firstday" aria-describedby="emailHelp"
                           name="firstDay" value="<?php echo e(isset($allVacation) ? $allVacation->firstDay : ''); ?>">
                </div>
                <div class="mb-3">
                    <label for="lastday" class="form-label" style="font-weight: bold">last Day</label>
                    <input type="text" class="form-control" id="lastday" aria-describedby="emailHelp"
                           name="lastDay" value="<?php echo e(isset($allVacation) ? $allVacation->lastDay : ''); ?>">
                </div>

                <button type="submit" class="btn btn-primary ">
                    <?php if(isset($allVacation)): ?>
                        edit
                    <?php else: ?>
                        create
                    <?php endif; ?>

                </button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\main_file\resources\views/vender/vacation/create.blade.php ENDPATH**/ ?>