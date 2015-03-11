<?php

class UserTableSeeder extends Seeder {

	public function run(){
		$user = new User;
		$user->firstname = 'Krystian';
		$user->lastname = 'Kaczmarski';
		$user->email = 'k.kaczmarski@outlook.com';
		$user->password = Hash::make('kryskacz1');
		$user->telephone = '515739871';
		$user->admin = 1;
		$user->save();

	}
}