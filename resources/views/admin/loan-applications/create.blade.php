<x-app-layout>
    <x-slot name="header"><h2 class="text-xl font-semibold">New Loan Application</h2></x-slot>
    <form method="POST" action="{{ route('loan-applications.store') }}" class="p-6 bg-white rounded shadow max-w-3xl mx-auto">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div><label>Customer</label>
                <select name="customer_id" class="w-full border rounded p-2">
                    <option value="">—</option>
                    @foreach($customers as $c)<option value="{{ $c->id }}">{{ $c->name }}</option>@endforeach
                </select>
            </div>
            <div><label>Full Name</label><input name="full_name" class="w-full border rounded p-2" required></div>
            <div><label>Email</label><input name="email" type="email" class="w-full border rounded p-2"></div>
            <div><label>Phone</label><input name="phone" class="w-full border rounded p-2" required></div>
            <div><label>Loan Amount</label><input name="loan_amount" type="number" step="0.01" class="w-full border rounded p-2" required></div>
            <div><label>Loan Type</label>
                <select name="loan_type" class="w-full border rounded p-2">
                    <option value="personal">Personal</option><option value="home">Home</option>
                    <option value="car">Car</option><option value="education">Education</option>
                    <option value="business">Business</option><option value="gold">Gold</option><option value="other">Other</option>
                </select>
            </div>
            <div><label>DSA</label>
                <select name="dsa_id" class="w-full border rounded p-2">
                    <option value="">—</option>
                    @foreach($dsas as $d)<option value="{{ $d->id }}">{{ $d->name }}</option>@endforeach
                </select>
            </div>
            <div><label>Status</label>
                <select name="status" class="w-full border rounded p-2">
                    <option value="pending">Pending</option><option value="in_review">In Review</option>
                    <option value="approved">Approved</option><option value="rejected">Rejected</option>
                </select>
            </div>
        </div>
        <div class="mt-4"><button class="px-4 py-2 bg-indigo-600 text-white rounded">Save</button></div>
    </form>
</x-app-layout>
