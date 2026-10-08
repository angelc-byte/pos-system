<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>POS System | Staff Login</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            width: 100%;
            min-height: 100%;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #070d17;
            color: #ffffff;
            overflow: hidden;
        }


        /* =========================================================
           BACKGROUND
        ========================================================= */

        .background {
            position: fixed;
            inset: 0;
            overflow: hidden;
            z-index: 0;

            background:
                radial-gradient(
                    circle at 20% 20%,
                    rgba(37, 99, 235, 0.14),
                    transparent 32%
                ),
                radial-gradient(
                    circle at 80% 75%,
                    rgba(124, 58, 237, 0.12),
                    transparent 32%
                ),
                #070d17;
        }


        /* =========================================================
           PERSPECTIVE GRID
        ========================================================= */

        .grid {
            position: absolute;

            width: 200%;
            height: 200%;

            left: -50%;
            top: -20%;

            background-image:
                linear-gradient(
                    rgba(255,255,255,0.028) 1px,
                    transparent 1px
                ),
                linear-gradient(
                    90deg,
                    rgba(255,255,255,0.028) 1px,
                    transparent 1px
                );

            background-size: 60px 60px;

            transform:
                perspective(500px)
                rotateX(63deg);

            animation:
                gridMove 18s linear infinite;
        }


        @keyframes gridMove {

            from {
                transform:
                    perspective(500px)
                    rotateX(63deg)
                    translateY(0);
            }

            to {
                transform:
                    perspective(500px)
                    rotateX(63deg)
                    translateY(60px);
            }
        }


        /* =========================================================
           AMBIENT LIGHTS
        ========================================================= */

        .ambient {
            position: absolute;

            width: 550px;
            height: 550px;

            border-radius: 50%;

            filter: blur(40px);

            opacity: 0.18;

            pointer-events: none;

            transition:
                transform 1.2s ease-out;
        }


        .ambient-one {
            left: -250px;
            top: -250px;

            background:
                radial-gradient(
                    circle,
                    #2563eb,
                    transparent 70%
                );

            animation:
                ambientOne 14s ease-in-out infinite;
        }


        .ambient-two {
            right: -250px;
            bottom: -250px;

            background:
                radial-gradient(
                    circle,
                    #7c3aed,
                    transparent 70%
                );

            animation:
                ambientTwo 17s ease-in-out infinite;
        }


        @keyframes ambientOne {

            0%,
            100% {
                transform: translate(0, 0);
            }

            50% {
                transform: translate(130px, 80px);
            }
        }


        @keyframes ambientTwo {

            0%,
            100% {
                transform: translate(0, 0);
            }

            50% {
                transform: translate(-100px, -80px);
            }
        }


        /* =========================================================
           FLOATING OBJECTS
        ========================================================= */

        .floating-object {
            position: absolute;

            border: 1px solid
                rgba(148,163,184,0.13);

            background:
                rgba(255,255,255,0.018);

            backdrop-filter: blur(5px);

            pointer-events: none;
        }


        .object-one {

            width: 100px;
            height: 100px;

            left: 7%;
            top: 12%;

            transform: rotate(25deg);

            animation:
                objectOne 13s ease-in-out infinite;
        }


        .object-two {

            width: 150px;
            height: 150px;

            right: 7%;
            top: 9%;

            border-radius: 50%;

            animation:
                objectTwo 16s ease-in-out infinite;
        }


        .object-three {

            width: 70px;
            height: 70px;

            left: 14%;
            bottom: 12%;

            transform: rotate(45deg);

            animation:
                objectThree 10s ease-in-out infinite;
        }


        .object-four {

            width: 180px;
            height: 180px;

            right: 4%;
            bottom: 5%;

            border-radius: 50%;

            animation:
                objectFour 18s ease-in-out infinite;
        }


        .object-five {

            width: 45px;
            height: 45px;

            left: 43%;
            top: 7%;

            transform: rotate(45deg);

            animation:
                objectFive 9s ease-in-out infinite;
        }


        @keyframes objectOne {

            0%,
            100% {
                transform:
                    translate(0, 0)
                    rotate(25deg);
            }

            50% {
                transform:
                    translate(35px, -45px)
                    rotate(115deg);
            }
        }


        @keyframes objectTwo {

            0%,
            100% {
                transform:
                    translate(0, 0);
            }

            50% {
                transform:
                    translate(-45px, 55px);
            }
        }


        @keyframes objectThree {

            0%,
            100% {
                transform:
                    translate(0, 0)
                    rotate(45deg);
            }

            50% {
                transform:
                    translate(40px, -50px)
                    rotate(140deg);
            }
        }


        @keyframes objectFour {

            0%,
            100% {
                transform:
                    translate(0, 0);
            }

            50% {
                transform:
                    translate(-70px, -35px);
            }
        }


        @keyframes objectFive {

            0%,
            100% {
                transform:
                    translate(0, 0)
                    rotate(45deg);
            }

            50% {
                transform:
                    translate(80px, 30px)
                    rotate(135deg);
            }
        }


        /* =========================================================
           MOVING DATA LINES
        ========================================================= */

        .data-line {
            position: absolute;

            height: 1px;

            background:
                linear-gradient(
                    90deg,
                    transparent,
                    rgba(96,165,250,0.45),
                    transparent
                );

            opacity: 0.4;

            animation:
                dataLine 7s linear infinite;
        }


        .line-one {
            width: 320px;
            top: 18%;
            left: -350px;
        }


        .line-two {
            width: 420px;
            top: 36%;
            left: -450px;

            animation-delay: 2s;
        }


        .line-three {
            width: 280px;
            top: 64%;
            left: -300px;

            animation-delay: 4s;
        }


        .line-four {
            width: 370px;
            top: 80%;
            left: -400px;

            animation-delay: 1s;
        }


        @keyframes dataLine {

            0% {
                transform:
                    translateX(0);

                opacity: 0;
            }

            15% {
                opacity: 0.5;
            }

            80% {
                opacity: 0.35;
            }

            100% {
                transform:
                    translateX(150vw);

                opacity: 0;
            }
        }


        /* =========================================================
           PARTICLES
        ========================================================= */

        .particle {
            position: absolute;

            width: 3px;
            height: 3px;

            border-radius: 50%;

            background: #94a3b8;

            box-shadow:
                0 0 10px
                rgba(96,165,250,0.8);

            animation:
                particleRise 14s linear infinite;
        }


        .p1 {
            left: 8%;
            bottom: -10px;
        }

        .p2 {
            left: 22%;
            bottom: -10px;
            animation-delay: 3s;
        }

        .p3 {
            left: 39%;
            bottom: -10px;
            animation-delay: 7s;
        }

        .p4 {
            left: 63%;
            bottom: -10px;
            animation-delay: 2s;
        }

        .p5 {
            left: 82%;
            bottom: -10px;
            animation-delay: 5s;
        }

        .p6 {
            left: 94%;
            bottom: -10px;
            animation-delay: 9s;
        }


        @keyframes particleRise {

            0% {
                transform:
                    translateY(0)
                    translateX(0);

                opacity: 0;
            }

            15% {
                opacity: 0.8;
            }

            50% {
                transform:
                    translateY(-50vh)
                    translateX(60px);
            }

            100% {
                transform:
                    translateY(-110vh)
                    translateX(-50px);

                opacity: 0;
            }
        }


        /* =========================================================
           MAIN CONTAINER
        ========================================================= */

        .page-container {

            position: relative;

            z-index: 5;

            min-height: 100vh;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 40px;
        }


        .login-wrapper {

            width: 1080px;

            max-width: 100%;

            display: grid;

            grid-template-columns:
                1.15fr
                0.85fr;

            background:
                rgba(15,23,42,0.68);

            border:
                1px solid
                rgba(255,255,255,0.12);

            border-radius: 24px;

            overflow: hidden;

            backdrop-filter:
                blur(25px);

            box-shadow:
                0 35px 100px
                rgba(0,0,0,0.5);

            animation:
                containerAppear 0.8s ease;
        }


        @keyframes containerAppear {

            from {
                opacity: 0;

                transform:
                    translateY(30px)
                    scale(0.97);
            }

            to {
                opacity: 1;

                transform:
                    translateY(0)
                    scale(1);
            }
        }


        /* =========================================================
           LEFT PANEL
        ========================================================= */

        .welcome-section {

            position: relative;

            padding: 58px;

            display: flex;

            flex-direction: column;

            justify-content: center;

            background:
                linear-gradient(
                    145deg,
                    rgba(255,255,255,0.07),
                    rgba(255,255,255,0.015)
                );
        }


        .scan-line {

            position: absolute;

            left: 0;
            right: 0;

            height: 1px;

            background:
                linear-gradient(
                    90deg,
                    transparent,
                    rgba(96,165,250,0.5),
                    transparent
                );

            opacity: 0.5;

            animation:
                scan 6s ease-in-out infinite;
        }


        @keyframes scan {

            0% {
                top: 0;
                opacity: 0;
            }

            20% {
                opacity: 0.5;
            }

            80% {
                opacity: 0.3;
            }

            100% {
                top: 100%;
                opacity: 0;
            }
        }


        /* =========================================================
           BRAND
        ========================================================= */

        .brand {

            display: flex;

            align-items: center;

            gap: 15px;

            margin-bottom: 40px;
        }


        .brand-logo {

            width: 54px;
            height: 54px;

            border-radius: 15px;

            background:
                linear-gradient(
                    135deg,
                    #2563eb,
                    #7c3aed
                );

            position: relative;

            box-shadow:
                0 12px 30px
                rgba(37,99,235,0.25);
        }


        .brand-logo::before {

            content: "";

            position: absolute;

            width: 22px;
            height: 15px;

            border:
                2px solid white;

            border-top: none;

            left: 15px;
            top: 16px;
        }


        .brand-logo::after {

            content: "";

            position: absolute;

            width: 5px;
            height: 5px;

            border-radius: 50%;

            background: white;

            left: 17px;
            bottom: 12px;

            box-shadow:
                16px 0 0 white;
        }


        .brand h3 {

            font-size: 20px;

            letter-spacing: 1.5px;
        }


        .brand span {

            display: block;

            margin-top: 5px;

            color: #8492a6;

            font-size: 10px;

            letter-spacing: 0.7px;
        }


        /* =========================================================
           WELCOME TEXT
        ========================================================= */

        .welcome-section h1 {

            font-size: 46px;

            line-height: 1.1;

            margin-bottom: 20px;
        }


        .highlight {

            background:
                linear-gradient(
                    90deg,
                    #60a5fa,
                    #a78bfa
                );

            -webkit-background-clip: text;

            -webkit-text-fill-color:
                transparent;
        }


        .description {

            color: #9aa8bb;

            font-size: 13px;

            line-height: 1.8;

            max-width: 480px;

            margin-bottom: 32px;
        }


        /* =========================================================
           FEATURE CARDS
        ========================================================= */

        .features {

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 11px;
        }


        .feature-card {

            padding: 17px;

            min-height: 130px;

            border-radius: 13px;

            background:
                rgba(255,255,255,0.035);

            border:
                1px solid
                rgba(255,255,255,0.07);

            transition:
                transform 0.3s,
                background 0.3s,
                border 0.3s;
        }


        .feature-card:hover {

            transform:
                translateY(-7px);

            background:
                rgba(255,255,255,0.075);

            border-color:
                rgba(96,165,250,0.25);
        }


        .feature-icon {

            width: 31px;
            height: 31px;

            border-radius: 8px;

            background:
                rgba(96,165,250,0.10);

            border:
                1px solid
                rgba(96,165,250,0.20);

            margin-bottom: 12px;

            position: relative;
        }


        .customer-icon::before {

            content: "";

            position: absolute;

            width: 7px;
            height: 7px;

            border:
                1.5px solid #60a5fa;

            border-radius: 50%;

            left: 10px;
            top: 5px;
        }


        .customer-icon::after {

            content: "";

            position: absolute;

            width: 15px;
            height: 7px;

            border:
                1.5px solid #60a5fa;

            border-bottom: none;

            border-radius:
                9px 9px 0 0;

            left: 6px;
            bottom: 5px;
        }


        .users-icon::before {

            content: "";

            position: absolute;

            width: 7px;
            height: 7px;

            border:
                1.5px solid #60a5fa;

            border-radius: 50%;

            left: 6px;
            top: 6px;
        }


        .users-icon::after {

            content: "";

            position: absolute;

            width: 16px;
            height: 7px;

            border:
                1.5px solid #60a5fa;

            border-bottom: none;

            border-radius:
                9px 9px 0 0;

            left: 7px;
            bottom: 5px;
        }


        .security-icon::before {

            content: "";

            position: absolute;

            width: 14px;
            height: 12px;

            border:
                1.5px solid #60a5fa;

            border-radius: 3px;

            left: 7px;
            top: 11px;
        }


        .security-icon::after {

            content: "";

            position: absolute;

            width: 7px;
            height: 8px;

            border:
                1.5px solid #60a5fa;

            border-bottom: none;

            border-radius:
                7px 7px 0 0;

            left: 10px;
            top: 5px;
        }


        .feature-card h4 {

            font-size: 12px;

            margin-bottom: 6px;
        }


        .feature-card p {

            color: #718096;

            font-size: 9px;

            line-height: 1.5;
        }


        /* =========================================================
           SYSTEM STATUS
        ========================================================= */

        .system-status {

            display: flex;

            align-items: center;

            gap: 9px;

            margin-top: 28px;

            color: #718096;

            font-size: 10px;
        }


        .status-dot {

            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: #22c55e;

            box-shadow:
                0 0 0 4px
                rgba(34,197,94,0.08),
                0 0 12px
                rgba(34,197,94,0.6);

            animation:
                statusPulse 2s ease-in-out infinite;
        }


        @keyframes statusPulse {

            0%,
            100% {
                box-shadow:
                    0 0 0 4px
                    rgba(34,197,94,0.08),
                    0 0 12px
                    rgba(34,197,94,0.6);
            }

            50% {
                box-shadow:
                    0 0 0 7px
                    rgba(34,197,94,0.03),
                    0 0 20px
                    rgba(34,197,94,0.8);
            }
        }


        /* =========================================================
           LOGIN PANEL
        ========================================================= */

        .login-section {

            background: #ffffff;

            color: #111827;

            padding: 55px;

            display: flex;

            flex-direction: column;

            justify-content: center;
        }


        .small-title {

            color: #4f46e5;

            font-size: 10px;

            font-weight: bold;

            text-transform: uppercase;

            letter-spacing: 2px;

            margin-bottom: 9px;
        }


        .login-header h2 {

            font-size: 31px;

            margin-bottom: 8px;
        }


        .login-header p {

            color: #6b7280;

            font-size: 12px;

            margin-bottom: 27px;
        }


        /* =========================================================
           ERROR
        ========================================================= */

        .error {

            background: #fef2f2;

            color: #b91c1c;

            border-left:
                3px solid #ef4444;

            padding: 12px;

            border-radius: 7px;

            margin-bottom: 18px;

            font-size: 11px;
        }


        /* =========================================================
           FORM
        ========================================================= */

        .form-group {

            margin-bottom: 19px;
        }


        .form-group label {

            display: block;

            font-size: 11px;

            font-weight: bold;

            margin-bottom: 7px;
        }


        .input-wrapper {

            position: relative;
        }


        .input-wrapper input {

            width: 100%;

            height: 48px;

            padding:
                0 43px 0 14px;

            border:
                1px solid #d1d5db;

            border-radius: 9px;

            outline: none;

            font-size: 13px;

            transition:
                border 0.25s,
                box-shadow 0.25s,
                transform 0.25s;
        }


        .input-wrapper input:hover {

            border-color: #a5b4fc;
        }


        .input-wrapper input:focus {

            border-color: #6366f1;

            box-shadow:
                0 0 0 3px
                rgba(99,102,241,0.10);

            transform:
                translateY(-1px);
        }


        /* =========================================================
           PASSWORD BUTTON
        ========================================================= */

        .password-toggle {

            position: absolute;

            right: 10px;

            top: 50%;

            transform:
                translateY(-50%);

            width: 30px;
            height: 30px;

            border: none;

            background: transparent;

            cursor: pointer;
        }


        .password-toggle::before {

            content: "";

            position: absolute;

            width: 15px;
            height: 9px;

            border:
                1.5px solid #64748b;

            border-radius: 50%;

            left: 7px;
            top: 9px;
        }


        .password-toggle::after {

            content: "";

            position: absolute;

            width: 4px;
            height: 4px;

            border-radius: 50%;

            background: #64748b;

            left: 13px;
            top: 11.5px;
        }


        /* =========================================================
           REMEMBER ME
        ========================================================= */

        .remember-row {

            display: flex;

            align-items: center;

            gap: 8px;

            margin-top: -7px;

            margin-bottom: 20px;

            font-size: 11px;

            color: #64748b;
        }


        .remember-row input {

            width: 15px;
            height: 15px;

            margin: 0;

            accent-color: #4f46e5;

            cursor: pointer;
        }


        .remember-row label {

            margin: 0;

            cursor: pointer;

            font-size: 11px;

            font-weight: normal;

            user-select: none;
        }


        /* =========================================================
           LOGIN BUTTON
        ========================================================= */

        .login-button {

            position: relative;

            width: 100%;

            height: 48px;

            border: none;

            border-radius: 9px;

            background:
                linear-gradient(
                    135deg,
                    #4f46e5,
                    #7c3aed
                );

            color: white;

            font-size: 12px;

            font-weight: bold;

            cursor: pointer;

            overflow: hidden;

            transition:
                transform 0.25s,
                box-shadow 0.25s;

            box-shadow:
                0 8px 20px
                rgba(79,70,229,0.24);
        }


        .login-button::before {

            content: "";

            position: absolute;

            top: 0;
            left: -100%;

            width: 100%;
            height: 100%;

            background:
                linear-gradient(
                    90deg,
                    transparent,
                    rgba(255,255,255,0.18),
                    transparent
                );

            transition:
                left 0.6s;
        }


        .login-button:hover::before {

            left: 100%;
        }


        .login-button:hover {

            transform:
                translateY(-2px);

            box-shadow:
                0 13px 28px
                rgba(79,70,229,0.34);
        }


        .login-button:active {

            transform:
                translateY(0);
        }


        .login-button.loading {

            pointer-events: none;

            opacity: 0.85;
        }


        .login-button.loading::after {

            content: "";

            position: absolute;

            width: 15px;
            height: 15px;

            border:
                2px solid
                rgba(255,255,255,0.35);

            border-top-color:
                #ffffff;

            border-radius: 50%;

            top: 15px;
            right: 18px;

            animation:
                spin 0.8s linear infinite;
        }


        @keyframes spin {

            to {
                transform: rotate(360deg);
            }
        }


        /* =========================================================
           SECURITY
        ========================================================= */

        .security-note {

            display: flex;

            align-items: center;

            gap: 9px;

            margin-top: 19px;

            color: #64748b;

            font-size: 9px;
        }


        .security-indicator {

            width: 21px;
            height: 21px;

            border:
                1px solid #10b981;

            border-radius: 50%;

            position: relative;
        }


        .security-indicator::after {

            content: "";

            position: absolute;

            width: 5px;
            height: 9px;

            border-right:
                1.5px solid #10b981;

            border-bottom:
                1.5px solid #10b981;

            transform:
                rotate(45deg);

            left: 7px;
            top: 4px;
        }


        /* =========================================================
           CLOCK
        ========================================================= */

        .clock {

            margin-top: 27px;

            text-align: center;

            color: #64748b;

            font-size: 9px;
        }


        .clock strong {

            color: #334155;
        }


        /* =========================================================
           FOOTER
        ========================================================= */

        .footer {

            position: fixed;

            left: 0;
            right: 0;

            bottom: 10px;

            text-align: center;

            color:
                rgba(255,255,255,0.28);

            font-size: 8px;

            z-index: 10;
        }


        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 850px) {

            body {
                overflow: auto;
            }

            .page-container {
                padding: 25px;
            }

            .login-wrapper {
                grid-template-columns: 1fr;
            }

            .welcome-section {
                padding: 40px;
            }

            .welcome-section h1 {
                font-size: 36px;
            }

            .login-section {
                padding: 40px;
            }
        }


        @media (max-width: 550px) {

            .page-container {
                padding: 15px;
            }

            .welcome-section {
                display: none;
            }

            .login-section {
                padding: 30px 25px;
            }

            .features {
                grid-template-columns: 1fr;
            }
        }


        /* =========================================================
           REDUCED MOTION
        ========================================================= */

        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {

                animation-duration: 0.01ms !important;

                animation-iteration-count: 1 !important;

                transition-duration: 0.01ms !important;
            }
        }

    </style>
