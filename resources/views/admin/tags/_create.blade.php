<div id="sectionAddNewTag" class="overflow-hidden hidden bg-white rounded-md shadow mx-4 mt-3">
    <div class="bg-gray-50 px-4 py-2">
        <h2>Add New Tag</h2>
    </div>

    <div class="p-4">
        <p class="text-red-400 text-sm tracking-wider">You will be redirected to the Edit Tag page once you click on Add button.</p>

        <form action="{{ route('admin.tags.store') }}" method="POST" id="formAddTag">
            @csrf

            <div class="flex mt-5">
                <div class="w-1/2">
                    <label for="name" class="text-gray-500">Name:</label>
                    <input type="text" name="name" id="name" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" required />
                    <span data-name="name"></span>
                </div>
                <div class="mt-7 ml-5 w-1/2">
                    <button type="submit" class="w-36 bg-indigo-500 text-gray-50 py-2 px-3 rounded focus:outline-none hover:bg-indigo-600 focus:bg-indigo-600 tracking-wider font-medium btnAddTag">Add</button>

                    <button class="linkCancel ml-3 border border-gray-300 bg-transparent text-gray-500 py-2 px-3 rounded hover:text-gray-600 hover:border-gray-600 focus:text-gray-600 focus:border-gray-600 focus:outline-none focus:bg-white tracking-wider" title="Cancel">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
