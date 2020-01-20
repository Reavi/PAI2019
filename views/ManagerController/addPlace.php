<?php include('common/header.php'); ?>
    <div class="row" style="margin-top:3em;">
        <div class="col-sm-3">

        </div>
        <div class="col-sm-6">
            <form method="post" action="?page=sendmailplace">
                <div class="form-group">
                    <label for="exampleInputEmail1">Adres Email</label>
                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Powtórz adres Email</label>
                    <input type="email" class="form-control" name="email2" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Example select</label>
                    <select class="form-control" name="userSelect">
                        <option value="0" selected disabled hidden>Choose here</option>
                        <?php
                        if(isset($users)){
                            foreach($users as $user) {
                                $option=$user["IdUser"].". ".$user["imie"]." ".$user["nazwisko"];
                                echo "<option>$option</option>";
                            }
                        }
                        ?>

                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Załóż konto</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?php
            if(isset($messages)){
                foreach($messages as $message) {
                    echo "<div class=\"napisRed\">$message</div>";
                }
            }
            ?>
        </div>
    </div>
<?php include('common/footer.php'); ?>




