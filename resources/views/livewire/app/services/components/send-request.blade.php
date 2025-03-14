<div>
    <x-modal class="backdrop-blur" box-class="border-b shadow-xl" wire:model="sendRequestModal"
             title="ساختمان {{ $building->builder_name }}"
             subtitle="آسانسور {{ $elevator->translateType($elevator->type) }} با شناسه {{ $elevator->national_code }}"
             separator="send">

        <x-form wire:loading.attr="disabled" wire:confirm="درخواست ارسال شود؟" wire:submit="send" no-separator="send">

            <x-textarea wire:loading.attr="disabled" label="شرح مشکل آسانسور" inline placeholder=""
                        wire:model="description"/>

            <div class="text-center mx-auto">
                <x-badge class="badge badge-info badge-outline opacity-50"
                         value="ارسال به تکنسین‌های شهر {{ $city }} "/>

                <p class="text-xs justify-center mt-2">
                    آدرس: {{ $building->address }} پلاک {{ $building->identify }}
                </p>
            </div>

            <x-hr class="text-info border-info"/>

            <x-slot:actions>
                <x-button wire:loading.attr="disabled" spinner="send" type="submit" label="ارسال درخواست"
                          class="btn-info btn-block text-white btn-sm"/>
                <br/>
            </x-slot:actions>

        </x-form>
    </x-modal>

    <x-button spinner="showRequestModal" wire:click="showRequestModal" label="درخواست" responsive icon="o-cog-8-tooth"
              class="btn-info btn-outline text-white btn-sm"/>
</div>
