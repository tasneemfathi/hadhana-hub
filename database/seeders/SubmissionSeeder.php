<?php

namespace Database\Seeders;

use App\Models\Submission;
use Illuminate\Database\Seeder;

class SubmissionSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['nursery_name' => 'Smart Kids Center', 'city' => 'Gaza', 'contact_name' => 'Mona A.', 'phone' => '+970 59 111 2222', 'email' => 'mona@smartkids.ps', 'message' => 'We would love to be listed in the directory.', 'status' => 'pending'],
            ['nursery_name' => 'Green Meadows', 'city' => 'Khan Younis', 'contact_name' => 'Khaled S.', 'phone' => '+970 59 333 4444', 'email' => 'khaled@greenmeadows.ps', 'message' => 'New bilingual nursery, opening soon.', 'status' => 'pending'],
            ['nursery_name' => 'Little Explorers', 'city' => 'Rafah', 'contact_name' => 'Sara H.', 'phone' => '+970 59 555 6666', 'email' => 'sara@explorers.ps', 'message' => 'Requesting verification badge.', 'status' => 'approved'],
        ];

        foreach ($rows as $row) {
            Submission::query()->updateOrCreate(
                ['email' => $row['email']],
                $row
            );
        }
    }
}
