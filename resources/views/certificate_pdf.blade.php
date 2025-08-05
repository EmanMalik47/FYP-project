<!DOCTYPE html>
<html>
<head>
    <title>Certificate</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }
        .certificate {
            border: 10px solid #ddd;
            padding: 40px;
        }
        h2 {
            margin-bottom: 30px;
        }
        p {
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="certificate">
        <h2>Certificate of Completion</h2>
        <p><strong>Date:</strong> {{ $data['date'] }}</p>
        <p>This is to certify that</p>
        <h3>{{ $data['name'] }}</h3>
        <p><strong>S/O, D/O:</strong> {{ $data['so'] }}</p>
        <p>has successfully completed the <strong>{{ $data['skill'] }}</strong> course.</p>
        <p><strong>From:</strong> {{ $data['from'] }} <strong>To:</strong> {{ $data['to'] }}</p>
        <br><br>
        <p>Barter Brains</p>
    </div>
</body>
</html>
