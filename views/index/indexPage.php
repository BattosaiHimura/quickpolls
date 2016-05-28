<div>
    <h1>This is the Home Page!!!!</h1>
    <?php

    $user = UserQuery::create()->findByIduser(1);
    echo $user;

    echo "<br /><br /><br />";

    $user = UserQuery::create()->findByIduser(2);
    echo $user;

    echo "<br /><br /><br />";

    $user = Actual_pwdQuery::create()->findByIduser(1);
    echo $user;
    ?>
</div>