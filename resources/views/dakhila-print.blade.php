<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>দাখিলা</title>

    <style>
        body {
            background: #eef7d8;
            font-family: DejaVu Sans, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .page {
            width: 900px;
            margin: auto;
            background: white;
            padding: 25px;
            border: 1px dashed #333;
        }
        @media print {
            body { background: white; }
            .page { border: none; width: 100%; }
        }
    </style>
</head>
<body>

<div class="page">

    <h2 style="text-align:center;">ভূমি উন্নয়ন কর পরিশোধ রশিদ</h2>

    <p><b>মালিকের নাম:</b> {{ $user->name }}</p>
    <p><b>জেলা:</b> {{ $user->district }}</p>

    {{-- LAND + REVENUE TABLES HERE --}}

    <div style="text-align:right;margin-top:20px;">
        <button onclick="window.print()">প্রিন্ট</button>
    </div>

</div>

</body>
</html>
