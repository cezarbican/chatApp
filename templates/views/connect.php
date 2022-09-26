
<div class="container">
    <div style="float: right;">
        <form action="/" method="POST">
            <input type="submit" value="Logout" name="logout">
        </form>
        <a href="/">Connections</a>
    </div>

    <h2><span class="badge bg-secondary text-dark">You are connected with <?= strtoupper($to[0]["name"])?></span></h2><br><br>


<div class="container">

    <?php for($x = 0; $x < count($messages); $x++): ?>
        
    <?php if(intval($messages[$x]['fromUser']) === intval($_SESSION['userID'])): ?>

           <div class="row" >
                <span class="badge bg-info text-dark m-1" ><?= ucfirst($messages[$x]['message']) ?>
                    </br>
                    <small class="text-white">
                        Sent by <?= "You ". "  " . $messages[$x]['created'] ?>
                    </small>
                </span>
            </div>
            
            <?php else: ?>

            <div class="row">
                <span class="badge bg-warning text-dark m-1" ><?= ucfirst($messages[$x]['message']) ?>
                    </br>
                    <small class="text-white">
                        Sent by <?= strtoupper($to[0]['name'] ). "  " . $messages[$x]['created'] ?>
                    </small>
                </span>
            </div>

    <?php endif ?>
    <?php endfor ?>

</div>

<form id="form-2" action="/connect" method="POST">

    <input type="text" class="input" id="message" name="message" placeholder="Type message...">
    <button type="submit" name="sendMessage">Send</button>

</form>
</div>