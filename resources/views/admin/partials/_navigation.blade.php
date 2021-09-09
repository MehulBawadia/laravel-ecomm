<div class="hidden sm:block sm:w-1/6 h-screen bg-white border-r navigationMenu">
    <div class="pt-5 text-center">
        <a href="{{ route('homePage') }}" class="text-2xl font-bold text-gray-800 tracking-wide hover:text-indigo-600 focus:text-indigo-600 focus:outline-none transition ease-in-out duration-150" target="_blank" title="Go to Home Page"><span class="text-2xl"><i class="fas fa-shopping-cart"></i></span> {{ config('app.name') }}</a>
    </div>

    <ul class="mt-5 space-y-2">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="block @if (request()->url() === route('admin.dashboard')) bg-blue-100 text-indigo-600 border-l-4 border-blue-600 @else text-gray-500 @endif py-2 px-3 tracking-wide hover:text-indigo-600 hover:bg-blue-100 border-l-4 border-transparent hover:border-blue-600 focus:text-indigo-600 focus:border-blue-600 focus:bg-blue-100 focus:outline-none transition ease-in-out duration-150" title="Go to Dashboard"><span class="w-6 inline-block"><i class="fas fa-home text-lg"></i></span> <span class="ml-2">Dashboard</span></a>
        </li>
        <li>
            <a href="{{ route('admin.categories') }}" class="block @if (Str::contains(request()->url(), 'categories')) bg-blue-100 text-indigo-600 border-l-4 border-blue-600 @else text-gray-500 @endif py-2 px-3 tracking-wide hover:text-indigo-600 hover:bg-blue-100 border-l-4 border-transparent hover:border-blue-600 focus:text-indigo-600 focus:border-blue-600 focus:bg-blue-100 focus:outline-none transition ease-in-out duration-150" title="Go to Categories page"><span class="w-6 inline-block text-center"><i class="fas fa-arrows-alt text-lg"></i></span> <span class="ml-2">Categories</span></a>
        </li>
        <li>
            <a href="{{ route('admin.tags') }}" class="block @if (Str::contains(request()->url(), 'tags')) bg-blue-100 text-indigo-600 border-l-4 border-blue-600 @else text-gray-500 @endif py-2 px-3 tracking-wide hover:text-indigo-600 hover:bg-blue-100 border-l-4 border-transparent hover:border-blue-600 focus:text-indigo-600 focus:border-blue-600 focus:bg-blue-100 focus:outline-none transition ease-in-out duration-150" title="Go to Tags page"><span class="w-6 inline-block text-center"><i class="fas fa-tags text-lg"></i></span> <span class="ml-2">Tags</span></a>
        </li>
        <li>
            <a href="{{ route('admin.coupons') }}" class="block @if (Str::contains(request()->url(), 'coupons')) bg-blue-100 text-indigo-600 border-l-4 border-blue-600 @else text-gray-500 @endif py-2 px-3 tracking-wide hover:text-indigo-600 hover:bg-blue-100 border-l-4 border-transparent hover:border-blue-600 focus:text-indigo-600 focus:border-blue-600 focus:bg-blue-100 focus:outline-none transition ease-in-out duration-150" title="Go to Coupons page"><span class="w-6 inline-block text-center"><i class="fas fa-percent text-lg"></i></span> <span class="ml-2">Coupons</span></a>
        </li>
        <li>
            <a href="{{ route('admin.products') }}" class="block @if (Str::contains(request()->url(), 'products')) bg-blue-100 text-indigo-600 border-l-4 border-blue-600 @else text-gray-500 @endif py-2 px-3 tracking-wide hover:text-indigo-600 hover:bg-blue-100 border-l-4 border-transparent hover:border-blue-600 focus:text-indigo-600 focus:border-blue-600 focus:bg-blue-100 focus:outline-none transition ease-in-out duration-150" title="Go to Products page"><span class="w-6 inline-block text-center"><i class="fas fa-cubes text-lg"></i></span> <span class="ml-2">Products</span></a>
        </li>
        <li>
            <a href="{{ route('admin.users') }}" class="block @if (Str::contains(request()->url(), 'users')) bg-blue-100 text-indigo-600 border-l-4 border-blue-600 @else text-gray-500 @endif py-2 px-3 tracking-wide hover:text-indigo-600 hover:bg-blue-100 border-l-4 border-transparent hover:border-blue-600 focus:text-indigo-600 focus:border-blue-600 focus:bg-blue-100 focus:outline-none transition ease-in-out duration-150" title="Go to Users page"><span class="w-6 inline-block text-center"><i class="fas fa-users text-lg"></i></span> <span class="ml-2">Users</span></a>
        </li>
        <li>
            <a href="{{ route('admin.orders') }}" class="block @if (Str::contains(request()->url(), 'orders')) bg-blue-100 text-indigo-600 border-l-4 border-blue-600 @else text-gray-500 @endif py-2 px-3 tracking-wide hover:text-indigo-600 hover:bg-blue-100 border-l-4 border-transparent hover:border-blue-600 focus:text-indigo-600 focus:border-blue-600 focus:bg-blue-100 focus:outline-none transition ease-in-out duration-150" title="Go to Orders page"><span class="w-6 inline-block text-center"><i class="fas fa-rupee-sign text-lg"></i></span> <span class="ml-2">Orders</span></a>
        </li>
        <li>
            <a href="{{ route('admin.siteSettingsGeneral') }}" class="block @if (Str::contains(request()->url(), 'site-settings-general')) bg-blue-100 text-indigo-600 border-l-4 border-blue-600 @else text-gray-500 @endif py-2 px-3 tracking-wide hover:text-indigo-600 hover:bg-blue-100 border-l-4 border-transparent hover:border-blue-600 focus:text-indigo-600 focus:border-blue-600 focus:bg-blue-100 focus:outline-none transition ease-in-out duration-150" title="Go to Settings page"><span class= text-center"w-6 inline-block"><i class="fas fa-cog text-lg"></i></span> <span class="ml-2">Site Settings</span></a>
        </li>
    </ul>
</div>
