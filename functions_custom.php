<?php

  function pdo_connect_mysql() {
  $servername = "localhost";
  $username = "root";
  $password = "";
  
  // $connected = NULL;
  
  try {
      $conn = new PDO("mysql:host=$servername;dbname=mon_test", $username, $password, );
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Your connection is active";
      

      return $conn;


    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
      
    } 
  
  }


/**
 * function permettant de printer la template de header
 */
function template_header($title) {
  echo <<<EOT
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>$title</title>
      <link href="style.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" 
      integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    </head>
    <body>
      <nav class="navtop">
        <div>
          <h1>Website Title</h1>
              <a href="index.php"><i class="fas fa-home"></i>Home</a>
          <a href="read.php"><i class="fas fa-address-book"></i>Contacts</a>
        </div>
      </nav>
  EOT;

}


/**
 * function permettant de printer la template de footer
 */
function template_footer() {
  $year = date("Y");
  echo <<<EOT
        <footer>
          <p>©$year MONSITE.NC</p>
        </footer>
      </body>
  </html>
  EOT;
}
?>