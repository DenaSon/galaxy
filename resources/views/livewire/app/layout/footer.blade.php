<div class="text-gray-600 sm:mb-1 mb-4 @if(request()->routeIs('panel.shop.cart') || request()->routeIs('home.product.indexStore'))
hidden md:block
@endif">
    @include('livewire.app.layout.inc.footer-icons')

    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row justify-between items-center">


            <div class="flex space-x-6 mb-6 md:mb-0 ">



                <div class="w-20 h-24 rounded flex items-center justify-center p-0">

                    <a
                       target='_blank'
                       href=''>
                        <img loading="lazy"
                             src='{{ asset('static/enamad-logo.png') }}'
                             alt='نماد اعتماد الکترونیک' style='cursor:pointer' code='9pAhKYDetHQRHu97nYXqh24mMTeqQcNm'></a>

                </div>

            </div>


            <div class="text-center md:text-right">
                <p class="text-xs mb-2 sm:text-sm leading-7">
                    <b>
                        لیفت‌پال
                    </b>

                    <br>

                    فروشگاه معتبر قطعات و لوازم آسانسور، خدمات تخصصی نصب، تعمیر و نگهداری – همه در یک پلتفرم حرفه‌ای!

                </p>
                <x-hr/>
            </div>


        </div>

    </div>


    <footer class="footer bg-base-50 text-base-content mx-auto container">


        <nav>
            <h6 class="footer-title">صفحات</h6>
            <a wire:navigate href="{{ route('contact-us')  }}"
               class="link link-hover">تماس باما</a>
            <a wire:navigate href="{{ route('home.singlePage',['page'=>1,'slug'=>'درباره-ما']) }}"
               class="link link-hover">درباره ما</a>

            <a wire:navigate href="{{ route('home.singlePage',['page'=>2,'slug'=>slugMaker('قوانین و مقررات')])  }}"
               class="link link-hover"> قوانین و مقررات </a>

            <a wire:navigate href="{{ route('panel.shop.cart')  }}" rel="noopener nofollow"
               class="link link-hover">سبد خرید </a>

        </nav>

        <nav>
            <h6 class="footer-title">دسترسی سریع</h6>

            <a wire:navigate href="{{ route('home.product.indexStore')  }}"
               class="link link-hover"> لیست محصولات </a>



{{--            <a wire:navigate href=""--}}
{{--               class="link link-hover"> سی سخت </a>--}}

{{--            <a wire:navigate href=""--}}
{{--               class="link link-hover"> خرید میوه خشک </a>--}}

{{--            <a wire:navigate href=""--}}
{{--               class="link link-hover"> خرید خشکبار و مغزها </a>--}}

        </nav>



        <aside class="mb-10">

            <a href="{{ route('home.index-home') }}" wire:navigate>
                <img src="{{ asset('static/small-d-logo.png') }}" alt="LiftPal" width="100" height="45" style="height: 40px;width: 110px"/>
            </a>

            <p>
                 لیفت‌پال | همراه مطمئن شما برای اطمینان، ایمنی و کیفیت در صنعت آسانسور!

                <br/>
                <span class="text-xs text-gray-500">
                    © 2024   | همه حقوق محفوظ است. طراحی و توسعه با ❤️ توسط
                    <a title="تیم لیفت‌پال"  class="link text-pink-800 tooltip" data-tip="ارتباط با طراح" target="_blank" rel="nofollow noopener" href="https://wa.me/989173434796">تیم لیفت‌پال </a>
                </span>

            <div class="flex space-x-4 justify-center">

                <a href="https://www.instagram.com/yourprofile" target="_blank" class="text-gray-800 hover:text-pink-600">

                   <a target="_blank" href="">  <x-icon name="fab.instagram" /> </a>
                    <a target="_blank" href="">  <x-icon name="fab.instagram" /> </a>

                </a>


            </div>
            </p>
        </aside>



        <a href="https://wa.me/989179420677"
           data-tip="پشتیبانی "
           class="tooltip fixed bottom-20 left-4 bg-green-500 text-white rounded-full p-2 shadow-lg hover:bg-violet-600 transition"
           target="_blank"
           rel="noopener noreferrer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-3 h-3">
                <path d="M20.52 3.48A11.933 11.933 0 0012 0C5.372 0 0 5.372 0 12a11.957 11.957 0 001.7 6.136L0 24l6.328-1.659A11.958 11.958 0 0012 24c6.628 0 12-5.372 12-12 0-3.194-1.228-6.197-3.48-8.52zM12 22.08c-1.852 0-3.68-.477-5.304-1.386l-.378-.214-3.764.987.988-3.764-.214-.378A10.086 10.086 0 011.92 12C1.92 6.498 6.498 1.92 12 1.92S22.08 6.498 22.08 12 17.502 22.08 12 22.08zm6.802-7.946c-.375-.188-2.222-1.098-2.567-1.226-.344-.128-.594-.188-.844.188-.25.375-.97 1.226-1.19 1.472-.218.25-.438.281-.813.094-.375-.188-1.582-.582-3.01-1.852-1.113-.993-1.862-2.21-2.08-2.585-.219-.375-.024-.562.165-.75.17-.17.375-.438.563-.657.188-.219.25-.375.375-.625.124-.25.063-.47-.031-.657-.094-.188-.844-2.031-1.157-2.782-.312-.75-.625-.656-.844-.656-.219 0-.469-.031-.719-.031-.25 0-.656.094-1.002.469-.344.375-1.31 1.28-1.31 3.12 0 1.842 1.344 3.622 1.532 3.875.188.25 2.645 4.053 6.432 5.686.9.375 1.605.6 2.152.781.906.288 1.73.25 2.376.156.719-.094 2.222-.906 2.533-1.781.312-.875.312-1.625.219-1.781-.094-.156-.344-.25-.719-.438z"/>
            </svg>
        </a>



    </footer>


</div>


