<?php
/**
 * Created by PhpStorm.
 * User: JoseLuis
 * Date: 29/08/14
 * Time: 13:10
 */



class UsuariosController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {
        //obtener todos los nerds
        $usuarios = usuarios::all();
        //echo "entra en el metodo index";
        //print_r($usuarios);
        return View::make('usuarios.index')
            ->with('usuarios', $usuarios);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return View::make('usuarios.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //

        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'email'       => 'required|email',
            'password'      => 'required',
            'nombre' => 'required',
            'apellidos' => 'required',

        );

        $validator = Validator::make(Input::all(), $rules);
        //print_r("pasa el $validator");
        //print_r("antes de grabar usuario entrando en el if");
        // process the login
        if ($validator->fails()) {
            return Redirect::to('usuarios/create')
                ->withErrors($validator)
                ->withInput(Input::except(' password'));

        } else {
            // store
            $usuarios = new usuarios;
            $usuarios->email         = Input::get('email');
            $usuarios->password      = Input::get('password');
            $usuarios->nombre        = Input::get('nombre');
            $usuarios->apellidos     = Input::get('apellidos');
            //antes de salvar llamo a ese objeto y me hace lo del password

            $usuarios->password      = Hash::make($usuarios->password);
            $usuarios->save();

            // redirect
            Session::flash('message', 'Successfully created user!');
            return Redirect::to('usuarios');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
        // get the nerd
        //echo "entra en el metodo show";
        $usuario = usuarios::find($id);
        // show the view and pass the nerd to it
        return View::make('usuarios.show')
            ->with('usuario', $usuario);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
        // get the nerd
        $usuario = usuarios::find($id);

        // show the edit form and pass the nerd
        return View::make('usuarios.edit')
            ->with('usuario', $usuario);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'email'       => 'required|email',
            'password'      => 'required',
            'nombre'        => 'required',
            'apellidos'     => 'required',
            //'nerd_level' => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('usuarios/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $usuario = usuarios::find($id);
            $usuario->email      = Input::get('email');
            $usuario->password      = Input::get('password');
            $usuario->nombre = Input::get('nombre');
            $usuario->apellidos = Input::get('apellidos');
            $usuario->save();

            // redirect
            Session::flash('message', 'Successfully updated User!');
            return Redirect::to('usuarios');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        // delete
        $usuarios = Usuarios::find($id);
        $usuarios->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the user!');
        return Redirect::to('usuarios');
    }
    public function login()
    {
        return View::make(usuarios.login);
    }

}
