<?php
/**
 * Created by PhpStorm.
 * User: JoseLuis
 * Date: 28/10/14
 * Time: 14:14
 * clase basada en el login de usuarios usando el servicio REST para iOS, Android, Windows Phone, Windows y aplicaciones escritorio
 */

class AuthController extends Auth
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
    public function showLogin()
    {
        // Verificamos si hay sesión activa
        if (Auth::check())
        {
            // Si tenemos sesión activa mostrará la página de inicio
            //return Redirect::to('/');
            $login = true;
            return Response::json($login);
        }
        else
        {
            $login = false;
            return Response::json($login);
        }
        // Si no hay sesión activa mostramos el formulario
        //return View::make('login');
    }

    public function postLogin()
    {
        // Obtenemos los datos del formulario
        $data = [
            'email' => Input::get('email'),
            'password' => Input::get('password')
        ];

        // Verificamos los datos
        if (Auth::attempt($data, Input::get('remember'))) // Como segundo parámetro pasámos el checkbox para sabes si queremos recordar la contraseña
        {
            // Si nuestros datos son correctos se lo decimos al REST y nos mostrara la pagina de inicio de la app en el REST
            //return Redirect::intended('/');
            $login = true;
            return Response::json($login);
        }
        else
        {
            $login = false;
            return Response::json($login);
        }
        // Si los datos no son los correctos volvemos al login y mostramos un error
        return Redirect::back()->with('error_message', 'Invalid data')->withInput();
    }

    public function logOut()
    {
        // Cerramos la sesión
        Auth::logout();
        // Volvemos al login y mostramos un mensaje indicando que se cerró la sesión
        //return Redirect::to('login')->with('error_message', 'Logged out correctly');
        $message = 'logged out correctly';
        //esto lo recibira el dispositivo para poder mostrarlo al usuario cuando se desloguee
        return Response::json($message);
    }



}