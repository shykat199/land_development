<style>

    .print-bar {
        top: 0;
        z-index: 10;
        background: #f9fff0;
        padding: 10px 0;
        text-align: center;
    }

    .print-bar button {
        background: #2f6cf6;
        color: #fff;
        border: none;
        padding: 6px 14px;
        font-size: 14px;
        border-radius: 4px;
        cursor: pointer;
    }

    .screen-bg {
        height: 80vh;
        min-height: calc(100vh - 50px);
        display: flex;
        justify-content: center;
        align-items: flex-start;
        padding-top: 10px;
    }

    .page-scroll {
        background: #f9fff0;
        width: 860px;
        height: calc(100vh - 70px);
        overflow-y: auto;
        overflow-x: auto;
        padding: 20px 0;
    }

    .main-frame {
        background: #ffffff;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #cfcfcf;
        border-radius: 6px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.08);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
    }

    th, td {
        border: 1px dotted #333;
        padding: 6px 8px;
        vertical-align: middle;
    }

    th {
        font-weight: 600;
        text-align: center;
    }

    .no-border td {
        border: none;
        padding: 4px 0;
    }

    .header-box {
        padding: 12px;
        margin-bottom: 10px;
    }

    .top-row {
        display: flex;
        justify-content: space-between;
        font-size: 14px;
    }

    .center-title {
        text-align: center;
        font-weight: 400;
        margin: 8px 0 10px;
        line-height: 1.4;
    }

    .section-title {
        text-align: center;
        font-weight: 500;
        padding: 6px 0;
    }

    .footer {
        margin-top: 14px;
        font-size: 14px;
        width: 800px;
    }

    .value-line {
        width: 100%;
        border-bottom: 1px dotted #333;
        padding-bottom: 2px;
        line-height: 1.4;
    }

    .revenue-table {
        border-collapse: collapse;
    }

    .revenue-table th,
    .revenue-table td {
        border: 1px solid #d1cfcf;   /* ✅ solid border */
    }

    .date-form{
        font-size: 14px;
        line-height: 1.4;
    }

    /* First line: label + line */
    .date-line{
        display: flex;
        align-items: flex-end;
    }

    .label{
        margin-right: 6px;
        white-space: nowrap;
    }

    /* Line container */
    .line-area{
        position: relative;
        width: 200px;
        border-bottom: 1px solid #333;
        height: 18px;
    }

    /* Bangla date sits ON the line */
    .bangla-date{
        position: absolute;
        left: 0;
        bottom: 2px;
        background: #fff;   /* hides the line behind text */
        padding-right: 6px;
    }

    /* English date below, aligned with line */
    .english-date{
        margin-left: calc(52px + 6px);
        margin-top: 2px;
    }

    @media print {

        @page {
            margin: 0;
        }

        html, body {
            margin: 0 !important;
            padding: 0 !important;
        }

        body * {
            visibility: hidden;
            background: white;
        }

        .main-frame,
        .main-frame * {
            visibility: visible;
        }

        .main-frame {
            position: absolute;
            top: 0;
            left: 0;
            margin: 20px !important;
            padding: 10px !important;
            background: #ffffff;
            border: 1px solid #cfcfcf;
            border-radius: 6px;
            box-shadow: none;
        }
    }

