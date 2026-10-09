<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= esc($pageTitle ?? 'Sign In') ?> | The Daily Fit</title>


    <style>

        * {

            margin: 0;
            padding: 0;
            box-sizing: border-box;

        }


        body {

            font-family: Arial, Helvetica, sans-serif;

            min-height: 100vh;

            background: #ffffff;

            color: #222;

            overflow: hidden;

        }


        /* =========================
           BACKGROUND
        ========================= */


.login-background {

    position: fixed;

    inset: 0;

    background: #ffffff;

    z-index: 0;

}


        .login-container {

            position: relative;

            z-index: 2;

            min-height: 100vh;

            display: flex;

            justify-content: center;

            align-items: center;

            padding: 40px;

        }


        .login-card {

            width: 1000px;

            max-width: 100%;

            display: grid;

            grid-template-columns: 1fr 420px;

            background: white;

            border-radius: 0;

            overflow: hidden;

            box-shadow:

                        0 25px 70px rgba(0,0,0,0.15),
                        0 8px 25px rgba(74,47,36,0.12);

        }



        /* =========================
           BRAND SIDE
        ========================= */



        .brand-side {

        background:
     
        linear-gradient(
            145deg,
            #F2EFE8,
            #E8E3D8
     
            );

            color: #222222;

            padding: 60px;
    
            display: flex;

            flex-direction: column;

            justify-content: center;

        }


        .brand-logo {

            width: 90px;

            height: 90px;

            margin-bottom: 30px;

        }


        .brand-logo img {

            width: 100%;

            height: 100%;

            object-fit: contain;

        }


        .brand-side h1 {

            font-size: 38px;

            letter-spacing: 2px;

            margin-bottom: 12px;

            color:#222222;

        }


        .brand-side h2 {

            font-size: 16px;

            font-weight: 400;

            opacity: .8;

            margin-bottom: 25px;

            color:#555555;

        }


        .brand-description {

            font-size: 14px;

            line-height: 1.8;

            opacity:1;

            color:#666666;

            max-width: 380px;



        }


        .brand-features {

            margin-top: 40px;

            display: grid;

            gap: 15px;

        }


        .brand-feature {

            display: flex;

            align-items: center;

            gap: 12px;

            font-size: 13px;

            opacity: .9;

        }


        .feature-dot {

            width: 8px;

            height: 8px;

            border-radius: 50%;

            background: #d6a77a;

        }
        /* =========================
           LOGIN SIDE
        ========================= */


        .login-side {

            padding: 60px 50px;

            display: flex;

            flex-direction: column;

            justify-content: center;

        }


        .login-title {

            font-size: 32px;

            margin-bottom: 10px;

            color: #222222;

        }


        .login-subtitle {

            color: #777;

            font-size: 14px;

            margin-bottom: 35px;

        }



        .alert {

            padding: 12px 15px;

            border-radius: 8px;

            font-size: 13px;

            margin-bottom: 20px;

        }


        .alert-error {

            background: #fff0f0;

            color: #a00000;

            border-left: 3px solid #a00000;

        }


        .alert-success {

            background: #effff2;

            color: #146c2e;

            border-left: 3px solid #146c2e;

        }



        .form-group {

            margin-bottom: 20px;

        }



        .form-group label {

            display: block;

            font-size: 13px;

            font-weight: 600;

            margin-bottom: 8px;

            color: #333;

        }



        .form-control {

            width: 100%;

            height: 48px;

            border: 1px solid #ddd;

            border-radius: 8px;

            padding: 0 15px;

            font-size: 14px;

            transition: .25s ease;

        }


        .form-control:focus {
  
        outline:none;
  
        border-color:#7A8065;
   
        box-shadow:
     
        0 0 0 3px rgba(122,128,101,.15);

    }

        .password-wrapper {

            position: relative;

        }



        .password-wrapper .form-control {

            padding-right: 45px;

        }



        .password-toggle {

            position: absolute;

            right: 12px;

            top: 50%;

            transform: translateY(-50%);

            background: none;

            border: none;

            cursor: pointer;

            color: #777;

            font-size: 15px;

        }



        .remember-row {

            display: flex;

            align-items: center;

            gap: 8px;

            margin-bottom: 25px;

            font-size: 13px;

            color: #666;

        }


        .remember-row input {

        accent-color:#7A8065;

    }


        .login-button {

        width:100%;

        height:48px;
  
        border:none;


        border-radius:8px;

        background:

        linear-gradient(
            135deg,
            #7A8065,
            #929879
   
            );
   
            color:white;

            font-size:14px;
  
            font-weight:600;
  
            cursor:pointer;

            transition:.3s ease;

        }


        .login-button:hover {
  
        transform:translateY(-2px);
  
        background:

        linear-gradient(
            135deg,
            #60654F,
            #7A8065
      
            );
    
            box-shadow:
    
            0 10px 25px rgba(122,128,101,.25);

   
        }


        .login-footer {

            margin-top: 30px;

            text-align: center;

            font-size: 12px;

            color: #999;

        }



        @media(max-width:850px){


            body {

                overflow: auto;

            }


            .login-container {

                padding: 20px;

            }


            .login-card {

                grid-template-columns: 1fr;

            }


            .brand-side {

                padding: 40px;

            }


            .login-side {

                padding: 40px;

            }


        }


    </style>

