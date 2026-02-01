<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>ভূমি উন্নয়ন কর</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bangla Font -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        *{ box-sizing:border-box; }
        body{
            margin:0;
            font-family:"Noto Sans Bengali", sans-serif;
            background:#f3f6f4;
        }

        /* ================= HEADER ================= */
        header{ background:#fff; }

        /* ===== TOP STRIP ===== */
        .top-strip{
            height:44px;
            background:linear-gradient(
                to right,
                #d6e2db 0%,
                #7fb292 35%,
                #5a9a78 55%,
                #e9f1ec 100%
            );
            display:flex;
            align-items:center;
        }

        .top-inner{
            max-width:1180px;
            width:100%;
            margin:auto;
            padding:0 14px;
            display:grid;
            grid-template-columns:auto 1fr auto;
            align-items:center;
        }

        .top-left{
            display:flex;
            align-items:center;
            gap:8px;
        }

        .top-left img{
            width:100%;
            height:30px;
        }

        .top-title{
            font-size:16px;
            font-weight:600;
            color:#1f3f2d;
        }

        .top-center{
            text-align:center;
            font-size:13px;
            color:#1f3f2d;
            white-space:nowrap;
        }

        .lang-switch{
            display:flex;
            border:1px solid #1f6a45;
            border-radius:4px;
            overflow:hidden;
        }

        .lang{
            padding:3px 8px;
            font-size:12px;
            font-weight:700;
            background:#fff;
            color:#1f6a45;
            cursor:pointer;
        }

        .lang.active{
            background:#1f6a45;
            color:#fff;
        }

        /* ===== NAVBAR ===== */
        /* NAVBAR BASE */
        .navbar{
            background:#fff;
            box-shadow:0 6px 16px rgba(0,0,0,.12);
        }

        .nav-inner{
            max-width:1180px;
            margin:auto;
            padding:10px 14px;
            display:flex;
            justify-content:flex-end; /* EVERYTHING to right */
        }

        /* RIGHT MENU GROUP */
        .nav-right{
            display:flex;
            align-items:center;
            gap:22px;
        }

        /* NAV ITEMS */
        .nav-item a{
            font-size:14px;
            font-weight:500;
            color:#1f3f2d;
            text-decoration:none;
            white-space:nowrap;
        }

        /* ARROW */
        .nav-item span{
            font-size:11px;
        }

        /* DROPDOWN */
        .dropdown{
            position:relative;
        }

        .dropdown-menu{
            position:absolute;
            top:28px;
            left:0;
            background:#fff;
            min-width:160px;
            box-shadow:0 8px 18px rgba(0,0,0,.15);
            border-radius:6px;
            padding:8px 0;
            display:none;
            z-index:100;
        }

        .dropdown-menu a{
            display:block;
            padding:8px 14px;
            font-size:13px;
            color:#1f3f2d;
        }

        .dropdown-menu a:hover{
            background:#e6ffe3;
        }

        /* SHOW ON HOVER */
        .dropdown:hover .dropdown-menu{
            display:block;
        }

        /* LOGIN BUTTON */
        .login{
            position:relative;
        }


        .login-menu{
            position: absolute;
            top: 42px;
            right: 0;

            min-width: 150px;   /* 👈 wider dropdown */
            padding: 14px;

            background: #fff;
            border-radius: 10px;
            box-shadow: 0 10px 22px rgba(0,0,0,.18);
            display: none;
            z-index: 1000;
        }

        /* OPEN STATE */
        .login.show .login-menu {
            display: block;
        }

        /* OPTIONAL: caret rotation */
        .login.show .caret {
            transform: rotate(180deg);
            transition: 0.2s;
        }


        .login-btn{
            background:#1f6a45;
            color:#fff;
            border:none;
            border-radius:20px;
            padding:6px 18px;
            font-weight:600;
            cursor:pointer;
        }

        .login-menu{
            position:absolute;
            top:42px;
            right:0;
            background:#fff;
            padding:12px;
            border-radius:10px;
            box-shadow:0 10px 22px rgba(0,0,0,.18);
            display:none;
        }

        .login-menu button{
            width:100%;
            background:#fff;
            border:2px solid #1f6a45;
            border-radius:6px;
            padding:8px;
            margin-bottom:10px;
            font-weight:600;
        }

        .login-menu button:last-child{
            margin-bottom:0;
        }

        /* ===== DEMO CONTENT AREA ===== */
        .content{
            max-width:1180px;
            margin:40px auto;
            background:#eaf3ea;
            padding:40px;
            text-align:center;
            color:#333;
            border-radius:4px;
        }

        /* ===== RESPONSIVE ===== */
        @media(max-width:768px){
            .menu{ display:none; }
            .top-center{ font-size:12px; }
        }
    </style>

    <style>
        /* GREEN STRIP ABOVE FOOTER */
        .footer-green-strip{
            height:20px;
            background:linear-gradient(
                to right,
                #e8efe9,
                #7fb292,
                #2f7d4f,
                #e8efe9
            );
        }

        /* FOOTER MAIN */
        .footer-main{
            background:#e6ffe3;
            padding:40px 0 20px;
            position:relative;
        }

        .footer-inner{
            max-width:1180px;
            margin:auto;
            padding:0 14px;
            display:grid;
            grid-template-columns: 1.4fr 1fr 1fr;
            gap:60px;
        }

        /* HEADINGS */
        footer h4{
            font-size:16px;
            font-weight:700;
            color:#0f4d2c;
            margin-bottom:16px;
        }

        /* LINKS */
        .footer-col ul{
            list-style:none;
            padding:0;
            margin:0;
        }

        .footer-col ul li{
            position:relative;
            padding-left:20px;
            margin-bottom:12px;
            font-size:14px;
            color:#0f4d2c;
        }

        .footer-col ul li::before{
            content:"";
            position:absolute;
            left:0;
            top:7px;
            border-left:8px solid #0f4d2c;
            border-top:6px solid transparent;
            border-bottom:6px solid transparent;
        }

        /* TWO INLINE LINKS */
        .two-links{
            margin-top:14px;
            display:flex;
            gap:40px;
            font-size:14px;
            color:#0f4d2c;
        }

        /* CENTER COLUMN */
        .plan{
            text-align:center;
        }

        .gov-logos img{
            height:52px;
            margin:6px;
        }

        .ministry-btn{
            margin-top:10px;
            background:#2e6b3f;
            color:#fff;
            display:inline-block;
            padding:6px 18px;
            font-size:13px;
        }

        /* APPS & SOCIAL */
        .apps{
            text-align:center;
        }

        .apps-row img{
            height:36px;
            margin:6px;
        }

        .social-row img{
            width:36px;
            margin:6px;
            border-radius:8px;
        }

        .mt{ margin-top:20px; }

        /* TECH SUPPORT BOTTOM RIGHT */
        .tech-support{
            max-width:1180px;
            margin:30px auto 0;
            padding:0 14px;
            text-align:right;
        }

        .tech-support img{
            max-width:190px;
            margin-top:6px;
        }

        /* FOOTER BOTTOM */
        .footer-bottom{
            background:#fff;
            padding:14px 0;
            font-size:13px;
            color:#000;
        }

        .footer-bottom-inner{
            max-width:1180px;
            margin:0 auto;
            padding:0 14px;
            position:relative;
            text-align:center; /* centers copyright */
        }

        /* CENTER TEXT */
        .footer-center{
            display:inline-block;
        }

        /* RIGHT TEXT */
        .footer-right{
            position:absolute;
            right:14px;
            top:50%;
            transform:translateY(-50%);
            font-size:13px;
        }


        /* RESPONSIVE */
        @media(max-width:900px){
            .footer-inner{
                grid-template-columns:1fr;
                gap:30px;
            }

            .tech-support{
                text-align:center;
            }

            .footer-bottom-inner{
                flex-direction:column;
                gap:6px;
                text-align:center;
            }
        }
    </style>
</head>

<body>

<header>

    <!-- TOP STRIP -->
    <div class="top-strip">
        <div class="top-inner">

            <div class="top-left">
                <img src="https://ldtax.gov.bd/_next/image?url=%2Fassets%2Fimages%2Fldtax_logo.webp&w=1080&q=75" alt="logo">
            </div>

            <div class="top-center">
                রবিবার, ১৮ মার্চ ১৪৩০, ১ ফেব্রুয়ারি ২০২৬
            </div>

            <div class="top-right">
                <div class="lang-switch">
                    <span class="lang active">বাং</span>
                    <span class="lang">EN</span>
                </div>
            </div>

        </div>
    </div>

    <!-- NAVBAR -->
    <!-- NAVBAR -->
    <div class="navbar">
        <div class="nav-inner">

            <!-- RIGHT SIDE MENU -->
            <div class="nav-right">

                <div class="nav-item">
                    <a href="#">হোম</a>
                </div>

                <div class="nav-item dropdown">
                    <a href="#">মন্ত্রণালয়/ বিভাগ <span>▼</span></a>
                    <div class="dropdown-menu">
                        <a href="#">আইটেম ১</a>
                        <a href="#">আইটেম ২</a>
                    </div>
                </div>

                <div class="nav-item dropdown">
                    <a href="#">ভূমিসেবা ফর্ম <span>▼</span></a>
                    <div class="dropdown-menu">
                        <a href="#">ফর্ম ১</a>
                        <a href="#">ফর্ম ২</a>
                    </div>
                </div>

                <div class="nav-item dropdown">
                    <a href="#">গাইড ফাইল <span>▼</span></a>
                    <div class="dropdown-menu">
                        <a href="#">গাইড ১</a>
                        <a href="#">গাইড ২</a>
                    </div>
                </div>

                <!-- LOGIN -->
                <div class="login dropdown" id="loginDropdown">
                    <button class="login-btn" id="loginBtn">
                        লগইন <span class="caret">▲</span>
                    </button>

                    <div class="login-menu">
                        <button>নাগরিক/সংস্থা</button>
                        <button>রেজিস্ট্রেশন</button>
                        <button>প্রশাসনিক</button>
                    </div>
                </div>

            </div>

        </div>
    </div>

</header>

<!-- DEMO BODY -->
<div class="content">
    মূল কনটেন্ট এখানে আসবে
</div>

<!-- GREEN STRIP ABOVE FOOTER -->
<div class="footer-green-strip"></div>

<footer>

    <!-- FOOTER MAIN -->
    <div class="footer-main">
        <div class="footer-inner">

            <!-- IMPORTANT LINKS -->
            <div class="footer-col links">
                <h4>গুরুত্বপূর্ণ লিংক</h4>

                <ul>
                    <li>বাংলাদেশ জাতীয় তথ্য বাতায়ন</li>
                    <li>ভূমি মন্ত্রণালয়</li>
                    <li>তথ্য অধিকারী (পিটিআইডি)</li>
                    <li>অভিযোগ প্রতিকার ব্যবস্থা</li>
                </ul>

                <div class="two-links">
                    <span>গোপনীয়তা নীতি</span>
                    <span>সাধারণ জিজ্ঞাসা</span>
                </div>
            </div>

            <!-- PLAN & IMPLEMENT -->
            <div class="footer-col plan">
                <h4>পরিকল্পনা ও বাস্তবায়নে</h4>

                <div class="gov-logos">
                    <img src="assets/gov-bd.png" alt="">
                    <img src="assets/land-logo.png" alt="">
                    <img src="assets/digital-bd.png" alt="">
                </div>

                <div class="ministry-btn">
                    ভূমি মন্ত্রণালয়
                </div>
            </div>

            <!-- APPS & SOCIAL -->
            <div class="footer-col apps">
                <h4>অ্যাপ ডাউনলোড করুন</h4>

                <div class="apps-row">
                    <img src="assets/google-play.png" alt="">
                    <img src="assets/app-store.png" alt="">
                </div>

                <h4 class="mt">সামাজিক যোগাযোগ</h4>

                <div class="social-row">
                    <img src="assets/facebook.png" alt="">
                    <img src="assets/x.png" alt="">
                    <img src="assets/instagram.png" alt="">
                    <img src="assets/youtube.png" alt="">
                </div>
            </div>

        </div>

        <!-- TECH SUPPORT (BOTTOM RIGHT) -->
        <div class="tech-support">
            <h4>কারিগরি সহায়তায়</h4>
            <img src="assets/mysoftheaven.png" alt="">
        </div>

    </div>

    <!-- FOOTER BOTTOM TEXT -->
    <div class="footer-bottom">
        <div class="footer-bottom-inner">
    <span class="footer-center">
      কপিরাইট © ২০২৬ ভূমি ব্যবস্থাপনা অটোমেশন প্রকল্প, ভূমি মন্ত্রণালয়
    </span>

            <span class="footer-right">
      পরীক্ষামূলক সংস্করণ
    </span>
        </div>
    </div>


</footer>

<script>
    const login = document.getElementById('loginDropdown');
    const loginBtn = document.getElementById('loginBtn');

    // Toggle on click
    loginBtn.addEventListener('click', function (e) {
        e.stopPropagation(); // prevent body click
        login.classList.toggle('show');
    });

    // Keep open on hover
    login.addEventListener('mouseenter', function () {
        login.classList.add('show');
    });

    // Close when clicking outside
    document.addEventListener('click', function () {
        login.classList.remove('show');
    });
</script>

</body>
</html>
