<?php

require_once "..\\template\\Page.php";

class LoginPage extends template\Page{
	public function __construct()
	{
		$this->setHeader("Вход");
	}

	protected function renderContent($content)
	{
		?>
		<h2>Вход</h2>
		<form method="post">
			<input type="text" name="username" placeholder="Логин"><br>
			<input type="password" name="password" placeholder="Пароль"><br>
			<input type="submit" name="login">
			<label for="registerHider">/Регистрация/</label>
		</form>
		<input type="checkbox" class="hider" id="registerHider">
		<form method="post">
			<hr>
			<input type="text" name="username" placeholder="Логин"><br>
			<input type="password" name="password1" placeholder="Пароль"><br>
			<input type="password" name="password2" placeholder="Повторение пароля"><br>
			<input type="submit" name="register">
		</form>
		<?php
	}
}

$page = new LoginPage();
$page->show();
