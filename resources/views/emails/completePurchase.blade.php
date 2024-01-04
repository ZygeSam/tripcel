
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href={{asset("assets/images/FII.png")}} type="image/x-icon">
    <title>Your Purchase Confirmation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h1 {
            color: #333333;
        }

        p {
            color: #666666;
            margin-bottom: 20px;
        }

    </style>
</head>
<body>
    <img src="{{ $message->embed((public_path("assets/images/FI.png")) )}}">
<p dir="auto" style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody">Thank you for choosing <b style="font-family:UICTFontTextStyleBody">Tripcel</b>! Your new data plan is ready to activate. Please follow the instructions below carefully:</span></p>
<p style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"></span><br></p><p dir="auto" style="font-family:&quot;.AppleSystemUIFont&quot;"><b style="font-family:&quot;.AppleSystemUIFont&quot;">IMPORTANT - PLEASE READ BEFORE ACTIVATING:</b></p><p dir="auto" style="font-family:&quot;.AppleSystemUIFont&quot;"><b style="font-family:&quot;.AppleSystemUIFont&quot;"><br></b></p>
<p style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody">Before you begin:</span></p>
<p dir="auto" style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody">-Ensure you have an internet connection.</span></p>
<p style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody">- We recommend activating your eSIM before reaching your destination.</span></p>
<p style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody">- The data connection will activate on 2023-11-02 13:13:33 (UTC), but you can activate the eSIM at any time.</span></p>
<p style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"></span><br></p>
<p style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"><b style="font-family:UICTFontTextStyleBody">Activation Steps:</b></span></p>
<p style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"></span><br></p>
<p dir="auto" style="font-family:&quot;.AppleSystemUIFont&quot;">
    <span style="font-family:UICTFontTextStyleBody"><b style="font-family:UICTFontTextStyleBody">1. SCAN QR CODE USING YOUR DEVICE</b></span>
</p>
    <p>
        @foreach ($mailData['message'] as $item)
            <img width="400px" height="400px" src="{{ $message->embed((public_path($item)) )}}">
        @endforeach
    </p>
