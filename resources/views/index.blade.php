@extends('layout.app')
@push('custom.style')

@endpush
@section('frontend-content')
    <div class="flex items-center justify-center">
        <iframe src="{{route('user.iframe-dakhila',['user_code'=>$user->user_code])}}" width="900" height="600" style="border:1px solid #ccc">Your browser does not support iframes.
        </iframe>
    </div>
@endsection
@push('custom.script')
    <script>
        const totalAmount = Number(@json($user->userRevenueInfo->sum('total_collection') ?? 0));

        document.addEventListener('DOMContentLoaded', function () {

            const banglaWords = {
                0: 'শূন্য',
                1: 'এক', 2: 'দুই', 3: 'তিন', 4: 'চার', 5: 'পাঁচ',
                6: 'ছয়', 7: 'সাত', 8: 'আট', 9: 'নয়',
                10: 'দশ', 11: 'এগারো', 12: 'বারো', 13: 'তেরো', 14: 'চৌদ্দ',
                15: 'পনেরো', 16: 'ষোল', 17: 'সতেরো', 18: 'আঠারো', 19: 'উনিশ',
                20: 'বিশ', 21: 'একুশ', 22: 'বাইশ', 23: 'তেইশ', 24: 'চব্বিশ',
                25: 'পঁচিশ', 26: 'ছাব্বিশ', 27: 'সাতাশ', 28: 'আটাশ', 29: 'ঊনত্রিশ',
                30: 'ত্রিশ', 31: 'একত্রিশ', 32: 'বত্রিশ', 33: 'তেত্রিশ',
                34: 'চৌত্রিশ', 35: 'পঁয়ত্রিশ', 36: 'ছত্রিশ',
                37: 'সাঁইত্রিশ', 38: 'আটত্রিশ', 39: 'ঊনচল্লিশ',
                40: 'চল্লিশ', 41: 'একচল্লিশ', 42: 'বিয়াল্লিশ',
                43: 'তেতাল্লিশ', 44: 'চুয়াল্লিশ', 45: 'পঁয়তাল্লিশ',
                46: 'ছেচল্লিশ', 47: 'সাতচল্লিশ', 48: 'আটচল্লিশ', 49: 'ঊনপঞ্চাশ',
                50: 'পঞ্চাশ', 60: 'ষাট', 70: 'সত্তর', 80: 'আশি', 90: 'নব্বই'
            };

            function numberToBanglaWords(num) {
                if (num === 0) return banglaWords[0];

                let result = '';

                if (num >= 10000000) {
                    result += numberToBanglaWords(Math.floor(num / 10000000)) + ' কোটি ';
                    num %= 10000000;
                }
                if (num >= 100000) {
                    result += numberToBanglaWords(Math.floor(num / 100000)) + ' লক্ষ ';
                    num %= 100000;
                }
                if (num >= 1000) {
                    result += numberToBanglaWords(Math.floor(num / 1000)) + ' হাজার ';
                    num %= 1000;
                }
                if (num >= 100) {
                    result += numberToBanglaWords(Math.floor(num / 100)) + ' শত ';
                    num %= 100;
                }
                if (num > 0) {
                    result += banglaWords[num] || '';
                }

                return result.trim();
            }


            const el = document.getElementById('totalInWords');
            if (el) {
                el.innerText = numberToBanglaWords(totalAmount);
            }

        });

    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const bnMap = {
                '0': '০', '1': '১', '2': '২', '3': '৩', '4': '৪',
                '5': '৫', '6': '৬', '7': '৭', '8': '৮', '9': '৯'
            };

            function toBanglaDigits(value) {
                return value.toString().replace(/[0-9]/g, d => bnMap[d]);
            }

            function banglaDigits(value) {
                let result = '';
                const str = value.toString();

                for (let i = 0; i < str.length; i++) {
                    const ch = str[i];
                    result += bnMap[ch] ?? ch;
                }
                return result;
            }

            const el = document.getElementById('chalan_number');
            const cm = document.getElementById('cromik_number');

            if (el) {
                el.innerText = toBanglaDigits(el.innerText.trim());
            }
            if (cm) {
                cm.innerText = banglaDigits(cm.innerText.trim());
            }

        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const today = new Date();

            /* ---------- Bangla Digits ---------- */
            const bnDigits = ['০','১','২','৩','৪','৫','৬','৭','৮','৯'];
            const toBanglaNumber = num =>
                num.toString().replace(/\d/g, d => bnDigits[d]);

            /* ---------- Bangla Months ---------- */
            const banglaMonths = [
                'বৈশাখ', 'জ্যৈষ্ঠ', 'আষাঢ়', 'শ্রাবণ',
                'ভাদ্র', 'আশ্বিন', 'কার্তিক', 'অগ্রহায়ণ',
                'পৌষ', 'মাঘ', 'ফাল্গুন', 'চৈত্র'
            ];

            /* ---------- Bangla Calendar Calculation ---------- */
            function getBanglaDate(date) {
                const engYear = date.getFullYear();
                const engMonth = date.getMonth();
                const engDay = date.getDate();

                const banglaYear = engMonth < 3 || (engMonth === 3 && engDay < 14)
                    ? engYear - 594
                    : engYear - 593;

                const banglaMonthDays = [31,31,31,31,31,30,30,30,30,30,30,30];
                let banglaMonth = 0;
                let banglaDay = 0;

                const start = new Date(engYear, 3, 14); // 14 April
                let diff = Math.floor((date - start) / (1000 * 60 * 60 * 24));

                if (diff < 0) {
                    diff += 365;
                }

                for (let i = 0; i < banglaMonthDays.length; i++) {
                    if (diff < banglaMonthDays[i]) {
                        banglaMonth = i;
                        banglaDay = diff + 1;
                        break;
                    }
                    diff -= banglaMonthDays[i];
                }

                return `${toBanglaNumber(banglaDay)} ${banglaMonths[banglaMonth]} ${toBanglaNumber(banglaYear)}`;
            }

            /* ---------- English Date in Bangla ---------- */
            const gregorianBangla = new Intl.DateTimeFormat('bn-BD', {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            }).format(today);

            // document.getElementById('banglaCalendarDate').innerText = getBanglaDate(today);

            // document.getElementById('englishDate').innerText = gregorianBangla;

        });
    </script>
@endpush
