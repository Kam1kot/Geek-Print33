{{-- Уведомление о куки --}}
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="cookieToast"
         class="toast"
         role="alert"
         aria-live="polite"
         aria-atomic="true"
         data-bs-autohide="false">

        <div class="toast-header">
            <strong class="me-auto">Cookie</strong>
            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="toast"
                    aria-label="Закрыть"></button>
        </div>
        <div class="toast-body">
            Мы используем cookie-файлы для корректной работы сайта и улучшения
            пользовательского опыта.
            <a href="{{ route('main.privacy') }}" target="_blank">
                Подробнее
            </a>

            <div class="mt-2 pt-2 border-top text-end">
                <button class="btn btn-primary btn-sm" id="cookieAccept">
                    Понятно
                </button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const KEY = 'cookie_info_shown';

    if (!localStorage.getItem(KEY)) {
        const toast = new bootstrap.Toast(
            document.getElementById('cookieToast')
        );
        toast.show();

        document.getElementById('cookieAccept').onclick = () => {
            localStorage.setItem(KEY, '1');
            toast.hide();
        };
    }
});
</script>
{{-- <div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
    <div class="toast-header">
      <strong class="me-auto">Cookie's файлы</strong>
      <small>Только что</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Мы используем Cookie-файлы для работы нашего сайта.
        <div class="mt-2 pt-2 border-top">
            <button type="button" class="btn btn-primary btn-sm" id="acceptCookies">Согласен</button>
            <button type="button" class="btn btn-secondary btn-sm" id="declineCookies">Не согласен</button>
            <button type="button" class="btn btn-light btn-sm" id="settingsCookies">Настройки</button>
        </div>
    </div>
  </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const is_cookies_accepted = localStorage.getItem('is_cookies_accepted');

        if (is_cookies_accepted === 'true') {
            // Согласие уже дано, не показывать уведомление
        } else {
            const toast = new bootstrap.Toast(document.getElementById('liveToast'));
            toast.show();
        }

        document.getElementById('acceptCookies').addEventListener('click', function() {
            localStorage.setItem('is_cookies_accepted', 'true');

            const toast = new bootstrap.Toast(document.getElementById('liveToast'));
            toast.hide();
        });

        document.getElementById('declineCookies').addEventListener('click', function() {
            localStorage.setItem('is_cookies_accepted', 'false');

            const toast = new bootstrap.Toast(document.getElementById('liveToast'));
            toast.hide();
        });
    });
</script> --}}