<template>
    <HeaderComponent
        :changePage="changePage"
        :isAuthUser="isAuthUser"
        :logout="logout"
        :page="page"
        :user="user"
    />

    <AuthPage
        :changePage="changePage"
        :server="server"
        :loginUser="loginUser"
        v-if="page == 'AuthPage'"
    />
    <RegistrationPage
        :changePage="changePage"
        :server="server"
        :loginUser="loginUser"
        v-if="page == 'RegistrationPage'"
    />

    <OrderPage
        v-if="page == 'OrderPage'"
        :server="server"
        :changePage="changePage"
    />

    <PanelOrdersPage
        v-if="page == 'PanelOrdersPage'"
        :changePage="changePage"
        :server="server"
    />

    <PanelOffice
        v-if="page == 'PanelOffice'"
        :changePage="changePage"
        :server="server"
    />

    <MyConferencesPage v-if="page == 'MyConferencesPage'" :server="server" />
</template>
<script>
import HeaderComponent from './components/HeaderComponent.vue';
import AuthPage from './Pages/AuthPage.vue';
import MyConferencesPage from './Pages/MyConferencesPage.vue';
import OrderPage from './Pages/OrderPage.vue';
import PanelOffice from './Pages/PanelOffice.vue';
import PanelOrdersPage from './Pages/PanelOrdersPage.vue';
import RegistrationPage from './Pages/RegistrationPage.vue';

export default {
    name: 'App',

    data() {
        return {
            isAuthUser: false,
            page: localStorage.getItem('page') || 'AuthPage',
            APIserver: 'http://127.0.0.1:8000/api/',
            user: {},
        };
    },

    mounted() {
        if (localStorage.getItem('token')) {
            this.getUser();
            this.isAuthUser = true;
        }
    },

    methods: {
        changePage(page) {
            this.page = page;
            localStorage.setItem('page', page);
        },

        getUser() {
            this.server('user')
                .then((result) => {
                    this.user = result.user;
                    if (this.user.role == 'user') {
                        this.changePage('MyConferencesPage');
                    } else {
                        this.changePage('PanelOrdersPage');
                    }
                })
                .catch((error) => console.log('error', error));
        },

        logout() {
            localStorage.removeItem('token');
            this.user = {};
            this.changePage('AuthPage');
            this.isAuthUser = false;
        },

        loginUser(token) {
            localStorage.setItem('token', token);
            this.getUser();
            this.isAuthUser = true;
        },

        async server(route, method = 'GET', formdata = null) {
            let myHeaders = new Headers();
            myHeaders.append('Accept', 'application/json');
            myHeaders.append(
                'Authorization',
                'Bearer ' + localStorage.getItem('token'),
            );

            let requestOptions = {
                method: method,
                headers: myHeaders,
                redirect: 'follow',
            };

            if (method != 'GET') {
                requestOptions.body = formdata;
            }

            return await fetch(this.APIserver + route, requestOptions).then(
                (response) => {
                    if (response.status == 401) {
                        this.logout();
                    }
                    return response.json();
                },
            );
        },
    },

    components: {
        AuthPage,
        RegistrationPage,
        HeaderComponent,
        OrderPage,
        PanelOrdersPage,
        PanelOffice,
        MyConferencesPage,
    },
};
</script>
