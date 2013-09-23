<?php
    
//	Controller
	
	session_start();

	if ($_SESSION['loggedin'] == 1) {

		// Logged In
		echo "You are logged in."; die;

	} else {

		// Not Logged In
		echo "You are not logged in.";

		$_SESSION['loggedin'] = 1;

	}

	if ($_SERVER['REQUEST_URI'] != '/') {
		
		preg_match('!name/([a-z]+)!imsx', $_SERVER['REQUEST_URI'], $pmatches);
		
		$content = file_get_contents("../templates/index.html");

		if ($pmatches[1] == 'Steven') {
			$content = str_replace('{text}', 'Steven Tillman Rogers. Can you fucking believe his middle name is Tillman. Jesus Christ.', $content);
		} else if ($pmatches[1] == 'Ronni') {
			$content = str_replace('{text}', 'Ronni The Raddishist', $content);
		} else if ($pmatches[1] == 'Jonathan') {
                        $content = str_replace('{text}', '|m| Rock it off, 5 Aces! Rock it off! |m|', $content);
		}else if ($pmatches[1] == 'Blake') {
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


