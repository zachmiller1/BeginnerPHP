<?php

	// REQUIRED
	// Set your default time zone (listed here: http://php.net/manual/en/timezones.php)
	date_default_timezone_set('America/New_York'); 
	// Include the store hours class
	require('StoreHours.class.php');

	// REQUIRED
	// Define daily open hours
  // Must be in 24-hour format, separated by dash 
  // If closed for the day, leave blank (ex. sunday)
  // If open multiple times in one day, enter time ranges separated by a comma
  $hours = array(
	  'mon' => array(''),
	  'tue' => array('13:00-21:00'),
	  'wed' => array('13:00-21:00'), 
	  'thu' => array('13:00-21:00'), // Open late
	  'fri' => array('16:00-23:00'),
	  'sat' => array('16:00-23:00'),
	  'sun' => array('') // Closed all day
	);

  // OPTIONAL
  // Add exceptions (great for holidays etc.)
  // MUST be in format month/day
  // Do not include the year if the exception repeats annually
  $exceptions = array(
    '12/25' => array(''),
    '1/1' => array('')
  );

  // OPTIONAL
  // Place HTML for output below. This is what will show in the browser.
  // Use {%hours%} shortcode to add dynamic times to your open or closed message.
  $template = array(
    'open' => "<strong class='open'>Yes, we're open! Today's hours are {%hours%}.</strong>",
    'closed' => "<strong class='closed'>Sorry, we're closed. Today's hours are {%hours%}.</strong>",
    'closed_all_day' => "<strong class='closed'>Sorry, we're closed today.</strong>",
    'separator' => " - ",
    'join' => " and ",
    'format' => "g:ia", // options listed here: http://php.net/manual/en/function.date.php
    'hours' => "{%open%}{%separator%}{%closed%}"
  );

  // Instantiate class and call render method to output content
	$store_hours = new StoreHours($hours, $exceptions, $template);
	$store_hours->render();
	
?>
