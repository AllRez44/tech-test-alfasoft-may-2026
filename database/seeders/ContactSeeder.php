<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contacts = [
            [
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'contact' => '912345678',
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'contact' => '923456789',
            ],
            [
                'name' => 'Michael Johnson',
                'email' => 'michael.johnson@example.com',
                'contact' => '934567890',
            ],
            [
                'name' => 'Emily Brown',
                'email' => 'emily.brown@example.com',
                'contact' => '945678901',
            ],
            [
                'name' => 'David Wilson',
                'email' => 'david.wilson@example.com',
                'contact' => '956789012',
            ],
        ];

        foreach ($contacts as $contact) {
            Contact::create($contact);
        }
    }
}
