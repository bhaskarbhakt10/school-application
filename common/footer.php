<?php

?>

<footer>

    <script src="<?php echo ROOT_URL; ?>assets/js/dependency/jquery.script.jQuery.js?q=<?php echo time(); ?>"></script>
    <script src="<?php echo ROOT_URL; ?>assets/js/dependency/script.bootstrap.js?q=<?php echo time(); ?>"></script>
    <script src="<?php echo ROOT_URL; ?>assets/js/defaults/defaults.js?q=<?php echo time(); ?>" type="module"></script>



    <!-- login -->

    <script src="<?php echo ROOT_URL; ?>assets/js/ajax/login/ajax.login.js?q=<?php echo time(); ?>" type="module"></script>
    <!-- login -->

    <?php
    if (session_status() === PHP_SESSION_ACTIVE) {



    ?>


        <script src="<?php echo ROOT_URL; ?>assets/js/ajax/pdf.js?q=<?php echo time(); ?>" type="module"></script>

        <!-- logout -->

        <script src="<?php echo ROOT_URL; ?>assets/js/ajax/logout/ajax.logout.js?q=<?php echo time(); ?>" type="module"></script>
        <!-- logout -->

    <?php

    }
    ?>






</footer>

</body>

</html>