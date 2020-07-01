    <section class="module-container">
        <header>
            <div class="section-title"><?php echo e(__('app.apps.add_tag')); ?></div>
            <div class="module-actions">
                <button type="submit"class="button"><i class="fa fa-save"></i><span><?php echo e(__('app.buttons.save')); ?></span></button>
                <a href="<?php echo e(route('tags.index', [])); ?>" class="button"><i class="fa fa-ban"></i><span><?php echo e(__('app.buttons.cancel')); ?></span></a>
            </div>
        </header>
        <div id="create" class="create">
            <?php echo csrf_field(); ?>


            <div class="input">
                <label><?php echo e(__('app.apps.tag_name')); ?> *</label>
                <?php echo Form::text('title', null, array('placeholder' => __('app.apps.title'), 'class' => 'form-control')); ?>

                <hr />
                <label><?php echo e(__('app.apps.pinned')); ?></label>
                <?php echo Form::hidden('pinned', '0'); ?>

                <label class="switch">
                    <?php
                    $checked = false;
                    if(isset($item->pinned) && (bool)$item->pinned === true) $checked = true;
                    $set_checked = ($checked) ? ' checked="checked"' : '';
                    ?>                   
                    <input type="checkbox" name="pinned" value="1"<?php echo $set_checked;?> />
                    <span class="slider round"></span>
                </label>
            </div>
            <div class="input">
                <label><?php echo e(__('app.apps.colour')); ?> *</label>
                <?php echo Form::text('colour', null, array('placeholder' => __('app.apps.hex'),'class' => 'form-control color-picker')); ?>

                <hr />
            </div>
            <div class="input">
                <label><?php echo e(__('app.apps.icon')); ?></label>
                <div class="icon-container">
                    <div id="appimage">
                    <?php if(isset($item->icon) && !empty($item->icon) || old('icon')): ?>
                    <?php
                        if(isset($item->icon)) $icon = $item->icon;
                        else $icon = old('icon');
                    ?>
                    <img src="<?php echo e(asset('storage/'.$icon)); ?>" />
                    <?php echo Form::hidden('icon', $icon, ['class' => 'form-control']); ?>

                    <?php else: ?>
                    <img src="/img/heimdall-icon-small.png" />
                    <?php endif; ?>
                    </div>
                    <div class="upload-btn-wrapper">
                        <button class="btn"><?php echo e(__('app.buttons.upload')); ?> </button>
                        <input type="file" id="upload" name="file" />
                    </div>
                </div>
            </div>
            
            <div id="sapconfig"></div>
            
        </div>
        <footer>
            <div class="section-title">&nbsp;</div>
            <div class="module-actions">
                <button type="submit"class="button"><i class="fa fa-save"></i><span><?php echo e(__('app.buttons.save')); ?></span></button>
                <a href="<?php echo e(route('tags.index', [])); ?>" class="button"><i class="fa fa-ban"></i><span><?php echo e(__('app.buttons.cancel')); ?></span></a>
            </div>
        </footer>

    </section>


