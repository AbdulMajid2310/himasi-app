<?php

namespace App\Http\Middleware;

use App\Models\Student;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Complite
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {


        if (auth()->user()->student->prodi === null) {
            return redirect("/melengkapi-data")->with(['success' => 'Silahkan lengkapi data diri anda terlebih dahulu !']);
        }

        return $next($request);
    }
}
