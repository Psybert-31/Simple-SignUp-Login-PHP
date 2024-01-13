<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<section class="user">
  <div class="user_options-container">
    <img src="css/imgs/rtu1.png" alt="" width="100%">
    <div class="user_options-text">
      <div class="user_options-unregistered">
        <h2 class="user_unregistered-title">Don't have an account?</h2>
        <p class="user_unregistered-text">Create now!</p>
        <button class="user_unregistered-signup" id="signup-button">Sign up</button>
      </div>

      <div class="user_options-registered">
        <h2 class="user_registered-title">Already have a account!</h2>
        <p class="user_registered-text">Get started..</p>
        <button class="user_registered-login" id="login-button">Login</button>
      </div>
    </div>
    
    <div class="user_options-forms" id="user_options-forms">
      <div class="user_forms-login">
        <h2 class="forms_title">Login</h2>
        <form class="forms_form" action="form.php" method="POST">
            <?php
                    @include 'db1.php';
                    session_start();

                    if (isset($_POST['login'])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                      if ($name == "admin" && $email == "admin@gmail.com") {
                        header('location:index.php');
                      }else {
                        $select = "SELECT * FROM users WHERE Name = '$name' && Email = '$email'";

                        $result = mysqli_query($conn, $select);
                        
                        if(mysqli_num_rows($result) > 0){
                            $_SESSION['Email'] = $email;
                            $_SESSION['Name'] = $name;
                            header('location:Homepage.php');
                        }else{
                            $error = 'Incorrect Inputs !';
                            echo '<span class= "error-msg">'.$error.'</span>'; 
                        }
                      }
                    
                    }

                ?>
          <fieldset class="forms_fieldset">
            <div class="forms_field">
              <input type="text" name="name" placeholder="Enter Name" class="forms_field-input" required/>
            </div>
            <div class="forms_field">
              <input type="email" name="email" placeholder="Enter Email" class="forms_field-input" required />
            </div>
          </fieldset>
          <div class="forms_buttons">
            &nbsp;<input type="submit" name="login" value="Log In" class="forms_buttons-action" required>
          </div>
        </form>
      </div>


      <div class="user_forms-signup">
        <h2 class="forms_title">Sign Up</h2>
        <form class="forms_form" action="form.php" method="POST">
           <?php
                @include 'db1.php';

                if (isset($_POST['html'])) {
                    $name = $_POST['name'];
                    $birthday = $_POST['birthday'];
                    $course = $_POST['course'];
                    $email = $_POST['email'];

                    $select = "SELECT * FROM users WHERE Name = '$name' && Birthday = '$birthday' && Course = '$course' && Email = '$email' ";

                    $result = mysqli_query($conn, $select);

                    if(mysqli_num_rows($result) > 0){
                        $error = 'user already exist';
                        echo '<span class= "error-msg">'.$error.'</span>';                    
                    }
                    else{
                        $insert = "INSERT INTO users(Name,Birthday,Course,Email) values('$name','$birthday','$course','$email')";
                        mysqli_query($conn, $insert);

                        $save = 'Data Saved Successfull';
                        echo '<script>';
                        echo 'alert("' . $save . '");';
                        echo '</script>';
                    }
                }
            
            ?>
          <fieldset class="forms_fieldset">
            <div class="forms_field">
              <input type="text" name="name" placeholder="Full Name" class="forms_field-input" required />
            </div>
            <div class="forms_field">
              <input type="email" name="email" placeholder="Email" class="forms_field-input" required />
            </div>
            <div class="forms_field">
              <input type="date" name="birthday" placeholder="Birthdate" class="forms_field-input" required />
              <select name="course" placeholder="Course" class="forms_field-input" required>
                <option value="">Choose your course</option>
                <option value="Bachelor of Science in Mechanical Engineering">Bachelor of Science in Mechanical Engineering</option>
                <option value="Bachelor of Science in Architecture">Bachelor of Science in Architecture</option>
                <option value="Bachelor of Science in Civil Engineering">Bachelor of Science in Civil Engineering</option>
                <option value="Bachelor of Science in Electrical Engineering">Bachelor of Science in Electrical Engineering</option>
                <option value="Bachelor of Science in Electronics Engineering">Bachelor of Science in Electronics Engineering</option>
                <option value="Bachelor of Science in Computer Engineering">Bachelor of Science in Computer Engineering</option>
                <option value="Bachelor of Science in Industrial Engineering">Bachelor of Science in Industrial Engineering</option>
                <option value="Bachelor of Science in Information Technology (Boni Campus)">Bachelor of Science in Information Technology (Boni Campus)</option>
                <option value="Bachelor of Science in Instrumentation and Control Engineering (Boni Campus)">Bachelor of Science in Instrumentation and Control Engineering (Boni Campus) </option>
                <option value="Bachelor of Science in Mechatronics">Bachelor of Science in Mechatronics</option>
                <option value="Bachelor of Science in Accountancy">Bachelor of Science in Accountancy</option>
                <option value="Bachelor of Science in Entrepreneurship">Bachelor of Science in Entrepreneurship</option>
                <option value="Bachelor of Science in Office Administration">Bachelor of Science in Office Administration</option>
                <option value="Bachelor of Science in Business Administration major in Operations Management">Bachelor of Science in Business Administration major in Operations Management</option>
                <option value="Bachelor of Science in Business Administration major in Marketing Management">Bachelor of Science in Business Administration major in Marketing Management</option>
                <option value="Bachelor of Science in Business Administration major in Financial Management">Bachelor of Science in Business Administration major in Financial Management</option>
                <option value="Bachelor of Science in Business Administration major in Human Resource Management">Bachelor of Science in Business Administration major in Human Resource Management</option>
                <option value="Bachelor of Secondary Education major in English">Bachelor of Secondary Education major in English</option>
                <option value="Bachelor of Secondary Education major in Math">Bachelor of Secondary Education major in Math</option>
                <option value="Bachelor of  Secondary Education major in Science (Boni Campus)">Bachelor of  Secondary Education major in Science (Boni Campus)</option>
                <option value="Bachelor of Secondary Education major in Social Studies">Bachelor of Secondary Education major in Social Studies</option>
                <option value="Bachelor of Secondary Education Major in Filipino">Bachelor of Secondary Education Major in Filipino</option>
                <option value="Bachelor of Technical-Vocational Teacher Education major in Animation">Bachelor of Technical-Vocational Teacher Education major in Animation</option>
                <option value="Bachelor of Technical-Vocational Teacher Education major in Computer Hardware Servicing">Bachelor of Technical-Vocational Teacher Education major in Computer Hardware Servicing</option>
                <option value="Bachelor or Technical-Vocational Teacher Education Major in Garments Fashion and Design">Bachelor or Technical-Vocational Teacher Education Major in Garments Fashion and Design</option>
                <option value="Bachelor or Technical-Vocational Teacher Education Major in Electronics Technology">Bachelor or Technical-Vocational Teacher Education Major in Electronics Technology</option>
                <option value="Bachelor or Technical-Vocational Teacher Education Major in Welding and Fabrications Technology">Bachelor or Technical-Vocational Teacher Education Major in Welding and Fabrications Technology</option>
                <option value="Bachelor of Science in Psychology">Bachelor of Science in Psychology</option>
                <option value="Bachelor of Arts in Political Science">Bachelor of Arts in Political Science</option>
                <option value="Bachelor of Science in Statistics (Boni Campus)">Bachelor of Science in Statistics (Boni Campus)</option>
                <option value="Bachelor of Science in Biology (Boni Campus)">Bachelor of Science in Biology (Boni Campus)</option>
                <option value="Bachelor of Science in Astronomy">Bachelor of Science in Astronomy</option>
                <option value="Bachelor of Science in Physical Education (Boni Campus)">Bachelor of Science in Physical Education (Boni Campus)</option>
            </select>
            <?php
              
            ?>
            </div>
          </fieldset>
          <div class="forms_buttons">
            <input type="reset" name="reset" placeholder="Clear" class="forms_buttons-action">
            &nbsp;&nbsp;
            <input type="submit" name="html" value="Sign up" class="forms_buttons-action">
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