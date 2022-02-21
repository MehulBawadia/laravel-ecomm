<div class="w-full hidden adminBottomNav bg-white px-3 py-3 rounded-t-3xl border border-blue-600 fixed bottom-0 flex flex-wrap items-center justify-center gap-5" style="z-index: 10000;">
    <a href="{{ route('users.dashboard') }}" class="w-24 text-center text-sm @if (request()->url() === route('users.dashboard')) bg-blue-100 text-indigo-600 rounded-xl p-3 @else text-gray-500 @endif">
        <div class="text-xl"><i class="fas fa-home"></i></div>
        <div>Dashboard</div>
    </a>

    <a href="{{ route('users.logout') }}" class="w-24 text-center text-sm @if (request()->url() === route('users.logout')) bg-blue-100 text-indigo-600 rounded-xl p-3 @else text-gray-500 @endif">
        <div class="text-xl"><i class="fas fa-sign-out-alt"></i></div>
        <div>Logout</div>
    </a>
</div>
