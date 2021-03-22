<section class="bg-blue-500 logoAndSearch px-4">
    <div class="container mx-auto">
        <div class="flex flex-col sm:flex-row items-center justify-between py-8 px-4 text-sm">
            <div>
                <a href="{{ route('homePage') }}" class="text-4xl font-bold text-white tracking-wide hover:text-blue-900 focus:text-blue-900 focus:outline-none transition ease-in-out duration-150" title="Go to Home Page">{{ config('app.name') }}.</a>
            </div>
            <div class="mt-5 sm:mt-0 relative">
                <input type="search" class="rounded py-2 pl-8 w-64 sm:w-96 focus:outline-none focus:ring" placeholder="Search" />

                <div class="absolute top-0 left-0 mt-2 ml-2 text-gray-400"><i class="fas fa-search"></i></div>
            </div>
            <div class="mt-5 sm:mt-0">
                <a href="#" class="text-xl text-white hover:text-blue-900 focus:text-blue-900 focus:outline-none transition ease-in-out duration-150" title="Cart"><i class="fas fa-shopping-cart"></i> : <span class="px-1">0</span></a>
            </div>
        </div>
    </div>
</section>
