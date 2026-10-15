<!DOCTYPE html>
<html lang="en">

<x-head />

<body>
    <x-header />

    <div class="form-order">
        <form action="{{ route('OrderCreate') }}" method="post">
            <h1>Формирование заявки</h1>
            <div class="mb-3">
                <label for="name" class="label-form">Названи конференции</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old("name") }}"
                    class="input-form"
                    placeholder="Названи конференции" />
                @error('name')
                <p class="error-form">
                    {{ $message }}
                </p>
                @enderror

            </div>
            <div class="mb-3">
                <label for="date" class="label-form">Дата проведения</label>
                <input
                    type="date"
                    id="date"
                    value="{{ old('date') }}"
                    name="date"
                    class="input-form" />
                @error('date')
                <p class="error-form">
                    {{ $message }}
                </p>
                @enderror

            </div>
            <div class="mb-3">
                <label for="room" class="label-form">Помещение</label>
                <select
                    id="room"
                    name="room_id"
                    class="select-form">
                    @foreach ($roomss as $room)
                    <option value="{{ $room->id }}">
                        {{ $room->name }}
                    </option>
                    @endforeach
                </select>
                @error('room')
                <p class="error-form">
                    {{ $message }}
                </p>
                @enderror

            </div>
            <div class="mb-2">
                <label for="pay" class="label-form">Выбирите cпособ оплаты</label>
            </div>
            <div class="mb-3">
                <input
                    type="radio"
                    id="pay-1"
                    value="cash"
                    name="pay"
                    class="sheck-form" />
                <label for="pay-1" class="sheck-label-form">При очном посещении</label>
                <input
                    type="radio"
                    id="pay-2"
                    value="translation"
                    name="pay"
                    class="sheck-form" />
                <label for="pay-2" class="sheck-label-form">Переводом СБП</label>
                @error('pay')
                <p class="error-form mt-2">
                    {{ $message }}
                </p>
                @enderror

            </div>

            <button type="submit" class="btn btn-form w-100">
                Отправить
            </button>
        </form>

    </div>

    <x-script />
</body>

</html>