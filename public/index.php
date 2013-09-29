<?php

//	Controller

	require_once("../classes/class.Authentication.php");
	require_once("../classes/class.Session.php");

	$Authentication = new TAuthentication();
	$Session		= new TSession();

	$_SESSION['loggedin'] = 0;

	if ($_SESSION['loggedin'] == 1) {

		// Logged In
		echo "You are logged in.";

	} else {

		if ($_POST['submit'] == 'Submit') {
			if ($_POST['username'] == 'Carl' && $_POST['password'] == '123') {
				echo "Logged in!";
				$_SESSION['loggedin'] = 1;
			} else {
				echo "Login failed!";
				$_SESSION['loggedin'] = 0;
			}
			// They submitted the login form
		} else {

		}

		// Not Logged In
		$content = file_get_contents("../templates/loginform.html");
		echo $content;

		$_SESSION['loggedin'] = 1;

	}

	// Kill the script for now
	die;

	if ($_SERVER['REQUEST_URI'] != '/') {

		preg_match('!name/([a-z]+)!imsx', $_SERVER['REQUEST_URI'], $pmatches);

		$content = file_get_contents("../templates/index.html");

		if ($pmatches[1] == 'Steven') {
			$content = str_replace('{text}', 'Steven Tillman Rogers. Can you fucking believe his middle name is Tillman. Jesus Christ.', $content);
		} else if ($pmatches[1] == 'Ronni') {
			$content = str_replace('{text}', 'Ronni The Raddishist', $content);
			$content = str_replace('#FF0000', '#80080', $content);
		} else if ($pmatches[1] == 'Jonathan') {
                        $content = str_replace('{text}', '|m| Rock it off, 5 Aces! Rock it off! |m|', $content);
		} else if ($pmatches[1] == 'Blake') {
                        $content = str_replace('{text}', 'Awesome job, Blake! Way to go big guy!!!', $content);
		 } else {
			$content = str_replace('{text}', 'Fuck off, '.$pmatches[1], $content);
		}

		echo $content;

		// Homepage

	} else {

		echo "You are not on the homepage!@!!";
		// Not Homepage
	}


