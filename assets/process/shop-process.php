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
        
        if(isset($_POST['fun']) && $_POST['fun']=="pagination"){
            $rows_inPage=10;
            $pageNumber=$_POST['page']*$rows_inPage;
            $filter_query="SELECT * FROM product WHERE status=1";

            if(isset($_POST['categ']) && !empty($_POST['categ'])){
                $filter_query.=" AND categories_id=".$_POST['categ'];
            }
            if(isset($_POST['subcateg']) && !empty($_POST['subcateg'])){
                $subcategories=$_POST['subcateg'];
                $filter_query.=" AND sub_categories_id IN ($subcategories)";
            }
            if(isset($_POST['sortby']) && !empty($_POST['sortby'])){
                $sort_by=$_POST['sortby'];
                if($sort_by == 'new' || $sort_by == '0') {
                    $filter_query.=" ORDER BY id DESC";
                } else if($sort_by == 'low') {
                    $filter_query.=" ORDER BY price ASC";
                } else if($sort_by == 'high') {
                    $filter_query.=" ORDER BY price DESC";
                }
            } else {
                $filter_query.=" ORDER BY id DESC";
            }	
            $filter_query.=" LIMIT $pageNumber,10";
            $stmt=$pdo->query($filter_query);
            $result['prdct']=$stmt->fetchAll();
        }

        if(isset($_POST['fun']) && $_POST['fun']=="resetfilter"){
            $stmt=$pdo->query("SELECT DISTINCT sub_categories,id FROM sub_categories WHERE status=1");
            $result['allsubcateg']=$stmt->fetchAll();
        }

        if(isset($_POST['fun']) && $_POST['fun']=="applayfilter"){
            $filter_query="SELECT * FROM product WHERE status=1";
            if(isset($_POST['categ']) && !empty($_POST['categ'])){
                $filter_query.=" AND categories_id=".$_POST['categ'];
            }
            if(isset($_POST['subcateg']) && !empty($_POST['subcateg'])){
                $subcategories=$_POST['subcateg'];
                $filter_query.=" AND sub_categories_id IN ($subcategories)";
            }
            
            if(isset($_POST['sortby']) && !empty($_POST['sortby'])){
                $sort_by=$_POST['sortby'];
                if($sort_by == 'new' || $sort_by == '0') {
                    $filter_query.=" ORDER BY id DESC";
                } else if($sort_by == 'low') {
                    $filter_query.=" ORDER BY price ASC";
                } else if($sort_by == 'high') {
                    $filter_query.=" ORDER BY price DESC";
                }
            } else {
                $filter_query.=" ORDER BY id DESC";
            }	
            
            $stmt=$pdo->query($filter_query);
            $rowCount=$stmt->rowCount();
            $pages=ceil($rowCount/10);
            $result['count']=$pages;

            $filter_query.=" LIMIT 0,10";
            $stmt=$pdo->query($filter_query);
            $result['filter']=$stmt->fetchAll();
        }

        echo json_encode($result);

    }
?>