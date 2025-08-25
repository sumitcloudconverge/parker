<x-app-layout>
    <x-slot name="header"><h2 class="text-xl font-semibold">Add Customer</h2></x-slot>
    <h2 class="mt-6 text-center text-2xl font-semibold">New Customer</h2>
    <form method="POST" action="{{ route('customers.store') }}" class="mt-8 p-6 bg-white rounded shadow max-w-6xl mx-auto text-sm">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div><label>Name</label><input name="name" class="w-full border rounded p-2" required></div>
            <div><label>Email</label><input type="email" name="email" class="w-full border rounded p-2"></div>
            <div><label>Phone</label><input name="phone" class="w-full border rounded p-2" required></div>
            <div><label>Address</label><input name="address" class="w-full border rounded p-2"></div>
            <div><label>City</label><input name="city" class="w-full border rounded p-2"></div>
            <div><label>State</label><input name="state" class="w-full border rounded p-2"></div>
            <div><label>Pincode</label><input name="pincode" class="w-full border rounded p-2"></div>
        </div>
        <div class="mt-4"><button class="px-4 py-2 bg-indigo-600 text-white rounded">Save</button></div>
    </form>
</x-app-layout>
