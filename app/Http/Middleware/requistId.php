<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Client\Request;
use Ramsey\Uuid\Uuid;

 class requistId{


    // assaign id for every request
    public function handle($request, Closure $next)
    {
        $uid=$request->headers->get('X-Request-ID');
        if(is_null($uid)){
            $uid=Uuid::uuid4()->toString();
            $request->headers->set('X-Request-ID',$uid);
        }
        $response=$next($request);
        $response->headers->set('X-Request-ID',$uid);
        $response->headers->set('mona',$uid);
        // dd($response);
        return $response;
    }
 }
