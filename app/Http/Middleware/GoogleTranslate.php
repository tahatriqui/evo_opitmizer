<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App;
use Session;
class GoogleTranslate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      $locale = Session::get('locale', config('app.locale'));

    // Définit la langue de l'application avec la langue récupérée de la session
    App::setLocale($locale);

    return $next($request);


    }
}
