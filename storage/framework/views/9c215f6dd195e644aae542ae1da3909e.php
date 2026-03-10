      <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

      <div class="px-4 bg-slate-300 h-screen
">

          <?php
              $fruitsName = [
                  'one' => 'apple',
                  'two' => 'banana',
                  'three' => 'litchi',
                  'four' => 'mango',
                  'five' => 'carrot',
                  'six' => 'graphes',
              ];
              $value = '';

          ?>




          <?php echo $__env->make('pages/header', ['fruitsName' => $fruitsName], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

          

          <?php echo $__env->renderUnless(empty($value), 'pages/header', ['fruitsName' => $fruitsName], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1])); ?>

          <h1 class="text-red-500 rounded-2xl justify-center items-center"> This is the Home Page !! Welcome Future
              developer </h1>

          <?php echo $__env->make('pages/footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
          <?php if ($__env->exists('hello/hahah')) echo $__env->make('hello/hahah', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>


          <?php
              $myFruitsName = ['apple', 'banana', 'litchi', 'coconut', 'cucumber'];
          ?>
          <script>
              let myDate = <?php echo json_encode($myFruitsName, 15, 512) ?>

              myDate.forEach(element => {
                console.log(element)
                
              });
          </script>

      </div>
<?php /**PATH /home/arbinshrestha/Arbeen/Development /laravel/first-project/resources/views/welcometo.blade.php ENDPATH**/ ?>