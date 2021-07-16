<div class="w-2/3 mx-auto mt-3 bg-gray-50 rounded shadow overflow-hidden">
    <form action="#" method="POST" id="formGeneralInfo">
        @csrf

        <div class="bg-white px-4 py-4">
            <div class="flex flex-col md:flex-row items-center justify-center gap-4">
                <div class="w-2/3">
                    <label for="full_name" class="text-gray-500">Name:</label>
                    <input type="text" name="full_name" id="full_name" value="Category 1" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Category 1" required autofocus />
                </div>
                <div class="w-1/3">
                    <label for="full_name" class="text-gray-500">Status:</label>
                    <select name="status" id="status" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500">
                        <option value="draft">Draft</option>
                        <option value="published">Published</option>
                    </select>
                </div>
            </div>
            <div class="mt-5">
                <label for="description" class="text-gray-500">Description <small>(Optional)</small>:</label>
                <textarea name="description" id="description" rows="5" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400 resize-none">Category Description Here</textarea>
            </div>
        </div>

        <div class="bg-gray-50 px-4 py-4">
            <button type="submit" class="w-36 bg-blue-500 text-gray-50 py-2 px-3 rounded focus:outline-none hover:bg-blue-600 focus:bg-blue-600 tracking-wider font-medium">Update</button>

            <a href="{{ route('admin.categories') }}" class="ml-3 text-gray-500 hover:text-red-500 focus:text-red-500 focus:outline-none transition ease-in-out duration-150" title="Cancel and go to all categories page">Cancel</a>
        </div>
    </form>
</div>
