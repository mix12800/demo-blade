<template>
    <div class="block-Conferences">
        <h2>Мои заявки</h2>
        <div class="row-line"></div>
        <table class="table-Conferences">
            <tr>
                <th>Фото</th>
                <th>Помещение</th>
                <th>Способ оплаты</th>
                <th>Название</th>
                <th>Начало</th>
                <th>Статус</th>
                <th>Отзыв</th>
            </tr>
            <tr v-for="order in orders">
                <td><img :src="'storage/' + order.room.image" alt="" /></td>
                <td>{{ order.room.name }}</td>
                <td>{{ pay_method[order.pay] }}</td>
                <td>{{ order.name }}</td>
                <td>{{ new Date(order.date).toLocaleDateString('ru-RU') }}</td>
                <td>
                    <span class="status" :class="order.status">{{
                        status_name[order.status]
                    }}</span>
                </td>
                <td>
                    <template v-if="order.comment[0]">
                        <p v-if="order.comment[0].id">Отзыв отправлен</p>
                    </template>

                    <button
                        v-else
                        class="btn btn-form btn-open-modal"
                        :disabled="order.status != 'completed'"
                        @click="getOreg(order.id)"
                    >
                        Оставить
                    </button>
                </td>
            </tr>
        </table>
    </div>

    <div class="modal-fon" id="modalAddRoom">
        <div class="modal">
            <h1>Отзыв о проведенном мероприятии</h1>
            <div class="mb-3">
                <label for="comment" class="label-form">Текст</label>
                <textarea
                    name="comment"
                    id="comment"
                    v-model="comment"
                    class="input-form"
                    :class="{ 'error-input': errors.comment }"
                    placeholder="Ваш отзыв..."
                ></textarea>
                <p v-if="errors.comment" class="error-form">
                    {{ errors.comment.join('. ') }}
                </p>
            </div>

            <template v-if="loading">
                <button class="btn btn-form w-100">
                    <span class="loading-btn"></span>
                    Отправка...
                </button>
            </template>
            <template v-else>
                <button
                    class="btn btn-form w-100"
                    :disabled="!id_order"
                    @click="addComment()"
                >
                    Отправить
                </button>
            </template>
        </div>
    </div>
</template>
<script>
export default {
    name: 'MyConferencesPage',
    props: ['server'],

    data() {
        return {
            loading: false,
            orders: [],
            status_name: {
                new: 'Новая',
                active: 'Мероприятие назначено',
                completed: 'Завершено',
            },
            pay_method: {
                translation: 'Переводом СБП',
                cash: 'При очном посещении',
            },
            errors: {},
            comment: '',
            id_order: '',
        };
    },

    mounted() {
        this.getOregs();
    },

    methods: {
        getOregs() {
            this.server('myorder', 'GET')
                .then((result) => {
                    this.orders = result.orders;
                })
                .catch((error) => console.log('error', error));
        },

        getOreg(id) {
            this.server('order/' + id, 'GET')
                .then((result) => {
                    this.id_order = result.order.id;
                })
                .catch((error) => console.log('error', error));
        },

        addComment() {
            this.loading = true;
            let formdata = new FormData();
            formdata.append('comment', this.comment);
            formdata.append('order_id', this.id_order);
            this.server('comment', 'POST', formdata)
                .then((result) => {
                    this.loading = false;
                    if (result.errors) {
                        this.errors = result.errors;
                    } else {
                        this.errors = {};
                        this.comment = '';
                        this.getOregs()
                        document.querySelector('#modalAddRoom').click();
                    }
                })
                .catch((error) => console.log('error', error));
        },
    },
};
</script>
