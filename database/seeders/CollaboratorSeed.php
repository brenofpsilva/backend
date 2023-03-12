<?php

namespace Database\Seeders;

use App\Models\Collaborator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollaboratorSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Collaborator::factory()
            ->count(10)
            ->create();
    }
}
