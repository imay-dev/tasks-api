<?php

use App\Entities\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = (int)$this->command->ask('How many users to generate?', 10);
        $this->command->info("Creating {$count} users.");

        factory(User::class, $count)->create();

        $this->command->info('Users Created!');
    }
}
