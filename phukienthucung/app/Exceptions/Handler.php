<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException; // <- thêm dòng này

class Handler extends ExceptionHandler
{
    /**
     * Các loại Exception không cần báo cáo.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * Các trường input sẽ không bị flash khi validation lỗi.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Đăng ký callback xử lý ngoại lệ cho ứng dụng.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Xử lý trả về khi xảy ra Exception.
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\HttpException) {
            if ($exception->getStatusCode() === 403) {
                if ($request->is('admin/*')) {
                    return response()->view('admin::errors.403', [], 403);
                }
                return response()->view('errors.403', [], 403);
            }
        }

        return parent::render($request, $exception);
    }

}
