<div class="row">
    <div class="col-12">
        <form method="post" action="?page=errorSend">

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="text" class="form-control" name="email" placeholder="Wpisz email" value="<?= $user->getEmail()?>" readonly="readonly">
            </div>
            <div class="form-group">
                <label for="textarea">Opisz swój problem</label>
                <textarea id="textarea" class="form-control" name="text"  rows="20"></textarea>
            </div>
            <button type="submit" class="btn btn-primary buttonDefault buttonDark">Wyślij</button>

        </form>
    </div>
</div>

