<?php
namespace Src\Controllers;
use Src\Models\User;
use Slim\Views\Twig as View;

class LoginController
{
	protected $view;
	
	public function __construct(View $view)
	{		
		$this->view = $view;
	}
		
	public function index($request, $response)
	{
		// To insert the record in the table
		/*User::create([
			'name' => 'hamr',
			'password' => md5('hamr1234!'),		
		]);*/
		return $this->view->render($response, 'login.twig');
	}
	
	public function checkUser($request, $response)
	{
        $username 	= $request->getParam('txtName');
		$userpwd 	= md5($request->getParam('txtPwd'));
		$users 		= User::where('password', '=', $userpwd)
							->where('name', '=', $username)->get();
		
		if(sizeof($users) > 0)
		{
			$message = "Valid Password";
			$code	 = "success";
		}
		else
		{
			$message = "Not Valid, Try Again!!";
			$code	 = "error";
		}
		return $this->view->render($response, 'login.twig', [
			'errors' => $message,
			'code' => $code
			]);			
	}
}
