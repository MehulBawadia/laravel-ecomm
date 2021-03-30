<footer class="footer">
    <div class="bg-gray-50">
        <div class="container mx-auto">
            <div class="flex flex-wrap justify-between px-4 py-8">
                <div class="mt-5">
                    <h2 class="text-gray-900 text-sm font-semibold font-Rubik uppercase">Contact Information</h2>

                    <p class="mt-5 text-gray-600 text-sm">Call Us 24/7 Free</p>

                    <div class="text-2xl tracking-wide text-blue-500 font-bold my-3">+91 98765 43210</div>

                    <div class="my-3 text-sm">
                        <a href="mailto:support&#64;example.com" class="text-gray-600 hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150" title="Support E-Mail">support&#64;example.com</a>
                    </div>

                    <div class="mt-3 text-sm">
                        <addr class="text-gray-600">4, Station Road, Fort, Mumbai - 400001, India.</addr>
                    </div>
                </div>

                <div class="mt-5">
                    <h2 class="text-gray-900 text-sm font-semibold font-Rubik uppercase">Company</h2>

                    <ul class="mt-5">
                        <li class="text-sm my-3"><a href="#" class="text-gray-600 hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150">About Us</a></li>
                        <li class="text-sm my-3"><a href="#" class="text-gray-600 hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150">Cart</a></li>
                        <li class="text-sm my-3"><a href="#" class="text-gray-600 hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150">Track Your Order</a></li>
                        <li class="text-sm my-3"><a href="#" class="text-gray-600 hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150">Work With Us</a></li>
                        <li class="text-sm my-3"><a href="{{ route('pages.contact') }}" class="text-gray-600 hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150">Contact Us</a></li>
                    </ul>
                </div>

                <div class="mt-5">
                    <h2 class="text-gray-900 text-sm font-semibold font-Rubik uppercase">Explore</h2>

                    <ul class="mt-5">
                        <li class="text-sm my-3"><a href="#" class="text-gray-600 hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150">Gift Product</a></li>
                        <li class="text-sm my-3"><a href="#" class="text-gray-600 hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150">Returns Policy</a></li>
                        <li class="text-sm my-3"><a href="#" class="text-gray-600 hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150">F. A. Qs</a></li>
                        <li class="text-sm my-3"><a href="#" class="text-gray-600 hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150">Privacy Policy</a></li>
                        <li class="text-sm my-3"><a href="#" class="text-gray-600 hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150">Terms &amp; Conditions</a></li>
                    </ul>
                </div>

                <div class="mt-5">
                    <h2 class="text-gray-900 text-sm font-semibold font-Rubik uppercase">Our Location</h2>

                    <img src="{{ asset('/images/bg-map-footer.jpg') }}" alt="{{ config('app.name') }} Location" title="{{ config('app.name') }} Location" class="mt-5" />
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gray-700 text-sm">
        <div class="container mx-auto">
            <div class="py-4 px-4 flex flex-col sm:flex-row items-center justify-between">
                <div class="text-gray-400">
                    Copyright &copy; {{ date('Y') }}. All Rights Reserved.
                </div>

                <div class="mt-2 sm:mt-0 text-gray-400">
                    Built with <span class="text-blue-500 mx-1"><i class="fas fa-heart"></i></span> using Laravel v{{ app()->version() }} by <a href="https://github.com/MehulBawadia" class="hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150" target="_blank" rel="noopener">Mehul Bawadia</a>
                </div>
                <div class="mt-2 sm:mt-0">
                    <img src="{{ asset('/images/payment.png') }}" alt="Supported Payments" title="Supported Payments" />
                </div>
            </div>
        </div>
    </div>
</footer>
