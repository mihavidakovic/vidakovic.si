<?php

class SubpageController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function about()
	{
		return View::make('about');
	}

	public function work()
	{
		$projects = Project::all();
		return View::make('work', array('projects' => $projects));
	}

	public function thanks()
	{
		return View::make('thanks');
	}

	public function contact()
	{
		return View::make('contact');
	}

	public function postContact(){
		 $input = Input::only('name', 'email', 'msg');
		 $name = Input::get('name');
		 $email = Input::get('email');

		  $validator = Validator::make($input,
		      array(
		          'name' => 'required',
		          'email' => 'required|email',
		          'msg' => 'required',
		      )
		  );

		  if ($validator->fails())
		  {
		      return Redirect::to('contact')->with('errors', $validator->messages());
		  } else { // the validation has not failed, it has passed


		   // Send the email with the contactemail view, the user input

		  Mail::send('mail', $input, function($message) use ($name, $email)
		    {   
		        $message->from($email, $name);
		        $message->to('miha@vidakovic.si', 'Miha Vidakovič')->replyTo($email, $name)->subject('vidakovic.si contact form!');
		    });
		   // Specify a route to go to after the message is sent to provide the user feedback
		   return Redirect::to('thanks');
		  }
	}

}
