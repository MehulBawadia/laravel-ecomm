<div class="w-2/3 mx-auto mt-3 bg-gray-50 rounded shadow overflow-hidden">
    <form action="#" method="POST" id="formImages">
        @csrf

        <div class="bg-white px-4 py-4">
            <div>
                <label for="default_image" class="text-gray-500">Default Image: <a href="#" class="ml-3 text-xs text-blue-500">View File</a></label>
                <input type="file" name="default_image" id="default_image" class="block px-2 py-1 w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" required />
            </div>

            <div class="mt-5">
                <label for="other_images" class="text-gray-500">Other Images:</label>
                <input type="file" name="other_images[]" id="other_images" class="block px-2 py-1 w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" multiple />
            </div>
        </div>

        <div class="bg-gray-50 px-4 py-4">
            <button type="submit" class="w-36 bg-blue-500 text-gray-50 py-2 px-3 rounded focus:outline-none hover:bg-blue-600 focus:bg-blue-600 tracking-wider font-medium">Update</button>

            <a href="{{ route('admin.products') }}" class="ml-3 text-gray-500 hover:text-red-500 focus:text-red-500 focus:outline-none transition ease-in-out duration-150" title="Cancel and go to all products page">Cancel</a>
        </div>
    </form>
</div>
