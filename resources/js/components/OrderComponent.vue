<template>
    <tr>
        <td>{{ order.room.name }}</td>
        <td>{{ pay_method[order.pay] }}</td>
        <td>{{ order.name }}</td>
        <td>{{ new Date(order.date).toLocaleDateString('ru-RU') }}</td>
        <td class="textwar">
            {{ order.comment[0] ? order.comment[0].comment : '-----' }}
        </td>
        <td>
            <select class="select-status" v-model="order.status">
                <option value="new" :selected="order.status == 'new'">
                    Новая
                </option>
                <option value="active" :selected="order.status == 'active'">
                    Мероприятие назначено
                </option>
                <option
                    value="completed"
                    :selected="order.status == 'completed'"
                >
                    Завершено
                </option>
            </select>
        </td>
        <td>
            <template v-if="loading">
                <button class="btn btn-form p-05">
                    <span class="loading-btn"></span>
                    Сохранить
                </button>
            </template>
            <template v-else>
                <button class="btn btn-form p-05" @click="updateOrder()">
                    Сохранить
                </button>
            </template>
        </td>
    </tr>
</template>
<script>
export default {
    name: 'OrderComponent',
    props: ['order', 'server'],
    data() {
        return {
            loading: false,
            pay_method: {
                translation: 'Переводом СБП',
                cash: 'При очном посещении',
            },
        };
    },

    methods: {
        updateOrder() {
            this.loading = true;
            let formdata = new FormData();
            formdata.append('status', this.order.status);
            this.server('order/' + this.order.id, 'PATCH', formdata)
                .then((result) => {
                    this.loading = false;
                })
                .catch((error) => console.log('error', error));
        },
    },
};
</script>
