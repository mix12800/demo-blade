<header>
    <h2>
        <a href="{{ route('index') }}" class="name">Конференции.РФ</a>
    </h2>
    <div class="block-link">
        @auth
        @if (Auth::user()->role == 'user')
        <a
            href="{{ route('index') }}"
            class="link">Мои заявки</a>
        <a
            href="{{ route('OrderPage') }}"
            class="link">Сформировать заявку</a>
        @endif
        @endauth

    </div>

    @auth
    <form action="{{ route('logout') }}" method="get">
        <button type="submit" class="btn btn-logout">
            Выход
        </button>
    </form>
    @endauth

</header>