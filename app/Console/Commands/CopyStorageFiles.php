<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CopyStorageFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storage:copy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Copy storage files to public directory';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sourcePath = storage_path('app/public');
        $destinationPath = public_path('storage');
        
        $this->info('Copying files from ' . $sourcePath . ' to ' . $destinationPath);
        
        // Create destination directory if it doesn't exist
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
            $this->info('Created destination directory');
        }
        
        // Copy all files from storage to public
        $this->copyDirectory($sourcePath, $destinationPath);
        
        $this->info('Files copied successfully!');
    }

    private function copyDirectory($source, $destination)
    {
        if (!File::exists($destination)) {
            File::makeDirectory($destination, 0755, true);
        }
        
        $files = File::allFiles($source);
        
        foreach ($files as $file) {
            $relativePath = $file->getRelativePathname();
            $destinationFile = $destination . '/' . $relativePath;
            
            // Create directory if it doesn't exist
            $destinationDir = dirname($destinationFile);
            if (!File::exists($destinationDir)) {
                File::makeDirectory($destinationDir, 0755, true);
            }
            
            File::copy($file->getPathname(), $destinationFile);
            $this->line('Copied: ' . $relativePath);
        }
    }
} 