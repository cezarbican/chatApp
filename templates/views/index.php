
    <?php if($errors): ?>

        <div class="alert alert-warning text-center" role="alert">
            <?= $errors[0] ?>
        </div>

    <?php endif ?>

    <?php if($success): ?>

        <div class="alert alert-info text-center" role="alert">
            Registracion compleated, login to talk with peaople!
        </div>

    <?php endif ?>

    <div class="d-flex justify-content-center mt-2 mb-4">
        <div class="container shadow">

            <form action="/" method="POST">
                <div class="mb-3 mt-4">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" name="username" placeholder="Enter your email">
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter your password">
                </div>

                <button type="submit" class="btn btn-primary mb-4 " name="login">Login</button>
                <br>
                <a href="/register">Register here</a>
            </form>
        </div>
    </div>
