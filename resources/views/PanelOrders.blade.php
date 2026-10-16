<!DOCTYPE html>
<html lang="en">

<x-head />

<body>
    <x-header />

    <div class="block-panel">
        <div class="head-page-panel">
            <a href="{{ route('index') }}" class="">Помещения</a>
            <a
                href="#" class='active-head'>Заявки</a>
            <div class="border-head"></div>
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

                @foreach ($orders as $order)
                <x-order :order="$order" />
                @endforeach

            </table>
        </div>
    </div>

    <x-script />
</body>

</html>