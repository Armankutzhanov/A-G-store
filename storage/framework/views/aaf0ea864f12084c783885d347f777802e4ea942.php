<?php $__env->startSection('title'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?><?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('header'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('header'); ?>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

    <div class="container">

        <?php if(!$cart_item): ?>
            <div class="emptyBasket" style="display: block">
                <h3>Bаша корзина пуста</h3>
                <img src="https://f97o6kd8uk.a.trbcdn.net/local/templates/.default/images/cart.png?_cvc=1681146445" alt="">
                <p>Воспользуйтесь нашим каталогом, чтобы ее заполнить.</p>
                <a href="<?php echo e(route('home')); ?>" class="button yellow">Продолжить покупки</a>
            </div>
        <?php else: ?>
            <div class="row title-table">

                <h2>Товари</h2>
                <div class="id col-1">№</div>
                <div class="title col-4">Название</div>
                <div class="title col-1">Кол-во</div>
                <div class="author col-2">Цена</div>
                <div class="red col-4">Управление</div>
            </div>
            <div class="row post">

                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="id col-1"><?php echo e($k+1); ?></div>
                    <div class="title col-4"><?php echo e($product->name); ?></div>
                    <div class="title col-1"><?php echo e($product->quantity); ?></div>
                    <div class="author col-2"><?php echo e($product->price); ?></div>
                    <div class="del col-2"><a href=""></a></div>
                    <div class="red col-2"><a href=""></a></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <a href="<?php echo e(route('home')); ?>" class="button yellow">Продолжить покупки</a>
            </div>

            <form method="post" action="<?php echo e(route('guest.add')); ?>">
                <?php echo csrf_field(); ?>
                <h1 class="h3 mb-3 mt-3 fw-normal text-center">Заполните данную таблицу</h1>
                <div class="form-group">
                    <label for="name">Your name</label>
                    <input type="text" class="form-control mb-3" id="name" name="name" value="<?php echo e(old('name')); ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control mb-3" id="email" name="email" value="<?php echo e(old('email')); ?>">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control mb-3" id="phone" name="phone">
                    <input type="hidden" class="form-control mb-3" id="sess_id" name="sess_id" value="<?php echo e(session()->getId()); ?>">
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Send</button>

            </form>

    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blog\resources\views/posts/guestbasket.blade.php ENDPATH**/ ?>