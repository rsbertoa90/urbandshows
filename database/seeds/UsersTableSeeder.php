<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 
   $super = new User();
      $super->name = 'Rodrigo';
      $super->email = 'rsbertoa90@gmail.com';
      $super->password = bcrypt('rsbertoa90');
      $super->role_id =1 ;
      $super->save();

      $manager = new User();
      $manager->name = 'Daro';
      $manager->email = 'darioletelle@gmail.com';
      $manager->password = bcrypt('dariotelle');
       $manager->role_id =2 ;
      $manager->save();
      
      $manager = new User();
      $manager->name = 'Daro';
      $manager->email = 'Maurobrisindi@gmail.com';
      $manager->password = bcrypt('Maurobrisindi');
       $manager->role_id =2 ;
      $manager->save();
      
      $manager = new User();
      $manager->name = 'Daro';
      $manager->email = 'fernandototeda@hotmail.com';
      $manager->password = bcrypt('fernandototeda');
       $manager->role_id =2 ;
      $manager->save();

      $manager = new User();
      $manager->name = 'Daro';
      $manager->email = 'WateWeLoveU@urbandshows.com';
      $manager->password = bcrypt('wate');
       $manager->role_id =2 ;
      $manager->save();
      
      
      

      $super = new User();
      $super->name = 'Gise';
      $super->email = 'roominagii@gmail.com';
      $super->password = bcrypt('roominagii');
      $super->role_id =1 ;
      $super->save();

   
   
    }
}
