<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hello</title>
        
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    </head>
    <body class="bg-gray-100 p-8">
        
        <h1 class="text-4xl font-bold bg-pink-300 p-6 rounded-lg shadow-lg mb-6">
            Hello Welcome Future Developer
        </h1>
        
        <p class="text-lg text-gray-700 mb-4">This is the first page</p>

        <p class="mb-6">
            Know about us 
            <a href="/about" target="_blank" class="text-blue-600 hover:underline font-semibold">Click Me</a> 
            and this is sub about page of the about page 
            <a href="/about/subaboutus" class="text-blue-600 hover:underline font-semibold">click subabout post</a>
        </p>
        
        <div class="space-x-4">
            <a href="/first" class="inline-block bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
                First
            </a>
            <a href="<?php echo e(route('second')); ?>" class="inline-block bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition">
                Second
            </a>
            <a href="<?php echo e(route('mythird')); ?>" class="inline-block bg-purple-500 text-white px-6 py-3 rounded-lg hover:bg-purple-700 transition">
                Third
            </a>
        </div>

    </body>
</html><?php /**PATH /home/arbinshrestha/Arbeen/Development /laravel/first-project/resources/views/welcome.blade.php ENDPATH**/ ?>