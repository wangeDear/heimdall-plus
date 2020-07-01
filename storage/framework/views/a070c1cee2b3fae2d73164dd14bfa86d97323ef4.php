<?php $__env->startSection('content'); ?>

    <?php echo Form::open(array('route' => 'tags.store', 'id' => 'itemform', 'files' => true, 'method'=>'POST')); ?>

    <?php echo $__env->make('tags.form', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('tags.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>