<template>
    <div class="form">
        <h1>Авторизация</h1>
        <div class="mb-3">
            <label for="fio" class="label-form">Логин</label>
            <input
                type="text"
                id="fio"
                v-model="login"
                :class="{ 'error-input': errors.login }"
                class="input-form"
                placeholder="Логин"
            />
            <p v-if="errors.login" class="error-form">
                {{ errors.login.join('. ') }}
            </p>
        </div>
        <div class="mb-3">
            <label for="fio" class="label-form">Пароль</label>
            <input
                type="password"
                id="fio"
                v-model="password"
                class="input-form"
                :class="{ 'error-input': errors.password }"
                placeholder="Пароль"
            />
            <p v-if="errors.password" class="error-form">
                {{ errors.password.join('. ') }}
            </p>
        </div>

        <template v-if="loading">
            <button class="btn btn-form w-100">
                <span class="loading-btn"></span>
                Отправка...
            </button>
        </template>
        <template v-else>
            <button class="btn btn-form w-100" @click="btnAuth()">Войти</button>
        </template>
        <p class="link">
            Еще не зарегистрированы?
            <a
                href="Registration.html"
                @click.prevent="changePage('RegistrationPage')"
                >Регистрация</a
            >
        </p>
    </div>
</template>
<script>
export default {
    name: 'AuthPage',
    props: ['server', 'loginUser', 'changePage'],

    data() {
        return {
            loading: false,
            login: '',
            password: '',
            errors: {},
        };
    },

    methods: {
        btnAuth() {
            this.loading = true;
            let formdata = new FormData();
            formdata.append('login', this.login);
            formdata.append('password', this.password);
            this.server('auth', 'POST', formdata)
                .then((result) => {
                    this.loading = false;
                    if (result.errors) {
                        this.errors = result.errors;
                    } else {
                        this.loginUser(result.token);
                    }
                })
                .catch((error) => console.log('error', error));
        },
    },
};
</script>
