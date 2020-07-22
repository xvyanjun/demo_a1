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
//        dd($user);
        if(!$user){
           // return redirect('/admin/login/login');
//            header("location:http://shop.com/admin/login/login");
//            exit;
           // echo "<script>window.location = 'http://shop.com/admin/login/login'</script>";
           echo "<script>window.open('http://shop.com/admin/login/login','_top' )</script>";
            exit;
        }

        $server_name=$request->path();
//        dd($server_name);
        $route=0;
        $allroute=['/'];
//        dd($user);
        if(in_array($server_name,$allroute)){
            $route=1;
        }else{
            foreach($user['power'] as $k=>$v){
                if(strpos('/'.$server_name,$v['power_url'])!==false){
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
