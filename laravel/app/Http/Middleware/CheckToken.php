<?php

namespace App\Http\Middleware;

use App\Models\PowerRole;
use App\Models\User;
use App\Models\UserRole;
use Closure;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user=session('admin_user');
//        dd($user);
        if(!$user){
           // return redirect('/admin/login/login');
//            header("location:http://shop.com/admin/login/login");
//            exit;
           // echo "<script>window.location = 'http://shop.com/admin/login/login'</script>";
           echo "<script>window.open('/admin/login/login','_top' )</script>";
            exit;
        }

        $u_id=$user['admin_id'];    //用户id
        $role_id=UserRole::where("admin_id",$u_id)->get(['role_id'])->toArray();    //用户绑定的角色id
//        print_r($role_id);
        //如没有绑定
        if(!empty($role_id)){
            $rolepower=PowerRole::where(['role_id'=>$role_id])->get()->toArray();  //绑定查询关联表有什么权限
//            dd($rolepower);
            if(!empty($rolepower)){
                $role_power=$rolepower;
            }else{
                $role_power="没有角色";
            }
        }else{
            $role_power='未赋权限';
        }
//        print_r($role_power);
//        dd($rolepower['power_id']);
        foreach($rolepower as $k=>$v){
            if($v['power_id']==999999999){
                $powerrole='*';
                //如果查到的是-1即为数据库中的int数据为0 为所有权限
                break;
            }elseif(!empty($role_power)){
                $powerrole=PowerRole::join("admin_power","role_power.power_id","=","admin_power.power_id")
                    ->whereIn("role_power.role_id",$role_id)
                    ->get()
                    ->toArray();    //根据角色id在角色权限关联表和权限表的内连接中进行多条件查询
            }else{
                $powerrole="没有权限";
            }
        }

//        dd($powerrole);
        $user['power']=$powerrole;
//        dd($user);
        $server_name=$request->path();//获取提交过来的路由
        $route=0;
        $allroute=['/'];
        if(in_array($server_name,$allroute)){
            $route=1;
        }else{
            if($user['power']!='*'){
                foreach($user['power'] as $k=>$v){
                    if(strpos('/'.$server_name,$v['power_url'])!==false){
                        $route=1;
                        break;
                    }
                }
            }elseif($user['power']=="没有权限"){
                $route=0;
            }else{
                $route=1;
            }
        }
//        dd($route);
        if(!$route){
            echo "<script>window.location = '/wu.html';</script>";
            echo "<script>alert('没有权限') </script>";
            exit;
        }

        return $next($request);
    }
}
