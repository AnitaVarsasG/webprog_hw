document.addEventListener('DOMContentLoaded', function () {
    setActiveMenuLink();
    enhanceForms();
    addTextareaCounter();
    addLogoutConfirmation();
    autoHideSuccessMessages();
    enableQuickInputFocus();
});

function setActiveMenuLink() {
    var params = new URLSearchParams(window.location.search);
    var page = params.get('page') || 'cimlap';
    var links = document.querySelectorAll('.menu-list a[href*="page="]');

    links.forEach(function (link) {
        var url = new URL(link.href, window.location.origin);
        var linkPage = url.searchParams.get('page');

        if (linkPage === page) {
            link.classList.add('active-link');
            link.setAttribute('aria-current', 'page');
        }
    });
}

function enhanceForms() {
    var forms = document.querySelectorAll('form');

    forms.forEach(function (form) {
        var fields = form.querySelectorAll('input[required], textarea[required]');

        fields.forEach(function (field) {
            field.addEventListener('input', function () {
                field.classList.remove('is-invalid');
            });
        });

        form.addEventListener('submit', function (event) {
            var hasError = false;

            fields.forEach(function (field) {
                var value = field.value.trim();

                if (!value) {
                    field.classList.add('is-invalid');
                    hasError = true;
                    return;
                }

                if (field.type === 'email') {
                    var emailOk = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
                    if (!emailOk) {
                        field.classList.add('is-invalid');
                        hasError = true;
                    }
                }
            });

            if (hasError) {
                event.preventDefault();
                var firstInvalid = form.querySelector('.is-invalid');
                if (firstInvalid) {
                    firstInvalid.focus();
                }
            }
        });
    });
}

function addTextareaCounter() {
    var textareas = document.querySelectorAll('textarea[name="uzenet"]');

    textareas.forEach(function (textarea) {
        var counter = document.createElement('p');
        counter.className = 'form-hint';
        textarea.insertAdjacentElement('afterend', counter);

        var updateCounter = function () {
            var len = textarea.value.trim().length;
            counter.textContent = 'Karakterek: ' + len;
        };

        textarea.addEventListener('input', updateCounter);
        updateCounter();
    });
}

function addLogoutConfirmation() {
    var logoutLinks = document.querySelectorAll('a[href*="page=kilepes"]');

    logoutLinks.forEach(function (link) {
        link.addEventListener('click', function (event) {
            var ok = window.confirm('Biztosan ki szeretnel lepni?');
            if (!ok) {
                event.preventDefault();
            }
        });
    });
}

function autoHideSuccessMessages() {
    var messages = document.querySelectorAll('.success-message');

    messages.forEach(function (message) {
        setTimeout(function () {
            message.style.transition = 'opacity 0.4s ease';
            message.style.opacity = '0';

            setTimeout(function () {
                message.style.display = 'none';
            }, 400);
        }, 5000);
    });
}

function enableQuickInputFocus() {
    document.addEventListener('keydown', function (event) {
        if (event.key === '/' && !isTypingContext(event.target)) {
            event.preventDefault();
            var firstInput = document.querySelector('input[type="text"], input[type="email"], textarea');
            if (firstInput) {
                firstInput.focus();
            }
        }
    });
}

function isTypingContext(element) {
    return element.tagName === 'INPUT' || element.tagName === 'TEXTAREA' || element.isContentEditable;
}
