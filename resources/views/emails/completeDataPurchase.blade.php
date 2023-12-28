
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href={{asset("assets/images/FII.png")}} type="image/x-icon">
    <title>Your Data Purchase Confirmation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333333;
        }

        p {
            color: #666666;
            margin-bottom: 20px;
        }

        .qr-code {
            width: 100%;
            max-width: 200px;
            margin: 10px 0;
        }
    </style>
</head>
<body>

    <img src="{{ $message->embed((public_path("assets/images/FI.png")) )}}">
    
<p dir="auto" style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody">Thank you for choosing <b style="font-family:UICTFontTextStyleBody">Tripcel</b>! Your new data plan is ready to activate. Please follow the instructions below carefully:</span></p>
<p style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"></span><br></p><p dir="auto" style="font-family:&quot;.AppleSystemUIFont&quot;"><b style="font-family:&quot;.AppleSystemUIFont&quot;">IMPORTANT - PLEASE READ BEFORE ACTIVATING:</b></p><p dir="auto" style="font-family:&quot;.AppleSystemUIFont&quot;"><b style="font-family:&quot;.AppleSystemUIFont&quot;"><br></b></p>
<p>You purchased data plan for</p>
    @foreach($mailData['message'] as $key => $item)
            {{json_encode($mailData['message'])}}
       {{-- <p> {{$message[1] - $message['plan']['iccid']}} </p>
       <p> Data bytes bought: {{$message['plan']['data_quota_bytes']}}</p>
       <p> Data bytes remaining: {{$message['plan']['data_bytes_remaining']}}</p>
       <p> Network Status: {{$message['plan']['network_status']}}</p>
       <p>Countries enabled: {{implode(',',$message['plan']['countries_enabled'])}}</p> --}}
    @endforeach
<p style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"></span><br></p>
<p dir="auto" style="font-family:&quot;.AppleSystemUIFont&quot;"><b style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"><b style="font-family:UICTFontTextStyleBody">Thank you for choosing TRIPCEL</b>.&nbsp;</span><span style="font-family:UICTFontTextStyleBody">Enjoy your data plan!</span></b></p><p dir="auto" style="font-family:&quot;.AppleSystemUIFont&quot;"><b style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"><br></span></b></p><p dir="auto" style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody">Warm regards,</span></p><p dir="auto" style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"><b style="font-family:UICTFontTextStyleBody">TRIPCEL Support Team</b></span></p><div class="yj6qo"></div><div class="adL">

</body>
</html>