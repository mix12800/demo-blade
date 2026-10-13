<!DOCTYPE html>
<html lang="en">

<x-head />

<body>
    <div class="form">
        <h1>Авторизация</h1>
        <div class="mb-3">
            <label for="fio" class="label-form">Логин</label>
            <input
                type="text"
                id="fio"
                class="input-form"
                placeholder="Логин" />

        </div>
        <div class="mb-3">
            <label for="fio" class="label-form">Пароль</label>
            <input
                type="password"
                id="fio"
                class="input-form"
                placeholder="Пароль" />
            <p class="error-form">

            </p>
        </div>

        <button class="btn btn-form w-100">Войти</button>

        <p class="link">
            Еще не зарегистрированы?
            <a
                href="Registration.html">Регистрация</a>
        </p>
    </div>
</body>

</html>