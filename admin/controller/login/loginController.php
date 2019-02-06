<?php
class loginController{

	public function checkLogin(){
		
		$user_email = $_POST['email'];
		$pass = $_POST['pass'];
		$role = "admin_master";

		require_once(MODEL."user/userModel.php");
		$user_model = new userModel();

		$user = $user_model->checkLogin($user_email, $pass, $role);
	
		if($user){
			
			Session::refresh();//If the privileges are upgraded, I should create a new session_id to make even harder get the session_id

			Session::set("admin_name", $user["first_name"]);
			Session::set("admin_email", $user["email"]);
			Session::set("admin_logged", true);

			header("location: index.php?route=info/info/dashboard");
			
		}else{

			Session::set("admin_logged", false);
			Session::set("login_msg", "Incorrect password");
			Output::rawLoad("login/loginView");
		}
	}

	public function logout(){
		Session::forget();
		Output::rawLoad("login/loginView");
	}

	public function loginPage(){
		Output::rawLoad("login/loginView");
	}

}