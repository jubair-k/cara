<?php
    require "connect.php";
    if(isset($_POST)){
        $result=array();
        if(isset($_POST['page']) && $_POST['page']=="shop"){
            $stmt=$pdo->query("SELECT * FROM product WHERE status=1 ORDER BY id DESC LIMIT 0,10");
            $result['prdct']=$stmt->fetchAll();

            $stmt=$pdo->query("SELECT * FROM categories WHERE status=1");
            $result['categ']=$stmt->fetchAll();

            $stmt=$pdo->query("SELECT DISTINCT sub_categories,id FROM sub_categories WHERE status=1");
            $result['allsubcateg']=$stmt->fetchAll();

            $stmt=$pdo->query("select * from product WHERE status=1");
            $rowCount=$stmt->rowCount();
            $pages=ceil($rowCount/10);
            $result['count']=$pages;
        }    

        if(isset($_POST['fun']) && $_POST['fun']=="categfilter"){
            $sel_subcateg="SELECT id,sub_categories FROM sub_categories WHERE categories_id=:categid AND status=1";
            $stmt=$pdo->prepare($sel_subcateg);
            $stmt->execute(array('categid'=>$_POST['categid']));
            $result['subcateg']=$stmt->fetchAll();
        }    

        echo json_encode($result);

    }
?>