<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$display_form = false;
$errors	= "";
$username = "";
$password = "";
$snumber = "";
$gender = "";

//pay attention to env_var's get/post

if( !isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['snumber'])  || !isset($_POST['gender'])){	
	//store info about the problem
	$errors	 = $errors . "<p>You are missing required fields. Please try again</p>";	
	//prepare the 'flag' to display the form.
	$display_form = true;
} else {
	$username 	= trim($_POST['username']);	
    $password 	= trim($_POST['password']);	
	$snumber 	= trim($_POST['snumber']);	
    $gender 	= trim($_POST['gender']);	
    
    if (strlen($username) < 2){
        $errors		 = $errors . "<p> User name must be 2 charecters or more. </p>";		
		$display_form = true;			
    }
    
    if (strlen($password) < 4){
        $errors		 = $errors . "<p> Password must be 4 charecters or more </p>";		
		$display_form = true;			
    }

    if (!preg_match('/[A][0]\d{7}$/', $snumber)){
        $errors		 = $errors . "<p> Please provide a valid student number. </p>";		
		$display_form = true;		
    }
}

if($display_form == true){
	echo "<span><p>$errors</p></span>";	
    ?>
    <br>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="margin-top: 4%;">
    Username:<br>
        <input type="text" name="username"><br>
        Password:<br>
        <input type="text" name="password"><br>
        Student Number:<br>
        <input type="text" name="snumber"><br>
        <br>
        <input type="radio" name="gender" value="male" > Male<br>
        <input type="radio" name="gender" value="female"> Female<br>
        <br>
        <input type="checkbox" name="cs[]" value="C++" id="C++"> C++
        <input type="checkbox" name="cs[]" value="C#" id="C#"> C#
        <input type="checkbox" name="cs[]" value="Javascript" id="Javascript"> Javascript
        <input type="checkbox" name="cs[]" value="Java" id="Java"> Java <br>
        <input type="checkbox" name="cs[]" value="Perl" id="Prel"> Perl
        <input type="checkbox" name="cs[]" value="PHP" id="PHP"> PHP
        <input type="checkbox" name="cs[]" value="Python" id="Python"> Python
        <input type="checkbox" name="cs[]" value="Golang" id="Golang"> Golang
        <br>
        <br>
        <input type="submit" value="Submit">
    </form>
    
    <?php
}else{
    if($gender == "male"){
        $gender = "Mr. ";
    } else{
        $gender = "Mrs. ";
    }

    $lan_message = "";
    $lan_count = 0;

    echo "<ul>";
    if (isset ($_POST['cs'])){
    $working_arr = $_POST['cs'];
    foreach ( $working_arr as $value) {
        $lan_count += 1;
        echo "<li> $value </li>";
     }
    }
   
    if($lan_count == 0){
        $lan_message =  $lan_message . " You are not studying any computer language(s).";
    } elseif ($lan_count > 5){
        $lan_message =  $lan_message . " Impressive. You have been studying quite a few computing languages.";
    } else{
        $lan_message =   $lan_message . " You are multilingual.";
    }
    
    echo " <br> <h1>Hello, $gender $username! $lan_message </h1>";	
}
?>

</body>
</html>
