<nav>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" style="background-color: aliceblue;">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <img src="{{ asset('/uploads/img/logo.jpg') }}" alt="Logo" height="100px">
            </div>

            <!-- Desktop Dropdown -->
            <div class="hidden sm:flex sm:items-center">
                <div class="relative">
                    <button id="dropdownButton"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-600 hover:text-gray-800 focus:outline-none">
                        {{ Auth::user()->name }}
                        <svg class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 8l4 4 4-4" />
                        </svg>
                    </button>
                    <div id="dropdownMenu"
                        class="hidden absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg z-50">
                        <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Log
                                Out</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <div class="sm:hidden relative" style="height: -20px; width: auto;">
                <button id="mobileMenuButton" 
                    class="p-2 rounded-md text-gray-600 hover:text-gray-800 hover:bg-gray-100 focus:outline-none">
                    {{ Auth::user()->name }}
                    <!-- Hamburger -->
                    <!-- <svg id="hamburgerIcon" class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg> -->
                    <!-- Close -->
                    <svg id="closeIcon" class="hidden h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Small Dropdown for Mobile -->
                <div id="mobileMenu"
                    class="hidden absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg z-50">
                    <a href="{{ route('dashboard') }}"
                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Dashboard</a>
                    <a href="{{ route('profile.edit') }}"
                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Log
                            Out</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- JS -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Desktop Dropdown
        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownMenu = document.getElementById('dropdownMenu');
        dropdownButton?.addEventListener('click', function (e) {
            e.stopPropagation();
            dropdownMenu.classList.toggle('hidden');
        });
        document.addEventListener('click', function (e) {
            if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });

        // Mobile Menu
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const mobileMenu = document.getElementById('mobileMenu');
        const hamburgerIcon = document.getElementById('hamburgerIcon');
        const closeIcon = document.getElementById('closeIcon');

        mobileMenuButton?.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
            hamburgerIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        });

        // Close when clicking outside (mobile)
        document.addEventListener('click', function (e) {
            if (!mobileMenuButton.contains(e.target) && !mobileMenu.contains(e.target)) {
                mobileMenu.classList.add('hidden');
                hamburgerIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            }
        });
    });
</script>