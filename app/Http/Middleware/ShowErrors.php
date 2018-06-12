<?php


namespace App\Http\Middleware;


use Closure;

class ShowErrors {

    public function handle($request, Closure $next, $guard = null)
    {
        if ($errors = $request->session()->get('errors')) {
            //\MessagesStack::addError(implode('<hr>',$errors->getBag('default')->all()));
        }
        return $next($request);
    }

}