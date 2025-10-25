@vite('resources/css/nav.css')
<nav>
    <h1>Blogger</h1>
    <aside>
        <div class="avatar">
            <i class="fa-solid fa-user"></i>
        </div>
        <div class="popover">
            <ul>
                <li>
                    <a href="{{ route('home') }}">
                        <i class="fa-solid fa-house"></i>Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('drafts') }}">
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
                <button id="logout-btn">
                    <i class="fa-solid fa-right-from-bracket"></i>Logout
                </button>
            </div>
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
