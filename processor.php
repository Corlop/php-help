<!DOCTYPE html>
<html lang="en">
<head>  
	<meta charset="utf-8">
	<title>processor</title>
    <link type="text/css" rel="stylesheet" href="styles/style.css" />

</head>	
	
<body>



<?php

//CONDITION: All text inputs must contain data.

/*
---------------------------------------------------------------------
determine if the data exists: use isset( )
if its not set, then the user did not use the HTML form!
*/

if( isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['studentnumber']) ){
	echo "<p>firstname/lastname/studentnumber is set!</p>";	
}else{
	echo "<p>firstname/lastname/studentnumber is NOT set.</p>";		
	die("<p><a href='index.html'>Please fill in the form</a></p>");	
}

if( isset($_POST['gender']) ){
	echo "<p>gender is set!</p>";	
}else{
	echo "<p>gender is NOT set</p>";		
	die("<p><a href='index.html'>Please fill in the form</a></p>");
}






//CONDITION: If any of them has been left empty the form is invalid.

/*
---------------------------------------------------------------------
determine if the data has a value: ensure the user did not leave the form field blank*/


if(trim($_POST['firstname']) && trim($_POST['lastname']) && trim($_POST['studentnumber'])){
	echo "<p>firstname/lastname/studentnumber has been provided!</p>";	
}else{
	echo "<p>firstname/lastname/studentnumber hasn't been provided!</p>";	
	die("<p><a href='index.html'>Try again!</a></p>");
}

/*remove leading and trailing spacebar spaces from form fields*/
$firstname = trim($_POST['firstname']);
$lastname = trim($_POST['lastname']);
$studentNumber= trim($_POST['studentnumber']);





//CONDITION: The first and last names from the form must match your own first and last names (case insensitive).

/*
---------------------------------------------------------------------
determine if the data matches the required data */

const FIRST_NAME = "daniel";
const LAST_NAME  = "cotellessa";

if( strtolower($firstname) == FIRST_NAME && strtolower($lastname) == LAST_NAME ){
	echo "<p>firstname and lastname valid...</p>";
}else{
	echo "<p>firstname and lastname NOT valid...</p>";		
}




//CONDITION: The text in the student number field must follow the basic pattern of a student number. Use a regular expression to determine this. You may use this as the pattern to match: "/^a00[0-9]{6}$/i"

/*
---------------------------------------------------------------------
determine if the student number is valid */

$studentNumberPattern = "/^a00[0-9]{6}$/i";
$result = preg_match($studentNumberPattern, $studentNumber );

	if( $result == 1 ){
		echo "<p>The pattern ".$studentNumberPattern." is contained in the string ".$studentNumber."</p>";	
	}else{
		echo "<p>The pattern ".$studentNumberPattern." is NOT contained in the string ".$studentNumber."</p>";	
	}
	




//CONDITION: The user does not have to choose any of the checkboxes, it is valid even if they chose zero checkboxes.

/*
---------------------------------------------------------------------
determine checkboxes */

$checkCount = 0;

if(   isset($_POST)  ){
	echo "<p>You are:</p>";
	$arrayOfDescriptions = $_POST['description'];
	echo "<ul>";
	foreach($arrayOfDescriptions as $oneDescription){
	
	        echo "<li>".$oneDescription."</li>";
		$checkCount++;
	}
	echo "</ul>";
}




//CONDITION: Display a welcome message that uses the user's full name, prefixed with a gender appropriate title

/*
---------------------------------------------------------------------
determine the gender */

$gender = $_POST['gender'];

if ($gender == "male"){
	$title = "Mr.";
}else{
	$title = "Ms.";
}




//CONDITION: Display a message based on how many checkboxes he user chose

/*
---------------------------------------------------------------------
checkbox message  */

if($checkCount == 0){
	echo "<p>Chin up! Things can only get better!</p>";
}else if($checkCount == 1){
	echo "<p>Gee, that's swell</p>";
}else if($checkCount == 2){
	echo "<p>Glad to hear it! Keep it up!</p>";
}else if($checkCount ==3 ){
	echo "<p>WOW! That's great</p>";
}

/*
---------------------------------------------------------------------
display message  */
echo "<p>Thank you ".$title." ".$firstname." ".$lastname."!</p>";




?>

</body>	

</html>
