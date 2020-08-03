<?php

namespace App\Http\Middleware;

use App\Models\PowerRole;
use App\Models\User;
use App\Models\UserRole;
use Closure;

class CheckIndex
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
        $u_id=request()->session()->get('u_id');
        $user=session('u_id');
        if(!$u_id){
//           echo "
//            <script src='/admin/plugins/jQuery/jquery-2.2.3.min.js'></script>
//            <script src='/admin/plugins/bootstrap/js/bootstrap.min.js'></script>
//            <script>
//                    alert('未登录无法操作');
//                     window.open('/login','_top' )
//                </script>";
//            exit;
//            alert('未登录无法操作');
            return redirect('/login');
        }
        return $next($request);
    }
}
