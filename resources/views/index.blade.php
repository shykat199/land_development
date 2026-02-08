@extends('layout.app')
@push('custom.style')
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

        .page {
            width: 794px;
            margin: 0 auto;
            background: #ffffff;
            padding: 22px 26px;
            border-radius: 6px;
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
            border: 1px dashed #333;
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
            font-weight: 700;
            margin: 8px 0 10px;
            line-height: 1.4;
        }

        .section-title {
            text-align: center;
            font-weight: 700;
            padding: 6px 0;
        }

        .footer {
            margin-top: 14px;
            font-size: 14px;
        }

        @media print {
            body * {
                visibility: hidden;
                background: white;
            }

            .page,
            .page * {
                visibility: visible;
            }

            .page {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                padding: 0;
                margin: 0;
                background: white;
            }

            .print-bar {
                display: none !important;
            }
        }

    </style>
@endpush
@section('frontend-content')
    <div class="flex items-center justify-center">
        {{--    <iframe src="{{ route('user.dakhila', @$user->user_code) }}"--}}
        {{--        width="100%"--}}
        {{--        height="900"--}}
        {{--        style="border:1px solid #999;background:#eef7d8">--}}
        {{--    </iframe>--}}

        <!-- SCREEN BACKGROUND -->
        <div class="screen-bg">
            <!-- SCROLLABLE PAGE WRAPPER -->
            <div class="page-scroll">
                <div class="print-bar">
                    <button onclick="window.print()">🖨️ প্রিন্ট</button>
                </div>
                <div class="page">

                    <div style="height:800px;">
                        <!-- HEADER -->
                        <div class="header-box">
                            <div class="top-row">
                                <div>
                                    বাংলাদেশ ফরম নং ১০৭৯<br>
                                    (সংশোধিত)
                                </div>
                                <div style="text-align:right;">
                                    (পরিশিষ্ট-০৮)<br>
                                    ক্রমিক নং ৩০৮২৪৮৩০৫৫
                                </div>
                            </div>

                            <div class="center-title">
                                ভূমি উন্নয়ন কর পরিশোধ রশিদ<br>
                                (অনুচ্ছেদ ৩৯ দ্রষ্টব্য)
                            </div>

                            <table class="no-border">
                                <tr>
                                    <td>সিটি কর্পোরেশন / পৌর / ইউনিয়ন ভূমি অফিসের নাম:</td>
                                    <td colspan="5">কাশিমপুর ইউনিয়ন ভূমি অফিস</td>
                                </tr>
                                <tr>
                                    <td>মৌজার নাম ও কোড নং:</td>
                                    <td>গোলামরচর - ৩</td>
                                    <td>উপজেলা/থানা:</td>
                                    <td>টঙ্গী</td>
                                    <td>জেলা:</td>
                                    <td>গাজীপুর</td>
                                </tr>
                                <tr>
                                    <td>২ নং রেজিস্টার অনুযায়ী হোল্ডিং নং:</td>
                                    <td>১০৪০৫</td>
                                    <td>খতিয়ান নং:</td>
                                    <td colspan="3">৭২</td>
                                </tr>
                            </table>
                        </div>
                        <!-- মালিকের বিবরণ -->
                        <table>
                            <tr>
                                <th colspan="3" class="section-title">মালিকের বিবরণ</th>
                            </tr>
                            <tr>
                                <th>ক্রম</th>
                                <th>মালিকের নাম</th>
                                <th>মালিকের অংশ</th>
                            </tr>
                            <tr>
                                <td align="center">১</td>
                                <td>আব্দুল্লাহ পারভেজ</td>
                                <td align="center">১</td>
                            </tr>
                        </table>
                        <!-- জমির বিবরণ -->
                        <table>
                            <tr>
                                <th colspan="4" class="section-title">জমির বিবরণ</th>
                            </tr>
                            <tr>
                                <th>ক্রম</th>
                                <th>দাগ নং</th>
                                <th>জমির শ্রেণি</th>
                                <th>জমির পরিমাণ (শতক)</th>
                            </tr>
                            <tr>
                                <td align="center">১</td>
                                <td align="center">২৭৬</td>
                                <td>চালা (কৃষি)</td>
                                <td align="center">৪১</td>
                            </tr>
                            <tr>
                                <td colspan="3" align="right"><strong>সর্বমোট জমি (শতক)</strong></td>
                                <td align="center"><strong>৪১</strong></td>
                            </tr>
                        </table>
                        <!-- আদায়ের বিবরণ -->
                        <table>
                            <tr>
                                <th colspan="8" class="section-title">আদায়ের বিবরণ</th>
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
                            <tr>
                                <td align="center">০</td>
                                <td align="center">০</td>
                                <td align="center">০</td>
                                <td align="center">১০০</td>
                                <td align="center">১০০</td>
                                <td align="center">১০০</td>
                                <td align="center">০</td>
                                <td></td>
                            </tr>
                        </table>
                        <!-- FOOTER -->
                        <div class="footer" style="margin-top:14px; font-size:14px;">

                            <!-- ROW 1 : Total in words (full width) -->
                            <div
                                style="width:100%; border-bottom:1px dotted #333; padding-bottom:4px; margin-bottom:10px;">
                                <strong>সর্বমোট (কথায়):</strong> এক শত টাকা মাত্র ।
                            </div>

                            <!-- ROW 2 : Two columns -->
                            <table class="no-border" style="width:100%;">
                                <tr>

                                    <!-- LEFT COLUMN -->
                                    <td style="width:65%; vertical-align:top; line-height:1.6;">

                                        <div>
                                            <strong>নোট:</strong> সর্বশেষ কর পরিশোধের সাল - ২০২৪-২০২৫ (অর্থবছর)
                                        </div>

                                        <div>
                                            চালান নং : ২৮৫৪-০০১৩২৮৫৬
                                        </div>

                                        <div style="margin-top:4px;">
                                            <strong>তারিখ :</strong> ২২ সেপ্টেম্বর, ২০২৪
                                        </div>

                                        <div
                                            style="width:200px; border-bottom:1px solid #333; margin:3px 0 3px 52px;"></div>

                                        <div style="margin-left:52px;">
                                            22 September, 2024
                                        </div>


                                    </td>

                                    <!-- RIGHT COLUMN -->
                                    <td style="width:35%; vertical-align:top;">

                                        <div style="display:flex; gap:12px; align-items:flex-start;">

                                            <!-- QR -->
                                            <img
                                                src="https://api.qrserver.com/v1/create-qr-code/?size=90x90&data=land-tax-receipt"
                                                alt="QR Code"
                                                style="width:90px; height:90px;"
                                            />

                                            <!-- Right text -->
                                            <div style="line-height:1.6;">
                                                এই দাখিলা ইলেকট্রনিকভাবে তৈরি করা হয়েছে,<br>
                                                কোন স্বাক্ষর প্রয়োজন নেই।
                                            </div>

                                        </div>

                                    </td>

                                </tr>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
