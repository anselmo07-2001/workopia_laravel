<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Load the job listings from file
        $jobListings = include database_path("seeders/data/job_listings.php");

        //Get the test user id
        $testUserId = User::where("email", "test@test.com")->value("id");

        // Get all other user_id from the User model
        $userIds = User::where("email", "!=", "test@test.com")->pluck("id")->toArray();

        foreach($jobListings as $index => &$listing) {

            if ($index < 2) {
                // Assign the first 2 listings to the test user
                $listing["user_id"] = $testUserId;
            }
            else {
                //Assign user id to listing
                $listing["user_id"] = $userIds[array_rand($userIds)];
            }

            // Add timestamp
            $listing["created_at"] = now();
            $listing["updated_at"] = now();
        }

        DB::table("job_listings")->insert($jobListings);
        echo "Jobs created succesfully";
    }
}
