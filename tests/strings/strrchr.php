<?php

/*
 * Returns the portion of haystack which starts at the last occurrence 
 * of neddle and goes until the end of haystack
 * strrchr starts at the last occurrence.
*/

$text = 'This is my code';
echo strrchr($text, 'm') . '<br>';

/*
RESULT

'This is my code'
		 ^
		 'my code'
		
		ULTIMA OCURRENCIA
*/

$text = 'This is a test to test code';
echo strrchr($text, 't');

/*
RESULT

'This is a test to test code'
                      ^
                     't code'

					 ULTIMA OCURRENCIA
*/