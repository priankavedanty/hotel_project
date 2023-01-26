<?php

include 'config/encrypt_decrypt.php';

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use \Firebase\JWT\JWT;

return function (App $app) {
    $container = $app->getContainer();

    //memperbolehkan cors origin 
    $app->options('/{routes:.+}', function ($request, $response, $args) {
        return $response;
    });

    $app->add(function ($req, $res, $next) {
        $response = $next($req, $res);
        return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Credentials', 'true')
            ->withHeader('Cache-Control', 'no-store, no-cache, must-revalidate')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization, token')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    });

    $app->post('/login', function (Request $request, Response $response) {
        $input = $request->getParsedBody();
        $Username = trim(strip_tags($input['username']));
        $Password = trim(strip_tags($input['password']));
        $pwd = encrypt_decrypt('encrypt', $Password);

        $sql = "SELECT * FROM `tb_user` WHERE username = :user AND password = :pass";
        $sth = $this->db_hotel->prepare($sql);

        $sth->bindParam("user", $Username);
        $sth->bindParam("pass", $pwd);

        $sth->execute();
        $user = $sth->fetchObject();

        if (!$user) {
            return $this->response->withJson(['status' => 'error', 'message' => 'User tidak ditemukan'], 404);
        }

        $settings = $this->get('settings');

        $token = array(
            'id_user' =>  $user->id_user,
            'username' => $user->username,
            'nama' => $user->nama,
            'id_jabatan' => $user->id_jabatan,
            'status_akun' => $user->status_akun,
        );

        $token = JWT::encode($token, $settings['jwt']['secret'], "HS256");

        return $response->withJson(['status' => 'success', 'data' => $user, 'token' => $token], 200);
    });


    $app->group('/api', function (\Slim\App $app) {

        $app->get('/linen', function (Request $request, Response $response) {
            $sql = "SELECT * FROM `tb_linen`";
            $sth = $this->db_hotel->prepare($sql);

            $sth->execute();
            $res = $sth->fetchAll();

            return $response->withJson($res, 200);
        });

        $app->get('/linen/{tag_id}', function (Request $request, Response $response, array $args) {
            $code = $args['tag_id'];

            $sql = "SELECT * FROM `tb_linen` WHERE tag_id = :tag_id";
            $sth = $this->db_hotel->prepare($sql);

            $sth->bindParam("tag_id", $code);

            $sth->execute();
            $res = $sth->fetchObject();

            return $response->withJson($res, 200);
        });

        $app->get('/template', function (Request $request, Response $response) {
            $sql = "SELECT * FROM `tb_template`";
            $sth = $this->db_hotel->prepare($sql);

            $sth->execute();
            $res = $sth->fetchAll();

            return $response->withJson($res, 200);
        });

        $app->get('/template/{code}', function (Request $request, Response $response, array $args) {
            $code = $args['code'];

            $sql = "SELECT * FROM `tb_template` WHERE code = :code";
            $sth = $this->db_hotel->prepare($sql);

            $sth->bindParam("code", $code);

            $sth->execute();
            $res = $sth->fetchObject();

            return $response->withJson($res, 200);
        });
    });
};
