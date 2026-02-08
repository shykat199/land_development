<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8"/><!-- /Added by HTTrack -->
<head>
    <meta charSet="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="preload" href="{{asset('assets/_next/static/media/2ff41235783e9f59-s.p.woff2')}}" as="font"
          crossorigin=""
          type="font/woff2"/>
    <link rel="preload" href="{{asset('assets/_next/static/media/bafa4140c8699f55-s.p.ttf')}}" as="font" crossorigin=""
          type="font/ttf"/>
    <link rel="stylesheet" href="{{asset('assets/_next/static/css/869ecca49f188fb7.css')}}" data-precedence="next"/>
    <link rel="stylesheet" href="{{asset('assets/_next/static/css/6961974989fa0c17.css')}}" data-precedence="next"/>

    <title>ভূমি উন্নয়ন কর</title>
    <meta name="description" content="Land Development Tax Management Project"/>
    <link rel="icon" href="{{asset('assets/favicon1.jpg')}}"/>
    <meta name="next-size-adjust"/>
    <script src="{{asset('assets/_next/static/chunks/polyfills-c67a75d1b6f99dc8.js')}}" noModule="" type="b6c094adeb7fd140e353cf6b-text/javascript"></script>
    <style>
        #nprogress {
            pointer-events: none
        }

        #nprogress .bar {
            background: #12633D;
            position: fixed;
            z-index: 1600;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px
        }

        #nprogress .peg {
            display: block;
            position: absolute;
            right: 0;
            width: 100px;
            height: 100%;
            box-shadow: 0 0 10px #12633D, 0 0 5px #12633D;
            opacity: 1;
            -webkit-transform: rotate(3deg) translate(0px, -4px);
            -ms-transform: rotate(3deg) translate(0px, -4px);
            transform: rotate(3deg) translate(0px, -4px)
        }

        #nprogress .spinner {
            display: block;
            position: fixed;
            z-index: 1600;
            top: 15px;
            right: 15px
        }

        #nprogress .spinner-icon {
            width: 18px;
            height: 18px;
            box-sizing: border-box;
            border: 2px solid transparent;
            border-top-color: #12633D;
            border-left-color: #12633D;
            border-radius: 50%;
            -webkit-animation: nprogress-spinner 400ms linear infinite;
            animation: nprogress-spinner 400ms linear infinite
        }

        .nprogress-custom-parent {
            overflow: hidden;
            position: relative
        }

        .nprogress-custom-parent #nprogress .bar, .nprogress-custom-parent #nprogress .spinner {
            position: absolute
        }

        @-webkit-keyframes nprogress-spinner {
            0% {
                -webkit-transform: rotate(0deg)
            }
            100% {
                -webkit-transform: rotate(360deg)
            }
        }

        @keyframes nprogress-spinner {
            0% {
                transform: rotate(0deg)
            }
            100% {
                transform: rotate(360deg)
            }
        }
    </style>
    @stack('custom.style')
</head>
<body class="__className_850483">
@include('layout.partial.header')
@section('frontend-content')
@show
@include('layout.partial.footer')

<script>
    const loginBtn = document.getElementById('loginBtn');
    const loginMenu = document.getElementById('loginMenu');

    // Toggle on button click
    loginBtn.addEventListener('click', (e) => {
        e.stopPropagation(); // prevent document click
        loginMenu.classList.toggle('hidden');
    });

    // Close when clicking outside
    document.addEventListener('click', (e) => {
        if (!loginMenu.contains(e.target) && !loginBtn.contains(e.target)) {
            loginMenu.classList.add('hidden');
        }
    });
</script>

<script>
    const guardBtn = document.getElementById('guardBtn');
    const guardMenu = document.getElementById('guardMenu');
    const guardArrow = document.getElementById('guardArrow');

    // Toggle dropdown
    guardBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        guardMenu.classList.toggle('hidden');
        guardArrow.classList.toggle('rotate-180');
    });

    // Close when clicking outside
    document.addEventListener('click', (e) => {
        if (!guardMenu.contains(e.target) && !guardBtn.contains(e.target)) {
            guardMenu.classList.add('hidden');
            guardArrow.classList.remove('rotate-180');
        }
    });
</script>

<script>
    document.addEventListener('click', (e) => {
        const btn = e.target.closest('[data-dropdown-btn]');
        const dropdowns = document.querySelectorAll('[data-dropdown]');

        // If clicking a dropdown button
        if (btn) {
            e.stopPropagation();
            const wrapper = btn.closest('[data-dropdown]');
            const menu = wrapper.querySelector('[data-dropdown-menu]');
            const arrow = wrapper.querySelector('svg');

            const isOpen = !menu.classList.contains('hidden');

            // Close all dropdowns first
            dropdowns.forEach(drop => {
                drop.querySelector('[data-dropdown-menu]').classList.add('hidden');
                drop.querySelector('svg')?.classList.remove('rotate-180');
            });

            // Toggle current one
            if (!isOpen) {
                menu.classList.remove('hidden');
                arrow?.classList.add('rotate-180');
            }
            return;
        }

        // Click outside → close all
        dropdowns.forEach(drop => {
            drop.querySelector('[data-dropdown-menu]').classList.add('hidden');
            drop.querySelector('svg')?.classList.remove('rotate-180');
        });
    });
</script>

@stack('custom.script')

</body>
</html>
