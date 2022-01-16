<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Index</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <script src="artstore.js" async></script>
</head>
<body> 
    <div id="welcome"></div>
    <div class="navbar">

        <a href="index.html" class="navitem"><i class="bi bi-house-fill"></i> Home</a>

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

    <h1>Graham's Fake Art Emporium</h1>
        <!--A text on top of the page, under the menu bar, explaining the purpose of your 
            site and inviting the user to search for any available item desired-->
        <p> Welcome to my fake art portal. On this page, below this description, you will be able 
            to search for fake works of art that may or may not exist. You may then pretend to 
            purchase any of these items with money that doesn't exist!.<br>Please enjoy this 
            catalogue of fake pieces of art I have spent many imaginary hours creating.</p>
            
    <h2 id="searchHeader">Search</h2>

    <form id="search" method="post">
        <input type="text" id="searchbar"  name="searchbar" placeholder="Search for Art">
        <input type="submit" id="submit" name="submit" value="Search">
    </form>

    <div id="display"></div>

    <?php

        // make a var or something that triggers the search.
        if (isset($_POST['submit'])) {
            $q = $_POST['searchbar'];
               

            // Create connection.
            $connection = new mysqli('localhost', 'root', '');
            // Check connection
            if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
            }

            // Select DB and perform query.
            mysqli_select_db($connection, "assignment8");
            $query="SELECT * FROM items WHERE Artwork LIKE '%".$q."%'";
            $result = mysqli_query($connection, $query);

            if ($q != "") { 
                echo "<table style='background-color: #ca8c5a'>
                <tr>
                <th>Item #</th>
                <th>Artwork</th>
                <th>Medium</th>
                <th>Artist</th>
                <th>Price</th>
                <th>Description</th>
                </tr>";
                while($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td id='itemNumber'>" . $row['ItemNumber'] . "</td>";
                    echo "<td id='artwork'>" . $row['Artwork'] . "</td>";
                    echo "<td id='medium'>" . $row['Medium'] . "</td>";
                    echo "<td id='artist'>" . $row['Artist'] . "</td>";
                    echo "<td id='price'>" . $row['Price'] . "</td>";
                    echo "<td id='description'>" . $row['Description'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }    
            mysqli_close($connection);
        }
    ?>
       
</body>
</html>