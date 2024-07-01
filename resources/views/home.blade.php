<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>OTP Authentication</title>
</head>

<body>

    <!-- Optional JavaScript; choose one of the two! -->
    <div class="conatiner m-5">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">OTP Authentication</h5>
                    <p class="card-text">OTP Authentication is a process of verifying the user's identity by
                        sending a one-time password (OTP) to the user's registered mobile number or email address.
                        The user is required to enter the OTP received on their registered mobile number or email
                        address
                        to complete the authentication process.</p>
                    <form>
                        <div class="form-group">
                            <label for="phone">Enter Phone Number</label>
                            <input type="text" class="form-control" id="phone" placeholder="+92 123 1231212">
                        </div>
                        <div id="recaptcha-container"></div>
                        <button type="button" class="btn btn-primary" onclick="sendNumber()">Send OTP</button>
                    </form>

                    <div id="error" class="alert alert-danger" style="display: none;"></div>
                    <div id="success" class="alert alert-success" style="display: none;"></div>

                    <h3 class="mt-3 border-top">Verfiy Code</h3>
                    <div class="form-group">
                        <label for="verCode">Enter Code</label>
                        <input type="text" class="form-control" id="verCode">
                    </div>
                    <button type="button" class="btn btn-primary" onclick="verifyCode()">Verify OTP</button>
                    {{-- <button type="button" class="btn btn-primary" onclick="CheckingConsole()">Checking Console</button> --}}
                    <div id="errorMsg" class="alert alert-danger" style="display: none;"></div>
                    <div id="successMsg" class="alert alert-success" style="display: none;"></div>
                </div>
            </div>

        </div>

        <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>

        <script>
            var firebaseConfig = {
                apiKey: "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
                authDomain: "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
                projectId: "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
                storageBucket: "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
                messagingSenderId: "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
                appId: "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
                measurementId: "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"
            };
            firebase.initializeApp(firebaseConfig);
        </script>

        <script type="text/javascript">
            window.onload = function() {
                render();
            }

            function render() {
                console.log("function called");
                window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
                recaptchaVerifier.render();
            }

            function sendNumber() {
                var number = $('#phone').val();
                console.log("number", number);
                firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult) {
                    window.confirmationResult = confirmationResult;
                    codeResult = confirmationResult;
                    console.log("Code Result", codeResult);

                    $('#success').text("Message Send Successfully");
                    $('#success').show();
                }).catch(function(error) {
                    $('#error').text(error.message);
                    $('#error').show();
                })
            }

            function verifyCode() {
                var code = $('#verCode').val();
                console.log("code", code);
                codeResult.confirm(code).then(function(result) {
                    console.log("result", result);
                    $('#successMsg').text("Message Verified Successfully");
                    $('#successMsg').show();
                })
                .catch( function (error) {
                    console.log("Error",error);
                    $('#errorMsg').text(error.message);
                    $('#errorMsg').show();
                 })
            }

            function CheckingConsole() {
                console.log("Checking Console 1 ");
                setTimeout(() => {
                    console.log("After SET time out Console 2");
                }, 0);
                console.log("Checking Console 3 ");
            }
        </script>
        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
        </script>
</body>

</html>
