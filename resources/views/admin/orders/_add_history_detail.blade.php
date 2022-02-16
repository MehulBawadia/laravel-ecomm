<div id="sectionAddNewHistory" class="overflow-hidden hidden bg-white rounded-md shadow mt-3">
    <div class="bg-gray-50 px-4 py-2">
        <h2>Add New History</h2>
    </div>

    <div class="p-4">
        <form action="#" method="POST" id="formAddHistory">
            @csrf

            <div class="flex gap-x-4 mt-5">
                <div class="w-1/2">
                    <label for="products" class="text-gray-500">Products:</label>
                    <select name="products[]" id="products" multiple required>
                        <option value="1">Product 1</option>
                        <option value="2">Product 2</option>
                    </select>
                </div>
                <div class="w-1/2">
                    <label for="name" class="text-gray-500">Status:</label>
                    <select name="status" id="status" required>
                        <option value=""></option>
                        <option value="processing">Processing</option>
                        <option value="shipped">Shipped</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>
            </div>

            <div class="shippingProvider hidden flex gap-x-4 mt-5">
                <div class="w-1/3">
                    <label for="shipping_company_name" class="text-gray-500">Shipping Company Name:</label>
                    <input type="text" name="shipping_company_name" id="shipping_company_name" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" />
                </div>
                <div class="w-1/3">
                    <label for="shipment_tracking_number" class="text-gray-500">Shipment Tracking No.:</label>
                    <input type="text" name="shipment_tracking_number" id="shipment_tracking_number" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" />
                </div>
                <div class="w-1/3">
                    <label for="shipment_tracking_url" class="text-gray-500">Shipment Tracking URL.:</label>
                    <input type="text" name="shipment_tracking_url" id="shipment_tracking_url" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" />
                </div>
            </div>

            <div class="mt-5">
                <button type="submit" class="w-36 bg-blue-500 text-gray-50 py-2 px-3 rounded focus:outline-none hover:bg-blue-600 focus:bg-blue-600 tracking-wider font-medium">Add</button>

                <button class="linkCancel ml-3 text-gray-500 hover:text-red-500 focus:text-red-500 focus:outline-none transition ease-in-out duration-150" title="Cancel">Cancel</button>
            </div>
        </form>
    </div>
</div>
