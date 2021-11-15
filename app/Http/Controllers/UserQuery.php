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


class UserQuery extends BaseController{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $request;

    public function __construct(Request $request){
        //java|python this.request = request;
        $this->request = $request;
    }

    //git log --graph --decorate --simplify-by-decoration --al
    //分页查询
    public function pageGetUSer(){
        try{
            $db = DB::table("tb_user")
                -> paginate(1);
            dd($db);
        }catch (\Exception $e){
            dd("数据查询失败了");
        }
    }




}
