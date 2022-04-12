<?php
    session_start();
    include 'connection.php';

    if(isset($_POST)){
        if(isset($_POST['loadCategoriesId']) && !empty($_POST['loadCategoriesId'])){
            $stmt=$pdo->query("SELECT * FROM categories WHERE status=1");
            $array['categs']=$stmt->fetchAll();
            $stmt=$pdo->query("SELECT * FROM seasons WHERE status=1");
            $array['sesn']=$stmt->fetchAll();
        }

        if(isset($_POST['loadSubCategoriesId']) && !empty($_POST['loadSubCategoriesId'])){
            $sel_subcateg="SELECT * FROM sub_categories WHERE categories_id=:selcateg";
            $stmt=$pdo->prepare($sel_subcateg);
            $stmt->execute(['selcateg'=>$_POST['categselect']]);
            $array['subcategs']=$stmt->fetchAll();
        }

        if(isset($_POST['prdctname'])){
            if(isset($_FILES['prdctimg'])){
                $errors=array();
                $fileName=$_FILES["prdctimg"]["name"];
                $fileSize=$_FILES["prdctimg"]["size"];
                $fileType=$_FILES["prdctimg"]["type"];
                $tmpPath=$_FILES["prdctimg"]["tmp_name"];

                $fileNamCaps=strtolower($fileName);
                $fileNameArr=explode(".",$fileNamCaps);
                $fileExt=end($fileNameArr);

                $extensions=array('jpg','png','jpeg');  

                if(!in_array($fileExt,$extensions)){
                    $errors[]="extention not allowed,please choose";
                }

                if(empty($errors)){
                    $chk_imgexist="SELECT * FROM product WHERE image=:img";
                    $stmt=$pdo->prepare($chk_imgexist);
                    $stmt->execute(['img'=>$fileName]);
                    $chk_count=$stmt->rowCount();
                    if($chk_count==0){
                        $newFile="../images/".$fileName;
                        if(move_uploaded_file($tmpPath,$newFile)) {
                            $inst_prdct="INSERT INTO product(categories_id, sub_categories_id, product_name, mrp, price, color, brand, offer, offer_expdate, qty, image, description, meta_title, seasons_id, best_seller, status) VALUES 
                            (:categid,:scategid,:pname,:mrp,:pric,:clr,:brnd,:offer,:offdt,:qty,:img,:descr,:mtilt,:sesnid,:bsell,:st)";
                            $stmt=$pdo->prepare($inst_prdct);
                            $stmt->execute(['categid'=>$_POST['categoriesId'],'scategid'=>$_POST['sub_categoriesId'],'pname'=>$_POST['prdctname'],'mrp'=>$_POST['prdctmrp'],'pric'=>$_POST['prdctprice'],'clr'=>$_POST['prdctcolor'],'brnd'=>$_POST['prdctbrand'],'offer'=>$_POST['prdctOffer'],'offdt'=>$_POST['prdctofferdate'],'qty'=>$_POST['prdctqty'],'img'=>$fileName,'descr'=>$_POST['prdctdescription'],'mtilt'=>$_POST['prdctmeta_title'],'sesnid'=>$_POST['seasonId'],'bsell'=>$_POST['best_seller'],'st'=>1]);
                            
                            $array['correct']="ok";
                        }      
                    }
                    else{
                        $array['imgext']="image path already exist";
                    }
                }
                else{
                    $array['error']=$errors;
                }

            }
        }



        echo json_encode($array);
    }


?>