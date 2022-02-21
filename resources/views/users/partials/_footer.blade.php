<footer class="bg-gray-100 text-xs footer">
    <div class="container mx-auto">
        <div class="py-2 px-4 flex flex-col sm:flex-row items-center justify-between">
            <div class="text-gray-400">
                Copyright &copy; {{ date('Y') }}. All Rights Reserved.
            </div>

            <div class="mt-2 sm:mt-0 text-gray-400">
                Built with <span class="text-blue-500 mx-1"><i class="fas fa-heart"></i></span> using Laravel v{{ app()->version() }} by <a href="https://github.com/MehulBawadia" class="hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150" target="_blank" rel="noopener">Mehul Bawadia</a>
            </div>
        </div>
    </div>
</footer>
