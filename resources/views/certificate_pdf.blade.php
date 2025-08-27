<!DOCTYPE html>
<html>
<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Great+Vibes&family=Playfair+Display:wght@600&family=Poppins:wght@400;600&display=swap');

        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: #f4f4f4;
            text-align: center;
        }

        .certificate {
            width: 80%;
            margin: 50px auto;
            padding: 60px;
            background: #fff;
            border: 12px solid #0f2862;
            outline: 8px solid #d4af37;
            box-shadow: 0px 0px 25px rgba(0,0,0,0.2);
        }

        h1 {
            font-family: 'Playfair Display', serif;
            font-size: 46px;
            color: #0f2862;
            text-transform: uppercase;
            letter-spacing: 4px;
            margin-bottom: 10px;
        }

        .subtitle {
            font-size: 18px;
            color: #555;
            margin-bottom: 30px;
        }

        .name {
            font-family: 'Great Vibes', cursive;
            font-size: 38px;
            color: #d4af37;
            margin: 20px 0;
            border-bottom: 2px dashed #0f2862;
            display: inline-block;
            padding: 5px 40px;
        }

        .skill {
            font-size: 24px;
            font-weight: bold;
            color: #0f2862;
            margin: 20px 0;
        }

        .dates {
            font-size: 18px;
            margin-top: 25px;
            color: #333;
        }

        .footer {
            margin-top: 60px;
            display: flex;
            justify-content: space-around;
            padding: 0 40px;
        }

        .footer div {
            text-align: center;
        }

        .signature {
            font-family: 'Playfair Display', serif;
            font-size: 16px;
            border-top: 2px solid #333;
            margin-top: 40px;
            padding-top: 5px;
            display: inline-block;
        }

        .seal {
            font-size: 20px;
            color: #d4af37;
            border: 2px solid #d4af37;
            border-radius: 50%;
            padding: 20px;
            font-style: italic;
            font-weight: bold;
        }
        .stamp-img {
    width: 120px;   
    height: auto;
    margin-bottom: 10px; 
    opacity: 0.95;  
}
.signature {
    font-family: 'Playfair Display', serif;
    font-size: 14px;
    margin-top: -5px;
    color: #333;
}
    </style>
</head>
<body>
    <div class="certificate">
        <h1>Certificate of Completion</h1>
        <p class="subtitle">This certificate is proudly presented to</p>

        <div class="name">{{ $data['name'] }} {{ $data['lastname'] }}</div>

        <p>For successfully completing training in</p>
        <div class="skill">{{ $data['skill'] }}</div>

        <div class="dates">
            <p><b>From:</b> {{ $data['from'] }}</p>
            <p><b>Date Issued:</b> {{ $data['date'] }}</p>
        </div>

        <div class="footer">
            <div>
                <img src="{{ asset('images/stamp.png') }}" alt="Stamp" class="stamp-img">
                <p class="signature">Stamp</p>
            </div>
            <div>
                <p class="seal"><i>Barter Brains</i></p>
            </div>
        </div>
    </div>
</body>
</html>
