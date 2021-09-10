<section class="pageHeader bg-white shadow fixed w-full md:w-3/4 lg:w-5/6">
    <div class="container mx-auto">
        <div class="flex justify-between items-center px-4 py-4">
            @yield('pageTitle')

            <a href="#" class="block md:hidden text-2xl bottomNav">
                <i class="fas fa-bars"></i>
            </a>

            <div class="hidden md:flex items-center">
                <div class="flex-none">
                    <img src="{{ asset('/images/user-default.jpg') }}" alt="Administrator" title="Administrator" class="rounded-full w-8 h-8" />
                </div>

                <div class="ml-2 text-gray-500 text-sm relative">
                    <a href="#" class="text-gray-700 text-sm tracking-wide avatarNav">Super Adminstrator <span class="text-gray-400"><i class="fas fa-chevron-down"></i></span></a>

                    <div class="hidden avatarNavList absolute w-40 right-0 mt-3 rounded bg-gray-100 border shadow">
                        <ul>
                            <li class="my-1">
                                <a href="{{ route('admin.accountSettings') }}" class="block pl-3 py-1 hover:bg-blue-500 hover:text-white">Account Settings</a>
                            </li>
                            <li><div class="border-b"></div></li>
                            <li class="my-1">
                                <a href="{{ route('admin.logout') }}" class="block pl-3 py-1 hover:bg-blue-500 hover:text-white">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
