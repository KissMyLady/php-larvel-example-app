<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Traits\ApiController;

use Illuminate\Http\Request; //命名空间的三元素, 常量, 方法, 类
use Symfony\Component\Console\Input\Input;
//引入DF门面, 可以省略路径
use Illuminate\Support\Facades\DB;



# ApiController BaseController
class UserCtrl extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //初始化
    /**
     * @var Request
     */
    private $request;

    public function __construct(Request $request){
        $this -> request = $request;
    }

    public function userGet(){
        //增加
        $db = DB::table('tb_user');

        $result = $db -> insert([
            [
               "name" => "阿紫",
               "age" => "56",
               "email" => "244121"
           ], [
                "name" => "马冬梅",
                "age" => "18",
                "email" => "24411"
            ],[
                "name" => "马春梅",
                "age" => "19",
                "email" => "124411"
            ]
        ]);

        dd($result);

        //echo "Hello World 1";
    }

    //增加数据
    public function userAdd(){



        echo "Hello World 2";
    }

    public function userDel(){
        echo "Hello World 3";
    }

}
