<?php
require 'CLI.php';
CLI::setLogFile(dirname(__FILE__).'/tell-me-everything.log');

  $answer = CLI::in("What's your favorite beer?");
  // With loopIn you can specify responses the user must enter or quit
  // If the user enters an invalid input it will show the prompt again.
  $answer = CLI::loopIn("What's your favorite OS?", array("Mac", "Windows"));
  if ($answer == 'Mac')
    CLI::out("Macs are pretty cool.");


/*
  CLI::out("This text is indented");
  // Adding false as the second parameter will remove the newline
  CLI::out('Working...', false);
  // Adding a dash at the beginning will remove the indent
  CLI::out('-Done.');
  // Here are some status functions, these functions color the 
  // tag to indicate the status. (Although I cant show that here.)
  CLI::info('Testing something...');
  CLI::warning('Uh oh. Be cautious.');
  CLI::success('Awesome it worked!');
  CLI::error('O no. That didnt work.');
  // Fail will exit the script for you.
  CLI::fail('Something really bad happened exit the script');
  // Create your own custom status with the following
  // Check the resources/colors.php for specific color constants.
  CLI::custom('ALERT', CLI_UND_WHITE, 'Check out my white underlined text');
  // Want to use color text in your output? No problem just use the following.
  $coloredText = CLI::color('Chason Choate', CLI_DARK_BLUE);
  CLI::out("Hi my name is $coloredText.");
*/
