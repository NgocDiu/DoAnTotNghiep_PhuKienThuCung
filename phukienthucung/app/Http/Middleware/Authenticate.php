<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // Nếu URL bắt đầu bằng admin → về trang login admin
            if ($request->is('admin/*')) {
                return route('admin.login');
            }

            // Ngược lại là khách → về trang login khách
            return route('publish.login');
        }
    }
}
