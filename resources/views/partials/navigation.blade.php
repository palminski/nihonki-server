<nav class=" z-50 p-4 bg-black border-b border-purple-800 " x-data="{ open: false }">
    <section class="hidden  lg:flex justify-between ml-[50px]">
        <a class="" href="/">
            {{-- @include('partials.morph_text') --}}
            <h1 class="text-purple-200 font-thin tracking-[25px] text-6xl">UMEBOSHI <span class="text-sm lg:text-2xl">- 梅干</span></h1>

        </a>
        <ul class="flex flex-end space-x-4 font-barcode">

        </ul>
    </section>

    <section class=" p-2 flex lg:hidden justify-center">
        <a href="/">
            <h1 class="text-purple-200 font-light tracking-[20px] text-3xl text-center">UMEBOSHI</h1>
        </a>
        {{-- <div class="flex justify-center items-center cursor-pointer" x-on:click="open=!open">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-9">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </div> --}}

    </section>
    <div x-show="open" class="xl:hidden  transition-all duration-500 ease-in-out transform">

        {{-- <ul
            class="flex absolute flex-col items-left px-9 justify-between bg-zinc-800 w-full transition-all duration-500 ease-in-out transform">

            <li class="my-2">
                test
            </li>
            <li class="my-2">
                test
            </li>
            <li class="my-2">
                test
            </li>
            <li class="my-2">
                test
            </li>

        </ul> --}}

        <ul
            class="flex absolute flex-col items-left  justify-between bg-zinc-800 w-full transition-all duration-500 ease-in-out text-xl transform text-red-300 ">


        </ul>
    </div>

</nav>
