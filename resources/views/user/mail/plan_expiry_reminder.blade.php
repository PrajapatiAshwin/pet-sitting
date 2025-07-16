{{--  <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Plan Expiry Reminder</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f4f4; font-family: Arial, sans-serif;">
    <table role="presentation" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td style="padding: 40px 0;">
                <table align="center" cellpadding="0" cellspacing="0" width="600" style="background-color: #ffffff; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.05); overflow: hidden;">
                    <tr>
                        <td align="center" style="padding: 30px;background-color: #00bd56;">
                            <h1 style="margin: 0; font-size: 24px; color: #ffffff;"><i class="fa-solid fa-paw" style="background-color: #00bd56;"></i>🐾 Pet-Sitting Plan Reminder</h1>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 30px;">
                            <p style="font-size: 16px; color: #333333;">
                                Hello <strong>{{ $order->name ?? 'Valued Customer' }}</strong>,
                            </p>

                            <p style="font-size: 16px; color: #555555; line-height: 1.5;">
                                Your subscription plan <strong>{{ $order->plan_name ?? 'Unnamed Plan' }}</strong> will expire on 
                                <span style="color: #00bd56;"><strong>{{ \Carbon\Carbon::parse($order->expire_date)->format('d-m-Y') }}</strong></span>.
                            </p>

                            <p style="font-size: 16px; color: #555555; line-height: 1.5;">
                                Renew your plan before it expires to continue enjoying pet-sitting services.
                            </p>

                            <div style="text-align: center; margin: 30px 0;">
                                <a href="{{ url('/pricing') }}" style="background-color: #00bd56; color: white; padding: 12px 30px; text-decoration: none; font-size: 16px; border-radius: 5px;">
                                    Renew My Plan
                                </a>
                            </div>

                            <p style="font-size: 14px; color: #999999;">
                                Thank you for choosing Pet-Sitting. We're always here to keep your furry friends happy and safe!<br>
                                <strong>- The Pet-Sitting Team 🐶🐱</strong>
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td align="center" style="padding: 15px; background-color: #f0f0f0; font-size: 12px; color: #888;">
                            &copy; {{ now()->year }} Pet-Sitting. All rights reserved.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>  --}}

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Plan Expiry Reminder</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f4f4; font-family: Arial, sans-serif;">
    <table role="presentation" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td style="padding: 40px 0;">
                <table align="center" cellpadding="0" cellspacing="0" width="600" style="background-color: #ffffff; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.05); overflow: hidden;">
                    <tr>
                        <td align="center" style="padding: 30px;background-color: #00bd56;">
                            <h1 style="margin: 0; font-size: 24px; color: #ffffff;"><i class="fa-solid fa-paw" style="background-color: #00bd56;"></i>🐾 Pet-Sitting Plan Reminder</h1>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 30px;">
                            <p style="font-size: 16px; color: #333333;">
                                Hello, Dear <strong>{{ $name }}</strong>,
                            </p>

                            <p style="font-size: 16px; color: #555555; line-height: 1.5;">
                                We want to remind you that your <strong>{{ $userPlanName ?? 'Unnamed Plan' }}</strong> subscription plan will expire on
                                <span style="color:#00bd56;"><strong>{{ \Carbon\Carbon::parse($expireDate)->format('d-m-Y') }}</strong></span>.
                                <br><br>
                                You have {{ $daysLeft == 1 ? 'is' : 'are' }} <strong><u><span style="color:rgb(255, 0, 0);">{{ $daysLeft }}</span></strong><span style="color:rgb(255, 0, 0);"> day{{ $daysLeft == 1 ? '' : 's' }}</span></u> left to renew your plan. Please take action before it expires to continue enjoying our pet-sitting services.
                            </p>

                            <p style="font-size: 16px; color: #555555; line-height: 1.5;">
                                Renew your plan before it expires to continue enjoying pet-sitting services.
                            </p>

                            <div style="text-align: center; margin: 30px 0;">
                                <a href="{{ url('/pricing') }}" style="background-color: #00bd56; color: white; padding: 12px 30px; text-decoration: none; font-size: 16px; border-radius: 5px;">
                                    Renew My Plan
                                </a>
                            </div>

                            <p style="font-size: 14px; color: #999999;">
                                Thank you for choosing Pet-Sitting. We're always here to keep your furry friends happy and safe!<br>
                                <strong>- The Pet-Sitting Team 🐶🐱</strong>
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td align="center" style="padding: 15px; background-color: #f0f0f0; font-size: 12px; color: #888;">
                            &copy; {{ now()->year }} Pet-Sitting. All rights reserved.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
