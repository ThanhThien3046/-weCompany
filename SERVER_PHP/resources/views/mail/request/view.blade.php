Chào <i>Admin</i>,
<p>
    Đây là công ty {{ Config::get('app.company_name') }}. 
    Chúng tôi là đơn vị thiết kế website uy tín chuyên nghiệp.
</p>
<p>Hiện tại đang có lỗi lớn cần khắc phục:</p>
<div>
    <b>{{ $input['message'] }}</b> 
</div>
<hr />
<div>
    <p><b>Trân trọng cảm ơn!</b></p>
    <p> {{ Config::get('app.founder') }} (Mr.) </p>
    <p>
        <a href="mailto:{{ Config::get('app.company_mail') }}">{{ Config::get('app.company_mail') }}</a>
    </p>
    <img src="{{ asset('/logo.png') }}" alt="{{ Config::get("app.name") }}"  />
    <p>
        <b>Địa Chỉ: </b> <span> {{ implode(',', [ Config::get("app.company_address_street"), Config::get("app.company_address_locality"), Config::get("app.company_address_region"), Config::get("app.company_address_country")]) }} </span>        
    </p>
    <p>
        <b>Liên hệ: </b> <span> {{ Config::get("app.company_phone") }} </span>        
    </p>
    <p>
        <b>Website: </b> <span> {{ asset('/') }} </span>        
    </p>
</div>