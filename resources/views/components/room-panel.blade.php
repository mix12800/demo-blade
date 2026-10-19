<div class="br">
    <tr class="tr">
        <td><img src="{{ asset('storage/'.$room->image) }}" alt="" /></td>
        <td>
            <h3>{{ $room->name }}</h3>
        </td>
        <td class="row">


            <form action="{{ route('roomdel', [$room->id]) }}" method="get">
                <button
                    type="submit"
                    class="btn btn-danger">
                    Удалить
                </button>
            </form>

            <button
                class="btn btn-form btn-open-modal-edit" data-name="{{ $room->name }}" data-id="{{ $room->id }}">
                Редактировать
            </button>

        </td>
    </tr>

</div>