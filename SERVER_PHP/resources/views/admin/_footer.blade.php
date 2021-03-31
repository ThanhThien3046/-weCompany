





<footer class="footer">
    <div class="copyright">
        <a class="copyright__link" href="{{ env('SITE_FB') }}" target="_blank">{{ env('APP_NAME_SIGN') }}</a>
        <span class="ml-1">© {{ date("Y") }} {{ env('COMPANY') }}</span>
    </div>
    <div class="powered">
        <span>Powered by</span>
        <a class="powered__link" href="{{ env('SITE_FB') }}" target="_blank">
            {{ env('FOUNDER') }}
        </a>
    </div>
</footer>