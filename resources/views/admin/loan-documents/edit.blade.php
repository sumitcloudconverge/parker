<x-app-layout>
    <x-slot name="header"><h2 class="text-xl font-semibold">Edit Document #{{ $doc->id }}</h2></x-slot>
    <form method="POST" action="{{ route('loan-documents.update',$doc) }}" enctype="multipart/form-data" class="p-6 bg-white rounded shadow max-w-2xl mx-auto">
        @csrf @method('PUT')
        <div class="grid grid-cols-2 gap-4">
            <div><label>Document Type</label><input name="document_type" class="w-full border rounded p-2" value="{{ $doc->document_type }}" required></div>
            <div><label>Status</label>
                <select name="status" class="w-full border rounded p-2">
                    @foreach(['pending','approved','rejected'] as $s)
                        <option value="{{ $s }}" @selected($doc->status==$s)>{{ ucfirst($s) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-2"><label>Remarks</label><input name="remarks" class="w-full border rounded p-2" value="{{ $doc->remarks }}"></div>
            <div class="col-span-2">
                <label>Replace File (optional)</label>
                <input type="file" name="file" class="w-full border rounded p-2">
                <p class="text-sm mt-2">Current: <a href="{{ Storage::url($doc->file_path) }}" class="text-blue-600 underline" target="_blank">View</a></p>
            </div>
        </div>
        <div class="mt-4"><button class="px-4 py-2 bg-indigo-600 text-white rounded">Update</button></div>
    </form>
</x-app-layout>
