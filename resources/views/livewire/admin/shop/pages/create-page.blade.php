<div>

    @push('cdn')
        <script src="{{ asset('vendor/ckstandard/ckeditor.js') }}"></script>
        <script data-navigate-once src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @endpush


    <div class="flex flex-col md:flex-row md:space-x-4">

        <div class="w-full md:w-2/3 shadow-lg m-2">
            <x-card separator progress-indicator="save" subtitle="اطلاعات مقاله">

                <x-form wire:submit="save">

                    <x-input placeholder="عنوان مقاله" icon="o-pencil" wire:model="title"/>

                    <div wire:ignore>

                         <textarea id="editor1" wire:model="content"></textarea>

                    </div>


                </x-form>


            </x-card>
        </div>


        <div class="w-full md:w-1/3  m-2">

            <x-card class="shadow-lg mt-2" dir="ltr">

                <x-textarea dir="ltr" wire:model="schema_code" placeholder="Schema SEO Code"/>


                <x-button wire:confirm="صفحه منتشر شود؟" class="btn btn-accent bg-blue-500" tooltip="ثبت" icon="o-arrow-up-on-square" spinner
                          wire:click.debounce.250ms="save" class="w-full" label="ثبت"></x-button>

            </x-card>


        </div>


    </div>


</div>

@include('livewire.admin.template.scripts.ckeditor-init')




