<x-app-layout>
    <x-slot name="header"><h2 class="text-xl font-semibold">Customers</h2></x-slot>
    <div class="p-6">
        <a href="{{ route('customers.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded">+ Add Customer</a>
        @if(session('success'))
        <div class="mt-4 p-3 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
        @endif
        <div class="mt-4 bg-white rounded shadow overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead><tr><th class="px-3 py-2 border bg-gray-50 text-left">#</th><th class="px-3 py-2 border bg-gray-50 text-left">Name</th><th class="px-3 py-2 border bg-gray-50 text-left">Email</th><th class="px-3 py-2 border bg-gray-50 text-left">Phone</th><th class="px-3 py-2 border bg-gray-50 text-left">City</th><th class="px-3 py-2 border bg-gray-50 text-left">Actions</th></tr></thead>
                <tbody>
                @foreach($items as $item)
                    <tr class="border-t">
                        <td class="px-3 py-2">{{ $item->id }}</td>
                        <td class="px-3 py-2">{{ $item->name }}</td>
                        <td class="px-3 py-2">{{ $item->email }}</td>
                        <td class="px-3 py-2">{{ $item->phone }}</td>
                        <td class="px-3 py-2">{{ $item->city }}</td>
                        <td class="px-3 py-2 flex gap-2">
                            <a class="px-3 py-1 bg-blue-600 text-white rounded" href="{{ route('customers.edit',$item) }}">Edit</a>
                            <form method="POST" action="{{ route('customers.destroy',$item) }}" onsubmit="return confirm('Delete this customer?');">
                                @csrf @method('DELETE')
                                <button class="px-3 py-1 bg-red-600 text-white rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="p-3">{{ $items->links() }}</div>
        </div>
    </div>
</x-app-layout>
