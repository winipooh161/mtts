@extends('auth.layouts.app')
@section('content')
<div class="container register__fon">
    <div class="form__auth email">
        <h1 class="tt">Восстановление <br> пароля</h1>
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @else
        <p class="form__auth__title_P">Придумай новый пароль</p>
    @endif
            <form method="POST" action="{{ route('password.update') }}" class="resetform">
                @csrf
                <!-- Hidden inputs for the token and email -->
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">
                <div class="password-container padd20">
                    <p>{{ __('Пароль') }}</p>
                    <input id="password" type="password"
                        class="form-control @error('password') is-invalid @enderror" name="password"
                        maxlength="50" placeholder="Введи пароль" autocomplete="new-password">
                    <span id="togglePassword" class="password-toggle">
                        <svg id="eye-open" width="15" height="11" viewBox="0 0 15 11" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.6988 3.98095C12.7859 2.49428 10.7095 0 7.06522 0C3.42092 0 1.34451 2.49428 0.43167 3.98095C0.149476 4.43738 0 4.96339 0 5.5C0 6.03662 0.149476 6.56262 0.43167 7.01905C1.34451 8.50573 3.42092 11 7.06522 11C10.7095 11 12.7859 8.50573 13.6988 7.01905C13.981 6.56262 14.1304 6.03662 14.1304 5.5C14.1304 4.96339 13.981 4.43738 13.6988 3.98095V3.98095ZM12.6953 6.40284C11.9113 7.67764 10.1369 9.8229 7.06522 9.8229C3.99357 9.8229 2.2191 7.67764 1.43515 6.40284C1.26749 6.13154 1.17869 5.81892 1.17869 5.5C1.17869 5.18108 1.26749 4.86846 1.43515 4.59716C2.2191 3.32237 3.99357 1.1771 7.06522 1.1771C10.1369 1.1771 11.9113 3.32001 12.6953 4.59716C12.8629 4.86846 12.9517 5.18108 12.9517 5.5C12.9517 5.81892 12.8629 6.13154 12.6953 6.40284V6.40284Z"
                                fill="#626C77" />
                            <path
                                d="M7.06519 2.55713C6.48317 2.55713 5.91422 2.72972 5.43028 3.05307C4.94635 3.37643 4.56917 3.83602 4.34644 4.37374C4.12371 4.91146 4.06544 5.50314 4.17898 6.07398C4.29253 6.64482 4.5728 7.16917 4.98435 7.58072C5.3959 7.99227 5.92025 8.27254 6.49109 8.38609C7.06192 8.49963 7.65361 8.44136 8.19133 8.21863C8.72905 7.9959 9.18864 7.61872 9.512 7.13478C9.83535 6.65085 10.0079 6.0819 10.0079 5.49988C10.007 4.7197 9.69667 3.97174 9.145 3.42007C8.59332 2.8684 7.84537 2.55806 7.06519 2.55713V2.55713ZM7.06519 7.26553C6.71598 7.26553 6.37461 7.16198 6.08425 6.96796C5.79389 6.77395 5.56758 6.4982 5.43394 6.17556C5.3003 5.85293 5.26534 5.49792 5.33346 5.15542C5.40159 4.81292 5.56975 4.49831 5.81668 4.25138C6.06362 4.00445 6.37822 3.83628 6.72073 3.76816C7.06323 3.70003 7.41824 3.73499 7.74087 3.86863C8.0635 4.00227 8.33926 4.22858 8.53327 4.51894C8.72729 4.8093 8.83084 5.15067 8.83084 5.49988C8.83084 5.96816 8.64482 6.41726 8.31369 6.74838C7.98257 7.07951 7.53347 7.26553 7.06519 7.26553Z"
                                fill="#626C77" />
                        </svg>
                        <svg id="eye-closed" style="display:none;" width="14" height="12"
                            viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.5723 4.58509C13.0459 3.77854 12.3819 3.05809 11.6066 2.45233L13.2394 0.92464C13.3456 0.821739 13.4044 0.683918 13.403 0.540862C13.4017 0.397807 13.3404 0.260963 13.2323 0.159804C13.1241 0.0586443 12.9779 0.00126374 12.825 2.06252e-05C12.6721 -0.00122249 12.5248 0.0537713 12.4148 0.153157L10.6392 1.8167C9.53854 1.20498 8.28019 0.886156 7 0.894632C3.38992 0.894632 1.33268 3.2069 0.427685 4.58509C0.148096 5.00821 0 5.49584 0 5.9933C0 6.49075 0.148096 6.97838 0.427685 7.4015C0.954098 8.20805 1.61811 8.9285 2.39337 9.53426L0.760645 11.062C0.704951 11.1123 0.660528 11.1725 0.629968 11.2391C0.599407 11.3056 0.583321 11.3772 0.582648 11.4497C0.581975 11.5221 0.596729 11.5939 0.626049 11.661C0.655368 11.7281 0.698667 11.789 0.753417 11.8402C0.808168 11.8914 0.873274 11.9319 0.944937 11.9594C1.0166 11.9868 1.09338 12.0006 1.17081 12C1.24824 11.9994 1.32475 11.9843 1.3959 11.9557C1.46704 11.9271 1.53138 11.8855 1.58517 11.8334L3.36485 10.1683C4.46418 10.7799 5.72103 11.0992 7 11.092C10.6101 11.092 12.6673 8.77969 13.5723 7.4015C13.8519 6.97838 14 6.49075 14 5.9933C14 5.49584 13.8519 5.00821 13.5723 4.58509V4.58509ZM1.42132 6.83025C1.25521 6.57875 1.16722 6.28894 1.16722 5.9933C1.16722 5.69765 1.25521 5.40784 1.42132 5.15634C2.1992 3.97456 3.95729 1.98584 7 1.98584C7.96813 1.98076 8.92268 2.19908 9.77914 2.62147L8.60532 3.71977C8.04549 3.372 7.37431 3.21617 6.70566 3.27873C6.03702 3.34128 5.41209 3.61836 4.93693 4.06295C4.46177 4.50754 4.16564 5.09226 4.09878 5.71789C4.03193 6.34352 4.19847 6.97153 4.57015 7.49534L3.22315 8.75569C2.50889 8.21538 1.89938 7.56406 1.42132 6.83025V6.83025ZM8.74935 5.9933C8.74935 6.4274 8.56505 6.84373 8.23698 7.15069C7.90891 7.45766 7.46396 7.63011 7 7.63011C6.74023 7.62916 6.48406 7.57321 6.25069 7.46642L8.57442 5.2922C8.68854 5.51054 8.74835 5.75024 8.74935 5.9933V5.9933ZM5.25065 5.9933C5.25065 5.55919 5.43495 5.14286 5.76302 4.8359C6.09109 4.52893 6.53604 4.35649 7 4.35649C7.25977 4.35743 7.51594 4.41339 7.74931 4.52017L5.42558 6.6944C5.31146 6.47605 5.25165 6.23635 5.25065 5.9933ZM12.5787 6.83025C11.8008 8.01203 10.0427 10.0008 7 10.0008C6.03187 10.0058 5.07732 9.78751 4.22086 9.36512L5.39468 8.26682C5.95451 8.61459 6.62569 8.77042 7.29434 8.70786C7.96298 8.64531 8.58791 8.36823 9.06307 7.92364C9.53823 7.47905 9.83436 6.89433 9.90121 6.2687C9.96807 5.64307 9.80153 5.01507 9.42985 4.49125L10.7769 3.23091C11.4911 3.77121 12.1006 4.42253 12.5787 5.15634C12.7448 5.40784 12.8328 5.69765 12.8328 5.9933C12.8328 6.28894 12.7448 6.57875 12.5787 6.83025V6.83025Z"
                                fill="#626C77" />
                        </svg>
                    </span>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!-- Поле для подтверждения пароля с глазом -->
                <div class="password-container">
                    <p>{{ __('Подтверждение пароля *') }}</p>
                    <input id="password-confirm" type="password" placeholder="Повтори пароль"
                        class="form-control" name="password_confirmation" maxlength="50"
                        autocomplete="new-password">
                        <span id="togglePasswordConfirm" class="password-toggle">
                            <svg id="eye-open-confirm" width="15" height="11" viewBox="0 0 15 11"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.6988 3.98095C12.7859 2.49428 10.7095 0 7.06522 0C3.42092 0 1.34451 2.49428 0.43167 3.98095C0.149476 4.43738 0 4.96339 0 5.5C0 6.03662 0.149476 6.56262 0.43167 7.01905C1.34451 8.50573 3.42092 11 7.06522 11C10.7095 11 12.7859 8.50573 13.6988 7.01905C13.981 6.56262 14.1304 6.03662 14.1304 5.5C14.1304 4.96339 13.981 4.43738 13.6988 3.98095V3.98095ZM12.6953 6.40284C11.9113 7.67764 10.1369 9.8229 7.06522 9.8229C3.99357 9.8229 2.2191 7.67764 1.43515 6.40284C1.26749 6.13154 1.17869 5.81892 1.17869 5.5C1.17869 5.18108 1.26749 4.86846 1.43515 4.59716C2.2191 3.32237 3.99357 1.1771 7.06522 1.1771C10.1369 1.1771 11.9113 3.32001 12.6953 4.59716C12.8629 4.86846 12.9517 5.18108 12.9517 5.5C12.9517 5.81892 12.8629 6.13154 12.6953 6.40284V6.40284Z"
                                    fill="#626C77" />
                                <path
                                    d="M7.06519 2.55713C6.48317 2.55713 5.91422 2.72972 5.43028 3.05307C4.94635 3.37643 4.56917 3.83602 4.34644 4.37374C4.12371 4.91146 4.06544 5.50314 4.17898 6.07398C4.29253 6.64482 4.5728 7.16917 4.98435 7.58072C5.3959 7.99227 5.92025 8.27254 6.49109 8.38609C7.06192 8.49963 7.65361 8.44136 8.19133 8.21863C8.72905 7.9959 9.18864 7.61872 9.512 7.13478C9.83535 6.65085 10.0079 6.0819 10.0079 5.49988C10.007 4.7197 9.69667 3.97174 9.145 3.42007C8.59332 2.8684 7.84537 2.55806 7.06519 2.55713V2.55713ZM7.06519 7.26553C6.71598 7.26553 6.37461 7.16198 6.08425 6.96796C5.79389 6.77395 5.56758 6.4982 5.43394 6.17556C5.3003 5.85293 5.26534 5.49792 5.33346 5.15542C5.40159 4.81292 5.56975 4.49831 5.81668 4.25138C6.06362 4.00445 6.37822 3.83628 6.72073 3.76816C7.06323 3.70003 7.41824 3.73499 7.74087 3.86863C8.0635 4.00227 8.33926 4.22858 8.53327 4.51894C8.72729 4.8093 8.83084 5.15067 8.83084 5.49988C8.83084 5.96816 8.64482 6.41726 8.31369 6.74838C7.98257 7.07951 7.53347 7.26553 7.06519 7.26553Z"
                                    fill="#626C77" />
                            </svg>
                            <svg id="eye-closed-confirm" style="display:none;" width="14" height="12"
                                viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.5723 4.58509C13.0459 3.77854 12.3819 3.05809 11.6066 2.45233L13.2394 0.92464C13.3456 0.821739 13.4044 0.683918 13.403 0.540862C13.4017 0.397807 13.3404 0.260963 13.2323 0.159804C13.1241 0.0586443 12.9779 0.00126374 12.825 2.06252e-05C12.6721 -0.00122249 12.5248 0.0537713 12.4148 0.153157L10.6392 1.8167C9.53854 1.20498 8.28019 0.886156 7 0.894632C3.38992 0.894632 1.33268 3.2069 0.427685 4.58509C0.148096 5.00821 0 5.49584 0 5.9933C0 6.49075 0.148096 6.97838 0.427685 7.4015C0.954098 8.20805 1.61811 8.9285 2.39337 9.53426L0.760645 11.062C0.704951 11.1123 0.660528 11.1725 0.629968 11.2391C0.599407 11.3056 0.583321 11.3772 0.582648 11.4497C0.581975 11.5221 0.596729 11.5939 0.626049 11.661C0.655368 11.7281 0.698667 11.789 0.753417 11.8402C0.808168 11.8914 0.873274 11.9319 0.944937 11.9594C1.0166 11.9868 1.09338 12.0006 1.17081 12C1.24824 11.9994 1.32475 11.9843 1.3959 11.9557C1.46704 11.9271 1.53138 11.8855 1.58517 11.8334L3.36485 10.1683C4.46418 10.7799 5.72103 11.0992 7 11.092C10.6101 11.092 12.6673 8.77969 13.5723 7.4015C13.8519 6.97838 14 6.49075 14 5.9933C14 5.49584 13.8519 5.00821 13.5723 4.58509V4.58509ZM1.42132 6.83025C1.25521 6.57875 1.16722 6.28894 1.16722 5.9933C1.16722 5.69765 1.25521 5.40784 1.42132 5.15634C2.1992 3.97456 3.95729 1.98584 7 1.98584C7.96813 1.98076 8.92268 2.19908 9.77914 2.62147L8.60532 3.71977C8.04549 3.372 7.37431 3.21617 6.70566 3.27873C6.03702 3.34128 5.41209 3.61836 4.93693 4.06295C4.46177 4.50754 4.16564 5.09226 4.09878 5.71789C4.03193 6.34352 4.19847 6.97153 4.57015 7.49534L3.22315 8.75569C2.50889 8.21538 1.89938 7.56406 1.42132 6.83025V6.83025ZM8.74935 5.9933C8.74935 6.4274 8.56505 6.84373 8.23698 7.15069C7.90891 7.45766 7.46396 7.63011 7 7.63011C6.74023 7.62916 6.48406 7.57321 6.25069 7.46642L8.57442 5.2922C8.68854 5.51054 8.74835 5.75024 8.74935 5.9933V5.9933ZM5.25065 5.9933C5.25065 5.55919 5.43495 5.14286 5.76302 4.8359C6.09109 4.52893 6.53604 4.35649 7 4.35649C7.25977 4.35743 7.51594 4.41339 7.74931 4.52017L5.42558 6.6944C5.31146 6.47605 5.25165 6.23635 5.25065 5.9933ZM12.5787 6.83025C11.8008 8.01203 10.0427 10.0008 7 10.0008C6.03187 10.0058 5.07732 9.78751 4.22086 9.36512L5.39468 8.26682C5.95451 8.61459 6.62569 8.77042 7.29434 8.70786C7.96298 8.64531 8.58791 8.36823 9.06307 7.92364C9.53823 7.47905 9.83436 6.89433 9.90121 6.2687C9.96807 5.64307 9.80153 5.01507 9.42985 4.49125L10.7769 3.23091C11.4911 3.77121 12.1006 4.42253 12.5787 5.15634C12.7448 5.40784 12.8328 5.69765 12.8328 5.9933C12.8328 6.28894 12.7448 6.57875 12.5787 6.83025V6.83025Z"
                                    fill="#626C77" />
                            </svg>
                        </span>
                </div>
                <!-- Submit button -->
                <div class="password__name button__container flex center reser__button">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Сменить пароль') }}
                    </button>
                    <a href="{{ url('login') }}">
                        {{ __('Назад') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form.resetform'); // Выбираем форму с классом resetform
            if (form) {
                const passwordInput = document.getElementById('password');
                const passwordConfirmInput = document.getElementById('password-confirm');
                const errorSpan = document.createElement('span');
                errorSpan.classList.add('invalid-feedback');
                errorSpan.setAttribute('role', 'alert');
                const errorMessage = document.createElement('strong');
                errorMessage.textContent = 'Пароли не совпадают';
                errorSpan.appendChild(errorMessage);
                // Добавляем обработчик отправки формы
                form.addEventListener('submit', function(event) {
                    // Убираем предыдущую ошибку, если она была
                    const existingError = form.querySelector('.invalid-feedback');
                    if (existingError) {
                        existingError.remove();
                    }
                    // Проверяем, совпадают ли пароли
                    if (passwordInput.value !== passwordConfirmInput.value) {
                        // Останавливаем отправку формы
                        event.preventDefault();
                        // Добавляем ошибку под полем подтверждения пароля
                        passwordConfirmInput.classList.add('is-invalid');
                        passwordConfirmInput.parentElement.appendChild(errorSpan);
                    } else {
                        // Если пароли совпадают, убираем ошибку
                        passwordConfirmInput.classList.remove('is-invalid');
                    }
                });
                // Опционально: убираем ошибку при изменении поля
                passwordConfirmInput.addEventListener('input', function() {
                    if (passwordConfirmInput.value === passwordInput.value) {
                        passwordConfirmInput.classList.remove('is-invalid');
                        if (form.querySelector('.invalid-feedback')) {
                            form.querySelector('.invalid-feedback').remove();
                        }
                    }
                });
            }
        });
        </script>
@endsection
