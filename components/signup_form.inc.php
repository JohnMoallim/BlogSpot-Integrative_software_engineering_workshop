<?php

// Define variables and initialize with empty values
$email = $password = $confirm_password = $firstname = $lastname = "";
$email_err = $password_err = $confirm_password_err = $firstname_err = $lastname_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate Email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a email.";
    } elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        $email_err = "Email is not available";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE email = ?";

        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $param_email = trim($_POST["email"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have at least 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Validate first name
    if(empty(trim($_POST["firstname"]))) {
        $firstname_err = "Please add first name.";
    }else{
        $firstname = trim($_POST["firstname"]);
    }

    // Validate last name
    if(empty(trim($_POST["lastname"]))){
        $lastname_err = "Please add last name.";
    }else{
        $lastname = trim($_POST["lastname"]);
    }

    // Check input errors before inserting in database
    if(empty($firstname_err) && empty($lastname_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)){
//        if(empty(trim($_POST["gender"]))) {
//            $gender = 0;
//        }
//        else{
//            $gender = trim($_POST["gender"]);
//        }
        $gender = trim($_POST["gender"]);
        if(empty(trim($_POST["url"]))) {
            $url = "";
        }
        else{
            $url = trim($_POST["url"]);
        }
        if(empty(trim($_POST["phone_number"]))) {
            $phone_number = "";
        }
        else{
            $phone_number = trim($_POST["phone_number"]);
        }
        if(empty(trim($_POST["age"]))) {
            $age = "";
        }
        else{
            $age = trim($_POST["age"]);
        }





        //Securing password as a hash, so it becomes more secure
        $password = password_hash($password, PASSWORD_DEFAULT);
        // Prepare an insert statement
        $sql = "INSERT INTO users (first_name, last_name, email, password, gender, url, phone_number, age) VALUES ('$firstname', '$lastname', '$email', '$password', '$gender', '$url', '$phone_number','$age')";
        try {
            $conn->query($sql);
            // Redirect to login page
            header("location: index.php");
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }//        }
    }

    // Close connection
    mysqli_close($conn);
}
?>


<section class="vh-100 bg-secondary text-dark bg-opacity-25 sign_in_up_page" >
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <h3>Sign up</h3>
                            <p class="mb-4">Please fill this form to create an account.</p>

                            <div class="row mb-4 justify-content-center align-items-center">
                                <div class="col">
                                    <label for="firstname" class="form-label">First Name</label>
                                    <input type="text" name="firstname" class="form-control <?php echo (!empty($firstname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $firstname; ?>">
                                    <span class="invalid-feedback float"><?php echo $firstname_err; ?></span>
                                </div>

                                <div class="col">
                                    <label for="lastname" class="form-label">Last Name</label>
                                    <input type="text" name="lastname" class="form-control <?php echo (!empty($lastname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $lastname; ?>">
                                    <span class="invalid-feedback"><?php echo $lastname_err; ?></span>
                                </div>
                            </div>


                            <div class="form-outline mb-4">
                                <label for="email" class="form-label">Email address</label>
                                <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                                <span class="invalid-feedback"><?php echo $email_err; ?></span>
                            </div>

                            <div class="form-outline mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                                <span class="invalid-feedback"><?php echo $password_err; ?></span>
                            </div>

                            <div class="form-outline mb-4">
                                <label for="confirm_password" class="form-label">Password Confirmation</label>
                                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                            </div>

                            <div class="form-outline mb-4">
                                <label for="age" class="form-label">Age</label>
                                <input type="number" name="age" min="1" max="120" class="form-control">
                            </div>

                            <div class="form-outline mb-4">
                                <label for="gender" class="form-label">Gender</label>
                                <select name="gender" class="form-control">
                                    <option disabled selected value> -- select an option -- </option>
                                    <option value="0">Male</option>
                                    <option value="1">Female</option>
                                </select>
                            </div>

                            <div class="form-outline mb-4">
                                <label for="phone_number" class="form-label">Phone Number</label>
                                <input type="tel" name="phone_number" class="form-control">
                            </div>

                            <div class="form-outline mb-4">
                                <label for="url" class="form-label">Your LinkedIn URL</label>
                                <input type="url" name="url" class="form-control">
                            </div>

                            <span class="d-block m-2">Have an account already? <a class="fw-bold" href="login.php">Sign in</a></span>
                            <button class="btn btn-primary btn-block ml-2" type="submit" name="submit">Signup</button>
                            <input type="reset" class="btn btn-secondary ml-2" value="Reset">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style type="text/css">
    .sign_in_up_page
    {
        background-image: url('img/bg_pic.jpeg');
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>