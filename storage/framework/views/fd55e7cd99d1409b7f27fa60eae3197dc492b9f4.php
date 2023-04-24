<div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a href="<?php echo e(route('home')); ?>" class="navbar-brand d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
            <strong>A&GStore</strong>
        </a>

        <div class="btn-group">
            <button class="btn btn-secondary btn-sm" type="button">
               <a href="">КАТЕГОРИЯ</a>
            </button>
            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </div>
        <li><a href="<?php echo e(route('about')); ?>" class="text-white">О Нас</a></li>


        <?php if(auth()->guard()->check()): ?>

            <li><a href="<?php echo e(route('basket.index')); ?>" class="text-white">Корзина</a></li>
            <a class="btn btn-primary" href="<?php echo e(route('product.index')); ?>"><?php echo e(auth()->user()->name); ?></a>
            <a class="btn btn-primary" href="<?php echo e(route('logout')); ?>">Log out</a>
        <?php endif; ?>

        <?php if(auth()->guard()->guest()): ?>
            <li><a href="<?php echo e(route('guest')); ?>" class="text-white">Корзина</a></li>
            <a href="<?php echo e(route('user.create')); ?>">Sign-up</a>
            <a href="<?php echo e(route('login.create')); ?>">Login</a>

        <?php endif; ?>


    </div>
</div>
<?php /**PATH C:\xampp\htdocs\blog\resources\views/layout/header.blade.php ENDPATH**/ ?>