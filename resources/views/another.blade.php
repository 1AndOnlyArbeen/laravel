<h2> This is just rout testing </h2>
<a href="/another"></a>

{{ 5 + 2 }}
<br>

{{ 'Hello Developer' }}
<br>
{!! '<h1> Hello World </h1>' !!}
<br>
{!! "<script> alert('Asunthustiaatma')</script>" !!}

{{-- comment statment - --}}

@php
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
@endphp

<ul>
    @foreach ($names as $n)
        @if ($loop->even)
            <li style="color:red"> - {{ $n }}</li>
        @elseif ($loop->odd)
            <li style="color:green"> - {{ $n }}</li>
        @else
            <li>{{ $n }}</li>
        @endif
    @endforeach
</ul>
