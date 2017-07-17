<?php
/**
 * This file is part of Notadd.
 *
 * @author        linxing <linxing@ibenchu.com>
 * @copyright (c) 2017, notadd.com
 * @datetime      17-6-23 上午10:25
 */


namespace Notadd\WechatLogin\Listeners;


use Notadd\Foundation\Routing\Abstracts\RouteRegister as AbstractRouteRegister;
use Notadd\WechatLogin\Controllers\WechatOpenController;

/**
 * Class RouteRegister.
 */
class RouteRegister extends AbstractRouteRegister
{
    /**
     * Handle Route Registrar.
     */
    public function handle()
    {
        $this->router->any('returnback', WechatOpenController::class . '@returnUrl');

        $this->router->group(['middleware' => ['cross', 'web'], 'prefix' => 'api/wechat'], function () {

            $this->router->any('test', WechatOpenController::class . '@test');

            $this->router->any('callback', WechatOpenController::class . '@callback');

            $this->router->post('set', WechatOpenController::class . '@set');

            $this->router->post('get', WechatOpenController::class . '@get');
        });
    }
}
