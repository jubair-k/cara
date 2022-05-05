<?php
    
    function beastSeller(){
        require "connect.php";
        $best_sell="SELECT * FROM product WHERE best_seller=:bs LIMIT 0,8";
        $stmt=$pdo->prepare($best_sell);
        $stmt->execute(['bs'=>1]);
        $bestSell=$stmt->fetchAll();
        return $bestSell;
    }

    function newArrivels(){
        require "connect.php";
        $new_arrivel="SELECT * FROM product WHERE best_seller=:bs ORDER BY id DESC LIMIT 0,8";
        $stmt=$pdo->prepare($new_arrivel);
        $stmt->execute(['bs'=>0]);
        $newArrivel=$stmt->fetchAll();
        return $newArrivel;
    }


?>