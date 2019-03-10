<?php

namespace App\Http\Middleware;

use Closure;
use ImageOptimizer;
use Image;


class OptimizeImages
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
        if ($request->file('image') && $request->file('image')->isValid())
        {
            $file = $request->file('image');
            $path = $file->path();
            $image = Image::make($path);
            if ($image->width() > 400){
                $image->widen(400);
                $image->save();
            }
            ImageOptimizer::optimize($path);
        }

        return $next($request);
    }
}
