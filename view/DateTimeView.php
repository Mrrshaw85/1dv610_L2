<?php

class DateTimeView {


	public function show() {
    // date_default_timezone_set('Europe/Stockholm');
    $dayName = date('l');
    $dayNum = date('d');
    $dayEnding = date('S');
    $month = date('F');
    $year = date('Y');
    $time = date('H:i:s');

		$timeString = $dayName . ", the " . $dayNum . $dayEnding . " of " . $month . " " . $year . ", The time is " . $time;

		return '<p>' . $timeString . '</p>';
	}
}