<?php

include('offline.php');


if (!empty($_COOKIE['adm_email']) && !empty($_COOKIE['adm_password'])) {
    // Redirect to the dashboard
    header("Location: dashboard");
    exit();
}

else{
    

include('doctype.php');

?>

<head>

 <title>Admin Login</title>

<?php

include('head.php');

?>

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <img src="../assets/img/logo.png" alt="" width="200px">
                                    </div>
                                    <h4 class="text-center mb-4">Sign in into your Admin Account</h4>
                                    <form action="login_pro" method="POST">
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="text" class="form-control" name="email" id="email" value="srirakeshch@gmail.com" placeholder="Enter Email" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="password" id="password" value="Rakesh@12" placeholder="Enter Password" required>
                                          
                                        </div>
                                        <!--<div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                                <a href="forgot_password.php">Forgot Password?</a>
                                            </div>
                                        </div>-->
                                        <div class="text-center">
                                            <input type="submit" name="Log_In" value="Log In" class="btn btn-primary btn-block">
                                        </div>
                                    </form>

                                    <script type="text/javascript">
                                        function togglePassword() {
                                            var passwordInput = document.getElementById("password");
                                            if (passwordInput.type === "password") {
                                                passwordInput.type = "text";
                                            } else {
                                                passwordInput.type = "password";
                                            }
                                        }

                                        var password = new LiveValidation('password', { validMessage: 'validated', wait: 100});
                                        password.add(Validate.Presence, {failureMessage: "Password can not be Blank!"});
                                        password.add(Validate.Length, { minimum: 6 });
                                        password.add(Validate.Length, { maximum: 20 });
                                        password.add(Validate.Format, {pattern: /^(?=.*\d).{6,20}$/});

                                        var email = new LiveValidation('email', { validMessage: 'validated', wait: 100});
                                        email.add(Validate.Presence, {failureMessage: "Email can not be Blank!"});
                                        email.add(Validate.Length, { maximum: 50 });
                                        email.add(Validate.Format, {pattern: /^(([-\w\d]+)(\.[-\w\d]+)*@([-\w\d]+)(\.[-\w\d]+)*(\.([a-zA-Z]{2,5}|[\d]{1,3})){1,2})$/});
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php

include('footerjs.php');

?>

</body>

</html>


<?php

}

?>