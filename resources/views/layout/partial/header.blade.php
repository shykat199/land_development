<div class="bg-bottleGreen lg:hidden">
    <p id="todayDate" class="text-white text-14 font-medium text-center"></p>
</div>
<nav class="px-3 lg:px-0 bg-[#FFFFFF] shadow-xl sticky w-full z-50 top-0">
    <div class="lg:container lg:mx-auto px-2 lg:px-[45px] flex justify-between items-center pb-2 lg:pb-0">
        <a href="https://ldtax.gov.bd/">
            <img alt="logo" fetchPriority="high" loading="eager" width="1000" height="1000"
                 decoding="async" data-nimg="1"
                 class="w-[9em] h-[3em] lg:w-full lg:h-[3.5em] py-1"
                 style="color:transparent"
                 srcSet="https://ldtax.gov.bd/_next/image?url=%2Fassets%2Fimages%2Fldtax_logo.webp&w=1080&q=75"
                 src="https://ldtax.gov.bd/_next/image?url=%2Fassets%2Fimages%2Fldtax_logo.webp&w=1080&q=75"/>
        </a>
        <div class="flex justify-end items-end space-x-5 grow">
            <div class="w-full hidden lg:block">
                <div class="flex justify-center items-center space-x-7 bg-gradient-to-l from-white to-white via-bottleGreen py-1">
                    <div class="lg:flex items-center gap-4 hidden">
                        <p class="text-white text-14 font-medium " id="todayCurrentDate"></p>
                        <button title="Change Language">
                            <span class="border border-bottleGreen px-2 bg-bottleGreen px-2 text-slate-50">বাং</span><span class="border border-bottleGreen px-2 bg-white text-bottleGreen">EN</span>
                        </button>
                    </div>
                </div>
                <div class="hidden lg:flex justify-end py-1 gap-2">
                    <ul class="lg:flex items-center text-left space-y-4 lg:space-y-0 lg:gap-6 lg:text-18 p-2 lg:p-0">
                        <li class="border-b lg:border-none p-1 lg:p-0">
                            <a class="text-semiblack font-medium hover:text-magenta" href="https://ldtax.gov.bd/">হোম</a>
                        </li>
                        <li class="group border-b lg:border-none p-1 lg:p-0">
                            <div class="inline-block relative" data-dropdown>
                                <button class="text-semiblack focus:outline-none font-medium text-center inline-flex items-center" data-dropdown-btn>
                                    মন্ত্রণালয়/ বিভাগ
                                    <svg class="ml-2 transition-transform duration-300"
                                         width="15" height="15" viewBox="0 0 15 15" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.875 5.2125L2.26219 4.6875L12.7566 4.6875L13.125 5.19375L7.84969 10.3125H7.07437L1.875 5.2125Z"
                                              fill="#1E433D"></path>
                                    </svg>
                                </button>

                                <div class="custom-scrollbar w-44 max-h-60 overflow-y-auto z-50 absolute bg-white divide-y divide-gray-100 rounded-lg shadow-xl hidden" data-dropdown-menu>
                                    <ul class="py-2 text-semiblack pb-3 flex flex-col space-y-2 text-14">
                                        <li><a href="https://minland.gov.bd/" class="block py-2 hover:text-magenta mx-4 border-b">ভূমি মন্ত্রণালয়</a></li>
                                        <li><a href="http://www.lrb.gov.bd/" class="block py-2 hover:text-magenta mx-4 border-b">ভূমি সংস্কার বোর্ড</a></li>
                                        <li><a href="http://lab.gov.bd/" class="block py-2 hover:text-magenta mx-4 border-b">ভূমি আপিল বোর্ড</a></li>
                                        <li><a href="http://www.dlrs.gov.bd/" class="block py-2 hover:text-magenta mx-4 border-b">ভূমি রেকর্ড ও জরিপ অধিদপ্তর</a></li>
                                        <li><a href="http://www.latc.gov.bd/" class="block py-2 hover:text-magenta mx-4 border-b">ভূমি প্রশাসন ও প্রশিক্ষণ কেন্দ্র</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="border-b lg:border-none p-1 lg:p-0">
                            <a  class="text-semiblack font-medium hover:text-magenta" href="https://ldtax.gov.bd/vumiseba-form">ভূমিসেবা ফর্ম</a>
                        </li>
                        <li class="border-b lg:border-none p-1 lg:p-0">
                            <div class="inline-block relative">
                                <button id="guardBtn" class="text-semiblack focus:outline-none font-medium text-center inline-flex items-center">
                                    গার্ড ফাইল
                                    <svg id="guardArrow"
                                         class="ml-2 transition-transform duration-300"
                                         width="15" height="15" viewBox="0 0 15 15" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.875 5.2125L2.26219 4.6875L12.7566 4.6875L13.125 5.19375L7.84969 10.3125H7.07437L1.875 5.2125Z" fill="#1E433D"></path>
                                    </svg>
                                </button>

                                <div id="guardMenu" class="custom-scrollbar w-44 max-h-60 overflow-y-auto z-50 absolute bg-white divide-y divide-gray-100 rounded-lg shadow-xl hidden">
                                    <ul class="py-2 text-semiblack pb-3 flex flex-col space-y-2 text-14">
                                        <li>
                                            <a class="block py-2 hover:text-magenta mx-4 border-b"
                                               href="https://ldtax.gov.bd/ain-and-bidhi">আইন ও বিধি</a>
                                        </li>
                                        <li>
                                            <a class="block py-2 hover:text-magenta mx-4 border-b"
                                               href="https://ldtax.gov.bd/poripotro">পরিপত্র প্রজ্ঞাপন</a>
                                        </li>
                                        <li>
                                            <a class="block py-2 hover:text-magenta mx-4 border-b"
                                               href="https://ldtax.gov.bd/nitimala">নীতিমালা</a>
                                        </li>
                                        <li>
                                            <a class="block py-2 hover:text-magenta mx-4 border-b"
                                               href="https://ldtax.gov.bd/manual">ম্যানুয়াল</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <button class="lg:hidden" title="Change Language">
                <span class="border border-bottleGreen px-2 bg-bottleGreen px-2 text-slate-50">বাং</span><span class="border border-bottleGreen px-2 bg-white text-bottleGreen">EN</span>
            </button>
            <div class="hidden lg:block">
                <div class="relative">
                    <button id="loginBtn" class="bg-bottleGreen text-white px-4 rounded-full flex items-center gap-1 text-12 lg:text-16 mb-2">
                        <span class="text-center">লগইন</span>
                        <span>
                            <svg
                                class="w-3 h-3 lg:w-4 lg:h-4 fill-current transition-all duration-300 stroke-[4px]"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path
                                    d="M201.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 306.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z">
                                </path>
                            </svg>
                        </span>
                    </button>

                    <ul id="loginMenu"
                        class="hidden bg-white py-5 px-2 flex flex-col gap-2 shadow-lg min-w-[115px] rounded-b-lg absolute max-[1023px]:right-4 text-center text-14">
                        <li class="border border-primary p-1 rounded">
                            <a target="_blank" href="https://lsg-land-owner.land.gov.bd">নাগরিক/সংস্থা</a>
                        </li>
                        <li class="border border-primary p-1 rounded">
                            <a target="_blank" href="https://lsg-land-owner.land.gov.bd/register/bn">রেজিস্ট্রেশন</a>
                        </li>
                        <li class="border border-primary p-1 rounded">
                            <a target="_blank" href="https://office.ldtax.gov.bd/login">প্রশাসনিক</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="px-2 pb-1 flex justify-between lg:hidden gap-2">
        <button class="mobile-menu-button text-[#12633D]">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="currentColor"
                      d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/>
            </svg>
        </button>

        <div>
            <button class="bg-bottleGreen text-white px-4 rounded-full flex items-center gap-1 text-12 lg:text-16 mb-2">
                <span class="text-center">লগইন</span>
                <span>
                    <svg class="w-3 h-3 lg:w-4 lg:h-4 fill-current transition-all duration-300 stroke-[4px] "
                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path
                            d="M201.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 306.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"></path></svg>
                </span>
            </button>
        </div>
    </div>
    <div class="lg:hidden mobile-menu z-50 absolute bg-white w-[94vw] border border-t-0 border-gray-500 shadow-lg shadow-green-100 rounded-b-md hidden">
        <ul class="lg:flex items-center text-left space-y-4 lg:space-y-0 lg:gap-6 lg:text-18 p-2 lg:p-0">
            <li class="border-b lg:border-none p-1 lg:p-0">
                <a class="text-semiblack font-medium hover:text-magenta" href="https://ldtax.gov.bd/">হোম</a>
            </li>
            <li class="group border-b lg:border-none p-1 lg:p-0">
                <div class="inline-block relative">
                    <button class="text-semiblack focus:outline-none font-medium text-center inline-flex items-center">
                        মন্ত্রণালয়/ বিভাগ
                        <svg class="ml-2" width="15" height="15" viewBox="0 0 15 15" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.875 5.2125L2.26219 4.6875L12.7566 4.6875L13.125 5.19375L7.84969 10.3125H7.07437L1.875 5.2125Z"
                                  fill="#1E433D"></path>
                        </svg>
                    </button>
                    <div class="custom-scrollbar w-44 max-h-60 overflow-y-auto z-50 absolute   bg-white divide-y divide-gray-100 rounded-lg shadow-xl hidden">
                        <ul class="py-2 text-semiblack pb-3 flex flex-col space-y-2 text-14" aria-labelledby="dropdownHoverButton1">
                            <li>
                                <a href="https://minland.gov.bd/" class="block py-2 hover:text-magenta mx-4 border-b">ভূমি মন্ত্রণালয়</a>
                            </li>
                            <li>
                                <a href="http://www.lrb.gov.bd/" class="block py-2 hover:text-magenta mx-4 border-b">ভূমি সংস্কার বোর্ড</a>
                            </li>
                            <li>
                                <a href="http://lab.gov.bd/" class="block py-2 hover:text-magenta mx-4 border-b">ভূমি আপিল বোর্ড</a>
                            </li>
                            <li>
                                <a href="http://www.dlrs.gov.bd/" class="block py-2 hover:text-magenta mx-4 border-b">ভূমি রেকর্ড ও জরিপ অধিদপ্তর</a>
                            </li>
                            <li>
                                <a href="http://www.latc.gov.bd/" class="block py-2 hover:text-magenta mx-4 border-b">ভূমি প্রশাসন ও প্রশিক্ষণ কেন্দ্র</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="border-b lg:border-none p-1 lg:p-0">
                <a class="text-semiblack font-medium hover:text-magenta" href="https://ldtax.gov.bd/vumiseba-form">ভূমিসেবা ফর্ম</a>
            </li>
            <li class="group border-b lg:border-none p-1 lg:p-0">
                <div class="inline-block relative">
                    <button class="text-semiblack focus:outline-none font-medium text-center inline-flex items-center">
                        গার্ড ফাইল
                        <svg class="ml-2" width="15" height="15" viewBox="0 0 15 15" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.875 5.2125L2.26219 4.6875L12.7566 4.6875L13.125 5.19375L7.84969 10.3125H7.07437L1.875 5.2125Z"
                                  fill="#1E433D"></path>
                        </svg>
                    </button>
                    <div class="custom-scrollbar w-44 max-h-60 overflow-y-auto z-50 absolute   bg-white divide-y divide-gray-100 rounded-lg shadow-xl hidden">
                        <ul class="py-2 text-semiblack pb-3 flex flex-col space-y-2 text-14" aria-labelledby="dropdownHoverButton1">
                            <li>
                                <a class="block py-2 hover:text-magenta mx-4 border-b" href="https://ldtax.gov.bd/ain-and-bidhi">আইন ও বিধি</a>
                            </li>
                            <li>
                                <a class="block py-2 hover:text-magenta mx-4 border-b" href="https://ldtax.gov.bd/poripotro">পরিপত্র প্রজ্ঞাপন</a>
                            </li>
                            <li>
                                <a class="block py-2 hover:text-magenta mx-4 border-b" href="https://ldtax.gov.bd/nitimala">নীতিমালা</a>
                            </li>
                            <li>
                                <a class="block py-2 hover:text-magenta mx-4 border-b" href="https://ldtax.gov.bd/manual">ম্যানুয়াল</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
