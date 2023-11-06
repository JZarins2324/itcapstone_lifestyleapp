<html>
  <body>

    <?php
      // Initialize Variables
      $userName = '';
      $userPass = '';
      $newUser = '';
      $newPass = '';

      //Login Variables Set
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $userName = $_POST['username'];
        if (empty($userName)) {
          echo "Name is empty";
        } else {
          echo $userName;
        }
      }

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $userPass = $_POST['password'];
        if (empty($userPass)) {
          echo "Name is empty";
        } else {
          echo $userPass;
        }
      }

      /* Compare Username and Password
      if ($userName == Database Username && $userPass == Database Password) {
        Send to homepage
      }
      else {
        echo "Username and/or Password is incorrect."
      }*/

      //Sign Up Variables Set
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $newUser = $_POST['newUsername'];
        if (empty($userName)) {
          echo "Name is empty";
        } else {
          echo $userName;
        }
      }

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $newPass = $_POST['newPassword'];
        if (empty($userPass)) {
          echo "Name is empty";
        } else {
          echo $userPass;
        }
      }


      // Database Variables
      $serverName = "localhost";
      $username = "root";
      $password = "mysql";
      $dbname = "LifestyleDB";
      // Create Connection
      $conn = new mysqli($serverName, $username, $password, $dbname);
      // Check Connection
      if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
      }
      echo "Connected Successfully";

      // SQL Query
      $addUser = "UPDATE users SET userName = '$newUser', userPass = '$newPass'";

      // Run SQL Query
      if ($conn->query($addUser) === true) {
        echo "SQL running successfully";
      } else {
        echo "Error in SQL: " . $conn->error;
      };
    ?>

  </body>
</html>