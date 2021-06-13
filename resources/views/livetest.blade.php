<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<div class="row">
    @if(isset($response1['0']['incomingStreams']))

    @foreach ($response1['0']['incomingStreams'] as $item)

    <div class="col-sm-6 col-xl-4 col-md-6">
        <div class="card">
            @if ($item['name'] === '2')
            <h5 class="card-title">Italy</h5>
            @elseif($item['name'] === '3')
            <h5 class="card-title">London</h5>
            @elseif($item['name'] === '4')
            <h5 class="card-title">Swiss</h5>
            @elseif($item['name'] === '6')
            <h5 class="card-title">Holland</h5>
            @elseif($item['name'] === '7')
            <h5 class="card-title">Belgium</h5>
            @elseif($item['name'] === '8')
            <h5 class="card-title">France</h5>
            @elseif($item['name'] === '9')
            <h5 class="card-title">Denmark</h5>
            @elseif($item['name'] === '10')
            <h5 class="card-title">Germany</h5>
            @elseif($item['name'] === '11')
            <h5 class="card-title">Sweden</h5>
            @elseif($item['name'] === '12')
            <h5 class="card-title">Finland</h5>
            @elseif($item['name'] === '13')
            <h5 class="card-title">Canda</h5>
            @elseif($item['name'] === '14')
            <h5 class="card-title">Main Live</h5>
            @else 
            <h5>{{$item['name']}}</h5>
            @endif
                            <div class="container">
           <iframe src="/live/{{$item['name']}}" frameborder="0" height="400px" width="400px"></iframe>
          </div>
         

          
         </div> 
    </div>
    @endforeach
    @else
    <h1>நேரலை எதுவும் இல்லை</h1>
    @endif
</div>
</x-app-layout>