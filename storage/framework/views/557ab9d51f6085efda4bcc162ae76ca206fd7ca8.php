<?php $__env->startSection('content'); ?>
        <section class="module-container">
            <header>
                <div class="section-title">
                    <?php echo e(__('app.apps.app_list')); ?>

                    <?php if( isset($trash) && $trash->count() > 0 ): ?>
                        <a class="trashed" href="<?php echo e(route('items.index', ['trash' => true])); ?>"><?php echo e(__('app.apps.view_trash')); ?> (<?php echo e($trash->count()); ?>)</a>
                    <?php endif; ?>

                </div>
                <div class="module-actions">
                    <a href="<?php echo e(route('applist', [])); ?>" class="button"><i class="fa fa-cloud-download"></i><span><?php echo e(__('app.buttons.downloadapps')); ?></span></a>
                    <a href="<?php echo e(route('items.create', [])); ?>" title="" class="button"><i class="fa fa-plus"></i><span><?php echo e(__('app.buttons.add')); ?></span></a>
                    <a href="<?php echo e(route('dash', [])); ?>" class="button"><i class="fa fa-ban"></i><span><?php echo e(__('app.buttons.cancel')); ?></span></a>
                </div>
            </header>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th><?php echo e(__('app.title')); ?></th>
                        <th><?php echo e(__('app.url')); ?></th>
                        <th class="text-center" width="100"><?php echo e(__('app.settings.edit')); ?></th>
                        <th class="text-center" width="100"><?php echo e(__('app.delete')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($apps->first()): ?>
                        <?php $__currentLoopData = $apps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($app->title); ?></td>
                                <td><a href="<?php echo e($app->url); ?>"><?php echo e($app->link); ?></a></td>
                                <td class="text-center"><a<?php echo e($app->target); ?> href="<?php echo route('items.edit', [$app->id]); ?>" title="<?php echo e(__('app.settings.edit')); ?> <?php echo $app->title; ?>"><i class="fas fa-edit"></i></a></td>
                                <td class="text-center">
                                        <?php echo Form::open(['method' => 'DELETE','route' => ['items.destroy', $app->id],'style'=>'display:inline']); ?>

                                        <button class="link" type="submit"><i class="fa fa-trash-alt"></i></button>
                                        <?php echo Form::close(); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="form-error text-center">
                                <strong><?php echo e(__('app.settings.no_items')); ?></strong>
                            </td>
                        </tr>
                    <?php endif; ?>

                
                </tbody>
            </table>
        </section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>