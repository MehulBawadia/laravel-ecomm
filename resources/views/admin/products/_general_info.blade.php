<div class="w-full mx-auto mt-3 bg-gray-50 rounded shadow overflow-hidden">
    <form action="#" method="POST" id="formGeneralInfo">
        @csrf

        <div class="bg-white px-4 py-4">
            <div class="grid grid-cols-1 sm:grid-col-2 md:grid-cols-3 gap-4">
                <div class="w-full">
                    <label for="code" class="text-gray-500">Code:</label>
                    <input type="text" name="code" id="code" value="PRD-123" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="PRD-123" required autofocus />
                </div>
                <div class="w-full">
                    <label for="full_name" class="text-gray-500">Name:</label>
                    <input type="text" name="full_name" id="full_name" value="Product 1" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Product 1" required />
                </div>
                <div class="w-full">
                    <label for="sku" class="text-gray-500">SKU:</label>
                    <input type="text" name="sku" id="sku" value="PRD165SDG" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Product 1" required />
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-col-2 md:grid-cols-3 gap-4 mt-5">
                <div class="w-full">
                    <label for="rate" class="text-gray-500">Rate (in INR):</label>
                    <input type="text" name="rate" id="rate" value="5000" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="2000" required />
                </div>
                <div class="w-full">
                    <label for="discount_percent" class="text-gray-500">Discount Percent <small>(Optional)</small>:</label>
                    <input type="text" name="discount_percent" id="discount_percent" value="0.00" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Product 1" />
                </div>
                <div class="w-full">
                    <label for="tax_percent" class="text-gray-500">Tax Percent:</label>
                    <input type="text" name="tax_percent" id="tax_percent" value="18.00" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="2000" required />
                </div>
            </div>

            <div class="mt-5 grid grid-cols-1 sm:grid-col-2 md:grid-cols-3 gap-4">
                <div class="w-full">
                    <label for="sort_number" class="text-gray-500">Sort Number:</label>
                    <input type="text" name="sort_number" id="sort_number" value="123" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="2" required />
                </div>
                <div class="w-full">
                    <label for="stock_quantity" class="text-gray-500">Stock Quantity:</label>
                    <input type="text" name="stock_quantity" id="stock_quantity" value="10" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Product 1" />
                </div>
                <div class="w-full">
                    <label for="weight" class="text-gray-500">Weight (in gms):</label>
                    <input type="text" name="weight" id="weight" value="500" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="2000" required />
                </div>
            </div>

            <div class="mt-5 flex flex-col md:flex-row items-center justify-center gap-4">
                <div class="w-full">
                    <label for="categories" class="text-gray-500">Categories:</label>
                    <select name="categories[]" id="categories" multiple>
                        <option value="1">Category 1</option>
                        <option value="2">Category 2</option>
                        <option value="3">Category 3</option>
                    </select>
                </div>
                <div class="w-full">
                    <label for="tags" class="text-gray-500">Tags:</label>
                    <select name="tags[]" id="tags" multiple>
                        <option value="1">Tag 1</option>
                        <option value="2">Tag 2</option>
                        <option value="3">Tag 3</option>
                    </select>
                </div>
            </div>

            <div class="mt-5">
                <label for="related_products" class="text-gray-500">Related Products <small>(Optional)</small>:</label>
                <select name="related_products[]" id="related_products" multiple>
                    <option value="2">Product 2</option>
                    <option value="3">Product 3</option>
                </select>
            </div>

            <div class="mt-5">
                <label for="short_description" class="text-gray-500">Short Description:</label>
                <textarea name="short_description" id="short_description" rows="5" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400 resize-none" required>Product Short Description Here</textarea>
            </div>

            <div class="mt-5">
                <label for="description" class="text-gray-500">Description:</label>
                <textarea name="description" id="description" rows="5" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400 resize-none" required>Product Full Description here</textarea>
            </div>
        </div>

        <div class="bg-gray-50 px-4 py-4">
            <button type="submit" class="w-36 bg-blue-500 text-gray-50 py-2 px-3 rounded focus:outline-none hover:bg-blue-600 focus:bg-blue-600 tracking-wider font-medium">Update</button>

            <a href="{{ route('admin.products') }}" class="ml-3 text-gray-500 hover:text-red-500 focus:text-red-500 focus:outline-none transition ease-in-out duration-150" title="Cancel and go to all products page">Cancel</a>
        </div>
    </form>
</div>
