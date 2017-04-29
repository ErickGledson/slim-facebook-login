<?php

namespace App\Controller;

use App\Database;
use App\Model\Users;

class HomeController
{
    private $config = array();

    function __construct()
    {
        session_start();

        $this->config = [
            'base_url' => 'http://localhost/api/index.php/endpoint',
            'providers' => [
                'Facebook' => [
                    'keys' => [
                        'id' => '159300617933489',
                        'secret' => '6db819a8c061fa5778edf496bc2c3b6b'
                    ],
                    'enabled' => true,
                    'debug_mode' => true,
                    'display' => 'popup',
                    'scope' => 'email'
                ]
            ]
        ];
    }

    function login($request, $response, $args)
    {

        try {
            $auth = new \Hybrid_Auth( $this->config );
            $provider = $auth->authenticate('facebook');

            $user = $provider->getUserProfile();

            if ($user) {
                $usuario = new Users();
                $usuario->nome = $user->displayName;
                $usuario->email = $user->email;
                $usuario->foto = $user->photoURL;
                $usuario->facebook_id = $user->identifier;
                $usuario->save();
            }

            $response->write(json_encode($user));
        }
        catch( \Exception $e ) {
            return $e->getMessage() . '<br>code '. $e->getCode();
        }
    }

    function endpoint($request, $response, $args)
    {
        \Hybrid_Endpoint::process();
    }

    function logout($request, $response, $args)
    {
        \Hybrid_Auth::logoutAllProviders();

        $response->write("<a href='login'>Facebook Login</a>");
    }
}


?>
