<?php
    $id=isset($_GET['id']) ? $_GET['id']:'';
    if(isset($_SESSION['from'])){
        unset($_SESSION['from']);
        unset($_SESSION['to']);
        unset($_SESSION['number']);
        unset($_SESSION['tong']);
        unset($_SESSION['nut']);
        unset($_SESSION['type']);
    }
    if(isset($_SESSION['from1'])){
        unset($_SESSION['from1']);
        unset($_SESSION['to1']);
        unset($_SESSION['number1']);
        unset($_SESSION['tong1']);
        unset($_SESSION['nut1']);
        unset($_SESSION['type1']);
    }
    if($_GET['type']=='home'){
        echo"<script>document.location.href='index.php' </script>";
    }
    else{
        echo"<script>document.location.href='index.php?com=blocksim&cata_id=".$id."' </script>";
    }
?>