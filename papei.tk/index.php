<?php
	/*Register php*/
  $servername="";
  $username="";
  $password="";
  $dbname="";
  //Syndesh me bash dedomenwn
  $conn=mysqli_connect($servername,$username,$password,$dbname);
  mysqli_set_charset($conn, "utf8");
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  if (isset($_POST['submit'])) {
    $user=mysqli_real_escape_string($conn,$_POST['uname']);
    $pass=mysqli_real_escape_string($conn,$_POST['pass']);
    $cpass=mysqli_real_escape_string($conn,$_POST['cpass']);
    $mail=mysqli_real_escape_string($conn,$_POST['mail']);
    $gen=mysqli_real_escape_string($conn,$_POST['tmhma']);
    if ($pass==$cpass) {
     # $sql1="SELECT * FROM myusers WHERE username='$user'";
      $res=mysqli_query($conn, $sql1);
        if (mysqli_num_rows($res)>0) {
          echo "<h4 align='center'>Αυτό το όνομα χρήστη χρησιμοποιείται ήδη.Παρακαλώ διαλέξτε κάποιο διαφορετικό!</h4>";
        }else {
         # $sql="INSERT INTO myusers (username,pass,email,name,surname,ADT,tel,address,bdate,gender) VALUES('$user','$pass','$mail','$fname','$lname','$am','$tel','$addr','$bd','$gen')";
          if (mysqli_query($conn, $sql)) {
            echo "<h5 align='center'>Ο νέος χρήστης καταχωρήθηκε επιτυχώς!</h5>";
          }
        }
    }else {
      echo "<h4 align='center'>Οι κωδικοί δεν ταιριάζουν.Παρακαλώ βάλτε δο ίδιους κωδικούς.</h4>";
    }
  }
  mysqli_close($conn);
  ?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Καλως ήρθατε!</title>
  <link rel="shortcut icon" href="photos/unipi.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="form">
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Εγγραφή</a></li>
        <li class="tab"><a href="#login">Σύνδεση</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Εγγραφή</h1>
          
          <form action="/" method="post">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                Όνομα Χρήστη<span class="req">*</span>
              </label>
              <input type="text" name="uname" required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
              <label>
                Email<span class="req">*</span>
              </label>
              <input type="email" name="mail" required autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Κωδικός Πρόσβασης<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Κωδικός Πρόσβασης Ξανά<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off"/>
          </div>

          <div class="field-wrap">
     			 <h2 style="color:white;font-weight:lighter;">Τμήματα</h2>     
              <select>
                <option name="tmhma" value="Οικονομικής Επιστήμης">Οικονομικής Επιστήμης</option>
                <option value="Οργάνωσης & Διοίκησης Επιχειρήσεων">Οργάνωσης & Διοίκησης Επιχειρήσεων</option>
                <option value="Διευθνών Ευρωπαϊκών Σπουδών">Διευθνών Ευρωπαϊκών Σπουδών</option>
                <option value="Ναυτιλιακών">Ναυτιλιακών</option>
                <option value="Βιομηχανικής Διοίκησης & Τεχνολογίας">Βιομηχανικής Διοίκησης & Τεχνολογίας</option>
                <option value="Χρηματοοικονομικής και Τραπεζικής Διοικητικής">Χρηματοοικονομικής και Τραπεζικής Διοικητικής</option>
                <option value="Στατιστικής & Ασφαλιστικής Επιστήμης">Στατιστικής & Ασφαλιστικής Επιστήμης</option>
                <option value="Πληροφορικής">Πληροφορικής</option>
                <option value="Ψηφιακών Συστημάτων">Ψηφιακών Συστημάτων</option>
              </select>
          </div>	
          
          <button name="rsub" type="submit" class="button button-block"/>ΕΠΙΒΕΒΑΙΩΣΗ</button>
          </form>
        </div>
        
        <div id="login">   
          <h1>Χαιρόμαστε που είσαι μαζί μας!</h1>
          
          <form action="/" method="post">
          
            <div class="field-wrap">
            <label>
              Όνομα χρήστη ή Email<span class="req">*</span>
            </label>
            <input type="text"required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              Κωδικός Πρόσβασης<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off"/>
          </div>

          <button name="lsub"class="button button-block"/>ΣΥΝΔΕΣΗ</button>
          </form>
        </div>
      </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="js/index.js"></script>
</body>
</html>