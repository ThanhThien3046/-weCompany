Xin chào {{ $input['name'] }},

    Đây là công ty {{ Config::get('app.company_name') }}. 
    Chúng tôi là đơn vị thiết kế website uy tín chuyên nghiệp.

    Chúng tôi được gửi yêu cầu đến email {{ $input['email'] }}
    Cảm ơn bạn đã tin tưởng và cùng đồng hành.
    
    Chúng tôi sẽ liên lạc với bạn sớm nhất có thể thông qua số điện thoại: {{ $input['mobile'] }}

    
    Tin nhắn sẽ gửi đến quản trị viên: {{ $input['message'] }}

====================================================================

Trân trọng cảm ơn!

{{ Config::get('app.founder') }} (Mr.)
email: {{ Config::get('app.company_mail') }}
Địa Chỉ: {{ implode(',', [ Config::get("app.company_address_street"), Config::get("app.company_address_locality"), Config::get("app.company_address_region"), Config::get("app.company_address_country")]) }}
Liên hệ: {{ Config::get("app.company_phone") }}
website: {{ asset('/') }}