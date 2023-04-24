<?php $__env->startSection('title'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?><?php echo e($title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('header'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('header'); ?>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="sidebar col-3">
                <ul>
                    <li>
                        <a href="<?php echo e(route('product.index')); ?>">Товари</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('basket.show')); ?>">Заказы</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('guest.show')); ?>">Заказы не авт</a>
                    </li>
                </ul>
            </div>


            <div class="posts col-9">
                <div class="button row">
                    <a href="<?php echo e(route('product.create')); ?>" class="col-2 btn btn-success">Создать</a>
                    <span class="col-1"></span>
                    <a href="<?php echo e(route('product.index')); ?>" class="col-3 btn btn-warning">Редактировать</a>
                </div>
                <div class="row title-table">

                    <h2>Управление товарами</h2>
                    <div class="id col-1"></div>
                    <div class="title col-5">Название</div>
                    <div class="author col-2">Цена</div>
                    <div class="red col-4"></div>
                </div>

                <div class="row post">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="id col-1"><?php echo e($k+1); ?></div>
                    <div class="title col-5"><?php echo e($product->name); ?></div>
                    <div class="author col-2"><?php echo e($product->price); ?></div>
                    <div class="del col-2"><a href=""></a></div>
                    <div class="red col-2"><a href=""></a></div>




                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blog\resources\views/admin/product/index.blade.php ENDPATH**/ ?>