<?php

?>


<form method="post" novalidate>
    <div>
        <label for="email" class="form-label">email</label>
        <input type="email" id="email" value="<?php echo isset($user) ? $user->email : '' ?>"  class="form-control <?php echo isset($user) && $user->hasError("email") ? ' is-invalid' : '' ?>" name="email">
        <div class="invalid-feedback">
            <?php echo isset($user) && $user->hasError("email") ?  $user->getFirstError("email") : "" ?>
        </div>
    </div>
    <div>
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" class="form-control" name="password">
    </div>
    <button type="submit" class="btn btn-primary">register</button>
</form>