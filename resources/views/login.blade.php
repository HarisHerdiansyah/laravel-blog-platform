<!doctype html>
<html lang="en">
@include('partial.head')
@vite('resources/css/auth.css')
<body>
<main>
    <section>
        <h1 class="text-serif">Blog Platform | Login</h1>
        <form>
            <div class="form-control">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required />
            </div>
            <div class="form-control">
                <label for="password">Password:</label>
                <input type="email" name="email" id="email" required/>
            </div>
            <a href="{{ route('register-form') }}">I don't have any account yet</a>
            <button type="submit">
                Login
            </button>
        </form>
    </section>
</main>

</body>
</html>
