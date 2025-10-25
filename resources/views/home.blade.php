<!doctype html>
<html lang="en">
@include('partial.head')
@vite('resources/css/home.css')
<body>
@include('partial.nav')
<main>
    <section class="posts">
        <div class="post">
            <article>
                <a href="{{ url('/posts') . '/' . '@username' . '/' . 'post-slug' }}">
                    <h2 class="text-serif">Disini judul artikel nantinya</h2>
                </a>
                <p class="text-sans">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, similique?
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea, nisi!
                </p>
            </article>
        </div>
    </section>
    <section class="controller">
        <form id="search-form">
            @csrf
            <div class="form-control">
                <input type="text" name="search" id="search" placeholder="Search posts..." />
                <button type="submit">Search</button>
            </div>
        </form>
        <div class="form-select">
            <label for="category">Category:</label>
            <select name="category" id="category">
                <option value="-">All</option>
                <option value="AI">AI</option>
                <option value="Blockchain">Blockchain</option>
            </select>
        </div>
    </section>
</main>
</body>
</html>
