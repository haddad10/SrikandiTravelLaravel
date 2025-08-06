<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPackageController extends Controller
{
    public function index()
    {
        $packages = Package::latest()->get();
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'price' => 'required|string',
            'duration' => 'required|string|max:255',
            'mode' => 'required|in:travel,umroh',
            'category' => 'nullable|in:domestik,internasional',
            'description' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();
        
        // Clean price input - remove all dots and convert to integer
        $data['price'] = (int) str_replace('.', '', $request->price);
        
        // Set category to null for umroh mode
        if ($request->mode === 'umroh') {
            $data['category'] = null;
        }
        
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('packages', 'public');
            $data['image'] = $imagePath;
        }

        Package::create($data);

        return redirect()->route('admin.packages.index')->with('success', 'Paket berhasil ditambahkan!');
    }

    public function edit(Package $package)
    {
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'price' => 'required|string',
            'duration' => 'required|string|max:255',
            'mode' => 'required|in:travel,umroh',
            'category' => 'nullable|in:domestik,internasional',
            'description' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();
        
        // Clean price input - remove all dots and convert to integer
        $data['price'] = (int) str_replace('.', '', $request->price);
        
        // Set category to null for umroh mode
        if ($request->mode === 'umroh') {
            $data['category'] = null;
        }
        
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($package->image) {
                Storage::disk('public')->delete($package->image);
            }
            
            $imagePath = $request->file('image')->store('packages', 'public');
            $data['image'] = $imagePath;
        }

        $package->update($data);

        return redirect()->route('admin.packages.index')->with('success', 'Paket berhasil diperbarui!');
    }

    public function destroy(Package $package)
    {
        // Delete image if exists
        if ($package->image) {
            Storage::disk('public')->delete($package->image);
        }

        $package->delete();

        return redirect()->route('admin.packages.index')->with('success', 'Paket berhasil dihapus!');
    }
}
