<?php

namespace App\Http\Middleware;

use Closure;

class FileBrowser
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
        $id = request()->get('id');
        config()->set('elfinder.disks.leads.path', "{$id}");
        config()->set('elfinder.disks.leads.startPath', "{$id}");
        config()->set('elfinder.disks.leads.alias', "Лид №{$id}");
        return $next($request);
    }
}
