<div class="container mx-auto">

    <div class="flex flex-col md:flex-row">

        <!-------------- SideBar ---------------->


        <div class="w-full md:w-1/5 ">

            @include('livewire.app.services.technician.inc.technician-sidebar')

        </div>

        <!-------------- Content ---------------->

        <div class="w-full md:w-4/5 p-4">

            <div class="flex justify-center mt-4">

                @livewire('app.services.components.technician.report-list')

            </div>

        </div>

    </div>

</div>
