<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>ভূমি উন্নয়ন কর পরিশোধ রশিদ</title>

    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            background: #eef7d8;
            margin: 0;
            padding: 20px;
            font-size: 13px;
        }

        .page {
            background: #fff;
            width: 900px;
            margin: auto;
            padding: 25px;
            border: 1px dashed #333;
        }

        .center { text-align: center; }
        .right { text-align: right; }
        .bold { font-weight: bold; }

        .header-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .sub-title {
            font-size: 14px;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
        }

        th, td {
            border: 1px solid #333;
            padding: 6px;
            vertical-align: middle;
        }

        th {
            background: #f2f2f2;
            font-weight: bold;
        }

        .no-border td {
            border: none;
            padding: 3px;
        }

        .section-title {
            text-align: center;
            font-weight: bold;
            margin-top: 18px;
            margin-bottom: 5px;
        }

        .footer {
            margin-top: 25px;
            font-size: 12px;
        }

        .qr {
            float: right;
            width: 90px;
        }

        @media print {
            body {
                background: #fff;
            }
            .page {
                border: none;
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="page">

    {{-- HEADER --}}
    <table class="no-border">
        <tr>
            <td class="bold">বাংলাদেশ ফরম নং ১০৭৭</td>
            <td class="right">(পরিশিষ্ট : ৩৮)</td>
        </tr>
        <tr>
            <td colspan="2" class="center header-title">
                ভূমি উন্নয়ন কর পরিশোধ রশিদ
            </td>
        </tr>
        <tr>
            <td colspan="2" class="center sub-title">
                (অনুচ্ছেদ ৩৯ এর অধীন)
            </td>
        </tr>
    </table>

    {{-- BASIC INFO --}}
    <table class="no-border">
        <tr>
            <td>সিটি কর্পোরেশন/পৌর ইউনিয়নের ভূমি অফিসের নাম:</td>
            <td class="bold">{{ $user->city_corporation ?? '-' }}</td>
        </tr>
        <tr>
            <td>মৌজার নাম ও জে. এল. নং:</td>
            <td>{{ $user->jl_no ?? '-' }}</td>
            <td>উপজেলা/থানা:</td>
            <td>{{ $user->thana ?? '-' }}</td>
            <td>জেলা:</td>
            <td>{{ $user->district ?? '-' }}</td>
        </tr>
    </table>

    {{-- OWNER --}}
    <div class="section-title">মালিকের বিবরণ</div>

    <table>
        <tr>
            <th>ক্রম</th>
            <th>মালিকের নাম</th>
            <th>মালিকের অংশ</th>
        </tr>
        <tr>
            <td class="center">১</td>
            <td>{{ $user->name }}</td>
            <td class="center">{{ $user->owner_share ?? 1 }}</td>
        </tr>
    </table>

    {{-- LAND --}}
    <div class="section-title">জমির বিবরণ</div>

    <table>
        <tr>
            <th>ক্রম</th>
            <th>দাগ নং</th>
            <th>জমির শ্রেণী</th>
            <th>জমির পরিমাণ (শতক)</th>
        </tr>
        @foreach($user->userLandInfo as $i => $land)
            <tr>
                <td class="center">{{ $i+1 }}</td>
                <td>{{ $land->dag_no }}</td>
                <td>{{ $land->land_class }}</td>
                <td class="center">{{ $land->total_land }}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="3" class="right bold">সর্বমোট জমি (শতক)</td>
            <td class="center bold">
                {{ $user->userLandInfo->sum('total_land') }}
            </td>
        </tr>
    </table>

    {{-- REVENUE --}}
    <div class="section-title">আদায়ের বিবরণ</div>

    <table>
        <tr>
            <th>তিন বছরের উর্ধ্বের বকেয়া</th>
            <th>গত তিন বছরের বকেয়া</th>
            <th>বকেয়ার জরিমানা ও ক্ষতিপূরণ</th>
            <th>হাল দাবি</th>
            <th>মোট দাবি</th>
            <th>মোট আদায়</th>
            <th>মোট বকেয়া</th>
            <th>মন্তব্য</th>
        </tr>

        @php
            $rev = $user->userRevenueInfo->first();
        @endphp

        <tr>
            <td class="center">{{ $rev->previous_3_years_arrears ?? 0 }}</td>
            <td class="center">{{ $rev->arrears_of_last_3_years ?? 0 }}</td>
            <td class="center">0</td>
            <td class="center">{{ $rev->total_demand ?? 0 }}</td>
            <td class="center">{{ $rev->total_demand ?? 0 }}</td>
            <td class="center">{{ $rev->total_collection ?? 0 }}</td>
            <td class="center">{{ $rev->total_balance ?? 0 }}</td>
            <td>{{ $rev->remarks ?? '' }}</td>
        </tr>
    </table>

    {{-- FOOTER --}}
    <div class="footer">
        <div class="qr">
{{--            {!! QrCode::size(90)->generate(route('admin.user.dakhila', $user->print_token)) !!}--}}
        </div>

        <p><b>মোট (কথায়):</b> একশত টাকা মাত্র।</p>
        <p>তারিখ: {{ now()->format('d F, Y') }}</p>
        <p>এই দাখিলা ইলেকট্রনিকভাবে তৈরি করা হয়েছে।</p>
    </div>

</div>

</body>
</html>
