<x-app-layout>
    <x-slot name="header"><h2 class="text-xl font-semibold">Edit Loan Application #{{ $app->id }}</h2></x-slot>
    <form method="POST" action="{{ route('loan-applications.update',$app) }}" class="p-6 bg-white rounded shadow max-w-3xl mx-auto">
        @csrf @method('PUT')
        <div class="grid grid-cols-2 gap-4">
            <div><label>Customer</label>
                <select name="customer_id" class="w-full border rounded p-2">
                    <option value="">—</option>
                    @foreach($customers as $c)<option value="{{ $c->id }}" @selected($app->customer_id==$c->id)>{{ $c->name }}</option>@endforeach
                </select>
            </div>
            <div><label>Full Name</label><input name="full_name" class="w-full border rounded p-2" value="{{ $app->full_name }}" required></div>
            <div><label>Email</label><input name="email" type="email" class="w-full border rounded p-2" value="{{ $app->email }}"></div>
            <div><label>Phone</label><input name="phone" class="w-full border rounded p-2" value="{{ $app->phone }}" required></div>
            <div><label>Loan Amount</label><input name="loan_amount" type="number" step="0.01" class="w-full border rounded p-2" value="{{ $app->loan_amount }}" required></div>
            <div><label>Loan Type</label>
                <select name="loan_type" class="w-full border rounded p-2">
                    @foreach(['personal','home','car','education','business','gold','other'] as $type)
                        <option value="{{ $type }}" @selected($app->loan_type==$type)>{{ ucfirst($type) }}</option>
                    @endforeach
                </select>
            </div>
            <div><label>DSA</label>
                <select name="dsa_id" class="w-full border rounded p-2">
                    <option value="">—</option>
                    @foreach($dsas as $d)<option value="{{ $d->id }}" @selected($app->dsa_id==$d->id)>{{ $d->name }}</option>@endforeach
                </select>
            </div>
            <div><label>Status</label>
                <select name="status" class="w-full border rounded p-2">
                    @foreach(['pending','in_review','approved','rejected'] as $s)
                        <option value="{{ $s }}" @selected($app->status==$s)>{{ ucfirst($s) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mt-4"><button class="px-4 py-2 bg-indigo-600 text-white rounded">Update</button></div>
    </form>
</x-app-layout>
