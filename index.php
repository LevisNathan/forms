<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <meta charset="utf-8" />
        <title>
            Forms
        </title>
    </head>                                                                            
            <header>
                <h1>Plane Ticket</h1>
            </header>
            <?php
            $nameErr = $emailErr = $genderErr = $websiteErr = "";
            $name = $email = $gender = $comment = $website = "";
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              if (empty($_POST["name"])) {
                $nameErr = "Name is required";
              } else {
                $name = test_input($_POST["name"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                  $nameErr = "Only letters and white space allowed"; 
                }
              }
              
              if (empty($_POST["email"])) {
                $emailErr = "Email is required";
              } else {
                $email = test_input($_POST["email"]);
                // check if e-mail address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Invalid email format"; 
                }
              }
                
              if (empty($_POST["Travel Location"])) {
                $website = "";
              }
            
              if (empty($_POST["comment"])) {
                $comment = "";
              } else {
                $comment = test_input($_POST["comment"]);
              }
            
              if (empty($_POST["gender"])) {
                $genderErr = "Gender is required";
              } else {
                $gender = test_input($_POST["gender"]);
              }
            }
            
            function test_input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
            }
            ?>
            
            <h2>PHP Form Validation Example</h2>
            <p><span class="error">* required field.</span></p>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
              Name: <input type="text" name="name" value="<?php echo $name;?>">
              <span class="error">* <?php echo $nameErr;?></span>
              <br><br>
              E-mail: <input type="text" name="email" value="<?php echo $email;?>">
              <span class="error">* <?php echo $emailErr;?></span>
              <br><br>
              Travel Location: <input type="text" name="Travel Location" value="<?php echo $website;?>">
              <span class="error"><?php echo $websiteErr;?></span>
              <br><br>
              <select name="day[]" multiple> // Initializing Name With An Array
              <option value="Mon">Mon</option>
              <option value="Tues">Tues</option>
              <option value="Wednes">Wednes</option>
              <option value="Thurs">Thurs</option>
              <option value="Fri">Fri</option>
              </select>
              <br><br>
              Time: <textarea name="comment" rows="1" cols="10"><?php echo $comment;?></textarea>
              <br><br>
              Gender:
              <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
              <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
              <span class="error">* <?php echo $genderErr;?></span>
              <br><br>
              <input type="submit" name="enter" value="submit">  
            </form>
            
            <?php
            echo "<h2>Your Input:</h2>";
            echo $name;
            echo "<br>";
            echo $email;
            echo "<br>";
            echo $website;
            if (isset($_POST['enter'])) {
              foreach ($_POST['day'] as $select){
                  echo $select;//  Displaying Selected Value
              }
            }
            echo "<br>";
            echo $comment;
            echo "<br>";
            echo $gender;
         
            ?>
            <!--************************************************************************************************-->
        </body>
    <footer>
        
    </footer>
</html>
</html>