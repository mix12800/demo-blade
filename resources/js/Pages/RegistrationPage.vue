<template>
   

    <div class="form">
        <h1>Регистрация</h1>
        <div class="mb-3">
            <label for="fio" class="label-form">ФИО</label>
            <input
                type="text"
                id="fio"
                v-model="fio"
                class="input-form"
                :class="{ 'error-input': errors.fio }"
                placeholder="Фамилия имя отчество"
            />
            <p v-if="errors.fio" class="error-form">
                {{ errors.fio.join('. ') }}
            </p>
        </div>
        <div class="mb-3">
            <label for="email" class="label-form"
                >Адрес электронной почты</label
            >
            <input
                type="email"
                id="email"
                v-model="email"
                class="input-form"
                :class="{ 'error-input': errors.email }"
                placeholder="ivan@email.com"
            />
            <p v-if="errors.email" class="error-form">
                {{ errors.email.join('. ') }}
            </p>
        </div>
        <div class="mb-3">
            <label for="phone" class="label-form">Номер телефона</label>
            <input
                type="text"
                id="phone"
                v-model="phone"
                class="input-form"
                :class="{ 'error-input': errors.phone }"
                placeholder="8(XXX)XXX-XX-XX"
            />
            <p v-if="errors.phone" class="error-form">
                {{ errors.phone.join('. ') }}
            </p>
        </div>
        <div class="mb-3">
            <label for="login" class="label-form">Логин</label>
            <input
                type="text"
                id="login"
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
            <label for="password" class="label-form">Пароль</label>
            <input
                type="password"
                id="password"
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
            <button class="btn btn-form w-100" @click="BtnReg()">
                Создать пользователя
            </button>
        </template>

        <p class="link">
            Уже были зарегистрированы?
            <a href="authorization.html" @click.prevent="changePage('AuthPage')"
                >Авторизация</a
            >
        </p>
    </div>
</template>
<script>


export default {
    name: 'RegistrationPage',
    props: ['changePage', 'server', 'loginUser'],

    data() {
        return {
            fio: '',
            email: '',
            phone: '',
            login: '',
            password: '',
            loading: false,
            errors: {},
        };
    },

    methods: {
        BtnReg() {
            this.loading = true;
            let formdata = new FormData();
            formdata.append('fio', this.fio);
            formdata.append('email', this.email);
            formdata.append('phone', this.phone);
            formdata.append('login', this.login);
            formdata.append('password', this.password);
            this.server('registration', 'POST', formdata)
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
