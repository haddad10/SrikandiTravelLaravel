<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Hash;

class ChangeAdminCredentials extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:change-credentials {--username=} {--password=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change admin username and password';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('=== Change Admin Credentials ===');
        
        // Get current admin user
        $admin = AdminUser::first();
        
        if (!$admin) {
            $this->error('No admin user found! Please run php artisan db:seed first.');
            return 1;
        }
        
        $this->info('Current admin user: ' . $admin->username);
        
        // Get new username
        $newUsername = $this->option('username');
        if (!$newUsername) {
            $newUsername = $this->ask('Enter new username (or press Enter to keep current):');
        }
        
        if (empty($newUsername)) {
            $newUsername = $admin->username;
            $this->info('Keeping current username: ' . $newUsername);
        }
        
        // Get new password
        $newPassword = $this->option('password');
        if (!$newPassword) {
            $newPassword = $this->secret('Enter new password:');
            $confirmPassword = $this->secret('Confirm new password:');
            
            if ($newPassword !== $confirmPassword) {
                $this->error('Passwords do not match!');
                return 1;
            }
        }
        
        if (empty($newPassword)) {
            $this->error('Password cannot be empty!');
            return 1;
        }
        
        // Check if username already exists (if changing username)
        if ($newUsername !== $admin->username) {
            $existingUser = AdminUser::where('username', $newUsername)->first();
            if ($existingUser && $existingUser->id !== $admin->id) {
                $this->error('Username already exists!');
                return 1;
            }
        }
        
        // Update admin credentials
        $admin->username = $newUsername;
        $admin->password = Hash::make($newPassword);
        $admin->save();
        
        $this->info('✅ Admin credentials updated successfully!');
        $this->info('New username: ' . $newUsername);
        $this->info('New password: ' . str_repeat('*', strlen($newPassword)));
        
        return 0;
    }
}
