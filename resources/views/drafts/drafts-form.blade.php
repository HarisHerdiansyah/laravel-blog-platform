<!doctype html>
<html lang="en">
@include('partial.head')
@vite('resources/css/drafts-form.css')
<body>
@include('partial.nav')
<main>
    <h1 class="text-serif">{{ $mode }} Posts</h1>
    <form id="draft">
        <div class="form-control">
            <label for="category">Category:</label>
            <select name="category" id="category">
                <option value="-">-- select category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->category_id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-control">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title">
        </div>
        <div class="form-control">
            <label for="summary">Summary:</label>
            <textarea name="summary" id="summary"></textarea>
        </div>
        <div class="form-control">
            <label for="content">Content:</label>
            <textarea name="content" id="content"></textarea>
        </div>
        <div class="submit-btn-wrapper">
            <a href="{{ url()->previous() }}">
                <button id="back-btn" type="button">
                    <i class="fa-solid fa-chevron-left"></i>
                    Back
                </button>
            </a>
            <aside>
                <button id="draft-btn" type="submit" data-mode="draft">Save as Draft</button>
                <button id="publish-btn" type="submit" data-mode="published">Publish Now</button>
            </aside>
        </div>
    </form>
</main>
<script src="https://cdn.tiny.cloud/1/ifid6vr7lb2llrd20i2jeo25ymsrh0xs5yghv269f4vyqcfg/tinymce/8/tinymce.min.js"
        referrerpolicy="origin"
        crossorigin="anonymous"></script>
<script>
    tinymce.init({
        selector: 'textarea#content',
        plugins: 'code table lists',
        toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const draftForm = document.getElementById('draft');
        draftForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const status = e.submitter.getAttribute('data-mode');
            const category_id = document.getElementById('category').value;
            const title = document.getElementById('title').value;
            const summary = document.getElementById('summary').value;
            const content = tinymce.get('content').getContent();

            const payload = {
                category_id,
                title,
                summary,
                content,
                status
            };

            try {
                const response = await fetch('{{ route('drafts.store') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(payload)
                });
                if (!response.ok) {
                    const errorData = await response.json();
                    throw new Error(errorData.message || 'Failed to save the post.');
                }
                const responseData = await response.json();
                alert(responseData.message);
                window.location.href = '{{ route('drafts') }}';
            } catch (error) {
                alert('Error: ' + error.message);
            }
        });
    });
</script>

</body>
</html>
