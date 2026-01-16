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
            <div>
                Мы используем cookie-файлы для корректной работы сайта.
                Продолжая пользоваться сайтом, вы соглашаетесь с их использованием.
                <a href="{{ route('main.privacy') }}" class="text-decoration-underline">
                    Подробнее
                </a>
            </div>

            <div class="mt-2 pt-2 border-top text-end">
                <button class="btn btn-primary btn-sm" id="cookieAccept">
                    Понятно
                </button>
            </div>
        </div>
    </div>
</div>

<script>
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
</script>
