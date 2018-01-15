<?php

Class Auth {
    static public function register($data) {
        if(isset($data['email'], $data['password1'], $data['password2'], $data['lastname'], $data['firstname'], $data['login'])
        && filter_var($data['email'], FILTER_VALIDATE_EMAIL))
		{
			$query_base = "SELECT *
			FROM users
			WHERE email = :email
			OR login = :login";
			$bind["email"] = $data["email"];
			$bind["login"] = $data["login"];

			$reponse1 = App::database()->prepare($query_base);
			$reponse1->execute($bind);
			
			while ($info = $reponse1->fetch())
			{
				if ($data['email'] == $info['email'])
				{
					return "This email adress is already taken.";
				}
				if (strtolower($data['login']) == strtolower($info['login']))
				{
					return "This login is already taken.";
				}
				
			}
			if (ctype_alnum($data["login"]) === false)
			{
				return "The login must be alphanumeric";
			}

			if ($data['password1'] != $data['password2'])
			{
				return "Passwords don't match.";
			}
			elseif (strlen($data['password1']) < 4)
			{
				return "Please enter a password with 4 chars minimum.";
			}
			else
			{
				$ecriture = App::database()->prepare('INSERT INTO users (id, lastname, firstname, login, email, password, register_date)
					VALUES (:id, :lastname, :firstname, :login, :email, :password, NOW())');
				$ecriture->execute(array(
					'id' => NULL,
					'lastname' => $data['lastname'],
					'firstname' => $data['firstname'],
					'login' => $data['login'],
					'email' => $data['email'],
					'password' => hash_hmac('ripemd160', $data['password1'], 'si tu aimes la wac tape dans tes mains')
					));
	
				return true;
			}
		}
		else
		{
			return "An error occured while sending the form.";
		}
    }

    static public function login($data){
        $query_base = "SELECT *
		FROM users
		WHERE email = :email";
        $bind["email"] = $data['email'];

        $reponse = App::database()->prepare($query_base);
        $reponse->execute($bind);

        while ($user = $reponse->fetch())
        {
            if ($data['email'] == $user['email'] && hash_hmac('ripemd160', $data['password'], 'si tu aimes la wac tape dans tes mains') == $user['password'])
            {
                if (isset($_POST["remember_me"])) {self::remember($data['email'], hash_hmac('ripemd160', $data['password'], 'si tu aimes la wac tape dans tes mains') == $user['password']);}
                return $user;
            }
            else
            {
                return "The password does not match any registered email address.";
            }
        }
        return "Your email isn't registered.";

    }

    public static function remember($email, $pass)
    {
        $array = array("email" => $email, "pass" => $pass);
        setcookie("remember_me", serialize($array), strtotime( '+100 years' ) );
    }
}