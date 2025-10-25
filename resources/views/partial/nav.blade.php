@vite('resources/css/nav.css')
<nav>
    <h1>Blogger</h1>
    <aside>
        <div class="avatar">
            <i class="fa-solid fa-user"></i>
        </div>
        <div class="popover">
            @if(auth()->check())
                <ul>
                    <li>
                        <a href="{{ route('home') }}">
                            <i class="fa-solid fa-house"></i>Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('drafts', ['filter' => 'all']) }}">
                            <i class="fa-solid fa-newspaper"></i>Drafts
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}">
                            <i class="fa-solid fa-user"></i>Profile
                        </a>
                    </li>
                </ul>
                <div style="padding: 0.5rem">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button id="logout-btn" type="submit">
                            <i class="fa-solid fa-right-from-bracket"></i>Logout
                        </button>
                    </form>
                </div>
            @else
                <div style="padding: 0.5rem">
                    <a href="{{ route('login-form') }}">
                        <button id="login-btn">
                            <i class="fa-solid fa-right-to-bracket"></i>Login
                        </button>
                    </a>
                </div>
            @endif
        </div>
    </aside>
</nav>
<script>
    const avatar = document.querySelector('.avatar');
    const popover = document.querySelector('.popover');

    avatar.addEventListener('click', () => {
        popover.classList.toggle('visible');
    });
</script>
