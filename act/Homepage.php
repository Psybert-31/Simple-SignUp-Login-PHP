<?php
@include 'db1.php';

session_start();

if(!isset($_SESSION['Email'])){
   header('location: form.php');
}

?>

<?php
    @include ('db1.php');
    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<section class="user">
  <div class="user_options-container">
    <img src="css/imgs/rtu1.png" alt="" width="100%" >
    <div class="user_options-text">
      <div class="user_options-unregistered">
        <h2 class="user_unregistered-title">Do You Want To See The Records</h2>
        <p class="user_unregistered-text">Click The Button Below!</p>
        <button class="user_unregistered-signup" id="signup-button">View Records</button>
      </div>

      <div class="user_options-registered">
        <h2 class="user_registered-title">Here Are Your Profile Details!</h2>
        <p class="user_registered-text">Get started..</p>
        <button class="user_registered-login" id="login-button">Student Profile</button>
      </div>
    </div>
    
    <div class="user_options-forms" id="user_options-forms">
      <div class="user_forms-login">
        <h2 class="forms_title">Welcome To Rizal Technological University</h2>
        
                <br><h1> Name: <?php echo $_SESSION['Name']; ?> </h1>
                <br><h1 > Email: <?php echo $_SESSION['Email']; ?> </h1>

           <br> <h1>Login Another Account? <a href="logout.php" class="logout">Logout</a></h1>
      </div>


      <div class="user_forms-signup">
        <h2 class="forms_title">Here Are The Records Of Students</h2>
        <table>
          <tr>
              <th>Student_No</th>
              <th>Name</th>
              <th>Birthday</th>
              <th>Course</th>
              <th>Email</th>
          </tr>

          <tr>
              <?php
                  while($row = mysqli_fetch_assoc($result)){
              ?>
                  <td><?php echo $row['Student_No'] ?></td>
                  <td><?php echo $row['Name'] ?></td>
                  <td><?php echo $row['Birthday'] ?></td>
                  <td><?php echo $row['Course'] ?></td>
                  <td><?php echo $row['Email'] ?></td>
          </tr>
            <?php
                }
            ?>
        </table>
 
      </div>
        </form>
      </div>
    </div>
  </div>

<script>
          const signupButton = document.getElementById("signup-button"),
  loginButton = document.getElementById("login-button"),
  userForms = document.getElementById("user_options-forms");

signupButton.addEventListener(
  "click",
  ()=>{
    userForms.classList.remove("bounceRight");
    userForms.classList.add("bounceLeft");
  },
  false
);

loginButton.addEventListener(
  "click",
  () => {
    userForms.classList.remove("bounceLeft");
    userForms.classList.add("bounceRight");
  },
  false
);
</script>

</section>
</body>


</html>