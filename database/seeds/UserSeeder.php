<?php

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
        $users=[
            [
                'name'=>'Mg Mg',
                'email'=>'mgmg@bm.com',
                'role'=>'admin'
            ],
            [
                'name'=>'Ag Ag',
                'email'=>'agag@bm.com',
                'role'=>'author'
            ],[
                'name'=>'Aye Aye',
                'email'=>'ayeaye@bm.com',
                'role'=>'user'
            ]
    
        ];
        foreach($users as $val){
            $user = new App\User();
            $user->name= $val['name'];
            $user->email= $val['email'];
            $user->password= bcrypt('12345678');
            $user->role= $val['role'];
            $user->save();
    
    
        }
        // $user = new App\User();
        // $user->name = 'Mg Mg';
        // $user->email = 'mgmg@gmail.com';
        // $user->password = bcrypt('12345678');
        // $user->save();
    }
}
