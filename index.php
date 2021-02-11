<?php
session_start()
?>
<!DOCTYPE html>
<html>
<head>
	<title>Практическая работа</title>
</head>
<body>
	<header>
		<h2>Проверочная работа</h2>
		<p>Выполнил Кулманаков Илья, группа 482.</p>
	</header>
	<main>
		<article>
			<h2>Задание 1</h2>
			<p>
				<?php
				trait Auth{
					function __construct()
					{
						if(isset($this->email) && isset($this->password))
						{
							$this->auth = function (string $email, string $password)
							{
								$success = $this->email == $email && $this->password == $password;
								if ($success)
								{
									$_SESSION["userAuth"] = $this->email;
								}
								return $success;
							};

							$this->is_auth = function ()
							{
								return $_SESSION["userAuth"] == $this->email;
							};
						}
					}

					public function __call($name, $arguments)
					{
						if(isset($this->$name))
						{
							$func = $this->$name;
							return $func(...$arguments);
						}
						return null;
					}
				};

				class User
				{
					use Auth;
					public $email = "d";
					public $password = "1";
				}

				$user = new User();
				echo $user->auth("d", "1") . "<br/>";
				echo $user->is_auth() . "<br/>";
				?>
			</p>
		</article>
	</main>
</body>
</html>