<?php

namespace App\Http\Middleware;

use App\Models\User;
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
        if(!$user){
            return redirect('/admin/login/login');
        }
        $server_name=$request->path();
        $route=0;
        $allroute=['/'];
//        dd($user['power']);
        if(in_array($server_name,$allroute)){
            $route=1;
        }else{
            foreach($user['power'] as $k=>$v){
                if($v['power_url']==$server_name){
                    $route=1;
                    break;
                }
            }
        }
        if(!$route){
            echo "没有权限";
            echo "<script>alert('没有权限') </script>";
            exit;
        }

        return $next($request);
    }
}