</head>



<body>


<div class="login-background"></div>



<div class="login-container">


    <div class="login-card">



        <div class="brand-side">


            <div class="brand-logo">

                <img 
                    src="https://i.postimg.cc/4yxYC6kV/TDF-logo-no-bg.png"
                    alt="The Daily Fit Logo"
                >

            </div>



            <h1>
                THE DAILY FIT
            </h1>


            <h2>
                Fashion POS Management System
            </h2>


            <p class="brand-description">

                Manage your clothing business with a simple,
                organized, and efficient system for products,
                sales, customers, and staff.

            </p>



            <div class="brand-features">


                <div class="brand-feature">

                    <span class="feature-dot"></span>

                    Product Management

                </div>



                <div class="brand-feature">

                    <span class="feature-dot"></span>

                    Sales Monitoring

                </div>



                <div class="brand-feature">

                    <span class="feature-dot"></span>

                    Staff Management

                </div>



            </div>


        </div>
                <div class="login-side">


            <h2 class="login-title">

                Sign in

            </h2>


            <p class="login-subtitle">

                Enter your account credentials to continue.

            </p>




            <?php if (session()->getFlashdata('error')): ?>

                <div class="alert alert-error">

                    <?= esc(session()->getFlashdata('error')) ?>

                </div>

            <?php endif; ?>




            <?php if (session()->getFlashdata('success')): ?>

                <div class="alert alert-success">

                    <?= esc(session()->getFlashdata('success')) ?>

                </div>

            <?php endif; ?>





            <form 
                action="<?= base_url('login') ?>" 
                method="post"
                id="loginForm"
            >


                <?= csrf_field() ?>



                <div class="form-group">


                    <label for="username">

                        Username

                    </label>


                    <input

                        type="text"

                        class="form-control"

                        id="username"

                        name="username"

                        value="<?= old('username') ?>"

                        placeholder="Enter your username"

                        autocomplete="username"

                        required

                    >


                </div>





                <div class="form-group">


                    <label for="password">

                        Password

                    </label>



                    <div class="password-wrapper">


                        <input

                            type="password"

                            class="form-control"

                            id="password"

                            name="password"

                            placeholder="Enter your password"

                            autocomplete="current-password"

                            required

                        >



                        <button

                            type="button"

                            class="password-toggle"

                            id="passwordToggle"

                            aria-label="Show password"

                        >

                            👁

                        </button>


                    </div>


                </div>





                <div class="remember-row">


                    <input

                        type="checkbox"

                        id="remember"

                        name="remember"

                        value="1"

                    >



                    <label for="remember">

                        Remember me

                    </label>


                </div>





                <button

                    type="submit"

                    class="login-button"

                    id="loginButton"

                >

                    Sign in

                </button>



            </form>





            <div class="login-footer">

                The Daily Fit • Fashion POS System

            </div>



        </div>


    </div>


</div>
<script>


const passwordInput = document.getElementById("password");

const passwordToggle = document.getElementById("passwordToggle");



passwordToggle.addEventListener("click", function(){


    if(passwordInput.type === "password"){


        passwordInput.type = "text";


        passwordToggle.textContent = "🙈";


        passwordToggle.setAttribute(
            "aria-label",
            "Hide password"
        );


    } else {


        passwordInput.type = "password";


        passwordToggle.textContent = "👁";


        passwordToggle.setAttribute(
            "aria-label",
            "Show password"
        );


    }


});





const loginForm = document.getElementById("loginForm");

const loginButton = document.getElementById("loginButton");



loginForm.addEventListener("submit", function(){


    if(loginForm.checkValidity()){


        loginButton.textContent = "Signing in...";


        loginButton.style.opacity = "0.8";


        loginButton.style.pointerEvents = "none";


    }


});


</script>



</body>

</html>