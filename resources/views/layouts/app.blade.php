<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
<body class="font-sans antialiased">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-42 bg-gray-800 text-white flex flex-col">
            <div class="p-4 text-xl font-bold border-b border-gray-700">
                Admin Panel
            </div>
            <nav class="flex-1 p-2">
                <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded hover:bg-gray-700 text-xs">
                    Dashboard
                </a>
                <a href="{{ route('customers.index') }}" class="block px-3 py-2 rounded hover:bg-gray-700 text-xs">
                    Customers
                </a>
                <a href="{{ route('dsas.index') }}" class="block px-3 py-2 rounded hover:bg-gray-700 text-xs">
                    DSAs
                </a>
                <a href="{{ route('loan-applications.index') }}" class="block px-3 py-2 rounded hover:bg-gray-700 text-xs">
                    Loan Applications
                </a>
                <a href="{{ route('loan-documents.index') }}" class="block px-3 py-2 rounded hover:bg-gray-700 text-xs">
                    Loan Documents
                </a>
                <a href="{{ route('profile.edit') }}" class="block px-3 py-2 rounded hover:bg-gray-700 text-xs">
                    Profile
                </a>
            </nav>
           
            

            <div class="p-4 border-t border-gray-700">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-left px-5 py-2 rounded bg-red-600 hover:bg-red-700 text-xs">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main content -->
        <div class="flex-1">
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>