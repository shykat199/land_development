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
{{--    <script src="{{asset('assets/_next/static/chunks/polyfills-c67a75d1b6f99dc8.js')}}" noModule="" type="b6c094adeb7fd140e353cf6b-text/javascript"></script>--}}
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
<script>
    document.addEventListener('DOMContentLoaded', () => {

        // Force Bangladesh time
        const today = new Date(
            new Date().toLocaleString('en-US', { timeZone: 'Asia/Dhaka' })
        );

        /* ---------- Bangla Digits ---------- */
        const bnDigits = ['০','১','২','৩','৪','৫','৬','৭','৮','৯'];
        const toBn = n => n.toString().replace(/\d/g, d => bnDigits[d]);

        /* ---------- Bangla Weekdays ---------- */
        const bnWeekdays = [
            'রবিবার','সোমবার','মঙ্গলবার',
            'বুধবার','বৃহস্পতিবার','শুক্রবার','শনিবার'
        ];

        /* ---------- Bangla Months (Correct Order) ---------- */
        const bnMonths = [
            'বৈশাখ','জ্যৈষ্ঠ','আষাঢ়','শ্রাবণ',
            'ভাদ্র','আশ্বিন','কার্তিক','অগ্রহায়ণ',
            'পৌষ','মাঘ','ফাল্গুন','চৈত্র'
        ];

        /* ---------- Accurate Bangla Date ---------- */
        function getBanglaDate(date) {

            const gY = date.getFullYear();
            const gM = date.getMonth() + 1;
            const gD = date.getDate();

            let bnYear = gY - 593;
            if (gM < 4 || (gM === 4 && gD < 14)) bnYear--;

            const ref = new Date(gY, 3, 14); // 14 April
            let diff = Math.floor((date - ref) / 86400000);
            if (diff < 0) diff += isLeap(gY - 1) ? 366 : 365;

            const monthDays = isLeap(gY)
                ? [31,31,31,31,31,30,30,30,30,30,30,31]
                : [31,31,31,31,31,30,30,30,30,30,30,30];

            let m = 0;
            while (diff >= monthDays[m]) {
                diff -= monthDays[m];
                m++;
            }

            return `${toBn(diff + 1)} ${bnMonths[m]} ${toBn(bnYear)}`;
        }

        function isLeap(y) {
            return (y % 4 === 0 && y % 100 !== 0) || (y % 400 === 0);
        }

        /* ---------- English Date in Bangla ---------- */
        const englishBangla = new Intl.DateTimeFormat('bn-BD', {
            day: 'numeric',
            month: 'long',
            year: 'numeric'
        }).format(today);

        /* ---------- Final Output ---------- */
        document.getElementById('todayDate').innerText =
            `${bnWeekdays[today.getDay()]}, ${getBanglaDate(today)}, ${englishBangla}`;

        document.getElementById('todayCurrentDate').innerText =
            `${bnWeekdays[today.getDay()]}, ${getBanglaDate(today)}, ${englishBangla}`;

    });
</script>
</body>
</html>
