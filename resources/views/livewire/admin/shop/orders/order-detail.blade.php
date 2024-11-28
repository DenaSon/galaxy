<div>

    <x-menu-separator/>

    <div>
        <div class="flex flex-col md:flex-row md:space-x-4">

            <div class="w-full md:w-full shadow-lg m-2">

               @foreach($order->orderItems as $order)

                   <b>{{ $order->title }}</b>
                   <x-hr/>



               @endforeach

                   <x-card>

                       {{ $order->shipping_address }}

                   </x-card>



                   <x-card>



                   </x-card>


            </div>


        </div>
    </div>


</div>
