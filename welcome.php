<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Welcome!</title>  
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css"> 
</head>
<body>
    <div class="navbar">

    <a href="index.php" class="navitem"><i class="bi bi-house-fill"></i> Home</a>

    <div class="dropdown navitem">
        <a href="#"><i class="bi bi-easel-fill"></i> Products</a>
            <div class="dropdown-content">
                <a href="currency.php"><i class="bi bi-cash-stack"></i> Currency Exchange</a>
                <a href="#"><i class="bi bi-easel"></i> Service 2        </a>
            </div> 
    </div>        

    <div class="dropdown navitem">
        <a href="contact.html"><i class="bi bi-envelope-fill"></i> Contact Us</a>
            <div class="dropdown-content">
                <a href="#"><img src="https://flagcdn.com/16x12/fr.png" alt="Français"> Contactez-Nous</a>
                <a href="#"><img src="https://flagcdn.com/16x12/de.png" alt="Deutsch"> Kontakt</a>
            </div>  
    </div>          

    <a href="aboutme.html" class="navitem"><i class="bi bi-person-circle"></i> About Me</a>
    </div>

    <?php 
            // checking if firstName and lastName have value and that value isn't just whitespace.
        if (isset($_GET["firstName"]) && !ctype_space($_GET["firstName"]) && $_GET["firstName"] != "") {
            $firstName = $_GET["firstName"];
        } 
        if (isset($_GET["lastName"]) && !ctype_space($_GET["lastName"]) && $_GET["lastName"] != "") {
            $lastName = $_GET["lastName"];
        }

        if (isset($firstName) && !isset($lastName)) {
            $name = $firstName;
        } else if (!isset($firstName) && isset($lastName)) {
            $name = $lastName;
        } else if (isset($firstName) && isset($lastName)) {
            $name = $firstName . " " . $lastName;
        } else {
            $name = "no names";                         
        }    

        echo "<h1 id='welcomeNames'>Howdy " . $name . "</h1>";
    ?> 


</body>
</html>