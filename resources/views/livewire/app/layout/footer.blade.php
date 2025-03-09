<div class="text-gray-600 sm:mb-1 mb-4 @if(request()->routeIs('panel.shop.cart') || request()->routeIs('home.product.indexStore'))
hidden md:block
@endif">
    @include('livewire.app.layout.inc.footer-icons')

    @if(request()->routeIs('home.index-home'))

        <div class="container mx-auto px-2 py-2 flex justify-center items-center">

            <div class="card bg-base-100 w-full  max-w-[1024px] shadow-2xl border border-gray-200 rounded-2xl">
                <div class="card-body">

                    <h4 class="card-title text-center mx-auto">
                        سوالات متداول

                    </h4>

                    @include('livewire.app.layout.inc.questions-section')

                    <div class="card-actions justify-center mt-1">
                        <x-button responsive class="btn-xs btn-info btn-outline text-white text-sm font-thin"
                                  icon="o-phone"
                                  label="تلفن"
                                  link="tel:{{ getSetting('support_phone') }}" external/>
                        <x-button responsive class="btn-xs btn-success btn-outline text-white text-sm font-thin"
                                  icon="o-paper-airplane" label=" واتساپ" external
                                  link="https://wa.me/09903632356"/>

                        <x-button responsive class="btn-xs btn-warning btn-outline text-white text-sm font-thin"
                                  icon="o-globe-alt" label="فرم تماس"
                                  link="{{ route('contact-us') }}"/>

                    </div>

                </div>
            </div>

        </div>

    @endif

    <div class="container mx-auto">


        <aside class="mb-10">

            <a href="{{ route('home.index-home') }}" wire:navigate>
                <img src="{{ asset('static/small-d-logo.png') }}" alt="DenaPax" width="100" height="45"
                     style="height: 40px;width: 110px"/>
            </a>


            <span class="text-sm">دنا پکس | از دنا به خانه شما، جایی که طبیعت و اصالت به هم می‌رسند!</span>


            <br/>
                <span class="text-xs text-gray-500">
                    © 2024   | همه حقوق محفوظ است. طراحی و توسعه با ❤️ توسط
                    <a title="تیم دناپکس" class="link text-pink-800 tooltip" data-tip="ارتباط با طراح" target="_blank"
                       rel="nofollow noopener" href="https://wa.me/989173434796">تیم دنا پکس</a>
                </span>

            <div class="flex space-x-4 justify-end">


                <div class="w-20 h-24 rounded flex items-center justify-center p-0">

                    <a class="hidden sm:block"
                        target='_blank'
                        href='{{ route('home.singlePage',['page' =>3 ,'slug' => 'trust-denapax-com']) }}'>
                        <img loading="lazy"
                             src='{{ asset('static/enamad-logo.png') }}'
                             alt='نماد اعتماد الکترونیک' style='cursor:pointer' code='9pAhKYDetHQRHu97nYXqh24mMTeqQcNm'></a>

                </div>


            </div>

        </aside>

    </div>


    <a href="https://wa.me/09903632356"
       data-tip="پشتیبانی "
       class="tooltip fixed bottom-20 left-4 bg-green-500 text-white rounded-full p-2 shadow-lg hover:bg-violet-600 transition"
       target="_blank"
       rel="noopener noreferrer">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-3 h-3">
            <path
                d="M20.52 3.48A11.933 11.933 0 0012 0C5.372 0 0 5.372 0 12a11.957 11.957 0 001.7 6.136L0 24l6.328-1.659A11.958 11.958 0 0012 24c6.628 0 12-5.372 12-12 0-3.194-1.228-6.197-3.48-8.52zM12 22.08c-1.852 0-3.68-.477-5.304-1.386l-.378-.214-3.764.987.988-3.764-.214-.378A10.086 10.086 0 011.92 12C1.92 6.498 6.498 1.92 12 1.92S22.08 6.498 22.08 12 17.502 22.08 12 22.08zm6.802-7.946c-.375-.188-2.222-1.098-2.567-1.226-.344-.128-.594-.188-.844.188-.25.375-.97 1.226-1.19 1.472-.218.25-.438.281-.813.094-.375-.188-1.582-.582-3.01-1.852-1.113-.993-1.862-2.21-2.08-2.585-.219-.375-.024-.562.165-.75.17-.17.375-.438.563-.657.188-.219.25-.375.375-.625.124-.25.063-.47-.031-.657-.094-.188-.844-2.031-1.157-2.782-.312-.75-.625-.656-.844-.656-.219 0-.469-.031-.719-.031-.25 0-.656.094-1.002.469-.344.375-1.31 1.28-1.31 3.12 0 1.842 1.344 3.622 1.532 3.875.188.25 2.645 4.053 6.432 5.686.9.375 1.605.6 2.152.781.906.288 1.73.25 2.376.156.719-.094 2.222-.906 2.533-1.781.312-.875.312-1.625.219-1.781-.094-.156-.344-.25-.719-.438z"/>
        </svg>
    </a>
</div>







