<script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_KEY') }}"></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('{{ env('RECAPTCHA_KEY') }}', {action: '{{ $action }}'}).then((token) => {
            var recaptchaResponse = document.getElementById('recaptcha');
            recaptchaResponse.value = token;
        });
    });
</script>
