<?php

class UserTableSeeder extends Seeder
{
    public function run()
    {
        User::create(array(
            'username' => 'admin',
            'email' => 'wengchaoda@gmail.com',
            'password' => Hash::make('Wcd28835276'),
            'is_admin' => true
        ));
    }
}