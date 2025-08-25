<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   Welcome, <span class="text-orange-600">{{ Auth::user()->name }}</span> {{ __(key: "You're logged in!") }}
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">
            <div class="grid grid-cols-3 md:grid-cols-3 gap-6">

                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold mb-2 text-orange-600">{{ \App\Models\Dsas::count() }}+ DSAs</h2>
                    <p class="text-gray-600 mb-4">Manage your employees efficiently.</p>
                </div>
            
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold mb-2 text-orange-600">{{ \App\Models\Customers::count() }}+ Customers</h2>
                    <p class="text-gray-600 dark:text-gray-400">Keep track of your customers.</p>
                </div>
            
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold mb-2 text-orange-600">{{ \App\Models\LoanApplication::count() }}+ Loan Applications</h2>
                    <p class="text-gray-600 dark:text-gray-400">Manage your office locations.</p>
                </div>

            </div>
        </div>

    </div>
</x-app-layout>