</head>


<body>


    <!-- =========================================================
         ANIMATED BACKGROUND
    ========================================================= -->

    <div class="background">

        <div class="grid"></div>

        <div class="ambient ambient-one"></div>

        <div class="ambient ambient-two"></div>


        <div class="floating-object object-one"></div>

        <div class="floating-object object-two"></div>

        <div class="floating-object object-three"></div>

        <div class="floating-object object-four"></div>

        <div class="floating-object object-five"></div>


        <div class="data-line line-one"></div>

        <div class="data-line line-two"></div>

        <div class="data-line line-three"></div>

        <div class="data-line line-four"></div>


        <div class="particle p1"></div>

        <div class="particle p2"></div>

        <div class="particle p3"></div>

        <div class="particle p4"></div>

        <div class="particle p5"></div>

        <div class="particle p6"></div>

    </div>



    <!-- =========================================================
         MAIN
    ========================================================= -->

    <div class="page-container">

        <div class="login-wrapper">


            <!-- =================================================
                 LEFT PANEL
            ================================================== -->

            <div class="welcome-section">

                <div class="scan-line"></div>


                <div class="brand">

                    <div class="brand-logo"></div>

                    <div>

                        <h3>
                            POS SYSTEM
                        </h3>

                        <span>
                            POINT OF SALE MANAGEMENT
                        </span>

                    </div>

                </div>


                <h1>

                    Welcome to your

                    <span class="highlight">
                        workspace.
                    </span>

                </h1>


                <p class="description">

                    A centralized environment for managing
                    customer accounts, user records, and
                    authorized system access.

                </p>


                <div class="features">


                    <div class="feature-card">

                        <div
                            class="feature-icon customer-icon">
                        </div>

                        <h4>
                            Customer Accounts
                        </h4>

                        <p>
                            Organized customer records
                            and account information.
                        </p>

                    </div>


                    <div class="feature-card">

                        <div
                            class="feature-icon users-icon">
                        </div>

                        <h4>
                            User Management
                        </h4>

                        <p>
                            Centralized staff account
                            management.
                        </p>

                    </div>


                    <div class="feature-card">

                        <div
                            class="feature-icon security-icon">
                        </div>

                        <h4>
                            Secure Access
                        </h4>

                        <p>
                            Authentication protects
                            restricted areas.
                        </p>

                    </div>


                </div>


                <div class="system-status">

                    <span class="status-dot"></span>

                    <span>
                        System online
                    </span>

                </div>


            </div>



            <!-- =================================================
                 LOGIN PANEL
            ================================================== -->

            <div class="login-section">


                <div class="login-header">

                    <div class="small-title">
                        Staff Access
                    </div>

                    <h2>
                        Sign in
                    </h2>

                    <p>
                        Enter your credentials to access
                        the management system.
                    </p>

                </div>


                <?php if (session()->getFlashdata('error')): ?>

                    <div class="error">

                        <?= esc(session()->getFlashdata('error')) ?>

                    </div>

                <?php endif; ?>

                <?php if (session()->getFlashdata('success')): ?>

                    <div class="error" style="border-color: rgba(52, 211, 153, .28); background: rgba(52, 211, 153, .08); color: #86efac;">

                        <?= esc(session()->getFlashdata('success')) ?>

                    </div>

                <?php endif; ?>


                <form
                    action="<?= base_url('login') ?>"
                    method="post"
                    id="loginForm"
                >

                    <?= csrf_field() ?>


                    <!-- USERNAME -->

                    <div class="form-group">

                        <label for="username">
                            Username
                        </label>

                        <div class="input-wrapper">

                            <input
                                type="text"
                                id="username"
                                name="username"
                                value="<?= old('username') ?>"
                                placeholder="Enter your username"
                                autocomplete="username"
                                required
                            >

                        </div>

                    </div>


                    <!-- PASSWORD -->

                    <div class="form-group">

                        <label for="password">
                            Password
                        </label>

                        <div class="input-wrapper">

                            <input
                                type="password"
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
                            ></button>

                        </div>

                    </div>


                    <!-- REMEMBER ME -->

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


                    <!-- LOGIN BUTTON -->

                    <button
                        type="submit"
                        class="login-button"
                        id="loginButton"
                    >
                        Sign in
                    </button>


                </form>


                <div class="security-note">

                    <div class="security-indicator"></div>

                    <span>
                        Secure staff authentication
                    </span>

                </div>


                <div class="clock">

                    System time:

                    <strong id="clock">
                        Loading...
                    </strong>

                </div>


            </div>

        </div>

    </div>


    <div class="footer">

        POS System • Staff Management Portal

    </div>



    <script>

        /* =========================================================
           PASSWORD VISIBILITY
        ========================================================= */

        const passwordInput =
            document.getElementById("password");

        const passwordToggle =
            document.getElementById("passwordToggle");


        passwordToggle.addEventListener(
            "click",
            function () {

                if (
                    passwordInput.type === "password"
                ) {

                    passwordInput.type = "text";

                    passwordToggle.setAttribute(
                        "aria-label",
                        "Hide password"
                    );

                    passwordToggle.style.opacity =
                        "0.55";

                } else {

                    passwordInput.type = "password";

                    passwordToggle.setAttribute(
                        "aria-label",
                        "Show password"
                    );

                    passwordToggle.style.opacity =
                        "1";
                }

            }
        );


        /* =========================================================
           LIVE CLOCK
        ========================================================= */

        function updateClock() {

            const clock =
                document.getElementById("clock");

            const now =
                new Date();


            const date =
                now.toLocaleDateString(
                    undefined,
                    {
                        weekday: "short",
                        month: "short",
                        day: "numeric"
                    }
                );


            const time =
                now.toLocaleTimeString();


            clock.textContent =
                date + " • " + time;
        }


        updateClock();

        setInterval(
            updateClock,
            1000
        );


        /* =========================================================
           LOGIN LOADING STATE
        ========================================================= */

        const loginForm =
            document.getElementById("loginForm");

        const loginButton =
            document.getElementById("loginButton");


        loginForm.addEventListener(
            "submit",
            function () {

                if (
                    !loginForm.checkValidity()
                ) {
                    return;
                }


                loginButton.classList.add(
                    "loading"
                );

                loginButton.textContent =
                    "Authenticating...";
            }
        );


        /* =========================================================
           INTERACTIVE FEATURE CARDS
        ========================================================= */

        const featureCards =
            document.querySelectorAll(
                ".feature-card"
            );


        featureCards.forEach(
            function (card) {

                card.addEventListener(
                    "mousemove",
                    function (event) {

                        const rect =
                            card.getBoundingClientRect();


                        const x =
                            event.clientX -
                            rect.left;


                        const y =
                            event.clientY -
                            rect.top;


                        const rotateY =
                            ((x / rect.width) - 0.5)
                            * 5;


                        const rotateX =
                            ((y / rect.height) - 0.5)
                            * -5;


                        card.style.transform =
                            "perspective(500px) " +
                            "rotateX(" +
                            rotateX +
                            "deg) " +
                            "rotateY(" +
                            rotateY +
                            "deg) " +
                            "translateY(-5px)";
                    }
                );


                card.addEventListener(
                    "mouseleave",
                    function () {

                        card.style.transform =
                            "translateY(0)";
                    }
                );

            }
        );


        /* =========================================================
           BACKGROUND LIGHT FOLLOWS CURSOR
           The login card itself does NOT move.
        ========================================================= */

        const background =
            document.querySelector(
                ".background"
            );


        document.addEventListener(
            "mousemove",
            function (event) {

                const x =
                    (event.clientX /
                        window.innerWidth) * 100;

                const y =
                    (event.clientY /
                        window.innerHeight) * 100;


                background.style.background =
                    "radial-gradient(circle at " +
                    x +
                    "% " +
                    y +
                    "%, rgba(37,99,235,0.16), transparent 28%), " +
                    "radial-gradient(circle at 80% 75%, rgba(124,58,237,0.12), transparent 32%), " +
                    "#070d17";
            }
        );

    </script>

</body>
</html>
