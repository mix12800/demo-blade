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
        @foreach ($orders as $order)
        <tr>
            <td><img src="{{ asset('storage/'.$order->room->image ) }}" alt="" /></td>
            <td> {{ $order->room->name }} </td>
            <td> {{ $order->pay }} </td>
            <td> {{ $order->name }} </td>
            <td> {{ $order->date }} </td>
            <td>
                <span class="status">{{ $order->status }}</span>
            </td>
            <td>
                <!-- <p>Отзыв отправлен</p> -->
                <button
                    class="btn btn-form btn-open-modal" @if ($order->status != 'completed')
                    disabled
                    @endif>
                    Оставить
                </button>
            </td>
        </tr>
        @endforeach

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

                class="input-form"

                placeholder="Ваш отзыв..."></textarea>
            <p class="error-form">

            </p>
        </div>


        <button
            class="btn btn-form w-100"
            :disabled="!id_order"
            @click="addComment()">
            Отправить
        </button>

    </div>
</div>