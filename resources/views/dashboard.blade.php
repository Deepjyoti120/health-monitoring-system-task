<x-app-layout>
    <x-slot name="header">
            <a href="{{ url('/admin/users') }}" class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Go to Users
            </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                {{-- <div class="numbers">
                    <h2>Numbers from 1 to 48</h2>
                    <ul>
                        @foreach($numbers as $number)
                            <li>{{ $number }}</li>
                        @endforeach
                    </ul>
                    <p>Total: {{ $total }}</p>
                </div> --}}
              
               

    
            </div>
        </div>
    </div>
   <div class="container max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="border-dashed border-4 border-gray-300 p-4 ">
        {{-- <div class="grid grid-cols-12 gap-2 items-center justify-center">
            @foreach($numbers as $number)
                <button type="button" class="font-bold rounded px-4 py-2 
                    @if($number % 2 == 0)
                        bg-red-500 hover:bg-red-700 text-white
                    @else
                        bg-green-500 hover:bg-green-700 text-white
                    @endif
                    ">
                    {{ $number }}
                </button>
            @endforeach
        </div> --}}
        <div class="grid grid-rows-6 md:grid-rows-2 grid-flow-col px-4 py-4 leading-10 gap-4  ">
            <div class="p-4 bg-fuchsia-900 rounded-xl row-span-2 w-full flex flex-wrap">
                @foreach($numbers as $number)
                    <button type="button" class="button-class font-bold rounded m-1 p-6 flex-grow 
                        @if($number % 2 == 0)
                            bg-red-500 hover:bg-red-700 text-white
                        @else
                            bg-green-500 hover:bg-green-700 text-white
                        @endif" data-number="{{ $number }}">
                        {{-- {{ $number }} --}}
                    </button>
                @endforeach
            </div>
            <div class="p-4 w-full bg-amber-400 rounded-xl col-span-1 flex justify-center items-center text-center">
                <div class="grid grid-cols-2 gap-2 ">
                    <div class="grid row-span-2 items-center">ICon</div>
                    <div class="grid items-center text-center">3</div>
                    <div class="grid grid-cols-subgrid gap-4 col-span-1">
                      <div class="">Boys Toilet</div>
                    </div>
                  </div>
            </div>
            <div class="p-4 w-full bg-fuchsia-800 rounded-xl col-span-1 flex justify-center items-center text-center"> <div class="grid grid-cols-2 gap-4 ">
                <div class="grid row-span-2 items-center">ICon</div>
                <div class="grid items-center text-center">3</div>
                <div class="grid grid-cols-subgrid gap-4 col-span-1">
                  <div class="">Boys Toilet</div>
                </div>
              </div></div>
            <div class="p-4 w-full bg-fuchsia-800 rounded-xl col-span-1 flex justify-center items-center text-center"> <div class="grid grid-cols-2 gap-4 ">
                <div class="grid row-span-2 items-center">ICon</div>
                <div class="grid items-center text-center">3</div>
                <div class="grid grid-cols-subgrid gap-4 col-span-1">
                  <div class="">Boys Toilet</div>
                </div>
              </div></div>
            <div class="p-4 w-full bg-slate-300 rounded-xl col-span-1 flex justify-center items-center text-center"> <div class="grid grid-cols-2 gap-4 ">
                <div class="grid row-span-2 items-center">ICon</div>
                <div class="grid items-center text-center">3</div>
                <div class="grid grid-cols-subgrid gap-4 col-span-1">
                  <div class="">Boys Toilet</div>
                </div>
              </div>
            </div>
        </div>
        {{-- 2nd --}}
        <div class="grid grid-rows-1 grid-flow-col px-4 py-4 leading-10 gap-4">
            <div class="p-4 w-full bg-amber-400 rounded-xl col-span-1">
                <div class="grid grid-cols-2 gap-4 ">
                    <div class="grid row-span-2 items-center">ICon</div>
                    <div class="grid items-center text-center">3</div>
                    <div class="grid grid-cols-subgrid gap-4 col-span-1">
                      <div class="">Boys Toilet</div>
                    </div>
                  </div>
            </div>
            <div class="p-4 w-full bg-fuchsia-800 rounded-xl col-span-1"> <div class="grid grid-cols-2 gap-4 ">
                <div class="grid row-span-2 items-center">ICon</div>
                <div class="grid items-center text-center">3</div>
                <div class="grid grid-cols-subgrid gap-4 col-span-1">
                  <div class="">Boys Toilet</div>
                </div>
              </div>
            </div> 
        </div>
        {{-- // 3rd --}}
        <div class="grid grid-rows-1  grid-flow-col px-4 py-4 leading-10 gap-4">
            <div class="p-4 w-full bg-amber-400 rounded-xl col-span-1">
                <div class="grid grid-cols-2 gap-4 ">
                    <div class="grid row-span-2 items-center">ICon</div>
                    <div class="grid items-center text-center">3</div>
                    <div class="grid grid-cols-subgrid gap-4 col-span-1">
                      <div class="">Boys Toilet</div>
                    </div>
                  </div>
            </div>
            <div class="text-center content-end">Fsf</div>
            <div class="p-4 w-full bg-fuchsia-800 rounded-xl col-span-1"> <div class="grid grid-cols-2 gap-4 ">
                <div class="grid row-span-2 items-center">ICon</div>
                <div class="grid items-center text-center">3</div>
                <div class="grid grid-cols-subgrid gap-4 col-span-1">
                  <div class="">Boys Toilet</div>
                </div>
              </div>
            </div> 
        </div>
    </div>
   </div>
   {{-- // side menu --}}
   <div id="right-side-menu" class="hidden fixed right-0 top-0 w-1/3 h-full bg-white shadow-lg  "></div>
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.button-class').on('click', function() {
            const number = $(this).data('number');
            console.log(number);
            $('#right-side-menu').toggleClass('hidden block');
        });
    });
</script>
