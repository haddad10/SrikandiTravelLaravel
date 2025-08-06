<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Package;
use Illuminate\Http\Request;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;

class AdminExportController extends Controller
{
    public function exportCustomers(Package $package)
    {
        $customers = $package->customers()->with('package')->get();
        
        // Create Excel file
        $writer = WriterEntityFactory::createXLSXWriter();
        $tempFile = tempnam(sys_get_temp_dir(), 'customers_export_');
        $writer->openToFile($tempFile);
        
        // Add header row
        $headerRow = WriterEntityFactory::createRowFromArray([
            'No',
            'Nama',
            'Email',
            'Telepon',
            'Alamat',
            'No. KTP',
            'No. Paspor',
            'No. Visa',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Status Booking',
            'Status Pembayaran',
            'Total Pembayaran',
            'Sudah Dibayar',
            'Sisa/Kelebihan',
            'Tanggal Travel',
            'Catatan',
            'Paket',
            'Destinasi',
            'Durasi',
            'Harga Paket'
        ]);
        
        $writer->addRow($headerRow);
        
        // Add data rows
        $rowNumber = 1;
        foreach ($customers as $customer) {
            $genderLabel = $customer->gender === 'male' ? 'Laki-laki' : 'Perempuan';
            $statusLabel = ucfirst($customer->status);
            $paymentStatusLabel = $customer->payment_status_label;
            
            $remainingOrExcess = '';
            if ($customer->is_overpaid) {
                $remainingOrExcess = '+' . number_format($customer->excess_amount, 0, ',', '.');
            } elseif ($customer->remaining_amount > 0) {
                $remainingOrExcess = '-' . number_format($customer->remaining_amount, 0, ',', '.');
            } else {
                $remainingOrExcess = '0';
            }
            
            $dataRow = WriterEntityFactory::createRowFromArray([
                $rowNumber,
                $customer->name,
                $customer->email ?: '-',
                $customer->phone,
                $customer->address ?: '-',
                $customer->id_number ?: '-',
                $customer->passport_number ?: '-',
                $customer->visa_number ?: '-',
                $customer->birth_date ? $customer->birth_date->format('d/m/Y') : '-',
                $genderLabel,
                $statusLabel,
                $paymentStatusLabel,
                number_format($customer->total_payment, 0, ',', '.'),
                number_format($customer->paid_amount, 0, ',', '.'),
                $remainingOrExcess,
                $customer->travel_date ? $customer->travel_date->format('d/m/Y') : '-',
                $customer->notes ?: '-',
                $customer->package->name,
                $customer->package->destination,
                $customer->package->duration,
                number_format($customer->package->price, 0, ',', '.')
            ]);
            
            $writer->addRow($dataRow);
            $rowNumber++;
        }
        
        $writer->close();
        
        // Generate filename
        $filename = 'Data_Pelanggan_' . str_replace(' ', '_', $package->name) . '_' . date('Y-m-d_H-i-s') . '.xlsx';
        
        // Return file as download
        return response()->download($tempFile, $filename, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ])->deleteFileAfterSend();
    }
    
    public function exportAllCustomers()
    {
        $customers = Customer::with('package')->get();
        
        // Create Excel file
        $writer = WriterEntityFactory::createXLSXWriter();
        $tempFile = tempnam(sys_get_temp_dir(), 'all_customers_export_');
        $writer->openToFile($tempFile);
        
        // Add header row
        $headerRow = WriterEntityFactory::createRowFromArray([
            'No',
            'Nama',
            'Email',
            'Telepon',
            'Alamat',
            'No. KTP',
            'No. Paspor',
            'No. Visa',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Status Booking',
            'Status Pembayaran',
            'Total Pembayaran',
            'Sudah Dibayar',
            'Sisa/Kelebihan',
            'Tanggal Travel',
            'Catatan',
            'Paket',
            'Destinasi',
            'Durasi',
            'Harga Paket',
            'Mode Paket'
        ]);
        
        $writer->addRow($headerRow);
        
        // Add data rows
        $rowNumber = 1;
        foreach ($customers as $customer) {
            $genderLabel = $customer->gender === 'male' ? 'Laki-laki' : 'Perempuan';
            $statusLabel = ucfirst($customer->status);
            $paymentStatusLabel = $customer->payment_status_label;
            
            $remainingOrExcess = '';
            if ($customer->is_overpaid) {
                $remainingOrExcess = '+' . number_format($customer->excess_amount, 0, ',', '.');
            } elseif ($customer->remaining_amount > 0) {
                $remainingOrExcess = '-' . number_format($customer->remaining_amount, 0, ',', '.');
            } else {
                $remainingOrExcess = '0';
            }
            
            $dataRow = WriterEntityFactory::createRowFromArray([
                $rowNumber,
                $customer->name,
                $customer->email ?: '-',
                $customer->phone,
                $customer->address ?: '-',
                $customer->id_number ?: '-',
                $customer->passport_number ?: '-',
                $customer->visa_number ?: '-',
                $customer->birth_date ? $customer->birth_date->format('d/m/Y') : '-',
                $genderLabel,
                $statusLabel,
                $paymentStatusLabel,
                number_format($customer->total_payment, 0, ',', '.'),
                number_format($customer->paid_amount, 0, ',', '.'),
                $remainingOrExcess,
                $customer->travel_date ? $customer->travel_date->format('d/m/Y') : '-',
                $customer->notes ?: '-',
                $customer->package->name,
                $customer->package->destination,
                $customer->package->duration,
                number_format($customer->package->price, 0, ',', '.'),
                ucfirst($customer->package->mode)
            ]);
            
            $writer->addRow($dataRow);
            $rowNumber++;
        }
        
        $writer->close();
        
        // Generate filename
        $filename = 'Semua_Data_Pelanggan_' . date('Y-m-d_H-i-s') . '.xlsx';
        
        // Return file as download
        return response()->download($tempFile, $filename, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ])->deleteFileAfterSend();
    }
}
