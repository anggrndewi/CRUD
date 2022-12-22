
<?php
session_start();

session_unset();

session_destroy();

echo "<script>
alert('Berhasil Logout');
location.href='login_admin.php';
</script>
"
?>

</body>
</html>
