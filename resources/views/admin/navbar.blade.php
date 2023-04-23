<nav class="fixed top-0 z-30 w-full bg-white border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start w-64">
                <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar"
                    aria-controls="default-sidebar" type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="https://flowbite.com" class="flex ml-2 md:mr-24">
                    {{-- <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="FlowBite Logo" /> --}}
                    <span
                        class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">PensClinic</span>
                </a>
            </div>

            <div class="flex items-center w-full ml-6">
                <div class="flex flex-row items-center justify-start hidden w-full md:flex md:w-auto md:order-1">

                    <!-- ACTIVE -->
                    <div class="mx-1 inline-block cursor-pointer">

                        <!-- TITLE -->
                        <div class="flex content-center absolute z-20 top-[26px] ml-12 mt-2">

                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="11" cy="11" r="7" fill="rgb(59 130 246)" />
                                <circle cx="11" cy="11" r="9" stroke="rgb(59 130 246)"
                                    stroke-opacity="0.3" stroke-width="4" />
                            </svg>

                            <p class="ml-2 text-sm text-slate-400">{{ $title }}</p>

                        </div>

                        <!-- BG -->
                        <div class="relative  z-10 top-[14px] ">
                            <svg width="206" height="39" viewBox="0 0 190 39" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M205.943 39H0C0 39 17.065 38.632 22.4943 24.5558C31.9654 0.000488281 36.793 0.000488281 50.9995 0.000488281H51H103L155 0.00040851H155.001C155.212 0.000408509 155.42 0.000408509 155.627 0.000488929C169.733 0.000705916 174.063 0.0735916 183.506 24.5558C188.951 38.6733 204.869 38.9945 205.943 39Z"
                                    fill="rgb(241 245 249)" />
                            </svg>
                        </div>

                    </div>


                    <!-- INACTIVE -->
                    {{-- <div class="flex self-baseline cursor-pointer  mr-12">

                        <!-- TITLE -->
                        <div class="flex relative top-3 content-center ml-2 mt-2">

                            <svg class="hidden" width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="11" cy="11" r="7" fill="#ACFF8E" />
                                <circle cx="11" cy="11" r="9" stroke="#ACFF8E"
                                    stroke-opacity="0.3" stroke-width="4" />
                            </svg>

                            <p class=" text-sm text-gray-500">Earnings</p>

                        </div>

                        <!-- BG -->
                        <div class="hidden">
                            <svg width="249" height="39" viewBox="0 0 249 39" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0 38.4999H248.034C246.741 38.4944 227.569 38.1774 221.011 24.2409C209.604 0 209.604 0 192.493 0L124.051 0.000403272L55.6092 0C38.4987 0 38.4987 9.24674e-05 27.0917 24.2407L27.0917 24.2409C20.5527 38.1367 0 38.4999 0 38.4999Z"
                                    fill="white" />
                            </svg>
                        </div>

                    </div> --}}

                </div>
            </div>
        </div>
    </div>
</nav>
