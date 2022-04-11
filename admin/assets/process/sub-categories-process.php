<?php
    session_start();
    include 'connection.php';

    if(isset($_POST)){
        if(isset($_POST['loadCategoriesId']) && !empty($_POST['loadCategoriesId'])){
            $stmt=$pdo->query("SELECT * FROM categories WHERE status=1");
            $array['categs']=$stmt->fetchAll();
        }

        if(isset($_POST['subcategname']) && !empty($_POST['subcategname'])){
            $chk_exist="SELECT * FROM sub_categories WHERE categories_id=:selcateg AND  sub_categories=:subcateg";
            $stmt=$pdo->prepare($chk_exist);
            $stmt->execute(['selcateg'=>$_POST['categselect'],'subcateg'=>$_POST['subcategname']]);
            $chk_count=$stmt->rowCount();
            if($chk_count==0){
                $inst_subcateg="INSERT INTO sub_categories(categories_id,sub_categories,status) VALUES(:slecateg,:subcateg,:st)";
                $stmt=$pdo->prepare($inst_subcateg);
                $stmt->execute(['slecateg'=>$_POST['categselect'],'subcateg'=>$_POST['subcategname'],'st'=>1]);
                $array="ok";    
            }
            else{
                $array['exist']="sub category already exist";
            }
        }

        if(isset($_POST['saveSubcategories']) && !empty($_POST['saveSubcategories'])){
            $chk_exist="SELECT * FROM sub_categories WHERE sub_categories=:subcateg AND categories_id=:selcateg AND id!=:subcategid";
            $stmt=$pdo->prepare($chk_exist);
            $stmt->execute(['subcateg'=>$_POST['subcategsavename'],'selcateg'=>$_POST['savecategsel'],'subcategid'=>$_POST['subcategsave']]);
            $chk_count=$stmt->rowCount();
            if($chk_count==0){
                $updt_categ="UPDATE sub_categories SET sub_categories=:ssubacateg,categories_id=:sselcateg WHERE id=:ssubcategid";
                $stmt=$pdo->prepare($updt_categ);
                $stmt->execute(['ssubacateg'=>$_POST['subcategsavename'],'sselcateg'=>$_POST['savecategsel'],'ssubcategid'=>$_POST['subcategsave']]);
                $array="ok";    
            }
            else{
                $array['exist']="sub category already exist";
            }
        }


        if(isset($_POST['loadSubCategories']) && !empty($_POST['loadSubCategories'])){
            $stmt=$pdo->query("SELECT categories.categories,sub_categories.id,sub_categories.sub_categories,sub_categories.status,sub_categories.categories_id FROM sub_categories
            INNER JOIN categories ON categories.id=sub_categories.categories_id");
            $array['subcategs']=$stmt->fetchAll();
        }

        if(isset($_POST['deletesubcateg']) && !empty($_POST['deletesubcateg'])){
            $dlt_subcateg="DELETE FROM sub_categories WHERE id=:subcategid";
            $stmt=$pdo->prepare($dlt_subcateg);
            $stmt->execute(['subcategid'=>$_POST['subcateg']]);
            $array="success";
        }

        if(isset($_POST['deactivesubcateg']) && !empty($_POST['deactivesubcateg'])){
            $deact_subcateg="UPDATE sub_categories SET status=:subcategst WHERE id=:subcategid";
            $stmt=$pdo->prepare($deact_subcateg);
            $stmt->execute(['subcategst'=>0,'subcategid'=>$_POST['subcateg']]);
            $array="success";
        }

        if(isset($_POST['activesubcateg']) && !empty($_POST['activesubcateg'])){
            $act_subcateg="UPDATE sub_categories SET status=:subcategst WHERE id=:subcategid";
            $stmt=$pdo->prepare($act_subcateg);
            $stmt->execute(['subcategst'=>1,'subcategid'=>$_POST['subcateg']]);
            $array="success";
        }







        echo json_encode($array);
    }




?>