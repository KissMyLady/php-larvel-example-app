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

    private $request;

    public function __construct(Request $request){
        //java|python this.request = request;
        $this->request = $request;
    }

    /**
     * 增加
     */
    public function userAdd(){
        $db = DB::table('tb_user');

        //插入多条
//        $result = $db -> insert([
//            [
//               "name" => "阿紫",
//               "age" => "56",
//               "email" => "244121"
//           ], [
//                "name" => "马冬梅",
//                "age" => "18",
//                "email" => "24411"
//            ],[
//                "name" => "马春梅",
//                "age" => "19",
//                "email" => "124411"
//            ]
//        ]);

        //插入一条记录, 返回一个id值
        $result = $db -> insertGetId([
            "name" => "马秋梅",
            "age" => "18",
            "email" => "24411"
        ]);
        dd($result);

        //echo "Hello World 1";
    }

    /**
     * 修改数据
     * 1, update() : 修改全部整个字段
     * 2, increment()  修改数字字段
     * 3, decrement();  递减
     */
    public function userUpdate(){
        $db = DB::table("tb_user");
        $result = $db -> where("id", "=",13)  //默认等于
            -> update([
                "name" => "马西梅",
                "age" => "17",
                "email" => "2132131"
            ]);

        dd($result);
        //echo "Hello World 2";
    }

    //真删除
    public function userDel(){
        $db = DB::table("tb_user");
        $result = $db -> where("id", 13)
            -> delete();
        echo "Hello World 3";
        dd($result);
    }

    //假删除
    public function userDelFake(){
        $db = DB::table("tb_user");
        $result = $db -> where("id", 14)
            -> update([
                "email" => "删除标记"
            ]);
        echo "Hello World 3";
        dd($result);
    }

    //查询
    public function usesGet(){
        $db = DB::table("tb_user");
        //查询全部, 集合数组
        $result = $db -> get();

        //遍历
        foreach ($result as $key => $value){
            echo "id是: {$value->id} 名字是: {$value->name}" ."\r\n";
            //dd($value);
        }
        dd();
        //dd($result);
    }

    //where查询
    public function usesWhereGet(){
        $db = DB::table("tb_user");
        //查询全部, 集合数组
        $result = $db
            -> where("id", ">", 3)
            -> get();

        //遍历
        foreach ($result as $key => $value){
            echo "id是: {$value->id} 名字是: {$value->name}" ."\r\n";
            //dd($value);
        }
        dd();
        //dd($result);
    }

    //分页查询


}
