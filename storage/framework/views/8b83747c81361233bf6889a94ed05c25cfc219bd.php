<?php $__env->startSection('content'); ?>
        <section class="module-container">
            <header>
                <div class="section-title">
                    <?php echo e(__('app.user.user_list')); ?>

                    <?php if( isset($trash) && $trash->count() > 0 ): ?>
                        <a class="trashed" href="<?php echo e(route('users.index', ['trash' => true])); ?>"><?php echo e(__('app.apps.view_trash')); ?> (<?php echo e($trash->count()); ?>)</a>
                    <?php endif; ?>

                </div>
                <div class="module-actions">
                    <a href="<?php echo e(route('users.create', [])); ?>" title="" class="button"><i class="fa fa-plus"></i><span><?php echo e(__('app.buttons.add')); ?></span></a>
                    <a href="<?php echo e(route('dash', [])); ?>" class="button"><i class="fa fa-ban"></i><span><?php echo e(__('app.buttons.cancel')); ?></span></a>
                </div>
            </header>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th><?php echo e(__('app.user.username')); ?></th>
                        <th><?php echo e(__('app.apps.password')); ?></th>
                        <th><?php echo e(__('app.apps.autologin_url')); ?></th>
                        <th class="text-center" width="100"><?php echo e(__('app.settings.edit')); ?></th>
                        <th class="text-center" width="100"><?php echo e(__('app.delete')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($users->first()): ?>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($user->username); ?></td>
                                <td><i class="fa <?php echo e((!is_null($user->password) ? 'fa-check' : 'fa-times')); ?>" /></td>
                                <td>
                                <?php if(is_null($user->autologin)): ?>
                                    <i class="fa fa-times" />
                                <?php else: ?>
                                    <a href="<?php echo e(route('user.autologin', $user->autologin)); ?>"><?php echo e(route('user.autologin', $user->autologin)); ?></a>
                                <?php endif; ?>
                                </td>
                                <td class="text-center"><a<?php echo e($user->target); ?> href="<?php echo route('users.edit', [$user->id]); ?>" title="<?php echo e(__('user.settings.edit')); ?> <?php echo $user->title; ?>"><i class="fas fa-edit"></i></a></td>
                                <td class="text-center">
                                    <?php if($user->id !== 1): ?>
                                        <?php echo Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']); ?>

                                        <button class="link" type="submit"><i class="fa fa-trash-alt"></i></button>
                                        <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="form-error text-center">
                                <strong><?php echo e(__('app.user.settings.no_items')); ?></strong>
                            </td>
                        </tr>
                    <?php endif; ?>

                
                </tbody>
            </table>
        </section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>