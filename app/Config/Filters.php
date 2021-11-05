<?php

namespace Config;

use App\Filters\Admin;
use App\Filters\Asn;
use App\Filters\Auth;
use App\Filters\Guest;
use App\Filters\Honorer;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'     => CSRF::class,
        'toolbar'  => DebugToolbar::class,
        'honeypot' => Honeypot::class,
        'guest' => Guest::class,
        'auth' => Auth::class,
        'admin' => Admin::class,
        'asn' => Asn::class,
        'honorer' => Honorer::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            'honeypot',
            // 'csrf',
            'auth' => [
                'except' => [
                    'login/*',
                    'login/logout/*',
                ],
            ],
            'admin' => [
                'except' => [
                    '/',
                    'user/*',
                    'asn/*',
                    'honorer/*',
                    'login/*',
                ],
            ],
            'asn' => [
                'except' => [
                    '/',
                    'asn/list',
                    'asn/show/*',
                    'login/*',
                ],
            ],
            'honorer' => [
                'except' => [
                    '/',
                    'honorer/list',
                    'honorer/show/*',
                    'login/*',
                ],
            ],
        ],
        'after' => [
            // 'auth' => [
            //     'except' => [
            //         '/',
            //         'asn/list'
            //     ],
            // ],
            'toolbar',
            // 'honeypot',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [];
}
