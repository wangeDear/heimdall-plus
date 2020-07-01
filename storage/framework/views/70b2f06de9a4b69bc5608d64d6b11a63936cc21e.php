<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo e(config('app.name')); ?></title>
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo e(asset('apple-icon-57x57.png')); ?>">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo e(asset('apple-icon-60x60.png')); ?>">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo e(asset('apple-icon-72x72.png')); ?>">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('apple-icon-76x76.png')); ?>">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo e(asset('apple-icon-114x114.png')); ?>">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo e(asset('apple-icon-120x120.png')); ?>">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo e(asset('apple-icon-144x144.png')); ?>">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo e(asset('apple-icon-152x152.png')); ?>">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('apple-icon-180x180.png')); ?>">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo e(asset('android-icon-192x192.png')); ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('favicon-32x32.png')); ?>">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo e(asset('favicon-96x96.png')); ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('favicon-16x16.png')); ?>">
        <link rel="mask-icon" href="<?php echo e(asset('img/heimdall-logo-small.svg')); ?>" color="black">
        <link rel="manifest" href="<?php echo e(asset('manifest.json')); ?>">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?php echo e(asset('ms-icon-144x144.png')); ?>">
        <meta name="theme-color" content="#ffffff">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link rel="stylesheet" href="<?php echo e(asset('css/app.css?v=2')); ?>" type="text/css" />
        <script src="<?php echo e(asset('js/fontawesome.js')); ?>"></script>
        <?php if(config('app.url') !== 'http://localhost'): ?>
        <base href="<?php echo e(config('app.url')); ?>">
        <?php else: ?>
        <base href="<?php echo e(url('')); ?>">
        <?php endif; ?>
    </head>
    <body>
        <div id="app"<?php echo $alt_bg; ?>>
            <nav class="sidenav">
                <a class="close-sidenav" href=""><i class="fas fa-times-circle"></i></a>
                <?php if(isset($all_apps)): ?>
                <h2><?php echo e(__('app.dash.pinned_items')); ?></h2>
                <ul id="pinlist">
                    <?php $__currentLoopData = $all_apps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $active = ((bool)$app->pinned === true) ? 'active' : '';
                    ?>
                    <li><?php echo e($app->title); ?><a class="<?php echo e($active); ?>" data-tag="<?php echo e($tag ?? 0); ?>" data-id="<?php echo e($app->id); ?>" href="<?php echo e(route('items.pintoggle', [$app->id])); ?>"><i class="fas fa-thumbtack"></i></a></li>
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <?php endif; ?>
            </nav>
            <div class="content">
                <header class="appheader">
                    <ul>
                        <li><a href="<?php echo e(route('dash', [])); ?>">Dash</a></li><li>
                            <a href="<?php echo e(route('items.index', [])); ?>">Items</a></li>
                    </ul>
                </header>
                <main>
                    <?php if($message = Session::get('success')): ?>
                    <div class="message-container">
                        <div class="alert alert-success">
                            <p><?php echo e($message); ?></p>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if(count($errors) > 0): ?>
                    <div class="message-container">
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if($allusers->count() > 1): ?>
                    <div id="switchuser">
                        <?php if($current_user->avatar): ?>
                        <img class="user-img" src="<?php echo e(asset('/storage/'.$current_user->avatar)); ?>" />
                        <?php else: ?>
                        <img class="user-img" src="<?php echo e(asset('/img/heimdall-icon-small.png')); ?>" />
                        <?php endif; ?>
                        <?php echo e($current_user->username); ?>

                        <a class="btn" href="<?php echo e(route('user.select')); ?>">Switch User</a>
                    </div>
                    <?php endif; ?>
                    <?php echo $__env->yieldContent('content'); ?>
                    <div id="config-buttons">

                        
                        <?php if(Route::is('dash') || Route::is('tags.show')): ?>
                        <a id="config-button" class="config" href=""><i class="fas fa-exchange"></i></a>
                        <?php endif; ?>
    
                        <a id="dash" class="config" href="<?php echo e(route('dash', [])); ?>"><i class="fas fa-th"></i></a>
                        <?php if($current_user->id === 1): ?>
                        <a id="users" class="config" href="<?php echo e(route('users.index', [])); ?>"><i class="fas fa-user"></i></a>
                        <?php endif; ?>
                        <a id="items" class="config" href="<?php echo e(route('items.index', [])); ?>"><i class="fas fa-list"></i></a>
                        <a id="folder" class="config" href="<?php echo e(route('tags.index', [])); ?>"><i class="fas fa-tag"></i></a>
                        <a id="settings" class="config" href="<?php echo e(route('settings.index', [])); ?>"><i class="fas fa-cogs"></i></a>
                    </div>
                </main>

            </div>
        </div>
        <script src="<?php echo e(asset('js/jquery-3.3.1.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery-ui.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/app.js?v=4')); ?>"></script>
        <script src="<?php echo e(asset('js/base.js?v=4')); ?>"></script>
        <?php echo $__env->yieldContent('scripts'); ?>
        
    </body>
</html>
