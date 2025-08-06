<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\AdminUser;

class ListAdminUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all admin users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('=== Admin Users List ===');
        
        $admins = AdminUser::all();
        
        if ($admins->isEmpty()) {
            $this->warn('No admin users found!');
            $this->info('Run php artisan db:seed to create default admin user.');
            return 0;
        }
        
        $headers = ['ID', 'Username', 'Email', 'Name', 'Role', 'Active', 'Created At'];
        $rows = [];
        
        foreach ($admins as $admin) {
            $rows[] = [
                $admin->id,
                $admin->username,
                $admin->email,
                $admin->name,
                $admin->role,
                $admin->is_active ? 'Yes' : 'No',
                $admin->created_at->format('Y-m-d H:i:s')
            ];
        }
        
        $this->table($headers, $rows);
        
        return 0;
    }
}
