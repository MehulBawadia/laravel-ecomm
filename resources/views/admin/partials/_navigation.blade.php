<div class="w-1/6 h-screen bg-blue-500 navigationMenu">
    <div class="px-4 pt-5 text-center">
        <a href="{{ route('homePage') }}" class="text-4xl font-bold text-white tracking-wide hover:text-blue-900 focus:text-blue-900 focus:outline-none transition ease-in-out duration-150" target="_blank" title="Go to Home Page">{{ config('app.name') }}.</a>
    </div>

    <ul class="mt-5 px-3 space-y-2">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="block rounded @if (request()->url() === route('admin.dashboard')) bg-blue-600 text-white @else text-blue-100 hover:bg-blue-600 @endif pl-3 py-2 tracking-wide hover:text-white focus:text-white focus:outline-none transition ease-in-out duration-150" title="Go to Dashboard"><i class="fas fa-home text-xs"></i> <span class="ml-2">Dashboard</span></a>
        </li>
        <li>
            <a href="{{ route('admin.categories') }}" class="block rounded @if (Str::contains(request()->url(), 'categories')) bg-blue-600 text-white @else text-blue-100 hover:bg-blue-600 @endif pl-3 py-2 tracking-wide hover:text-white focus:text-white focus:outline-none transition ease-in-out duration-150" title="Go to Categories page"><i class="fas fa-arrows-alt text-xs"></i> <span class="ml-2">Categories</span></a>
        </li>
        <li>
            <a href="{{ route('admin.tags') }}" class="block rounded @if (Str::contains(request()->url(), 'tags')) bg-blue-600 text-white @else text-blue-100 hover:bg-blue-600 @endif pl-3 py-2 tracking-wide hover:text-white focus:text-white focus:outline-none transition ease-in-out duration-150" title="Go to Tags page"><i class="fas fa-tags text-xs"></i> <span class="ml-2">Tags</span></a>
        </li>
        <li>
            <a href="{{ route('admin.coupons') }}" class="block rounded @if (Str::contains(request()->url(), 'coupons')) bg-blue-600 text-white @else text-blue-100 hover:bg-blue-600 @endif pl-3 py-2 tracking-wide hover:text-white focus:text-white focus:outline-none transition ease-in-out duration-150" title="Go to Coupons page"><i class="fas fa-percent text-xs"></i> <span class="ml-2">Coupons</span></a>
        </li>
        <li>
            <a href="{{ route('admin.products') }}" class="block rounded @if (Str::contains(request()->url(), 'products')) bg-blue-600 text-white @else text-blue-100 hover:bg-blue-600 @endif pl-3 py-2 tracking-wide hover:text-white focus:text-white focus:outline-none transition ease-in-out duration-150" title="Go to Products page"><i class="fas fa-cubes text-xs"></i> <span class="ml-2">Products</span></a>
        </li>
        <li>
            <a href="#" class="block bg-transparent pl-3 py-2 rounded text-blue-100 tracking-wide hover:bg-blue-600 hover:text-white focus:text-white focus:outline-none transition ease-in-out duration-150" title="Go to Users page"><i class="fas fa-users text-xs"></i> <span class="ml-2">Users</span></a>
        </li>
        <li>
            <a href="#" class="block bg-transparent pl-3 py-2 rounded text-blue-100 tracking-wide hover:bg-blue-600 hover:text-white focus:text-white focus:outline-none transition ease-in-out duration-150" title="Go to Users page"><i class="fas fa-comment text-xs"></i> <span class="ml-2">Testimonials</span></a>
        </li>
        <li>
            <div class="border border-blue-400"></div>
        </li>
        <li>
            <a href="{{ route('admin.orders') }}" class="block rounded @if (Str::contains(request()->url(), 'orders')) bg-blue-600 text-white @else text-blue-100 hover:bg-blue-600 @endif pl-3 py-2 tracking-wide hover:text-white focus:text-white focus:outline-none transition ease-in-out duration-150" title="Go to Orders page"><i class="fas fa-rupee-sign text-xs"></i> <span class="ml-2">Orders</span></a>
        </li>
        <li>
            <div class="border border-blue-400"></div>
        </li>
        <li>
            <a href="#" class="block bg-transparent pl-3 py-2 rounded text-blue-100 tracking-wide hover:bg-blue-600 hover:text-white focus:text-white focus:outline-none transition ease-in-out duration-150" title="Go to Settings page"><i class="fas fa-cog text-xs"></i> <span class="ml-2">Site Settings</span></a>
        </li>
    </ul>
</div>
