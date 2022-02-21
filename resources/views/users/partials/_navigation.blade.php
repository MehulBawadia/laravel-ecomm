<div class="hidden md:block md:w-1/4 lg:w-1/6 h-screen bg-white border-r navigationMenu">
    <div class="py-4 fixed text-center border-b md:w-1/4 lg:w-1/6 bg-white shadow">
        <a href="{{ route('homePage') }}" class="text-2xl font-bold text-indigo-500 tracking-wide hover:text-indigo-600 focus:text-indigo-600 focus:outline-none transition ease-in-out duration-150" target="_blank" title="Go to Home Page"><span class="text-2xl"><i class="fas fa-shopping-cart"></i></span> {{ config('app.name') }}</a>
    </div>

    <ul class="mt-24 space-y-2">
        <li>
            <a href="{{ route('users.dashboard') }}" class="block @if (request()->url() === route('users.dashboard')) bg-blue-100 text-indigo-600 border-l-4 border-blue-600 @else text-gray-500 @endif py-2 px-3 tracking-wide hover:text-indigo-600 hover:bg-blue-100 border-l-4 border-transparent hover:border-blue-600 focus:text-indigo-600 focus:border-blue-600 focus:bg-blue-100 focus:outline-none transition ease-in-out duration-150" title="Go to Dashboard"><span class="w-6 inline-block"><i class="fas fa-home text-lg"></i></span> <span class="ml-2">Dashboard</span></a>
        </li>
    </ul>
</div>
