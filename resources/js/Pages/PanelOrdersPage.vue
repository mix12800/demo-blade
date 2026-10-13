<template>
    <div class="block-panel">
        <div class="head-page-panel">
            <a href="#" class="active-head">Заявки</a>
            <a
                href="Panel-office.html"
                @click.prevent="changePage('PanelOffice')"
                >Помещения</a
            >
            <div class="border-head">
                
            </div>
        </div>
        <div class="block-orders">
            <table class="table-Conferences">
                <tr>
                    <th>Помещение</th>
                    <th>Способ оплаты</th>
                    <th>Название</th>
                    <th>Начало</th>
                    <th>Отзыв</th>
                    <th>Статус</th>
                    <th>Действие</th>
                </tr>
                <template v-for="order in orders">
                    <OrderComponent :order="order" :server="server" />
                </template>
            </table>
        </div>
    </div>
</template>
<script>
import OrderComponent from '@/components/OrderComponent.vue';

export default {
    name: 'PanelOrdersPage',
    props: ['changePage', 'server'],

    data() {
        return {
            orders: [],
        };
    },

    mounted() {
        this.getOregs();
    },

    methods: {
        getOregs() {
            this.server('order', 'GET')
                .then((result) => {
                    this.orders = result.orders;
                })
                .catch((error) => console.log('error', error));
        },
    },

    components: {
        OrderComponent,
    },
};
</script>
