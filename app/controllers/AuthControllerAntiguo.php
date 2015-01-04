<?php
/**
 * Created by PhpStorm.
 * User: JoseLuis
 * Date: 28/10/14
 * Time: 14:14
 */
class AuthControllerAntiguo extends Auth
{
    public function index()
    {
        try
        {
            $usuarios = usuarios::all();
            $statuscode = 200;
        }
        catch (exception $e)
        {
            $statuscode = 400;

        }
        finally
        {
            return Response::json($usuarios, $statuscode);
        }
    }
    public function loginUser()
    {
        $passwordhash = '';
        $username = Input::get('username');
        $password = Input::get('password');
        $error = false;
        //$fichero = 'C:\xampp\htdocs\laravelplan\logerror.txt';
        //$numero = file_put_contents($fichero, )
        $password =  password_hash($password,  PASSWORD_BCRYPT,  ['cost' => 12]);

        $userdata = array(
            'username' => $username,
            'password' => $password
        );

        $error = true;
        $user = array();

        if (Auth::attemp($userdata))
        {
            $error = false;
            $user = array(
                'id' => Auth::user()->id,
                'username' => Auth::user()->username
            );
        }
        else
        {
            $error = true;
            $statuscode = 400;
            return Response::json($error, $statuscode);
        }

        return Response::json(array(
            'error' => $error,
            'user' => $user
        ), 200);






    }
}