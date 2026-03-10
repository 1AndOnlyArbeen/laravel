     <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

     <div class="#">
         <h2> This is the Header Page </h2>


         <?php $__empty_1 = true; $__currentLoopData = $fruitsName; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
             <li><?php echo e($key); ?> => <?php echo e($value); ?></li>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
             <p> Hello This is empty </p>
         <?php endif; ?>
     </div>
<?php /**PATH /home/arbinshrestha/Arbeen/Development /laravel/first-project/resources/views/pages/header.blade.php ENDPATH**/ ?>