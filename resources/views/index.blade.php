<!DOCTYPE html>
<html lang="en">
<x-head />

<body>
    @auth
    <x-my-conferences />
    @else
    <x-registration />
    @endauth
</body>

</html>