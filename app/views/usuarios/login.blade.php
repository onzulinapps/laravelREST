<?php
/**
 * Created by PhpStorm.
 * User: JoseLuis
 * Date: 25/11/14
 * Time: 11:31
 */

//@extends("layout")
//@section("content")
{{ Form::open() }}
  {{ Form::label("username", "Username") }}
  {{ Form::text("username") }}
  {{ Form::label("password", "Password") }}
  {{ Form::password("password") }}
  {{ Form::submit("login") }}
  {{ Form::close() }}
//@stop