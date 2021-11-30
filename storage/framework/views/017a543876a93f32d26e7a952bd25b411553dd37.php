<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Main Page')); ?>

        </h2>
     <?php $__env->endSlot(); ?>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <?php if(auth()->guard()->check()): ?>
                <?php if (isset($component)) { $__componentOriginal6ffb65fd60ff720f3b1044e66e07f6b067f5cba2 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\RoundOneInfo::class, []); ?>
<?php $component->withName('round-one-info'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginal6ffb65fd60ff720f3b1044e66e07f6b067f5cba2)): ?>
<?php $component = $__componentOriginal6ffb65fd60ff720f3b1044e66e07f6b067f5cba2; ?>
<?php unset($__componentOriginal6ffb65fd60ff720f3b1044e66e07f6b067f5cba2); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
            <?php else: ?>
                Login required
            <?php endif; ?>
        </div>
    </div>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH /var/www/html/projects/arcadia/resources/views/welcome.blade.php ENDPATH**/ ?>