</style>
    <div class="flex items-center justify-center">

        <!-- SCREEN BACKGROUND -->
        <div class="screen-bg">
            <!-- SCROLLABLE PAGE WRAPPER -->
            <div class="page-scroll">
                <div class="print-bar">
                    <button onclick="window.print()">🖨️ প্রিন্ট</button>
                </div>

                <div class="main-frame" style="background: #ffffff; margin: 20px">
                    <!-- HEADER -->
                    <div class="header-box">
                        <div class="top-row">
                            <div>
                                {{getSiteSettingsData($allSetting,'bd_form_title') ?? 'বাংলাদেশ ফরম নং'}} {{getSiteSettingsData($allSetting,'form_number')}}<br>
                                (সংশোধিত)
                            </div>
                            <div style="text-align:right;">
                                ({{getSiteSettingsData($allSetting,'appendix_title') ?? 'পরিশিষ্ট-'}}{{ getSettingsData('appendix') }})<br>
                                {{getSiteSettingsData($allSetting,'cromik_number_title') ?? 'ক্রমিক নং'}} <span id="cromik_number">{{ getSettingsData('cromik_number') }}</span>
                            </div>
                        </div>

                        <div class="center-title">
                            {{getSiteSettingsData($allSetting,'form_title') ?? 'ভূমি উন্নয়ন কর পরিশোধ রশিদ'}}<br>
                            (অনুচ্ছেদ {{ getSettingsData('paragraph') }} দ্রষ্টব্য)
                        </div>

                        <table class="no-border" style="width:100%; border-collapse:collapse;">

                            <tr>
                                <td style="width:41%;">
                                    সিটি কর্পোরেশন / পৌর / ইউনিয়ন ভূমি অফিসের নাম:
                                </td>
                                <td colspan="5">
                                    <div class="value-line">
                                        {{ $user->city_corporation }}
                                    </div>
                                </td>
                            </tr>

                            @php
                                $text = $user->jln;

                                $converted = preg_replace_callback('/\d+/', function ($matches) use ($numto) {
                                    return $numto->bnNum($matches[0]);
                                }, $text);
                            @endphp


                            <tr>
                                <td>মৌজার নাম ও কোড নং:</td>
                                <td>
                                    <div class="value-line">{{ $converted }}</div>
                                </td>

                                <td>উপজেলা/থানা:</td>
                                <td>
                                    <div class="value-line">{{ $user->thana }}</div>
                                </td>

                                <td>জেলা:</td>
                                <td>
                                    <div class="value-line">{{ $user->district }}</div>
                                </td>
                            </tr>

                            <tr>
                                <td>২ নং রেজিস্টার অনুযায়ী হোল্ডিং নং:</td>
                                <td colspan="5">
                                    <div class="value-line">{{ $numto->bnNum($user->holding_no) }}</div>
                                </td>
                            </tr>

                            <tr>
                                <td>খতিয়ান নং:</td>
                                <td colspan="5">
                                    <div class="value-line">{{ $numto->bnNum($user->khotian_no) }}</div>
                                </td>
                            </tr>

                        </table>
                    </div>
                    <!-- মালিকের বিবরণ -->
                    <table>
                        <h5 class="section-title">মালিকের বিবরণ</h5>
                        <tr>
                            <th>ক্রম</th>
                            <th>মালিকের নাম</th>
                            <th>মালিকের অংশ</th>
                        </tr>
                        <tr>
                            <td align="center">১</td>
                            <td>{{$user->name}}</td>
                            <td align="center">{{$user->owner_share}}</td>
                        </tr>
                    </table>
                    <!-- জমির বিবরণ -->
                    <table>

                        <h5 class="section-title">জমির বিবরণ</h5>

                        <tr>
                            <th>ক্রম</th>
                            <th>দাগ নং</th>
                            <th>জমির শ্রেণি</th>
                            <th>জমির পরিমাণ (শতক)</th>
                        </tr>
                        @if(!empty($user->userLandInfo))
                            @foreach($user->userLandInfo as $key => $userland)
                                <tr>
                                    <td align="center">{{$numto->bnNum(++$key)}}</td>
                                    <td align="center">{{$numto->bnNum($userland->dag_no)}}</td>
                                    <td align="center">{{$userland->land_class}}</td>
                                    <td align="center">{{$numto->bnNum($userland->total_land)}}</td>
                                </tr>
                            @endforeach
                        @endif
                        <tr>
                            <td colspan="3" align="right">সর্বমোট জমি (শতক)</td>
                            <td align="center">{{$numto->bnNum($user->userLandInfo->sum('total_land'))}}</td>
                        </tr>
                    </table>
                    <!-- আদায়ের বিবরণ -->
                    <table class="revenue-table" style="margin-top: 20px">
                        <tr>
                            <th colspan="8" class="section-title" style="background: #f2f2f2">আদায়ের বিবরণ</th>
                        </tr>
                        <tr>
                            <th>তিন বছরের ঊর্ধ্বের বকেয়া</th>
                            <th>গত তিন বছরের বকেয়া</th>
                            <th>বকেয়ার জরিমানা ও ক্ষতিপূরণ</th>
                            <th>হাল দাবি</th>
                            <th>মোট দাবি</th>
                            <th>মোট আদায়</th>
                            <th>মোট বকেয়া</th>
                            <th>মন্তব্য</th>
                        </tr>
                        @if(!empty($user->userRevenueInfo))
                            @foreach($user->userRevenueInfo as $key =>$revenue)
                                <tr>
                                    <td align="center">{{$numto->bnNum($revenue->previous_3_years_arrears)}}</td>
                                    <td align="center">{{$numto->bnNum($revenue->arrears_of_last_3_years)}}</td>
                                    <td align="center">{{$numto->bnNum($revenue->current_year_demand_and_surcharge)}}</td>
                                    <td align="center">{{$numto->bnNum($revenue->total_demand)}}</td>
                                    <td align="center">{{$numto->bnNum($revenue->total_arrear)}}</td>
                                    <td align="center">{{$numto->bnNum($revenue->total_collection)}}</td>
                                    <td align="center">{{$numto->bnNum($revenue->total_balance)}}</td>
                                    <td align="center">{{$revenue->remarks}}</td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                    <!-- FOOTER -->
                    <table style="
                        width:765px;
                        margin-top:14px;
                        font-size:14px;
                        border-collapse:collapse;
                        border:none;
                    ">

                        <tr>
                            <td colspan="3" style="padding:4px 0 6px 0; border:none;">

                                <div style="
                                width:100%;
                                border-bottom:1px dotted #333;
                                padding-bottom:4px;
                            ">
                                    সর্বমোট (কথায়):
                                    <span id="totalInWords"></span> টাকা মাত্র ।
                                </div>

                            </td>
                        </tr>

                        <tr>

                            <!-- LEFT COLUMN -->
                            <td style="
                                width:45%;
                                vertical-align:top;
                                line-height:1.6;
                                padding-top:6px;
                                border:none;
                            ">

                                <div>
                                    নোট: {{getSiteSettingsData($allSetting,'fiscal_year_title') ?? 'সর্বশেষ কর পরিশোধের সাল'}} -
                                    {{ getSettingsData('fiscal_year') }}
                                </div>

                                <div>
                                    চালান নং :
                                    <span id="chalan_number">{{ $user->invoice }}</span>
                                </div>

                                {{--                                <div style="margin-top:4px;">--}}
                                {{--                                    তারিখ :--}}
                                {{--                                    <span id="banglaCalendarDate"></span>--}}
                                {{--                                </div>--}}

                                {{--                                <div--}}
                                {{--                                    style="width:200px; border-bottom:1px solid #333; margin:3px 0 3px 52px;">--}}
                                {{--                                </div>--}}

                                {{--                                <div style="margin-left:52px;">--}}
                                {{--                                    <span id="englishDate"></span>--}}
                                {{--                                </div>--}}

                                <div class="date-form">
                                    <div class="date-line">
                                        <span class="label">তারিখ :</span>
                                        <span class="line-area">
                                            <span class="bangla-date" id="banglaCalendarDate"></span>
                                        </span>
                                    </div>

                                    <div class="english-date" id="englishDate"></div>
                                </div>

                            </td>
                            @php
                                $scanUrl =  route('user.qr-dakhila',$user->user_code);
                            @endphp

                                <!-- QR COLUMN -->
                            <td style="
                            width:12%;
                            text-align:center;
                            vertical-align:top;
                            padding-top:6px;
                            border:none;
                        ">

                                <img src="https://api.qrserver.com/v1/create-qr-code/?size=90x90&data={{ urlencode($scanUrl) }}"
                                     alt="QR Code"
                                     style="width:75px; height:75px;"
                                />
                            </td>

                            <!-- RIGHT NOTE COLUMN -->
                            <td style="
                                width:40%;
                                vertical-align:top;
                                padding-top:6px;
                                text-align:center;
                                line-height:1.6;
                                border:none;
                            ">
                                {!! getSiteSettingsData($allSetting,'footer_title') ?? 'এই দাখিলা ইলেকট্রনিকভাবে তৈরি করা হয়েছে,<br>কোন স্বাক্ষর প্রয়োজন নেই।'!!}
                            </td>

                        </tr>

                    </table>
                </div>

            </div>
        </div>
    </div>
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

        document.getElementById('banglaCalendarDate').innerText =
            getBanglaDate(today);

        document.getElementById('englishDate').innerText =
            gregorianBangla;

    });
</script>
