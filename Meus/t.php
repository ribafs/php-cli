<?php
$input = "Alien";
print str_pad($input, 10);                      // produz "Alien     "
print str_pad($input, 10, "-=", STR_PAD_LEFT);  // produz "-=-=-Alien"
print str_pad($input, 10, "_", STR_PAD_BOTH);   // produz "__Alien___"
print str_pad($input, 6 , "___");               // produces "Alien_"

