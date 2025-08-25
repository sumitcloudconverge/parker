<x-app-layout>
    <x-slot name="header"><h2 class="text-xl font-semibold">Loan Documents</h2></x-slot>
    <div class="p-6">
        <a href="{{ route('loan-documents.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded">+ Upload Document</a>
        @if(session('success'))<div class="mt-4 p-3 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>@endif
        <div class="mt-4 bg-white rounded shadow overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead><tr>
                    <th class="px-3 py-2 border bg-gray-50 text-left">#</th>
                    <th class="px-3 py-2 border bg-gray-50 text-left">Loan</th>
                    <th class="px-3 py-2 border bg-gray-50 text-left">Type</th>
                    <th class="px-3 py-2 border bg-gray-50 text-left">File</th>
                    <th class="px-3 py-2 border bg-gray-50 text-left">Status</th>
                    <th class="px-3 py-2 border bg-gray-50 text-left">Actions</th>
                </tr></thead>
                <tbody>
                @foreach($items as $doc)
                    <tr class="border-t">
                        <td class="px-3 py-2">{{ $doc->id }}</td>
                        <td class="px-3 py-2">#{{ $doc->loan_application_id }}</td>
                        <td class="px-3 py-2">{{ ucfirst($doc->document_type) }}</td>
                        <td class="px-3 py-2"><a href="{{ Storage::url($doc->file_path) }}" class="text-blue-600 underline" target="_blank">View</a></td>
                        <td class="px-3 py-2">{{ ucfirst($doc->status) }}</td>
                        <td class="px-3 py-2 flex gap-2">
                            <a class="px-3 py-1 bg-blue-600 text-white rounded" href="{{ route('loan-documents.edit',$doc) }}">Edit</a>
                            <form method="POST" action="{{ route('loan-documents.destroy',$doc) }}" onsubmit="return confirm('Delete this document?');">
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
