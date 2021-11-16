<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User\UserRef;



//数据填充
class TableUser_DataFill extends Seeder {

    public function run(){
        //数据填充
        DB::table("table_users") -> delete();
        for($i=0; $i<10; $i++){
            UserRef::created([
                "title" => 'Title' .$i,
                "slug" => "slug" .$i,
                "body" => "slug" .$i ,
                "image" => "slug" .$i,
                "user_id" => "slug" .$i,
            ]);
        }

    }


}
