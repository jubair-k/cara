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

        if(isset($_POST['addProducts']) && !empty($_POST['addProducts'])){
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
                        $newFile="../../../media/products/".$fileName;
                        if(move_uploaded_file($tmpPath,$newFile)) {
                            $inst_prdct="INSERT INTO product(categories_id, sub_categories_id, product_name, mrp, price, offer, offer_expdate, qty, image, description, meta_title, seasons_id, best_seller, status) VALUES 
                            (:categid,:scategid,:pname,:mrp,:pric,:offer,:offdt,:qty,:img,:descr,:mtilt,:sesnid,:bsell,:st)";
                            $stmt=$pdo->prepare($inst_prdct);
                            $stmt->execute(['categid'=>$_POST['categoriesId'],'scategid'=>$_POST['sub_categoriesId'],'pname'=>$_POST['prdctname'],'mrp'=>$_POST['prdctmrp'],'pric'=>$_POST['prdctprice'],'offer'=>$_POST['prdctOffer'],'offdt'=>$_POST['prdctofferdate'],'qty'=>$_POST['prdctqty'],'img'=>$fileName,'descr'=>$_POST['prdctdescription'],'mtilt'=>$_POST['prdctmeta_title'],'sesnid'=>$_POST['seasonId'],'bsell'=>$_POST['best_seller'],'st'=>1]);
                            
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

        if(isset($_POST['loadProducts']) && !empty($_POST['loadProducts'])){
            $stmt=$pdo->query("SELECT categories.categories,sub_categories.sub_categories,product.product_name,product.mrp,product.price,product.qty,product.image,product.status,product.categories_id,product.sub_categories_id,product.id FROM product
            INNER JOIN categories ON categories.id=product.categories_id
            INNER JOIN sub_categories ON sub_categories.id=product.sub_categories_id ORDER BY id DESC");
            $array['prdct']=$stmt->fetchAll();
        }

        if(isset($_POST['deactiveprdct']) && !empty($_POST['deactiveprdct'])){
            $deact_prdct="UPDATE product SET status=:prdctst WHERE id=:prdctid";
            $stmt=$pdo->prepare($deact_prdct);
            $stmt->execute(['prdctst'=>0,'prdctid'=>$_POST['prdct']]);
            $array="success";
        }

        if(isset($_POST['activeprdct']) && !empty($_POST['activeprdct'])){
            $act_prdct="UPDATE product SET status=:prdctst WHERE id=:prdctid";
            $stmt=$pdo->prepare($act_prdct);
            $stmt->execute(['prdctst'=>1,'prdctid'=>$_POST['prdct']]);
            $array="success";
        }

        if(isset($_POST['deleteprdct']) && !empty($_POST['deleteprdct'])){
            $sel_img="SELECT product.image FROM product WHERE id=:imid";
            $stmt=$pdo->prepare($sel_img);
            $stmt->execute(['imid'=>$_POST['prdct']]);
            $image_path=$stmt->fetch()->image;

            $dlt_prdct="DELETE FROM product WHERE id=:prdctid";
            $stmt=$pdo->prepare($dlt_prdct);
            $stmt->execute(['prdctid'=>$_POST['prdct']]);

            unlink('../../../media/products/'.$image_path);

            $array="success";
        }

        if(isset($_POST['prdeditgetdata']) && !empty($_POST['prdeditgetdata'])){
            $sel_edtprd="SELECT * FROM product WHERE id=:prdctid";
            $stmt=$pdo->prepare($sel_edtprd);
            $stmt->execute(['prdctid'=>$_POST['prdct']]);
            $array=$stmt->fetch();
        }

        if(isset($_POST['saveProducts']) && !empty($_POST['saveProducts'])){
            if(isset($_FILES['prdctimg']) && empty($_FILES['prdctimg']['name'])){
                $updt_prdct="UPDATE product SET categories_id=:categid,sub_categories_id=:subcategid,product_name=:prdctnm,
                mrp=:pmrp,price=:ppric,offer=:poff,offer_expdate=:poffexpdt,qty=:pqty,
                description=:pdesc,meta_title=:pmetit,seasons_id=:psesid,best_seller=:pbsel WHERE id=:pid ";
                $stmt=$pdo->prepare($updt_prdct);
                $stmt->execute(['categid'=>$_POST['categoriesId'],'subcategid'=>$_POST['sub_categoriesId'],'prdctnm'=>$_POST['prdctname'],
                'pmrp'=>$_POST['prdctmrp'],'ppric'=>$_POST['prdctprice'],'poff'=>$_POST['prdctOffer'],'poffexpdt'=>$_POST['prdctofferdate'],
                'pqty'=>$_POST['prdctqty'],'pdesc'=>$_POST['prdctdescription'],'pmetit'=>$_POST['prdctmeta_title'],
                'psesid'=>$_POST['seasonId'],'pbsel'=>$_POST['best_seller'],'pid'=>$_POST['prdctsave']]);
                $array['correct']="ok";
            }

            if(isset($_FILES['prdctimg']) && !empty($_FILES['prdctimg']['name'])){
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
                        $newFile="../../../media/products/".$fileName;
                        if(move_uploaded_file($tmpPath,$newFile)) {
                            $sel_img="SELECT product.image FROM product WHERE id=:imid";
                            $stmt=$pdo->prepare($sel_img);
                            $stmt->execute(['imid'=>$_POST['prdctsave']]);
                            $image_path=$stmt->fetch()->image;

                            unlink('../../../media/products/'.$image_path);


                            $updt_prdct="UPDATE product SET categories_id=:categid,sub_categories_id=:subcategid,product_name=:prdctnm,
                            mrp=:pmrp,price=:ppric,offer=:poff,offer_expdate=:poffexpdt,qty=:pqty,image=:pimg,
                            description=:pdesc,meta_title=:pmetit,seasons_id=:psesid,best_seller=:pbsel WHERE id=:pid ";
                            $stmt=$pdo->prepare($updt_prdct);
                            $stmt->execute(['categid'=>$_POST['categoriesId'],'subcategid'=>$_POST['sub_categoriesId'],'prdctnm'=>$_POST['prdctname'],
                            'pmrp'=>$_POST['prdctmrp'],'ppric'=>$_POST['prdctprice'],'poff'=>$_POST['prdctOffer'],'poffexpdt'=>$_POST['prdctofferdate'],
                            'pqty'=>$_POST['prdctqty'],'pimg'=>$fileName,'pdesc'=>$_POST['prdctdescription'],'pmetit'=>$_POST['prdctmeta_title'],
                            'psesid'=>$_POST['seasonId'],'pbsel'=>$_POST['best_seller'],'pid'=>$_POST['prdctsave']]);
            
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