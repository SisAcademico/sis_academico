<?php

class UsuarioController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		/*
       	* This helps us to restrict the display of login page when clicked on browser back button after login.
    	*/

    $headers = array();
    $headers['Expires'] = 'Tue, 1 Jan 1980 00:00:00 GMT';
    $headers['Cache-Control'] = 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0';
    $headers['Pragma'] = 'no-cache';

    return Response::make(View::make('login.login'), 200, $headers);
    //return View::make('login.login');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input_data = Input::all();
	    $credentials = array(
	        'user_name' => htmlEncode(trim($input_data['user_name'])),
	        'password' => $input_data['password'],
	        'status' => 1
	    );

	    /* Here I am calling a function in the parent class. My UserController is extending the BaseController. The code will be available below. */

	    $loginStatus = $this->validateUserLogin($credentials);

	    if($loginStatus['status'] == 200)
	    {
	        $roleId = Auth::User()->role_id;
	        $loggedInUserId = Auth::User()->id;
	        $redirectPage = '/products';
	        switch ($roleId)
	        {
	            case 'super':
	                $redirectPage = '/manage_users';
	                break;
	            case 'admin':
	                $redirectPage = '/products';
	                break;                
	        }
	        return Redirect::to($redirectPage);
	    }
	    else
	    {
	        return Redirect::to('login')->with('status_data',$loginStatus);
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
	}


}
