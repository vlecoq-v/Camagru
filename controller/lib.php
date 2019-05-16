<?php

function mail_is_correct($mail) {
	echo $mail;
	if (filter_var($mail, FILTER_VALIDATE_EMAIL) == False)
		return False;
	else
		return True;
}

function pwd_is_correct($pwd) {
	if (preg_match('/(?=.*[a-z])(?=.*[A-Z])(?=.*\d).*/', $pwd, $matches) == 0)
		return False;
	else {
		return True;
	}
}

function display_warning($warning) {
	echo "
	<div class='box has-text-centered'>
		<span class='icon has-text-warning'>
			<i class='fas fa-exclamation-triangle'></i>
		</span>", $warning ,
	"</div>";
}

function display_success($warning) {
	echo "
	<div class='box has-text-centered'>
		<span class='icon has-text-success'>
			<i class='fas fa-check-square'></i>
		</span>", $warning ,
	"</div>";
}