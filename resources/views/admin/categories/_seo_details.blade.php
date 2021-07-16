<div class="w-2/3 mx-auto mt-3 bg-gray-50 rounded shadow overflow-hidden">
    <form action="#" method="POST" id="formSeoDetails">
        @csrf

        <div class="bg-white px-4 py-4">
            <div>
                <label for="meta_title" class="text-gray-500">Meta Title:</label>
                <input type="text" name="meta_title" id="meta_title" value="Meta Title Here" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" required />
            </div>

            <div class="mt-5">
                <label for="meta_description" class="text-gray-500">Meta Description:</label>
                <textarea name="meta_description" id="meta_description" rows="5" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400 resize-none">Meta Description Here</textarea>
            </div>

            <div class="mt-5">
                <label for="meta_keywords" class="text-gray-500">Meta Keywords <small>(Optional)</small>:</label>
                <input type="text" name="meta_keywords" id="meta_keywords" value="Meta, Keywords, Here" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" />
            </div>
        </div>

        <div class="bg-gray-50 px-4 py-4">
            <button type="submit" class="w-36 bg-blue-500 text-gray-50 py-2 px-3 rounded focus:outline-none hover:bg-blue-600 focus:bg-blue-600 tracking-wider font-medium">Update</button>

            <a href="{{ route('admin.categories') }}" class="ml-3 text-gray-500 hover:text-red-500 focus:text-red-500 focus:outline-none transition ease-in-out duration-150" title="Cancel and go to all categories page">Cancel</a>
        </div>
    </form>
</div>
