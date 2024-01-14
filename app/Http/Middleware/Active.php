<?php

namespace App\Http\Middleware;

use App\Models\Membership;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Active
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $status = (Membership::where('user_id', $request->user()->id)->first()->approval_status) ?? '';
        if ($request->user()->type == 'admin' || $request->user()->type == 'editor' || (($request->user()->type != 'admin' && $request->user()->type != 'editor') && $status == 'approved'))
            return $next($request);
        else
            return redirect()->back()->withError('User status is ' . $status);
    }
}
