<?php class HtmlForm
{
	public static function login()
	{
		return '<div class="row">
					<div class="large-6 columns auth-plain">
						<div class="signup-panel left-solid">
							<p class="welcome">Вход</p>
							<form>
								<div class="row collapse">
									<div class="small-2  columns">
										<span class="prefix"><i class="fi-torso-female"></i></span>
									</div>
									<div class="small-10  columns">
										<input type="text" placeholder="логин или e-mail">
									</div>
								</div>
								<div class="row collapse">
									<div class="small-2 columns ">
										<span class="prefix"><i class="fi-lock"></i></span>
									</div>
									<div class="small-10 columns ">
										<input type="text" placeholder="пароль">
									</div>
								</div>
							</form>
							<a href="#" class="button">Вход</a>
						</div>
					</div>
					<div class="large-6 columns auth-plain">
						<div class="signup-panel newusers">
							<p class="welcome">Регистрация</p>
							<p>Простите, но пока сайт в стадии разработки, регистрация возможна только по инвайтам. После полноценного запуска и настройки эта опция будет доступна всем.</p><br>
							<a href="#" class="button ">Регистрация</a></br>
						</div>
					</div>
				</div>';
	}

	public static function logInSignIn()
	{
		return '<div class="center row">
					<ul class="tabs" data-tab>
						<li class="tab-title active"><a href="#panel1">Вход</a></li>
						<li class="tab-title"><a href="#panel2">Регистрация</a></li>
					</ul>
					<div class="tabs-content">
						<div class="content active" id="panel1">
							<p>

							<div class="row">
								<div class="large-12 columns">
									<div class="signup-panel">
										<p class="welcome">Новый пользователь</p>

										<form>
											<div class="row collapse">
												<div class="small-2  columns">
													<span class="prefix"><i class="fi-torso"></i></span>
												</div>
												<div class="small-10  columns">
													<input type="text" placeholder="Ник">
												</div>
											</div>
											<div class="row collapse">
												<div class="small-2 columns">
													<span class="prefix"><i class="fi-mail"></i></span>
												</div>
												<div class="small-10  columns">
													<input type="text" placeholder="Email">
												</div>
											</div>
											<div class="row collapse">
												<div class="small-2 columns ">
													<span class="prefix"><i class="fi-lock"></i></span>
												</div>
												<div class="small-10 columns ">
													<input type="text" placeholder="Пароль">
												</div>
											</div>
										</form>
										<a href="#" class="button ">Sign Up! </a>
									</div>
								</div>
							</div>
							</p>
						</div>
						<div class="content" id="panel2">
							<p>
							<div class="row">
								<div class="large-12 columns">
									<div class="signup-panel">
										<p class="welcome">Добро пожаловать</p>

										<form>
											<div class="row collapse">
												<div class="small-2 columns">
													<span class="prefix"><i class="fi-mail"></i></span>
												</div>
												<div class="small-10  columns">
													<input type="text" placeholder="Email">
												</div>
											</div>
											<div class="row collapse">
												<div class="small-2 columns ">
													<span class="prefix"><i class="fi-lock"></i></span>
												</div>
												<div class="small-10 columns ">
													<input type="text" placeholder="Пароль">
												</div>
											</div>
										</form>
										<a href="#" class="button ">Sign Up! </a>
									</div>
								</div>
							</div>
							</p>
						</div>
					</div>
				</div>';
	}

	public static function email()
	{
		return '<form class="round-inputs">
						<div class="row">
							<div class="large-12 columns">
								<input type="text" name="name" placeholder="Name"/>
							</div>
							<div class="large-12 columns">
								<textarea name="text" placeholder="Текст отзыва не более 5000 символов! При необходимости размещайте два отзыва"></textarea>
							</div>
						</div>
						<input type="submit" class="button expand radius" value="Отправить"/>
					</form>';
	}

}