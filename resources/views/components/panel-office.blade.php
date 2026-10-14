<div class="block-panel">
    <div class="head-page-panel">
        <a
            href="Panel-orders.html"
            class="active-head">Помещения</a>
        <a href="#">Заявки</a>
        <div class="border-head"></div>
    </div>
    {{ $rooms }}
    <div class="block-orders">
        <button class="btn btn-add btn-open-modal">
            Добавить Помещение +
        </button>
        <div class="panel-table">
            <table class="table-Conferences">
                <tr>
                    <th>Фото</th>
                    <th>Название</th>
                    <th>Действие</th>
                </tr>


                <tr>
                    <td><img src="" alt="" /></td>
                    <td>

                    </td>
                    <td>
                        <button
                            class="btn btn-danger">
                            Удалить
                        </button>
                        <button
                            class="btn btn-form btn-open-modal">
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
        <form action="room" method="post" enctype="multipart/form-data">
            <!-- <h1 v-if="id_room">Редактировать комнату</h1> -->
            <h1>Добавить комнату</h1>

            <div class="mb-3">
                <label for="name" class="label-form">Название</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    class="input-form"
                    placeholder="Название" />
                @error('name')
                <p class="error-form">
                    {{ $message }}
                </p>
                @enderror

            </div>
            <div class="mb-3">
                <label for="image" class="label-form">Фото</label>
                <input
                    type="file"
                    id="image"
                    name="image"
                    class="input-form"
                    placeholder="Фото" />
                @error('image')
                <p class="error-form">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <button type="submit" class="btn btn-form w-100">
                Отправить
            </button>
        </form>

    </div>
</div>