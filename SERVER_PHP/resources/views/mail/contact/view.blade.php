Chào <i>{{ $input['name'] }}</i>,
<p>
    Đây là công ty {{ Config::get('app.company_name') }}. 
    Chúng tôi là đơn vị thiết kế website uy tín chuyên nghiệp.
</p>

 
<div>
    <p>Chúng tôi được gửi yêu cầu đến email <b>&nbsp;{{ $input['email'] }}</b></p>
    <p>Cảm ơn bạn đã tin tưởng và cùng đồng hành. </p>
    <p>Chúng tôi sẽ liên lạc với bạn sớm nhất có thể thông qua số điện thoại: <b>&nbsp;{{ $input['mobile'] }}</b></p>
</div>
<div>
<p><b>Tin nhắn sẽ gửi đến quản trị viên:</b>&nbsp;{{ $input['message'] }}</p>
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