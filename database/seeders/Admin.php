<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        User::create ([
        
        'name' => 'Admin',
        'email' => 'admin@gmail.com',
        'phone' => '0799078807',
        'password' => bcrypt('123456789'),
        'role' => "Admin",
        'image' => "Admin.jpg"

        
        ],
    
      
      
      );;
        User::create ([
        
        
        'name' => 'Ahmad Zytoon',
        'email' => 'Ahmad@gmail.com',
        'phone' => '0796781246',
        'password' => bcrypt('123456789'),
        'role' => "user",
        'image' => "Ahmad.jpeg"

        
        ]
    
      );;
     
    }
}
