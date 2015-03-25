<?php class Login extends AppController
{
	public function view()
	{
		if (F::get('is_ajaxed')) {
			echo json_encode(HtmlForm::logInSignIn());
			exit;
		}
	}
}