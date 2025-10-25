<!doctype html>
<html lang="en">
@include('partial.head')
@vite('resources/css/drafts.css')
<body>
@include('partial.nav')
<main class="main-content">
    <section class="draft-list">
        <div class="header">
            <h1 class="text-serif">Your Draft</h1>
            <a href="{{ route('drafts-form', ['mode' => 'add']) }}">
                <button class="add-draft-button text-serif">
                    <i class="fa-solid fa-plus"></i>
                    Create New Draft
                </button>
            </a>
        </div>
        <div class="posts">
            <div class="post">
                <article>
                    <h2 class="text-serif">Disini judul artikel nantinya</h2>
                    <p class="text-sans">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, similique?
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea, nisi!
                    </p>
                </article>
                <aside>
                    <div class="badge">STATUS</div>
                    <div class="action">
                        <a href="{{ route('drafts-form', ['mode' => 'edit']) }}">
                            <button id="edit-btn">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                        </a>
                        <button id="delete-btn">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <section class="draft-control">
        <form id="search-form">
            @csrf
            <div class="form-control">
                <input type="text" name="search" id="search" placeholder="Search draft..."/>
                <button type="submit">Search</button>
            </div>
        </form>
        <div class="form-select">
            <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="-">All</option>
                <option value="DRAFT">Draft</option>
                <option value="PUBLISHED">Published</option>
            </select>
        </div>
    </section>
</main>
</body>
</html>
