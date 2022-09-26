
<div class="container text-center">
    <h1>Hello <?= strtoupper($_SESSION['userName']) ?></h1>
    <div class="row">
        <h3>Connect with</h3>
    <?php for($x = 0; $x < count($users); $x++): if($users[$x]['userEmail'] !== $_SESSION['user']):?>

        <div class="col-4 shadow border p-2">

            <form action="/connect" method="POST">
                <button value="<?= $users[$x]['id'] ?>" name="userConnect" style="text-decoration: none;">
                    <h3 class="card-title text-secondary">
                        <?= strtoupper($users[$x]['name']) ?>
                    </h3>
                </button>
            </form>
        </div>

        <?php endif; endfor; ?>
    </div>
</div>
