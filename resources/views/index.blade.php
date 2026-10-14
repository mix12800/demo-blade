<!DOCTYPE html>
<html lang="en">
<x-head />

<body>
    <x-header />
    @auth
    @if (Auth::user()->role == 'admin')
    
    <x-panel-office :rooms="$rooms" />
    @else
    <x-my-conferences />
    @endif
    @else
    <x-registration />
    @endauth

    <script src="{{ asset('storage/js/script.js') }}"></script>

</body>

</html>