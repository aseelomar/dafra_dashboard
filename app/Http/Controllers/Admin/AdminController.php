<?php
/**
 * Created by PhpStorm.
 * User: odai
 * Date: 8/30/2019
 * Time: 4:15 PM
 */

namespace App\Http\Controllers\Admin;

use App\Traits\EncryptionTrait;
use App\Traits\ResponseTrait;
use Illuminate\Routing\Controller as BaseController;


class AdminController extends BaseController
{

    use EncryptionTrait, ResponseTrait;

    public static $data = [];
    public $action;
    /////////////////////////
    public function __construct()
    {
        self::$data['active_menu'] = '';
        self::$data['active_sub_menu'] = '';
        self::$data['menu_color'] = 'm--font-brand';
        ////////////////////////////////////
        self::$data['btn_action'] = 'brand';
        self::$data['btn_edit'] = 'brand';
        self::$data['btn_cancel'] = 'secondary';
        self::$data['btn_change_password'] = 'accent';
        self::$data['btn_permission'] = 'warning';
    }

}