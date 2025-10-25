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
            @include('partial.posts', ['posts' => $posts])
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
                <option value="all" {{ $filter === 'all' ? 'selected' : '' }}>All</option>
                <option value="draft" {{ $filter === 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ $filter === 'published' ? 'selected' : '' }}>Published</option>
            </select>
        </div>
    </section>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdown = document.getElementById('status');

        dropdown.addEventListener('change', function() {
            const selectedFilter = this.value;
            const url = new URL(window.location);
            url.searchParams.set('filter', selectedFilter);
            window.history.pushState({}, '', url);
            fetchPosts(selectedFilter);
        });

        function fetchPosts(filter) {
            fetch(`/drafts?filter=${filter}`, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
                .then(res => res.text())
                .then(html => {
                    document.querySelector('.posts').innerHTML = html;
                })
                .catch(err => console.error(err));
        }
    });
</script>

</body>
</html>
