<div class="w-full sm:w-1/3 md:w-1/4 lg:w-1/5">
    <div class="categoriesList">
        <div class="border-b">
            <h3 class="uppercase text-gray-900 font-Rubik font-bold pb-2">
                <span class="border-b-4 border-blue-500 pb-2">Categories</span>
            </h3>
        </div>

        <ul class="mt-5 space-y-3">
            <li>
                <span class="text-xs text-gray-400"><i class="fas fa-chevron-right"></i></span>
                <a href="{{ route('categories.show', 'category-1') }}" class="ml-1 text-gray-400 hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150" title="Filter products by Category 1">Category 1</a>
            </li>
            <li>
                <span class="text-xs text-gray-400"><i class="fas fa-chevron-right"></i></span>
                <a href="{{ route('categories.show', 'category-1') }}" class="ml-1 text-gray-400 hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150" title="Filter products by Category 2">Category 2</a>
            </li>
            <li>
                <span class="text-xs text-gray-400"><i class="fas fa-chevron-right"></i></span>
                <a href="{{ route('categories.show', 'category-1') }}" class="ml-1 text-gray-400 hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150" title="Filter products by Category 3">Category 3</a>
            </li>
            <li>
                <span class="text-xs text-gray-400"><i class="fas fa-chevron-right"></i></span>
                <a href="{{ route('categories.show', 'category-1') }}" class="ml-1 text-gray-400 hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150" title="Filter products by Category 4">Category 4</a>
            </li>
            <li>
                <span class="text-xs text-gray-400"><i class="fas fa-chevron-right"></i></span>
                <a href="{{ route('categories.show', 'category-1') }}" class="ml-1 text-gray-400 hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150" title="Filter products by Category 5">Category 5</a>
            </li>
        </ul>
    </div>

    <div class="tagsList my-8">
        <div class="border-b">
            <h3 class="uppercase text-gray-900 font-Rubik font-bold pb-2">
                <span class="border-b-4 border-blue-500 pb-2">Tags</span>
            </h3>
        </div>

        <ul class="mt-5 flex flex-wrap gap-4">
            <li class="border px-4 py-2 my-2 bg-blue-500 text-white hover:text-white hover:bg-blue-500 focus:text-white focus:bg-blue-500 transition ease-in-out duration-150">
                <a href="{{ route('tags.show', 'tag-1') }}" title="Filter products by Tag 1">Tag 1</a>
            </li>
            <li class="border px-4 py-2 my-2 text-gray-400 hover:text-white hover:bg-blue-500 focus:text-white focus:bg-blue-500 transition ease-in-out duration-150">
                <a href="{{ route('tags.show', 'tag-1') }}" title="Filter products by Tag 2">Tag 2</a>
            </li>
            <li class="border px-4 py-2 my-2 text-gray-400 hover:text-white hover:bg-blue-500 focus:text-white focus:bg-blue-500 transition ease-in-out duration-150">
                <a href="{{ route('tags.show', 'tag-1') }}" title="Filter products by Tag 3">Tag 3</a>
            </li>
            <li class="border px-4 py-2 my-2 text-gray-400 hover:text-white hover:bg-blue-500 focus:text-white focus:bg-blue-500 transition ease-in-out duration-150">
                <a href="{{ route('tags.show', 'tag-1') }}" title="Filter products by Tag 4">Tag 4</a>
            </li>
            <li class="border px-4 py-2 my-2 text-gray-400 hover:text-white hover:bg-blue-500 focus:text-white focus:bg-blue-500 transition ease-in-out duration-150">
                <a href="{{ route('tags.show', 'tag-1') }}" title="Filter products by Tag 5">Tag 5</a>
            </li>
        </ul>
    </div>
</div>
