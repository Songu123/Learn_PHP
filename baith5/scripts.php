        <?php
              header('Access-Control-Allow-Origin: *');
              if(isset($_FILES['image'])) {
                    $name = str_replace(' ', '-', $_FILES["image"]["name"]);
                    $bannerpath="uploads/".$name;
                    $flag = move_uploaded_file($_FILES["image"]["tmp_name"],$bannerpath);
                    if($flag) {
                      $domain = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
                      $resultImg = $domain . "/uploads/" . $name;
                      $size = $_FILES["image"]["size"];
                      $result = new stdClass();
                      $result->resultImg = $resultImg;
                      $result->size = $size / 1024;
                      $result->name = $name;
                      echo json_encode($result);
                    }
                    return $flag;
                }
            ?>
