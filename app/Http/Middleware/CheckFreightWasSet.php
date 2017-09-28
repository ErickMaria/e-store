<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Product;

class CheckFreightWasSet
{
    public function handle($request, Closure $next)
    {
      
      
      return $next($request);
    }
}
