<template>
    <header>
        <h2>
            <a href="#" class="name">Конференции.РФ</a>
        </h2>
        <div class="block-link">
            <template v-if="isAuthUser">
                <template v-if="user.role == 'user'">
                    <a
                        href="Conferences.html"
                        @click.prevent="changePage('MyConferencesPage')"
                        class="link"
                        :class="{ 'link-active': page == 'MyConferencesPage' }"
                        >Мои заявки</a
                    >
                    <a
                        href="Order.html"
                        class="link"
                        @click.prevent="changePage('OrderPage')"
                        :class="{ 'link-active': page == 'OrderPage' }"
                        >Сформировать заявку</a
                    >
                </template>
            </template>
        </div>
        <button v-if="isAuthUser" class="btn btn-logout" @click="logout()">
            Выход
        </button>
    </header>
</template>
<script>
export default {
    name: 'HeaderComponent',
    props: ['changePage', 'isAuthUser', 'logout', 'page', 'user'],
};
</script>
