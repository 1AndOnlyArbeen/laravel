<h2> This is just rout testing </h2>
<a href="/another"></a>

<?php echo e(5 + 2); ?>

<br>

<?php echo e('Hello Developer'); ?>

<br>
<?php echo '<h1> Hello World </h1>'; ?>

<br>
<?php echo "<script> alert('Asunthustiaatma')</script>"; ?>




<?php
    $names = [
        'arbin',
        'nabin ',
        'salman' . 'Anmol ',
        'arbin',
        'nabin ',
        'salman' . 'Anmol ',
        'arbin',
        'nabin ',
        'salman' . 'Anmol ',
    ];
?>

<ul>
    <?php $__currentLoopData = $names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($loop->even): ?>
            <li style="color:red"> - <?php echo e($n); ?></li>
        <?php elseif($loop->odd): ?>
            <li style="color:green"> - <?php echo e($n); ?></li>
        <?php else: ?>
            <li><?php echo e($n); ?></li>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH /home/arbinshrestha/Arbeen/Development /laravel/first-project/resources/views/another.blade.php ENDPATH**/ ?>