<div>
    <div class="flex flex-col md:flex-row md:space-x-4">

        <div class="w-full md:w-2/3 shadow-lg m-2">

            <x-card subtitle="تنظیمات اصلی" separator progress-indicator="saveMainSetting">
                <x-form wire:submit="saveMainSetting">
                    <x-input label="عنوان سایت" wire:model="website_title"/>
                    <x-input label="توضیحات متا" wire:model="meta_description"/>
                    <x-input label="کلمات کلیدی" wire:model="meta_keywords" icon="o-hashtag"/>

                    <x-menu-separator/>

                    <x-colorpicker wire:model="template_color" label="رنگ" hint="رنگ قالب" icon="o-swatch"/>

                    <x-slot:actions>
                        <x-button label="ثبت" class="btn-primary" type="submit" spinner="save"/>
                    </x-slot:actions>
                </x-form>


            </x-card>


        </div>

        <!--    Separator -->

        <div class="w-full md:w-2/3 shadow-lg m-2">


            <x-card subtitle="تنظیمات فروشگاه" separator progress-indicator="saveShopSetting">
                <x-form wire:submit="saveShopSetting">
                    <x-input label=" نرخ مالیات" wire:model="tax"/>
                    <x-input label="هزینه ثابت ارسال" wire:model="shipping_cost"/>


                    <x-slot:actions>
                        <x-button label="ثبت" class="btn-primary" type="submit" spinner="save"/>
                    </x-slot:actions>
                </x-form>


            </x-card>


        </div>


        <div class="w-full md:w-2/3 shadow-lg m-2">


            <x-card subtitle="تنظیمات تماس" separator progress-indicator="saveContactSetting">
                <x-form wire:submit="saveContactSetting">
                    <x-input label="ایمیل مدیر" wire:model="admin_email" icon="o-envelope-open"/>
                    <x-input label="شماره مدیر" wire:model="admin_phone" icon="o-phone"/>
                    <x-menu-separator/>

                    <x-input label="ایمیل پشتیبانی" wire:model="support_email" icon="o-envelope-open"/>
                    <x-input label="شماره پشتیبانی" wire:model="support_phone" icon="o-phone"/>


                    <x-slot:actions>
                        <x-button label="ثبت" class="btn-primary" type="submit" spinner="save"/>
                    </x-slot:actions>
                </x-form>


            </x-card>


        </div>


    </div>
</div>
