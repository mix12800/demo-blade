<div class="form">

    <form action="{{ route('registration') }}" method="post">
        @csrf
        <h1>Регистрация</h1>
        <div class="mb-3">
            <label for="fio" class="label-form">ФИО</label>
            <input
                type="text"
                id="fio"
                name="fio"
                value="{{ old('fio') }}"
                class="input-form"
                placeholder="Фамилия имя отчество" />
            @error('fio')
            <p class="error-form">
                {{ $message }}
            </p>
            @enderror

        </div>
        <div class="mb-3">
            <label for="email" class="label-form">Адрес электронной почты</label>
            <input
                type="text"
                id="email"
                name="email"
                value="{{ old('email') }}"
                class="input-form"
                placeholder="ivan@email.com" />
            @error('email')
            <p class="error-form">
                {{ $message }}
            </p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="phone" class="label-form">Номер телефона</label>
            <input
                type="text"
                id="phone"
                name="phone"
                value="{{ old('phone') }}"
                class="input-form"
                placeholder="8(XXX)XXX-XX-XX" />
            @error('phone')
            <p class="error-form">
                {{ $message }}
            </p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="login" class="label-form">Логин</label>
            <input
                type="text"
                id="login"
                name="login"
                value="{{ old('login') }}"
                class="input-form"
                placeholder="Логин" />
            @error('login')
            <p class="error-form">
                {{ $message }}
            </p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="label-form">Пароль</label>
            <input
                type="password"
                id="password"
                name="password"
                class="input-form"
                placeholder="Пароль" />
            @error('password')
            <p class="error-form">
                {{ $message }}
            </p>
            @enderror
        </div>

        <button type="submit" class="btn btn-form w-100">
            Создать пользователя
        </button>


        <p class="link">
            Уже были зарегистрированы?
            <a href="{{ route('authPage') }}">Авторизация</a>
        </p>
    </form>
</div>