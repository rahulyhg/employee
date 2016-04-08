<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'name' => 'Trần Văn Tú',
            'email' => 'tu@gmail.com',
            'phone' => '0123456789',
            'job' => 'Product Manager',
            'department_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('employees')->insert([
            'name' => 'Nguyễn Tiến Minh',
            'email' => 'minh@gmail.com',
            'phone' => '0123456789',
            'job' => 'Technical Manager',
            'department_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('employees')->insert([
            'name' => 'Trần Minh Quý',
            'email' => 'quy@gmail.com',
            'phone' => '0123456789',
            'job' => 'Human Resouces Manager',
            'department_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
