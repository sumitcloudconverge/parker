<x-app-layout>
    <x-slot name="header"><h2 class="text-xl font-semibold">Edit Customer</h2></x-slot>
    <form method="POST" action="{{ route('customers.update',$customer) }}" class="p-6 bg-white rounded shadow max-w-2xl mx-auto">
        @csrf @method('PUT')
        <div class="grid grid-cols-2 gap-4">
            <div><label>Name</label><input name="name" class="w-full border rounded p-2" value="{{ $customer->name }}" required></div>
            <div><label>Email</label><input type="email" name="email" class="w-full border rounded p-2" value="{{ $customer->email }}"></div>
            <div><label>Phone</label><input name="phone" class="w-full border rounded p-2" value="{{ $customer->phone }}" required></div>
            <div><label>Address</label><input name="address" class="w-full border rounded p-2" value="{{ $customer->address }}"></div>
            <div><label>City</label><input name="city" class="w-full border rounded p-2" value="{{ $customer->city }}"></div>
            <div><label>State</label><input name="state" class="w-full border rounded p-2" value="{{ $customer->state }}"></div>
            <div><label>Pincode</label><input name="pincode" class="w-full border rounded p-2" value="{{ $customer->pincode }}"></div>
        </div>
        <div class="mt-4"><button class="px-4 py-2 bg-indigo-600 text-white rounded">Update</button></div>
    </form>
</x-app-layout>
