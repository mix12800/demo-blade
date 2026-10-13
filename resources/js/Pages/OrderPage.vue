<template>
    <div class="form-order">
        <h1>Формирование заявки</h1>
        <div class="mb-3">
            <label for="name" class="label-form">Названи конференции</label>
            <input
                type="text"
                id="name"
                v-model="name"
                class="input-form"
                :class="{ 'error-input': errors.name }"
                placeholder="Названи конференции"
            />
            <p v-if="errors.name" class="error-form">
                {{ errors.name.join('. ') }}
            </p>
        </div>
        <div class="mb-3">
            <label for="date" class="label-form">Дата проведения</label>
            <input
                type="date"
                id="date"
                v-model="date"
                class="input-form"
                :class="{ 'error-input': errors.date }"
            />
            <p v-if="errors.date" class="error-form">
                {{ errors.date.join('. ') }}
            </p>
        </div>
        <div class="mb-3">
            <label for="Room" class="label-form">Помещение</label>
            <select
                name="Room"
                v-model="room_id"
                id="Room"
                class="select-form"
                :class="{ 'error-input': errors.room_id }"
            >
                <option v-for="room in rooms" :value="room.id">
                    {{ room.name }}
                </option>
            </select>
            <p v-if="errors.room_id" class="error-form">
                {{ errors.room_id.join('. ') }}
            </p>
        </div>
        <div class="mb-2">
            <label for="pay" class="label-form">Выбирите cпособ оплаты</label>
        </div>
        <div class="mb-3">
            <input
                type="radio"
                id="pay-1"
                v-model="pay"
                value="cash"
                name="pay"
                class="sheck-form"
            />
            <label for="pay-1" class="sheck-label-form"
                >При очном посещении</label
            >
            <input
                type="radio"
                id="pay-2"
                v-model="pay"
                value="translation"
                name="pay"
                class="sheck-form"
            />
            <label for="pay-2" class="sheck-label-form">Переводом СБП</label>
            <p v-if="errors.pay" class="error-form mt-2">
                {{ errors.pay.join('. ') }}
            </p>
        </div>

        <template v-if="loading">
            <button class="btn btn-form w-100">
                <span class="loading-btn"></span>
                Отправка...
            </button>
        </template>
        <template v-else>
            <button class="btn btn-form w-100" @click="CreasteOrder()">
                Отправить
            </button>
        </template>
    </div>
</template>
<script>
export default {
    name: 'OrderPage',
    props: ['server', 'changePage'],

    data() {
        return {
            loading: false,
            rooms: [],
            name: '',
            date: '',
            room_id: '',
            pay: '',
            errors: {},
        };
    },

    mounted() {
        this.getRooms();
    },

    methods: {
        getRooms() {
            this.server('room', 'GET')
                .then((result) => {
                    this.rooms = result.rooms;
                })
                .catch((error) => console.log('error', error));
        },

        CreasteOrder() {
            this.loading = true;
            let formdata = new FormData();
            formdata.append('name', this.name);
            formdata.append('date', this.date);
            formdata.append('room_id', this.room_id);
            formdata.append('pay', this.pay);
            this.server('order', 'POST', formdata)
                .then((result) => {
                    this.loading = false;
                    if (result.errors) {
                        this.errors = result.errors;
                    } else {
                        this.changePage('MyConferencesPage');
                    }
                })
                .catch((error) => console.log('error', error));
        },
    },
};
</script>
