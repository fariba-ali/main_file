<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('vacation')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Role')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card card-default ">
        <div class="card-header justify-content-between d-flex">
            <span class="mt-1" style="color: blue;font-weight: bold">All Vacations</span>
        </div>
        <div class="card-body">
            <?php if($errors->any()): ?>
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                        <use xlink:href="#exclamation-triangle-fill"/>
                    </svg>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <?php echo e($error); ?>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

         <?php if($allVacations->count()): ?>
                <table class="table table-borderless text-center " style="direction: rtl">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>user_name</th>
                        <th>user_id</th>
                        <th>fromH</th>
                        <th>untilH</th>
                        <th>AllHours</th>
                        <th>firstDay</th>
                        <th>lastDay</th>
                        <th>AllDays</th>
                        <th>edit</th>
                        <th>delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $allVacations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allVacation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($allVacation->id); ?></td>
                            <td><?php echo e($allVacation->user_name); ?></td>
                            <td><?php echo e($allVacation->user_id); ?></td>
                            <td><?php echo e($allVacation->fromH); ?></td>
                            <td><?php echo e($allVacation->untilH); ?></td>
                            <td><?php echo e(number_format($allVacation->untilH-$allVacation->fromH)); ?></td>
                            <td><?php echo e($allVacation->firstDay); ?></td>
                            <td><?php echo e($allVacation->lastDay); ?></td>
                            <td><?php echo e(number_format($allVacation->lastDay-$allVacation->firstDay)); ?></td>
                            <td>
                                <a href="<?php echo e(route('allVacations.edit',$allVacation->id)); ?>" class="btn btn-primary btn-sm">edit</a>
                            </td>
                            <td>
                                <form action="<?php echo e(route('allVacations.destroy',$allVacation->id)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-danger btn-sm">delete</button>

                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
             <?php else: ?>
                    <span class="text-danger">There is no vacation </span>
                <?php endif; ?>



        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\main_file\resources\views/allVacations/index.blade.php ENDPATH**/ ?>
