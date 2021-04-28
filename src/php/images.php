<?php
    $folder_path = "../../images/";

    $num_files = glob($folder_path . "*.{JPG,jpg,gif,png,bmp}", GLOB_BRACE);

    $folder = opendir($folder_path);
 
    if($num_files > 0)
    {
        while(false !== ($file = readdir($folder))){
            $file_path = $folder_path.$file;
            $extension = strtolower(pathinfo($file ,PATHINFO_EXTENSION));
            $name = pathinfo($file_path, PATHINFO_FILENAME);
            if($extension=='jpg' || $extension =='png' || $extension == 'gif' || $extension == 'bmp') 
            {
?>
                <a href="<?php echo $file_path; ?>"><img src="<?php echo $file_path; ?>"  height="200" /></a>
                
                <?php
            }
        }  
    }
    else
    {
     echo "Vacio";
    }
    closedir($folder);
    ?>