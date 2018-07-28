<?php
session_start();
session_unset(); 
session_destroy(); 
?>

<script>
    sessionStorage.clear();
    localStorage.clear();
</script>

<?php header('location: ../auth/login.php'); ?>
    
