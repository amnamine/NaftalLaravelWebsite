<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateTestUser extends Command
{
    protected $signature = 'user:create-test';
    protected $description = 'Create a test user';

    public function handle()
    {
        // Create a site first
        $site = \App\Models\Site::create([
            'name' => 'Test Site',
            'address' => 'Test Address',
        ]);

        // Create a branch
        $branch = \App\Models\Branche::create([
            'name' => 'Test Branch',
            'site_id' => $site->id,
        ]);

        // Create the user
        User::create([
            'name' => 'Amine',
            'email' => 'amine@gmail.com',
            'password' => Hash::make('amineamine'),
            'branche_id' => $branch->id,
            'site_id' => $site->id,
        ]);

        $this->info('Test user created successfully.');
    }
}
