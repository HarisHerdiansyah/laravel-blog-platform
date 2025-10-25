@foreach($posts as $post)
    <div class="post">
        <article>
            <h2 class="text-serif">{{ $post->title }}</h2>
            <p class="text-sans">
                {{ $post->summary }}
            </p>
        </article>
        <aside>
            <div class="badge">{{ $post->status }}</div>
            <div class="action">
                <a href="{{ route('drafts-form', ['mode' => 'edit', 'postId' => $post->post_id]) }}">
                    <button id="edit-btn">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                </a>
                <form action="{{ route('drafts-form.destroy', ['postId' => $post->post_id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button id="delete-btn" type="submit">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
            </div>
        </aside>
    </div>
@endforeach
