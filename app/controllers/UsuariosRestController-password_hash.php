<?php
/**
 * Created by PhpStorm.
 * User: JoseLuis
 * Date: 19/09/14
 * Time: 11:49
 */
class UsuariosRestController extends BaseController
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
    public function show($id)
    {
        try
        {
            $response = [ 'user' => [] ];
            $statuscode = 200;
            $user = usuarios::find($id);
            $response = [
                'id' => $user->id,
                'email' => $user->email,
                'nombre' => $user-> nombre,
                'apellidos' => $user -> apellidos
            ];
        }
        catch (exception $e)
        {
            $statuscode = 404;
        }
        finally
        {
            return Response::json($response, $statuscode);
        }
    }
    public function update($id)
    {
        try
        {
            $usuarios = usuarios::find($id);
            $usuarios -> id = Input::get('id');
            $usuarios -> email = Input::get('email');
            $usuarios -> password = Input::get('password');
            $usuarios -> nombre = Input::get('nombre');
            $usuarios -> apellidos = Input::get('apellidos');
            //$usuarios -> hash = Input::get('hash');
            //$usuarios -> salt = Input::get('salt');
            $usuarios -> password = password_hash($usuarios -> password,  PASSWORD_BCRYPT,  ['cost' => 12]);

            $usuarios ->save();
            $statuscode = 200;
        }
        catch (exception $e)
        {
            $statuscode = 404;
        }
        finally
        {
            return Response::json($usuarios, $statuscode);
        }

    }
    public function store()
    {

        try
        {
            // proceso de guardar un usuario

            $usuarios = new usuarios;
            $usuarios->nombre = "";
            $usuarios->apellidos = "";
            $usuarios->email         = Input::get('email');
            $usuarios->password      = Input::get('password');
            $usuarios->nombre        = Input::get('nombre');
            $usuarios->apellidos     = Input::get('apellidos');
            //$usuarios->hash          = Input::get('hash');
            //$usuarios->salt          = Input::get('salt');
            //antes de salvar llamo a ese objeto y me hace lo del password
            $usuarios -> password = password_hash($usuarios -> password,  PASSWORD_BCRYPT,  ['cost' => 12]);
            $usuarios->save();
            $statuscode = 200;
        }
        catch (exception $e)
        {
            $statuscode = 404;
        }
        finally
        {
            return Response::json($usuarios, $statuscode);
        }

    }
    public function destroy($id)
    {
        try
        {
            $usuarios = usuarios::find($id);
            $usuarios = usuarios::delete();
            $statuscode = 200;
        }
        catch (exception $e)
        {
            $statuscode = 404;

        }
        finally
        {
            Response::json($usuarios, $statuscode);
        }
    }
}