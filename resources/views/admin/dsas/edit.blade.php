<x-app-layout>
    <x-slot name="header"><h2 class="text-xl font-semibold">Edit DSA</h2></x-slot>
    <form method="POST" action="{{ route('dsas.update',$dsa) }}" class="p-6 bg-white rounded shadow max-w-2xl mx-auto">
        @csrf @method('PUT')
        <div class="grid grid-cols-2 gap-4">
            <div><label>Name</label><input name="name" class="w-full border rounded p-2" value="{{ $dsa->name }}" required></div>
            <div><label>Email</label><input name="email" type="email" class="w-full border rounded p-2" value="{{ $dsa->email }}" required></div>
            <div><label>Phone</label><input name="phone" class="w-full border rounded p-2" value="{{ $dsa->phone }}" required></div>
            <div><label>Company</label><input name="company_name" class="w-full border rounded p-2" value="{{ $dsa->company_name }}"></div>
            <div><label>City</label><input name="city" class="w-full border rounded p-2" value="{{ $dsa->city }}"></div>
            <div><label>State</label><input name="state" class="w-full border rounded p-2" value="{{ $dsa->state }}"></div>
            <div><label>Status</label>
                <select name="status" class="w-full border rounded p-2">
                    <option value="active" @selected($dsa->status=='active')>Active</option>
                    <option value="inactive" @selected($dsa->status=='inactive')>Inactive</option>
                </select>
            </div>
        </div>
        <div class="mt-4"><button class="px-4 py-2 bg-indigo-600 text-white rounded">Update</button></div>
    </form>
</x-app-layout>
