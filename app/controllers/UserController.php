<?php

class UserController extends BaseController {

  public function __construct() {
    parent::__construct();
    $this->beforeFilter('csrf', array('on'=>'post'));
    $this->beforeFilter('admin', array('except'=>array('getSignin', 'postSignin', 'getSignout')));
  }

  public function all() {

    $pages = 10;

  
    $users = User::all();

    $html = View::make('users.list', compact('users'))->render();
    
    return Response::json(['html' => $html, 'empty' => count($users) == 0]);
  }
  public function getIndex() {
    return View::make('users.index');
      //->with('users', User::all());
  }

  public function store() {
    $validator = Validator::make(Input::all(), User::$rules);

    if ($validator->passes()) {
      $user = new User;
      $user->firstname = Input::get('firstname');
      $user->lastname = Input::get('lastname');
      $user->email = Input::get('email');
      $user->password = Hash::make(Input::get('password'));
      $user->admin = Input::get('admin');
      $user->save();

      $data['status'] = true;
      $data['message'] = 'User added!';
    } else {

      $errors = $validator->messages();
      $data['errors'] = implode('', $errors->all('<ul><li>:message</li></ul>'));
      $data['status'] = false;
    }
    return Response::json($data);
  }

  public function postEdit() {
    $user = User::find(Input::get('id'));

    if ($user) {
        $user->firstname = Input::get('firstname');
        $user->lastname = Input::get('lastname');
        $user->email = Input::get('email');
    
        $user->admin = Input::get('admin');
        $user->update(Input::all());
        $user->save();

      return Redirect::to('admin/users/index')
        ->with('message', 'User updated');
    }

    return Redirect::to('admin/users/index')
      ->with('message', 'Opps something went wrong');

  }




  public function postDestroy() {
    $user = User::find(Input::get('id'));

    if ($user) {
        $user->delete();
        return Redirect::to('admin/users/index')
        ->with('message', 'User deleted');
    }

    return Redirect::to('admin/users/index')
      ->with('message', 'Opps something went wrong');
    }

  public function getSignin() {
    return View::make('users.signin');
  }

  public function postSignin() {
    if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
      return Redirect::to('admin/applications')->with('message', 'Thanks for signing in');
    }

    return Redirect::to('users/signin')->with('message', 'Your email/password combo was incorrect');
  }

  public function getSignout() {
    Auth::logout();
    return Redirect::to('users/signin')->with('message', 'You have been signed out. Have a nice weekend!');
  } 

  public function postEmail() {
    $user = User::find(Input::get('id'));

    Mail::send('nerds.email', array('name'=>Input::get('name'), 'email'=>Input::get('email'), 'nerd_level'=>Input::get('nerd_level')), function($message){
      $message->to(Input::get('email'), Input::get('name'))->subject('New Team added to Matrix');
    });
  } 
}





