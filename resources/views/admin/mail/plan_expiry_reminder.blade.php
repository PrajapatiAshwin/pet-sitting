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
                <!-- INFO TABLE -->
                <table cellpadding="10" cellspacing="0" width="100%" style="border-collapse: collapse; margin-top: 10px; font-size: 15px;">
                    <tr style="background-color: #f8f8f8;">
                        <th align="left" style="border-bottom: 1px solid #ddd;">User Name</th>
                        <th align="left" style="border-bottom: 1px solid #ddd;">Plan Name</th>
                        <th align="left" style="border-bottom: 1px solid #ddd;">Purchase Date</th>
                        <th align="left" style="border-bottom: 1px solid #ddd;">Expiry Date</th>
                        <th align="left" style="border-bottom: 1px solid #ddd;">Days Left</th>
                    </tr>
                    <tr>
                        <td>{{ $name }}</td>
                        <td>{{ $userPlanName ?? 'Unnamed Plan' }}</td>
                        <td>{{ \Carbon\Carbon::parse($purchaseDate)->format('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($expireDate)->format('d-m-Y') }}</td>
                        <td>
                            <u><span style="color: red;"><strong>{{ $daysLeft }}</strong> day{{ $daysLeft == 1 ? '' : 's' }}</span></u>
                        </td>
                    </tr>
                </table>

                <p style="font-size: 16px; color: #555555; line-height: 1.5; margin-top: 20px;">
                    Please renew your plan before it expires to avoid service interruption.
                </p>
            </td>
        </tr>
    </table>
</body>
</html>
