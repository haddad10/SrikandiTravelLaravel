<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;

class AdminRegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::with('package')->latest()->get();
        return view('admin.registrations.index', compact('registrations'));
    }

    public function show(Registration $registration)
    {
        $registration->load('package');
        return view('admin.registrations.show', compact('registration'));
    }

    public function updateStatus(Request $request, Registration $registration)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled'
        ]);

        $registration->update(['status' => $request->status]);

        return redirect()->route('admin.registrations.index')->with('success', 'Status pendaftaran berhasil diperbarui!');
    }

    public function destroy(Registration $registration)
    {
        $registration->delete();

        return redirect()->route('admin.registrations.index')->with('success', 'Pendaftaran berhasil dihapus!');
    }

    public function export()
    {
        $registrations = Registration::with('package')->get();
        
        $filename = 'registrations_' . date('Y-m-d_H-i-s') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($registrations) {
            $file = fopen('php://output', 'w');
            
            // Add headers
            fputcsv($file, ['ID', 'Nama', 'Email', 'Telepon', 'Paket', 'Status', 'Tanggal Daftar', 'Pesan']);
            
            // Add data
            foreach ($registrations as $registration) {
                fputcsv($file, [
                    $registration->id,
                    $registration->name,
                    $registration->email,
                    $registration->phone,
                    $registration->package->name ?? 'N/A',
                    $registration->status,
                    $registration->created_at->format('d/m/Y H:i'),
                    $registration->message ?? ''
                ]);
            }
            
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
