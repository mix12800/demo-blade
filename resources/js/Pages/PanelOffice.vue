<template>
    <div class="block-panel">
        <div class="head-page-panel">
            <a
                href="Panel-orders.html"
                @click.prevent="changePage('PanelOrdersPage')"
                class=""
                >Заявки</a
            >
            <a href="#" class="active-head">Помещения</a>
            <div class="border-head"></div>
        </div>
        <div class="block-orders">
            <button class="btn btn-add btn-open-modal" @click="removeId()">
                Добавить Помещение +
            </button>
            <div class="panel-table">
                <table class="table-Conferences">
                    <tr>
                        <th>Фото</th>
                        <th>Название</th>
                        <th>Действие</th>
                    </tr>
                    <tr v-for="room in rooms">
                        <td><img :src="'storage/' + room.image" alt="" /></td>
                        <td>
                            <h3>{{ room.name }}</h3>
                        </td>
                        <td>
                            <button
                                class="btn btn-danger"
                                @click="delRoom(room.id)"
                            >
                                Удалить
                            </button>
                            <button
                                class="btn btn-form btn-open-modal"
                                @click="getRoom(room.id)"
                            >
                                Редактировать
                            </button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="modal-fon" id="modalAddRoom">
        <div class="modal">
            <h1 v-if="id_room">Редактировать комнату</h1>
            <h1 v-else>Добавить комнату</h1>
            <div class="mb-3">
                <label for="name" class="label-form">Название</label>
                <input
                    type="text"
                    id="name"
                    v-model="name"
                    class="input-form"
                    :class="{ 'error-input': errors.name }"
                    placeholder="Название"
                />
                <p v-if="errors.name" class="error-form">
                    {{ errors.name.join('. ') }}
                </p>
            </div>
            <div class="mb-3">
                <label for="image" class="label-form">Фото</label>
                <input
                    type="file"
                    id="image"
                    class="input-form"
                    :class="{ 'error-input': errors.image }"
                    placeholder="Фото"
                />
                <p v-if="errors.image" class="error-form">
                    {{ errors.image.join('. ') }}
                </p>
            </div>

            <template v-if="loading">
                <button class="btn btn-form w-100">
                    <span class="loading-btn"></span>
                    Отправка...
                </button>
            </template>
            <template v-else>
                <button class="btn btn-form w-100" @click="addRoom()">
                    Отправить
                </button>
            </template>
        </div>
    </div>
</template>
<script>
import room from '@/routes/room';

export default {
    name: 'PanelOffice',
    props: ['changePage', 'server'],

    data() {
        return {
            loading: false,
            errors: {},
            name: '',
            rooms: [],
            id_room: '',
        };
    },

    mounted() {
        this.getRooms();
    },

    methods: {
        removeId() {
            this.id_room = '';
            this.name = '';
        },

        getRooms() {
            this.server('room', 'GET')
                .then((result) => {
                    this.rooms = result.rooms;
                })
                .catch((error) => console.log('error', error));
        },

        getRoom(id) {
            this.server('room/' + id, 'GET')
                .then((result) => {
                    this.name = result.room.name;
                    this.id_room = result.room.id;
                })
                .catch((error) => console.log('error', error));
        },

        delRoom(id) {
            this.server('room/' + id, 'DELETE')
                .then((result) => {
                    this.id_room = '';
                    this.getRooms();
                })
                .catch((error) => console.log('error', error));
        },

        addRoom() {
            this.loading = true;
            let formdata = new FormData();
            formdata.append('name', this.name);
            let image = document.querySelector('#image');
            if (image.files[0]) {
                formdata.append('image', image.files[0]);
            }
            this.server(
                this.id_room ? 'room/' + this.id_room : 'room',
                this.id_room ? 'PATCH' : 'POST',
                formdata,
            )
                .then((result) => {
                    this.loading = false;
                    if (result.errors) {
                        this.errors = result.errors;
                    } else {
                        document.querySelector('#modalAddRoom').click();
                        this.getRooms();
                    }
                })
                .catch((error) => console.log('error', error));
        },
    },
};
</script>
