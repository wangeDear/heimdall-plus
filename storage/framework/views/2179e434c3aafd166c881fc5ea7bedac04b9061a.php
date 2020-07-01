<?php $__env->startSection('content'); ?>
    <div class="toggleinput" style="position: relative;left: 34rem;">
        <label class="name" id="switch_url_label">内网地址</label>
        <label class="switch">
            <input type="checkbox" id="www_switch" name="www_switch" value="1" checked="checked">
            <span class="slider round"></span>
        </label>
    </div>


    <?php echo $__env->make('partials.search', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php if($apps->first()): ?>
        <?php echo $__env->make('sortable', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>        
    <?php else: ?>
    <div class="message-container2">
            <div class="alert alert-danger">
                    <p><?php echo __('app.dash.no_apps', 
                        [
                            'link1' => '<a href="'.route('items.create', []).'">'.__('app.dash.link1').'</a>', 
                            'link2' => '<a id="pin-item" href="">'.__('app.dash.link2').'</a>'
                        ]); ?></p>
                    </div>
                    
    </div>
        <div id="sortable">
        <?php echo $__env->make('add', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    <?php endif; ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>