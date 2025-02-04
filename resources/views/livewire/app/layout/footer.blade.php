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


    <footer class="footer sm:footer-horizontal bg-neutral text-neutral-content grid-rows-2 p-10">
        <nav>
            <h6 class="footer-title">Services</h6>
            <a class="link link-hover">Branding</a>
            <a class="link link-hover">Design</a>
            <a class="link link-hover">Marketing</a>
            <a class="link link-hover">Advertisement</a>
        </nav>
        <nav>
            <h6 class="footer-title">Company</h6>
            <a class="link link-hover">About us</a>
            <a class="link link-hover">Contact</a>
            <a class="link link-hover">Jobs</a>
            <a class="link link-hover">Press kit</a>
        </nav>
        <nav>
            <h6 class="footer-title">Legal</h6>
            <a class="link link-hover">Terms of use</a>
            <a class="link link-hover">Privacy policy</a>
            <a class="link link-hover">Cookie policy</a>
        </nav>
        <nav>
            <h6 class="footer-title">Social</h6>
            <a class="link link-hover">Twitter</a>
            <a class="link link-hover">Instagram</a>
            <a class="link link-hover">Facebook</a>
            <a class="link link-hover">GitHub</a>
        </nav>
        <nav>
            <h6 class="footer-title">Explore</h6>
            <a class="link link-hover">Features</a>
            <a class="link link-hover">Enterprise</a>
            <a class="link link-hover">Security</a>
            <a class="link link-hover">Pricing</a>
        </nav>
        <nav>
            <h6 class="footer-title">Apps</h6>
            <a class="link link-hover">Mac</a>
            <a class="link link-hover">Windows</a>
            <a class="link link-hover">iPhone</a>
            <a class="link link-hover">Android</a>
        </nav>
    </footer>


</div>


