{{-- hello admin <i>{{ $input['first_name'] }} {{ $input['last_name'] }}</i>,
<p>
    your request to email {{ $input['email'] }}
     {{ $input['mobile'] }}
    {{ $input['fax'] }}
    {{ $input['job_name'] }}
    {{ $input['company'] }}
    {{ $input['message'] }}
</p>
<hr />
<div>
    <p>------------------</p>
    株式会社 WECOMPANY <br>
    〒104-0033 <br>
    東京都中央区新川1丁目5番19号 茅場町長岡ビル4階 <br>
    EMAIL:    info@wecompany.co.jp <br>
    TEL：     03-5846-9117 <br>
    FAX：     050-3606-2875 <br>
    URL:      https://wecompany.co.jp <br>
    営業時間： 9:00~18:00 (休日：土日祝) <br>
    <p>------------------</p>
</div> --}}

<p>ホームページからのお問い合わせ：</p>
お名前{{ $input['first_name'] }} {{ $input['last_name'] }}, <br>
メールアドレス　  ：{{ $input['email'] }}　<br>
電話番号　　      ：{{ $input['mobile'] }} <br>
ファクス          ：{{ $input['fax'] }} <br>
ジョブの名前      ：{{ $input['job_name'] }} <br>
会社名            ：{{ $input['company'] }} <br>
お問い合わせ内容  ：{{ $input['message'] }} <br>
    <p>------------------</p>
    株式会社 WECOMPANY <br>
    〒104-0033 <br>
    東京都中央区新川1丁目5番19号 茅場町長岡ビル4階 <br>
    EMAIL:    info@wecompany.co.jp <br>
    TEL：     03-5846-9117 <br>
    FAX：     050-3606-2875 <br>
    URL:      https://wecompany.co.jp <br>
    営業時間： 9:00~18:00 (休日：土日祝) <br>
    <p>------------------</p>