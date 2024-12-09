<div>
@push('cdn')

        <link rel="stylesheet" href="https://static.neshan.org/sdk/mapboxgl/v1.13.2/neshan-sdk/v1.1.1/index.css" />
        <script src="https://static.neshan.org/sdk/mapboxgl/v1.13.2/neshan-sdk/v1.1.1/index.js"></script>
    <style>
        #map {
            height: 100%;
            width: 100%;
        }

    </style>
@endpush

    <div class="container mx-auto px-4 py-8">

        <section class="mb-8 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">ارتباط با ما</h2>
            <p class="text-lg text-gray-600">
                برای هرگونه سوال یا پیشنهاد، لطفاً از طریق فرم زیر با ما در تماس باشید. تیم دناپکس آماده پاسخگویی به
                شماست.
            </p>
        </section>


        <section class="mb-8">
            <x-card title="تماس با ما" separator="save" progress-indicator="save">
                <x-form wire:submit="save" no-separator="">

                    <x-input wire:model="name" label="نام و نام خانوادگی" placeholder="نام و نام خانوادگی" icon="o-user" />
                    <x-input wire:model="email" label="ایمیل" placeholder="آدرس ایمیل (اختیاری)" icon="o-at-symbol" />
                    <x-input wire:model="phone" label="شماره تلفن" placeholder="شماره تلفن" icon="o-phone" />

                    <x-textarea wire:model="text" label="متن پیام" placeholder="متن پیام خود را اینجا بنویسید"/>

                    <x-slot:actions>
                        <x-button spinner="save" type="submit" label="ارسال" icon="o-paper-airplane" class="btn-primary"/>
                    </x-slot:actions>
                </x-form>

            </x-card>
        </section>


        <section class="mt-8">
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">موقعیت ما</h3>
            <div class="relative w-full h-96">

                <div id="map"></div>


            </div>
        </section>
    </div>
    <script type="text/javascript">

        const neshanMap = new nmp_mapboxgl.Map({
            mapType: nmp_mapboxgl.Map.mapTypes.neshanVector,
            container: "map",
            zoom: 14,
            pitch: 1,
            center: [51.46224308672768,30.855207885088163],
            minZoom: 2,
            maxZoom: 21,
            trackResize: true,
            mapKey: "{{config('neshan.map_box_key')}}", // Get your own API Key on https://platform.neshan.org/panel
            poi: false,
            traffic: false,
            mapTypeControllerOptions: {
                show: true,
                position: 'bottom-left'
            }

        });
        var marker = new nmp_mapboxgl.Marker()
            .setLngLat([51.462307047441186,30.85529215575906])
            .addTo(neshanMap);

    </script>

</div>
