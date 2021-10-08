<div class="mt-3 bg-gray-50 rounded shadow overflow-hidden">
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" id="formEditGeneral">
        @csrf
        @method('PATCH')

        <div class="bg-white px-4 py-4">
            <div class="flex flex-col md:flex-row items-center justify-center gap-4">
                <div class="w-full md:w-2/3">
                    <label for="name" class="text-gray-500">Name:</label>
                    <input type="text" name="name" id="name" value="{{ $category->name }}" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Category 1" required autofocus />
                    <span data-name="name"></span>
                </div>
                <div class="w-full md:w-1/3">
                    <label for="status" class="text-gray-500">Status:</label>
                    <select name="status" id="status" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500">
                        @foreach ($statuses as $key => $status)
                            <option value="{{ $key }}" @if ($category->status == $key) selected @endif>{{ $status }}</option>
                        @endforeach
                    </select>
                    <span data-name="status"></span>
                </div>
            </div>
            <div class="mt-5">
                <label for="description" class="text-gray-500">Description <small>(Optional)</small>:</label>
                <textarea name="description" id="description" rows="5" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400 resize-none">{{ $category->description }}</textarea>
                <span data-name="description"></span>
            </div>
        </div>

        <div class="bg-gray-50 px-4 py-4">
            <button type="submit" class="w-36 bg-indigo-500 text-gray-50 py-2 px-3 rounded focus:outline-none hover:bg-indigo-600 focus:bg-indigo-600 tracking-wider font-medium btnEditCategory" data-form="#formEditGeneral">Update</button>

            <a href="{{ route('admin.categories') }}" class="ml-3 border border-gray-300 bg-transparent text-gray-500 py-2 px-3 rounded hover:text-gray-600 hover:border-gray-600 focus:text-gray-600 focus:border-gray-600 focus:outline-none focus:bg-white tracking-wider" title="Cancel and go to all categories page">Cancel</a>
        </div>
    </form>
</div>
