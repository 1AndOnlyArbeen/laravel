     @vite(['resources/css/app.css', 'resources/js/app.js'])

     <div class="#">
         <h2> This is the Header Page </h2>


         @forelse($fruitsName as $key=>$value)
             <li>{{ $key }} => {{ $value }}</li>
         @empty
             <p> Hello This is empty </p>
         @endforelse
     </div>