<p style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"><span style="font-family:UICTFontTextStyleBody">&nbsp;&nbsp; </span>- Open the Camera app on your device.</span></p>
<p style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"><span style="font-family:UICTFontTextStyleBody">&nbsp;&nbsp; </span>- Focus the camera on the QR code provided in the email.</span></p>
<p style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"><span style="font-family:UICTFontTextStyleBody">&nbsp;&nbsp; </span>- When prompted, tap to add a new data plan and follow the on-screen instructions.</span></p>
<p style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"></span><br></p>
<p style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"><i style="font-family:UICTFontTextStyleBody">Select "Personal" as the default line and tap "Continue".</i></span></p>
<p style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"><i style="font-family:UICTFontTextStyleBody">* Depending on the type of eSIM, options other than Personal' may be displayed. In such cases, please select an option other than 'Primary Line.</i></span></p>
<p style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"><i style="font-family:UICTFontTextStyleBody">* There is no need to set up iMessage or FaceTime. Tap "Continue". However, to continue sending and receiving messages through iMessage or FaceTime with your current phone number, please select 'Primary Line.' You can edit this setting later if needed.</i></span></p>
<p style="font-family:&quot;.AppleSystemUIFont&quot;"><i style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"></span><br></i></p>
<p style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"></span><br></p>
<p style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody">If you can't scan the QR code or prefer a manual activation:</span></p>
<p style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"><span style="font-family:UICTFontTextStyleBody">&nbsp;&nbsp; </span>- Log in to your account and click on "Install" next to your eSIM plan.</span></p>
<p style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"></span><br></p>
<p dir="auto" style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"><b style="font-family:UICTFontTextStyleBody">2. ENABLE DATA ROAMING:</b></span></p>
<p dir="auto" style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"><span style="font-family:UICTFontTextStyleBody">&nbsp;&nbsp; </span>- Go to your device's <b style="font-family:UICTFontTextStyleBody">Settings</b>.</span></p>
<p dir="auto" style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"><span style="font-family:UICTFontTextStyleBody">&nbsp;&nbsp; </span>- Find the "<b style="font-family:UICTFontTextStyleBody">Cellular</b>" or "Mobile &amp; Network" option (Android users).</span></p>
<p style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"><span style="font-family:UICTFontTextStyleBody">&nbsp;&nbsp; </span>- Locate your new eSIM data plan.</span></p>
<p dir="auto" style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"><span style="font-family:UICTFontTextStyleBody">&nbsp;&nbsp; </span>- Make sure that the option for&nbsp;<b style="font-family:UICTFontTextStyleBody">Data Roaming </b>is<b style="font-family:UICTFontTextStyleBody"> turned ON.</b></span></p>
<p style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"></span><br></p>
<p dir="auto" style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"><b style="font-family:UICTFontTextStyleBody">3. (FOR ANDROID USER ONLY) CONFIGURE APN:</b></span></p><p dir="auto" style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"><b style="font-family:UICTFontTextStyleBody"><br></b></span></p><p dir="auto" style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody">Data plans on <b style="font-family:UICTFontTextStyleBody">Android</b> require a manual setting to know where to connect to. Follow the steps below on your device:</span></p><p dir="auto" style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"><br></span></p>
<p dir="auto" style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"><span style="font-family:UICTFontTextStyleBody">&nbsp;&nbsp; </span>- In your mobile&nbsp;<b style="font-family:UICTFontTextStyleBody">Settings</b>,&nbsp;</span></p><p dir="auto" style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody">&nbsp; &nbsp;- Go to "Mobile &amp; Network."</span></p>
<p dir="auto" style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"><span style="font-family:UICTFontTextStyleBody">&nbsp;&nbsp; </span>- Tap on your new eSIM plan and go to "<b style="font-family:UICTFontTextStyleBody">Access Point Names</b>."</span></p>
<p dir="auto" style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"><span style="font-family:UICTFontTextStyleBody">&nbsp;&nbsp; </span>- Tap Menu, then select "<b style="font-family:UICTFontTextStyleBody">New APN</b>."</span></p>
<p dir="auto" style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"><span style="font-family:UICTFontTextStyleBody">&nbsp;&nbsp; </span>- In the "<b style="font-family:UICTFontTextStyleBody">APN</b>" field, enter "globaldata" (without quotes). Remove any existing username or password entries.</span></p>
<p style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"><span style="font-family:UICTFontTextStyleBody">&nbsp;&nbsp; </span>- Go back and select the new APN.</span></p>
<p style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"><span style="font-family:UICTFontTextStyleBody">&nbsp;&nbsp; </span>- Restart your device to initialize the network connection.</span></p>
<p style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"></span><br></p>
<p style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"><b style="font-family:UICTFontTextStyleBody">Please note:</b></span></p>
<p style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody">- Allow up to 15 minutes after restarting your device for 4G/LTE data to start working.</span></p><p style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"><br></span></p>
<p dir="auto" style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody">- If you encounter any issues during the activation process, please reach out to us for assistance. We are ready to assist you all the way.</span></p>
<p style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"></span><br></p>
<p dir="auto" style="font-family:&quot;.AppleSystemUIFont&quot;"><b style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"><b style="font-family:UICTFontTextStyleBody">Thank you for choosing TRIPCEL</b>.&nbsp;</span><span style="font-family:UICTFontTextStyleBody">Enjoy your data plan!</span></b></p><p dir="auto" style="font-family:&quot;.AppleSystemUIFont&quot;"><b style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"><br></span></b></p><p dir="auto" style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody">Warm regards,</span></p><p dir="auto" style="font-family:&quot;.AppleSystemUIFont&quot;"><span style="font-family:UICTFontTextStyleBody"><b style="font-family:UICTFontTextStyleBody">TRIPCEL Support Team</b></span></p><div class="yj6qo"></div><div class="adL">

</body>
</html>