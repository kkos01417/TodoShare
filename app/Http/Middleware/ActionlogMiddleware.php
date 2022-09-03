<?php

namespace App\Http\Middleware;


use App\Models\action_log;
use App\Services\ActionLogService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ActionlogMiddleware
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
   * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
   */
  public function handle(Request $request, Closure $next)
  {
    \Log::debug('start' . $request->url());

    return $next($request);
  }
}
