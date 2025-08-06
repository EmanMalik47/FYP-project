<!DOCTYPE html>
<html>
<head>
    <title>Certificate</title>
    <style>
        body {
            /* font-family: Arial, sans-serif; */
            font-family: "Playfair Display", serif;
            text-align: center;
            padding: 50px;
        }
        .certificate {
           /* background-image: url('{{ public_path('images/paper.png') }}'); */
           /* background-size: cover;  */
            
           border: 15px solid #0f2862;;
            padding: 40px;
        }
        h2 {
            margin-bottom: 30px;
            font-size: 35px
        }
        p {
            font-size: 24px;
        }
    </style>
</head>
<body>
    <div class="certificate">
        <h2>Certificate of Completion</h2>
        <p><strong>Date:</strong> {{ $data['date'] }}</p>
        <p>This is to certify that</p>
        <h3><strong>Name:</strong>{{ $data['name'] }}</h3>
        <p><strong>S/O, D/O:</strong> {{ $data['so'] }}</p>
        <p>has successfully completed the <strong>{{ $data['skill'] }}</strong> course.</p>
        <p><strong>From:</strong> {{ $data['from'] }}&nbsp;&nbsp;&nbsp; <strong>To:</strong> {{ $data['to'] }}</p>
        <br><br>
        <p>Barter Brains</p>
    </div>
</body>
</html>
