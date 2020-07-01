                    <?php
                    $item = $item ?? new App\Item;
                    ?>
                    <section class="item-container" data-id="">
                        <div class="item set-bg-elem" style="background-color: <?php echo e($item->colour ?? '#222'); ?>">
                            <?php if(isset($item->icon) && !empty($item->icon)): ?>
                            <img class="app-icon" src="<?php echo e(asset('/storage/'.$item->icon)); ?>" />
                            <?php else: ?>
                            <img class="app-icon" src="<?php echo e(asset('/img/heimdall-icon-small.png')); ?>" />
                            <?php endif; ?>
                            <div class="details">
                                <div class="title<?php echo e(title_color($item->colour) ?? 'white'); ?>"><?php echo e($item->title ?? ''); ?></div>
                                <?php if($item->enhanced()): ?>
                                <div data-id="<?php echo e($item->id); ?>" data-dataonly="<?php echo e($item->getconfig()->dataonly ?? '0'); ?>" class="no-livestats-container"></div>
                                <?php endif; ?>
                            </div>
                            <a class="link<?php echo e(title_color($item->colour)); ?>"<?php echo $item->link_target; ?> href="<?php echo e($item->link); ?>"><i class="fas <?php echo e($item->link_icon); ?>"></i></a>
                        </div>
                        <a class="item-edit" href="<?php echo e(route($item->link_type.'.edit', [ $item->id ])); ?>"><i class="fas fa-pencil"></i></a>
                        
                    </section>
