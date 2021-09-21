<div class="mt-3 bg-gray-50 rounded shadow overflow-hidden">
    <form action="{{ route('admin.coupons.update', $coupon->id) }}" method="POST" id="formEditGeneral">
        @csrf
        @method('PATCH')

        <div class="bg-white px-4 py-4">
            <div class="flex flex-col md:flex-row items-center justify-center gap-4">
                <div class="w-1/3">
                    <label for="name" class="text-gray-500">Name:</label>
                    <input type="text" name="name" id="name" value="{{ $coupon->name }}" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Coupon 1" required autofocus />
                    <span data-name="name"></span>
                </div>
                <div class="w-1/3">
                    <label for="code" class="text-gray-500">Code:</label>
                    <input type="text" name="code" id="code" value="{{ $coupon->code }}" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Coupon 1" required />
                    <span data-name="code"></span>
                </div>
                <div class="w-1/3">
                    <label for="type" class="text-gray-500">Type:</label>
                    <select name="type" id="type" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 capitalize">
                        @foreach (['flat', 'percentage'] as $type)
                            <option value="{{ $type }}" @if ($coupon->type == $type) selected @endif>{{ $type }}</option>
                        @endforeach
                    </select>
                    <span data-name="type"></span>
                </div>
            </div>

            <div class="flex flex-col md:flex-row items-center justify-center gap-4 mt-5">
                <div class="w-1/2">
                    <label for="starts_at" class="text-gray-500">Starts At:</label>
                    <input type="text" name="starts_at" id="starts_at" value="{{ $coupon->starts_at->format('m/d/Y') }}" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Coupon 1" required />
                    <span data-name="starts_at"></span>
                </div>
                <div class="w-1/2">
                    <label for="ends_at" class="text-gray-500">Ends At:</label>
                    <input type="text" name="ends_at" id="ends_at" value="{{ $coupon->ends_at->format('m/d/Y') }}" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Coupon 1" required />
                    <span data-name="ends_at"></span>
                </div>
            </div>

            <div class="flex flex-col md:flex-row items-center justify-center gap-4 mt-5">
                <div class="w-1/2">
                    <label for="percent_or_amount" class="text-gray-500">Percent or Amount:</label>
                    <input type="text" name="percent_or_amount" id="percent_or_amount" value="{{ $coupon->percent_or_amount }}" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Coupon 1" required />
                    <span data-name="percent_or_amount"></span>
                </div>
                <div class="w-1/2">
                    <label for="minimum_amount" class="text-gray-500">Minimum Amount:</label>
                    <input type="text" name="minimum_amount" id="minimum_amount" value="{{ $coupon->minimum_amount }}" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Coupon 1" required />
                    <span data-name="minimum_amount"></span>
                </div>
            </div>

            <div class="mt-5">
                <label for="description" class="text-gray-500">Description <small>(Optional)</small>:</label>
                <textarea name="description" id="description" rows="5" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400 resize-none">{{ $coupon->description }}</textarea>
                <span data-name="description"></span>
            </div>
        </div>

        <div class="bg-gray-50 px-4 py-4">
            <button type="submit" class="w-36 bg-indigo-500 text-gray-50 py-2 px-3 rounded focus:outline-none hover:bg-indigo-600 focus:bg-indigo-600 tracking-wider font-medium btnEditCoupon" data-form="#formEditGeneral">Update</button>

            <a href="{{ route('admin.coupons') }}" class="ml-3 border border-gray-300 bg-transparent text-gray-500 py-2 px-3 rounded hover:text-gray-600 hover:border-gray-600 focus:text-gray-600 focus:border-gray-600 focus:outline-none focus:bg-white tracking-wider" title="Cancel and go to all coupons page">Cancel</a>
        </div>
    </form>
</div>
