<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::withCount('customers')->get();
        return view('admin.customers.index', compact('packages'));
    }

    /**
     * Show customers for a specific package.
     */
    public function packageCustomers(Package $package)
    {
        $customers = $package->customers()->latest()->paginate(10);
        return view('admin.customers.package-customers', compact('package', 'customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Package $package)
    {
        return view('admin.customers.create', compact('package'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Package $package)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'id_number' => 'nullable|string|max:50',
            'passport_number' => 'nullable|string|max:50',
            'visa_number' => 'nullable|string|max:50',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|in:male,female',
            'notes' => 'nullable|string',
            'status' => 'required|in:pending,confirmed,cancelled',
            'total_payment' => 'required|numeric|min:0',
            'paid_amount' => 'required|numeric|min:0',
            'travel_date' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $package->customers()->create($request->all());

        return redirect()->route('admin.customers.package', $package)
            ->with('success', 'Data pelanggan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('admin.customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'id_number' => 'nullable|string|max:50',
            'passport_number' => 'nullable|string|max:50',
            'visa_number' => 'nullable|string|max:50',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|in:male,female',
            'notes' => 'nullable|string',
            'status' => 'required|in:pending,confirmed,cancelled',
            'total_payment' => 'required|numeric|min:0',
            'paid_amount' => 'required|numeric|min:0',
            'travel_date' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $customer->update($request->all());

        return redirect()->route('admin.customers.package', $customer->package)
            ->with('success', 'Data pelanggan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $package = $customer->package;
        $customer->delete();

        return redirect()->route('admin.customers.package', $package)
            ->with('success', 'Data pelanggan berhasil dihapus!');
    }
}
