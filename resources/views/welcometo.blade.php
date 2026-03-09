      @vite(['resources/css/app.css', 'resources/js/app.js'])

      <div class="px-4 bg-slate-300 h-screen
">

          @php
              $fruitsName = [
                  'one' => 'apple',
                  'two' => 'banana',
                  'three' => 'litchi',
                  'four' => 'mango',
                  'five' => 'carrot',
                  'six' => 'graphes',
              ];
              $value = '';

          @endphp




          @include('pages/header', ['fruitsName' => $fruitsName])

          {{-- @includeWhen(empty($value), 'pages/header', ['fruitsName' => $fruitsName]) --}}

          @includeUnless(empty($value), 'pages/header', ['fruitsName' => $fruitsName])

          <h1 class="text-red-500 rounded-2xl justify-center items-center"> This is the Home Page !! Welcome Future
              developer </h1>

          @include('pages/footer')
          @includeIf('hello/hahah')


          @php
              $myFruitsName = ['apple', 'banana', 'litchi', 'coconut', 'cucumber'];
          @endphp
          <script>
              let myDate = @json($myFruitsName)

              myDate.forEach(element => {
                console.log(element)
                
              });
          </script>

      </div>
