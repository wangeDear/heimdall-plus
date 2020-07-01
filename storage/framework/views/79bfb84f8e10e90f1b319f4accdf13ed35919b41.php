                    <section class="item-container<?php echo e($app->droppable); ?>" data-id="<?php echo e($app->id); ?>">
                        <div class="item" style="background-color: <?php echo e($app->colour); ?>">
                            <?php if($app->icon): ?>
                            <img class="app-icon" src="<?php echo e(asset('/storage/'.str_replace('supportedapps', 'icons', $app->icon))); ?>" />
                            <?php else: ?>
                            <img class="app-icon" src="<?php echo e(asset('/img/heimdall-icon-small.png')); ?>" />
                            <?php endif; ?>
                            <div class="details">
                                <div class="title<?php echo e(title_color($app->colour)); ?>"><?php echo e($app->title); ?></div>
                                <?php if($app->enabled()): ?>
                                <div data-id="<?php echo e($app->id); ?>" data-dataonly="<?php echo e($app->getconfig()->dataonly ?? '0'); ?>" class="livestats-container<?php echo e(title_color($app->colour)); ?>"></div>
                                <?php endif; ?>
                            </div>
                            <a title="<?php echo e(App\Item::getApplicationDescription($app->class)); ?>" class="link<?php echo e(title_color($app->colour)); ?>"<?php echo $app->link_target; ?> href="<?php echo e($app->link); ?>" data-www-url=<?php echo e($app->www_url); ?> data-url=<?php echo e($app->url); ?>> <i class="fas <?php echo e($app->link_icon); ?>"></i></a>
                        </div>
                        <a class="item-edit" href="<?php echo e(route($app->link_type.'.edit', [ $app->id ])); ?>"><i class="fas fa-pencil"></i></a>
                    </section>
