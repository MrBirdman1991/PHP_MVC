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
        <input type="password" id="password" value="<?php echo isset($user) ? $user->password : '' ?>"  class="form-control <?php echo isset($user) && $user->hasError("password") ? ' is-invalid' : '' ?>" class="form-control" name="password">
        <div class="invalid-feedback">
            <?php echo isset($user) && $user->hasError("password") ?  $user->getFirstError("password") : "" ?>
        </div>
    </div>
    <div>
        <label for="password-repeat" class="form-label">Password Repeat</label>
        <input type="password" id="password-repeat" value="<?php echo isset($user) ? $user->passwordRepeat : '' ?>"  class="form-control <?php echo isset($user) && $user->hasError("passwordRepeat") ? ' is-invalid' : '' ?>" class="form-control" name="passwordRepeat">
        <div class="invalid-feedback">
            <?php echo isset($user) && $user->hasError("passwordRepeat") ?  $user->getFirstError("passwordRepeat") : "" ?>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">register</button>
</form>