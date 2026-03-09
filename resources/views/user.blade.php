@vite(['resources/css/app.css', 'resources/js/app.js'])
<div class=" bg-taupe-300 h-screen justify-center">
    <h1 class=" items-center justify-center text-center text-2xl text-red-800"> User Page</h1>
<h2 class=" text-green-800"> Hello {{ $user }} and you are living in the city named {!!$city !!}!</h2>

</div>