
    <?php if($errors): foreach($errors as $error):?>

        <div class="alert alert-warning text-center" role="alert">
            <?= $error ?>
        </div>

    <?php endforeach; endif ?>

    <div class="d-flex justify-content-center mt-2 mb-4">
        <div class="container shadow">

            <form action="/register" method="POST">
                <div class="mb-3 mt-4">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter your email">
                </div>
                <div class="mb-3 mt-4">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter your name">
                </div>
                <div class="mb-3 mt-4">
                    <label class="form-label">Password</label>
                    <input type="text" class="form-control" name="password" placeholder="Enter your password">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password confirm</label>
                    <input type="password" class="form-control" name="passwordc" placeholder="Confirm your password">
                </div>

                <button type="submit" class="btn btn-primary mb-4 " name="register">Register</button>
                <br>
                 <a href="/">Login here</a>
            </form>
        </div>
    </div>
