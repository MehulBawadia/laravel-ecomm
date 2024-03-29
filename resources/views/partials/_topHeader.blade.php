<div class="h-1 bg-blue-500"></div>

<section class="bg-gray-50 border-b topHeader">
    <div class="container mx-auto">
        <div class="flex items-center justify-between py-2 px-4 text-sm">
            <div class="hidden sm:block">
                <span class="text-gray-400">Email:</span>
                <a href="mailto:{{ $support_email }}" class="ml-1 text-gray-700 hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150" title="Support E-Mail">{{ $support_email }}</a>

                <span class="mx-2">|</span>

                <span class="text-gray-400">Contact:</span>
                <a href="tel:{{ $support_contact_number }}" class="ml-1 text-gray-700 hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150" title="Support Contact">{{ $support_contact_number }}</a>
            </div>
            <div class="mx-auto sm:m-0">
                @guest
                    <a href="{{ route('users.login') }}" class="ml-1 text-gray-700 hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150" title="Login">Login</a>
                @endguest

                @auth
                    <a href="{{ route('users.dashboard') }}" class="ml-1 text-gray-700 hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150" title="My Account">My Account</a>
                @endauth

                <span class="mx-2">|</span>

                <a href="#" class="ml-1 text-gray-700 hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150" title="Affiliates">Affiliates</a>
            </div>
        </div>
    </div>
</section>
