<?php

?>


<form method="post">
    <h1>HAllo <?php echo $name ?></h1>
    <div>
        <label for="first-name" class="form-label">First Name</label>
        <input type="text" id="first-name" class="form-control" name="firstName">
    </div>
    <div>
        <label for="last-name" class="form-label">Last Name</label>
        <input type="text" id="last-name" class="form-control" name="lastName">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>