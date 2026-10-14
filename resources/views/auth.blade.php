<!DOCTYPE html>
<html lang="en">

<x-head />

<body>
    <x-header />
    <div class="form">
        <form action="{{ route('auth') }}" method="post">
            <h1>Авторизация</h1>
            <div class="mb-3">
                <label for="login" class="label-form">Логин</label>
                <input
                    type="text"
                    id="login"
                    value="{{ old('login') }}"
                    name="login"
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
                    value="{{ old('password') }}"
                    name="password"
                    class="input-form"
                    placeholder="Пароль" />
                @error('password')
                <p class="error-form">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <button type="submit" class="btn btn-form w-100">Войти</button>

            <p class="link">
                Еще не зарегистрированы?
                <a
                    href="{{ route('index') }}">Регистрация</a>
            </p>
        </form>
    </div>
</body>

</html>