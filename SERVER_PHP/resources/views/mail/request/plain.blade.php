Xin chào Admin,
    Đây là công ty {{ Config::get('app.company_name') }}. 
    Chúng tôi là đơn vị thiết kế website uy tín chuyên nghiệp.

    Hiện tại đang có lỗi lớn cần khắc phục:

    {{ $input['message'] }}

====================================================================

Trân trọng cảm ơn!

{{ Config::get('app.founder') }} (Mr.)
email: {{ Config::get('app.company_mail') }}
Địa Chỉ: {{ implode(',', [ Config::get("app.company_address_street"), Config::get("app.company_address_locality"), Config::get("app.company_address_region"), Config::get("app.company_address_country")]) }}
Liên hệ: {{ Config::get("app.company_phone") }}
website: {{ asset('/') }}