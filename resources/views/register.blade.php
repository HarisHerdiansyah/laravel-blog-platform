<!doctype html>
<html lang="en">
@include('partial.head')
@vite('resources/css/auth.css')
<body>
<main>
    <section>
        <h1 class="text-serif">Blog Platform | Register</h1>
        <form>
            <div class="form-control">
                <label for="fullname">Fullname:</label>
                <input type="text" name="fullname" id="fullname" required />
            </div><div class="form-control">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required />
            </div><div class="form-control">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required />
            </div>
            <div class="form-control">
                <label for="password">Password:</label>
                <input type="email" name="email" id="email" required/>
            </div>
            <a href="{{ route('login-form') }}">I already have an account</a>
            <button type="submit">
                Register
            </button>
        </form>
    </section>
</main>

</body>
</html>
