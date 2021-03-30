<section class="navigation bg-blue-600">
    <div class="container mx-auto">
        <div class="hidden sm:block py-2 px-4">
            <ul class="flex space-x-8">
                <li class="font-Rubik font-semibold">
                    <a href="{{ route('homePage') }}" class="uppercase text-gray-200 hover:text-white focus:text-white focus:outline-none transition ease-in-out duration-150" title="Home Page">Home</a>
                </li>
                <li class="font-Rubik font-semibold">
                    <a href="{{ route('categories.show', 'category-1') }}" class="uppercase text-gray-200 hover:text-white focus:text-white focus:outline-none transition ease-in-out duration-150" title="Category 1">Category 1</a>
                </li>
                <li class="font-Rubik font-semibold">
                    <a href="{{ route('categories.show', 'category-1') }}" class="uppercase text-gray-200 hover:text-white focus:text-white focus:outline-none transition ease-in-out duration-150" title="Category 2">Category 2</a>
                </li>
                <li class="font-Rubik font-semibold">
                    <a href="{{ route('pages.contact') }}" class="uppercase text-gray-200 hover:text-white focus:text-white focus:outline-none transition ease-in-out duration-150" title="Contact Page">Contact</a>
                </li>
            </ul>
        </div>
        <div class="block sm:hidden py-2 px-4">
            <ul class="flex space-x-8">
                <li class="font-Rubik font-semibold">
                    <a href="{{ route('homePage') }}" class="uppercase text-gray-200 hover:text-white focus:text-white focus:outline-none transition ease-in-out duration-150" title="Home Page"><i class="fas fa-home"></i></a>
                </li>
            </ul>
        </div>
    </div>
</section>
