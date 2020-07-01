<h2><?php echo e(__('app.apps.config')); ?> (<?php echo e(__('app.optional')); ?>) <?php echo $__env->make('items.enable', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?></h2>
<div class="items">
    <div class="input">
        <label><?php echo e(strtoupper(__('app.url'))); ?></label>
        <?php echo Form::text('config[override_url]', (isset($item) ? $item->getconfig()->override_url : null), array('placeholder' => __('app.apps.override'), 'id' => 'override_url', 'class' => 'form-control')); ?>

    </div>
    <div class="input">
        <button style="margin-top: 32px;" class="btn test" id="test_config">Test</button>
    </div>
</div>