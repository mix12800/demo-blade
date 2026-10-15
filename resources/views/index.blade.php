<!DOCTYPE html>
<html lang="en">
<x-head />

<body>
    <x-header />

    @auth

    @if (Auth::user()->role == 'admin')

    <x-panel-office :roomss="$roomss" />

    @else

    <x-my-conferences :orders="$orders" />

    @endif

    @else
    <x-registration />

    @endauth

    <x-script />
</body>

</html>