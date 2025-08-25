<x-app-layout>
    <x-slot name="header"><h2 class="text-xl font-semibold">Upload Loan Document</h2></x-slot>
    <form method="POST" action="{{ route('loan-documents.store') }}" enctype="multipart/form-data" class="p-6 bg-white rounded shadow max-w-2xl mx-auto">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div><label>Loan Application</label>
                <select name="loan_application_id" class="w-full border rounded p-2" required>
                    @foreach($apps as $a)<option value="{{ $a->id }}">#{{ $a->id }} — {{ $a->full_name }}</option>@endforeach
                </select>
            </div>
            <div><label>Document Type</label><input name="document_type" class="w-full border rounded p-2" required></div>
            <div class="col-span-2"><label>File</label><input type="file" name="file" class="w-full border rounded p-2" required></div>
        </div>
        <div class="mt-4"><button class="px-4 py-2 bg-indigo-600 text-white rounded">Upload</button></div>
    </form>
</x-app-layout>
