@extends('admin._layout')

@section('title', 'chi tiết request')

@section('javascripts')
    <script src="{{ asset('js/library/jquery.min.js') }}"></script>
    <script src="{{ asset('js/library/select2.min.js') }}"></script>
    <script src="{{ asset('js/admin/app.min.js') }}"></script>
@endsection
@section('page_title', 'chi tiết request')



@section('content_admin')
<div class="page__post-load admin-main-content">
    <div class="row block-content ">

        
        <div class="col-12 bg-white shadows-1 table-detail-request">
            <div class="row head">
                <div class="col-3">thông tin</div>
                <div class="col-9 wrap-break-word">Giá Trị tương Ứng</div>
            </div>
            <div class="row">
                <div class="col-3">id</div>
                <div class="col-9 wrap-break-word">{{ $requestInfor->id }}</div>
            </div>
            <div class="row">
                <div class="col-3">thông tin người dùng nếu có</div>
                <div class="col-9 wrap-break-word">
                    <img class="item_image" src="{{ asset($requestInfor->getAvatarUserRequest()) }}" /> <span>{{ $requestInfor->getUserNameUserRequest() }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-3">uri request gần nhất</div>
                <div class="col-9 wrap-break-word">{{ $requestInfor->getLastestUri() }}</div>
            </div>
            <div class="row">
                <div class="col-3">method request gần nhất</div>
                <div class="col-9 wrap-break-word">{{ $requestInfor->getLastestMethod() }}</div>
            </div>
            <div class="row">
                <div class="col-3">router request gần nhất</div>
                <div class="col-9 wrap-break-word">{{ $requestInfor->getLastestRouter() }}</div>
            </div>
            <div class="row">
                <div class="col-3">thời điểm request gần nhất</div>
                <div class="col-9 wrap-break-word">{!! $requestInfor->getLastestTime() !!}</div>
            </div>
            <div class="row">
                <div class="col-3">agent của request</div>
                <div class="col-9 wrap-break-word">{!! $requestInfor->getAgentRequest() !!}</div>
            </div>
            <div class="row">
                <div class="col-3">số lần request</div>
                <div class="col-9 wrap-break-word">{!! $requestInfor->count !!}</div>
            </div>
            <div class="row">
                <div class="col-3">danh sách thời điểm request</div>
                <div class="col-9 wrap-break-word">
                    <select name="showto" class="js__single-select">
                        @foreach ($requestInfor->getRequestAtTimes() as $key => $attime)
                        <option disabled @if (!$key) {{ 'selected' }} @endif>{{ $attime }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-3">thông tin Ip</div>
                <div class="col-9 wrap-break-word">
                @php $requestInfor->detectInfor() @endphp
                thông tin: <br />
                "ip": {{ $requestInfor->ip_infor }}<br />
                +"hostname": {{ $requestInfor->hostname }}<br />
                +"city": {{ $requestInfor->city }}<br />
                +"region": {{ $requestInfor->region }}<br />
                +"country": {{ $requestInfor->country }}<br />

                @php 
                $latlong = $requestInfor->loc;
                if(strpos($latlong, ',') === false){

                    $lat  = Config::get('app.map_lat');
                    $long = Config::get('app.map_long');
                }else{

                    list($lat, $long ) = explode(",", $latlong);
                }
                @endphp
                +"loc": {{ $latlong }}<br />
                +"postal": {{ $requestInfor->postal }}<br />
                +"timezone": {{ $requestInfor->timezone }}<br />
                </div>
            </div>
            
        </div>
        <div class="col-12 bg-white shadows-1 my-5 py-5 table-list">
            <div class="row thead-list">
                <div class="col-2 wrap-break-word">at_time</div>
                <div class="col-2 wrap-break-word">referer</div>
                <div class="col-3 wrap-break-word">router</div>
                <div class="col-1 wrap-break-word">method</div>
                <div class="col-4 wrap-break-word">uri</div>
            </div>
            @foreach( $requestTimes as $requestTime)
            <div class="row trow-list">
                <div class="col-2 wrap-break-word">
                    {{ $requestTime->at_time }}
                </div>
                <div class="col-2 wrap-break-word">
                    <a href="{{ $requestTime->referer }}">{{ $requestTime->referer }}</a>
                </div>
                <div class="col-3 wrap-break-word">
                    {{ $requestTime->router }}
                </div>
                <div class="col-1 wrap-break-word">
                    {{ $requestTime->method }}
                </div>
                <div class="col-4 wrap-break-word">
                    <a href="{{ asset($requestTime->uri) }}">{{ asset($requestTime->uri) }}</a>
                </div>
            </div>
            @endforeach
            <div class="pagi">
                {{ $requestTimes->onEachSide(3)->links() }}
            </div>
        </div>
        <div class="col-12 bg-white shadows-1 py-5">
            <button id="js-show-google-map-request" class="btn btn-primary">hiện google map vị trí này</button>
            <div id="map-request" class="map-request" data-lat="{{ $lat }}" data-long="{{ $long }}"></div>
        </div>
    </div>
</div>
@endsection
