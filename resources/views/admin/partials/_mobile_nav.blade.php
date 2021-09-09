<div class="w-full hidden adminBottomNav bg-white px-3 py-3 rounded-t-3xl border border-blue-600 fixed bottom-0 flex flex-wrap items-center justify-center gap-5" style="z-index: 10000;">
    <a href="{{ route('admin.dashboard') }}" class="w-24 text-center text-sm @if (request()->url() === route('admin.dashboard')) bg-blue-100 text-indigo-600 rounded-xl p-3 @else text-gray-500 @endif">
        <div class="text-xl"><i class="fas fa-home"></i></div>
        <div>Dashboard</div>
    </a>

    <a href="{{ route('admin.categories') }}" class="w-24 text-center text-sm @if (request()->url() === route('admin.categories')) bg-blue-100 text-indigo-600 rounded-xl p-3 @else text-gray-500 @endif">
        <div class="text-xl"><i class="fas fa-arrows-alt"></i></div>
        <div>Categories</div>
    </a>

    <a href="{{ route('admin.tags') }}" class="w-24 text-center text-sm @if (request()->url() === route('admin.tags')) bg-blue-100 text-indigo-600 rounded-xl p-3 @else text-gray-500 @endif">
        <div class="text-xl"><i class="fas fa-tags"></i></div>
        <div>Tags</div>
    </a>

    <a href="{{ route('admin.coupons') }}" class="w-24 text-center text-sm @if (request()->url() === route('admin.coupons')) bg-blue-100 text-indigo-600 rounded-xl p-3 @else text-gray-500 @endif">
        <div class="text-xl"><i class="fas fa-percent"></i></div>
        <div>Coupons</div>
    </a>

    <a href="{{ route('admin.products') }}" class="w-24 text-center text-sm @if (request()->url() === route('admin.products')) bg-blue-100 text-indigo-600 rounded-xl p-3 @else text-gray-500 @endif">
        <div class="text-xl"><i class="fas fa-cubes"></i></div>
        <div>Products</div>
    </a>

    <a href="{{ route('admin.users') }}" class="w-24 text-center text-sm @if (request()->url() === route('admin.users')) bg-blue-100 text-indigo-600 rounded-xl p-3 @else text-gray-500 @endif">
        <div class="text-xl"><i class="fas fa-users"></i></div>
        <div>Users</div>
    </a>

    <a href="{{ route('admin.orders') }}" class="w-24 text-center text-sm @if (request()->url() === route('admin.orders')) bg-blue-100 text-indigo-600 rounded-xl p-3 @else text-gray-500 @endif">
        <div class="text-xl"><i class="fas fa-rupee-sign"></i></div>
        <div>Orders</div>
    </a>

    <a href="{{ route('admin.siteSettingsGeneral') }}" class="w-24 text-center text-sm @if (request()->url() === route('admin.siteSettingsGeneral')) bg-blue-100 text-indigo-600 rounded-xl p-3 @else text-gray-500 @endif">
        <div class="text-xl"><i class="fas fa-cog"></i></div>
        <div>Site Settings</div>
    </a>

    <a href="{{ route('admin.accountSettings') }}" class="w-24 text-center text-sm @if (request()->url() === route('admin.accountSettings')) bg-blue-100 text-indigo-600 rounded-xl p-3 @else text-gray-500 @endif">
        <div class="text-xl"><i class="fas fa-cog"></i></div>
        <div>A/c Settings</div>
    </a>

    <a href="{{ route('admin.logout') }}" class="w-24 text-center text-sm @if (request()->url() === route('admin.logout')) bg-blue-100 text-indigo-600 rounded-xl p-3 @else text-gray-500 @endif">
        <div class="text-xl"><i class="fas fa-sign-out-alt"></i></div>
        <div>Logout</div>
    </a>
</div>
