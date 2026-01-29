<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin nhắn liên hệ mới</title>
</head>

<body
    style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    <div
        style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 30px; text-align: center; border-radius: 10px 10px 0 0;">
        <h1 style="color: white; margin: 0; font-size: 24px;">📧 Tin nhắn liên hệ mới</h1>
    </div>

    <div style="background: #f9f9f9; padding: 30px; border-radius: 0 0 10px 10px;">
        <p style="font-size: 16px; margin-bottom: 20px;">Bạn nhận được tin nhắn liên hệ mới từ website:</p>

        <div
            style="background: white; padding: 20px; border-radius: 8px; margin-bottom: 15px; border-left: 4px solid #667eea;">
            <p style="margin: 0 0 10px 0;"><strong>👤 Họ và tên:</strong></p>
            <p style="margin: 0; color: #555;">{{ $data['name'] }}</p>
        </div>

        <div
            style="background: white; padding: 20px; border-radius: 8px; margin-bottom: 15px; border-left: 4px solid #667eea;">
            <p style="margin: 0 0 10px 0;"><strong>📧 Email:</strong></p>
            <p style="margin: 0; color: #555;">
                <a href="mailto:{{ $data['email'] }}"
                    style="color: #667eea; text-decoration: none;">{{ $data['email'] }}</a>
            </p>
        </div>

        @if($data['telegram'])
            <div
                style="background: white; padding: 20px; border-radius: 8px; margin-bottom: 15px; border-left: 4px solid #667eea;">
                <p style="margin: 0 0 10px 0;"><strong>✈️ Telegram:</strong></p>
                <p style="margin: 0; color: #555;">{{ $data['telegram'] }}</p>
            </div>
        @endif

        <div style="background: white; padding: 20px; border-radius: 8px; border-left: 4px solid #667eea;">
            <p style="margin: 0 0 10px 0;"><strong>💬 Nội dung tin nhắn:</strong></p>
            <p style="margin: 0; color: #555; white-space: pre-wrap;">{{ $data['message'] }}</p>
        </div>

        <div style="margin-top: 30px; padding-top: 20px; border-top: 2px solid #ddd; text-align: center;">
            <p style="color: #999; font-size: 14px; margin: 0;">
                Email này được gửi tự động từ form liên hệ trên website.<br>
                Vui lòng phản hồi trực tiếp qua email của khách hàng.
            </p>
        </div>
    </div>
</body>

</html>