<?php $__env->startSection('content'); ?>

    <?php echo Form::model($user, ['method' => 'PATCH', 'id' => 'userform', 'files' => true, 'route' => ['users.update', $user->id]]); ?>

    <?php echo $__env->make('users.form', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>