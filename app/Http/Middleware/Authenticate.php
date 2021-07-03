<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
  /**
   * Get the path the user should be redirected to when they are not authenticated.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return string
   */
  protected function redirectTo($request)
  {
    if (Auth::guard('customer')->check()) {

      return redirect('/customer');

    } else if (Auth::guard('mitra')->check()) {

      return redirect('/mitra');
      
    } else if (Auth::guard('admin')->check()) {

      return redirect('/admin');
      
    }
  }
}