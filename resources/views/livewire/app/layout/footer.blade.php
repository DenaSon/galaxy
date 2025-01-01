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
                       href='{{ route('home.singlePage',['page' =>3 ,'slug' => 'trust-denapax-com']) }}'>
                        <img loading="lazy"
                             src='{{ asset('static/enamad-logo.png') }}'
                             alt='' style='cursor:pointer' code='9pAhKYDetHQRHu97nYXqh24mMTeqQcNm'></a>

                </div>

            </div>


            <div class="text-center md:text-right">
                <p class="text-xs mb-2 sm:text-sm leading-7">
                    <b>
                        دنا پکس
                    </b>

                    <br>

                    عرضه‌کننده سوغات اصیل و خشکبار دنا با بسته‌بندی‌های شکیل و بهداشتی.

                    هدف ما حفظ طعم و اصالت محصولات بومی و ارتباط مستقیم با تولیدکنندگان محلی است.
                    دنـا پکس، یادآور طبیعت، طعم، و اصالت در هر بسته!

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

            <a wire:navigate href="{{ route('panel.shop.cart')  }}"
               class="link link-hover">سبد خرید </a>

        </nav>

        <nav>
            <h6 class="footer-title">دسترسی سریع</h6>

            <a wire:navigate href="{{ route('home.product.indexStore')  }}"
               class="link link-hover"> لیست محصولات </a>



            <a wire:navigate href="https://denapax.com/blog/17/%D8%B3%DB%8C-%D8%B3%D8%AE%D8%AA-%D9%86%DA%AF%DB%8C%D9%86-%D8%AF%D8%B1%D8%AE%D8%B4%D8%A7%D9%86-%D8%AF%D8%A7%D9%85%D9%86%D9%87-%D9%87%D8%A7%DB%8C-%D8%AF%D9%86%D8%A7"
               class="link link-hover"> سی سخت </a>


            <a wire:navigate href="https://denapax.com/store/category/2/%D9%85%DB%8C%D9%88%D9%87-%D8%AE%D8%B4%DA%A9"
               class="link link-hover"> خرید میوه خشک </a>

            <a wire:navigate href="https://denapax.com/store/category/1/%D8%AE%D8%B4%DA%A9%D8%A8%D8%A7%D8%B1-%D9%88-%D9%85%D8%BA%D8%B2%D9%87%D8%A7"
               class="link link-hover"> خرید خشکبار و مغزها </a>

        </nav>



        <aside class="mb-10">

            <a href="{{ route('home.index-home') }}" wire:navigate>
                <img src="{{ asset('static/small-d-logo.png') }}" alt="DenaPax" width="100" height="45" style="height: 40px;width: 110px"/>
            </a>

            <p>
                دنا پکس | از دنا به خانه شما، جایی که طبیعت و اصالت به هم می‌رسند!

                <br/>
                <span class="text-xs text-gray-500">
                    © 2024   | همه حقوق محفوظ است. طراحی و توسعه با ❤️ توسط تیم دنـا پکس
                </span>

            <div class="flex space-x-4 justify-center">

                <a href="https://www.instagram.com/yourprofile" target="_blank" class="text-gray-800 hover:text-pink-600">

                   <a target="_blank" href="https://www.instagram.com/denapax/">  <x-icon name="fab.instagram" /> </a>
                    <a target="_blank" href="https://www.instagram.com/sisakhtziba/?hl=fa">  <x-icon name="fab.instagram" /> </a>

                </a>


            </div>
            </p>
        </aside>

    </footer>


</div>


