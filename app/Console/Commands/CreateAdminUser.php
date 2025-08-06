<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create {--username=} {--password=} {--email=} {--name=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('=== Create New Admin User ===');
        
        // Get username
        $username = $this->option('username');
        if (!$username) {
            $username = $this->ask('Enter username:');
        }
        
        if (empty($username)) {
            $this->error('Username cannot be empty!');
            return 1;
        }
        
        // Check if username already exists
        if (AdminUser::where('username', $username)->exists()) {
            $this->error('Username already exists!');
            return 1;
        }
        
        // Get password
        $password = $this->option('password');
        if (!$password) {
            $password = $this->secret('Enter password:');
            $confirmPassword = $this->secret('Confirm password:');
            
            if ($password !== $confirmPassword) {
                $this->error('Passwords do not match!');
                return 1;
            }
        }
        
        if (empty($password)) {
            $this->error('Password cannot be empty!');
            return 1;
        }
        
        // Get email
        $email = $this->option('email');
        if (!$email) {
            $email = $this->ask('Enter email (optional):');
        }
        
        // Get name
        $name = $this->option('name');
        if (!$name) {
            $name = $this->ask('Enter full name (optional):');
        }
        
        // Create admin user
        $admin = AdminUser::create([
            'username' => $username,
            'password' => Hash::make($password),
            'email' => $email ?: null,
            'name' => $name ?: $username,
            'role' => 'admin',
            'is_active' => true,
        ]);
        
        $this->info('✅ Admin user created successfully!');
        $this->info('Username: ' . $admin->username);
        $this->info('Name: ' . $admin->name);
        $this->info('Email: ' . ($admin->email ?: 'Not set'));
        $this->info('Role: ' . $admin->role);
        
        return 0;
    }
}
