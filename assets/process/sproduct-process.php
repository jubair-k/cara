<?php
    require "connect.php";
    if(isset($_POST)){
        $result=array();
        if(isset($_POST['pages']) && $_POST['pages']=="sproduct"){
            $selct_prdct="SELECT product.id,product.product_name,product.description,product.image,product.meta_title,
            product.mrp,product.price,product.qty,product.categories_id,product.sub_categories_id,sub_categories.sub_categories FROM product
            INNER JOIN sub_categories ON sub_categories.id=product.sub_categories_id WHERE product.id=:prdct";
            $stmt=$pdo->prepare($selct_prdct);
            $stmt->execute(array('prdct'=>$_POST['product']));
            $result['prdct']=$stmt->fetch();
            $category=$result['prdct']->categories_id;

            $sel_feturd="SELECT * FROM product WHERE id!=:prdctid AND categories_id=:categ LIMIT 0,4";
            $stmt=$pdo->prepare($sel_feturd);
            $stmt->execute(array('prdctid'=>$_POST['product'],'categ'=>$category));
            $result['featured']=$stmt->fetchAll();
        }

        echo json_encode($result);
    }

?>