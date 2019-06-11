<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('employees')->insert([
//            'FIO' => "Ростов О.В.",
//            'address' => "ул. Ленина, д.77, кв.7",
//            'birthday' => "1982-09-30",
//            'position' => "специалист по турам",
//            'amount' => 30000,
//
//        ]);
//        DB::table('employees')->insert([
//            'FIO' => "Харламова Е.С.",
//            'address' => "ул. Красная, д.138",
//            'birthday' => "1990-08-07",
//            'position' => "специалист по турам",
//            'amount' => 30000,
//
//        ]);
//        DB::table('employees')->insert([
//            'FIO' => "Романцов Д.К.",
//            'address' => "ул. Комарова, д.13, кв.2",
//            'birthday' => "1987-11-06",
//            'position' => "специалист по турам",
//            'amount' => 30000,
//
//        ]);
//        DB::table('flights')->insert([
//            'flight_number'=>211234,
//            'class' => "business",
//            'date_and_time_of_flight' => "2019-10-20 15:43:00",
//        ]);
//        DB::table('flights')->insert([
//            'flight_number'=>271234,
//            'class' => "comfort+",
//            'date_and_time_of_flight' => "2019-08-20 18:04:00",
//        ]);
//        DB::table('flights')->insert([
//            'flight_number'=>291234,
//            'class' => "first class",
//            'date_and_time_of_flight' => "2019-11-03 05:08:00",
//        ]);
//        DB::table('transfer_infos')->insert([
//            'firm_name' => "S7",
//            'flight_id' => 1
//        ]);
//        DB::table('transfer_infos')->insert([
//            'firm_name' => "РосАвиа",
//            'flight_id' => 2
//        ]);
//        DB::table('transfer_infos')->insert([
//            'firm_name' => "Уральские авиалинии",
//            'flight_id' => 3
//        ]);
//
//        DB::table('hotels')->insert([
//            'hotel_name' => "Palace",
//            'stars' => 5
//        ]);
//        DB::table('hotels')->insert([
//            'hotel_name' => "Sunshine",
//            'stars' => 4
//        ]);
//        DB::table('hotels')->insert([
//            'hotel_name' => "Lime",
//            'stars' => 3
//        ]);
//        DB::table('routes')->insert([
//            'country' => "Россия",
//            'city' => "Крым",
//            'duration' => 14,
//            'hotel_id' => 1,
//            'transfer_info_id' => 1,
//            'cost' => 60000,
//            'employee_id' => 3,
//
//        ]);
//        DB::table('routes')->insert([
//            'country' => "Турция",
//            'city' => "Аланья",
//            'duration' => 14,
//            'hotel_id' => 2,
//            'transfer_info_id' => 2,
//            'cost' => 7,
//            'employee_id'=>2
//        ]);
//        DB::table('routes')->insert([
//            'country' => "Россия",
//            'city' => "Сочи",
//            'duration' => 20,
//            'hotel_id' => 3,
//            'transfer_info_id' => 2,
//            'cost' => 5,
//            'employee_id'=>1
//
//        ]);
//        DB::table('employees')->insert([
//            'FIO' => "Тарасова Г.Г.",
//            'address' => "Переулок Фабричный, д.9, кв.3",
//            'birthday' => "1987-07-07",
//            'position' => "генеральных директор",
//            'amount' => 150000,
//
//        ]);
//        DB::table('employees')->insert([
//            'FIO' => "Александрова Ю.И.",
//            'address' => "ул. Лермонтова, д.4, кв.202",
//            'birthday' => "1990-04-09",
//            'position' => "менеджер",
//            'amount' => 60000,
//    ]);
//        DB::table('hotels')->insert([
//            'hotel_name' => "Adriatic",
//            'stars' => 4
//        ]);
//        DB::table('hotels')->insert([
//            'hotel_name' => "Sun",
//            'stars' => 4
//        ]);
//        DB::table('hotels')->insert([
//            'hotel_name' => "Jozankei",
//            'stars' => 3
//        ]);
        DB::table('flights')->insert([
            'flight_number'=>456789,
            'class' => "comfort",
            'date_and_time_of_flight' => "2019-10-05 15:08:00",
        ]);
        DB::table('flights')->insert([
            'flight_number'=>123466,
            'class' => "first class",
            'date_and_time_of_flight' => "2019-09-11 06:07:00",
        ]);
        DB::table('flights')->insert([
            'flight_number'=>966647,
            'class' => "business",
            'date_and_time_of_flight' => "2019-10-01 01:09:00",
        ]);
        DB::table('transfer_infos')->insert([
            'firm_name' => "Россия",
            'flight_id' => 4
        ]);
        DB::table('transfer_infos')->insert([
            'firm_name' => "United Airlines",
            'flight_id' => 5
        ]);
        DB::table('transfer_infos')->insert([
            'firm_name' => "Delta Airlines",
            'flight_id' => 6
        ]);

        DB::table('routes')->insert([
            'country' => "Хорватия",
            'city' => "Дубровник",
            'duration' => 21,
            'hotel_id' => 4,
            'transfer_info_id' => 1,
            'cost' => 50000,
            'employee_id'=>3
            ]);
        DB::table('routes')->insert([
            'country' => "Турция",
            'city' => "Анталия",
            'duration' => 14,
            'hotel_id' => 5,
            'transfer_info_id' => 2,
            'cost' => 60000,
            'employee_id'=>2
        ]);
        DB::table('routes')->insert([
            'country' => "Япония",
            'city' => "Саппоро",
            'duration' => 25,
            'hotel_id' => 6,
            'transfer_info_id' => 3,
            'cost' => 70000,
            'employee_id'=>2
        ]);

        // $this->call(UsersTableSeeder::class);
    }
}
