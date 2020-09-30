<?php 
require_once "conn.php";
require_once "session.php";
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $password = trim($_POST['password']);

    if (empty($name)) {
        $error .= '<p class="error>Please enter your name.</p>';
    }
    
    if (empty($password)) {
        $error .= '<p class="error>Please enter your password.</p>';
    }

    if (empty($error)) {
        if($query = $conn->prepare("SELECT * FROM users WHERE name = ?")) {
            $query->bind_param('s', $name);
            $query->execute();
            $row = $query->fetch();
            if ($row) {
                if (password_verify($password, $row['password'])) {
                    $_SESSION["userid"] = $row['id'];
                    $_SESSION["user"] = $row;

                    header("location: index.php");
                    exit;
                } else {
                    $error .= '<p class="error">The password is not valid.</p>';
                }
            } else {
                 $error .= '<p class="error>No User exist with that name.</p>';
            }
        }
        $query->close();
    }
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="index.css" type="text/css">
</head>
<body>

<h2>Login Form</h2>

<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

<div id="id01" class="popup">
  
  <form class="modal-content animate">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <?php echo $error ?>
        
      <button type="submit">Login</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>

<script>

var popup = document.getElementById('id01');

window.onclick = function(event) {
    if (event.target == popup) {
        popup.style.display = "none";
    }
}
</script>
</body>
</html>

