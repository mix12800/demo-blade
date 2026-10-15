<tr>
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
            class="btn btn-form btn-open-modal-edit">
            Редактировать
        </button>


    </td>
</tr>

<!-- <div class="modal-fon modalEditRoom">
    <div class="modal">
        <form action="{{ route('roomedit', [$room->id]) }}" method="post" enctype="multipart/form-data">
            <h1>Редактировать комнату</h1>
            <div class="mb-3">
                <label for="name" class="label-form">Название</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ $room->name }}"
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
                Сихранить
            </button>
        </form>

    </div>
</div> -->