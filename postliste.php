<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    
    <body>
        <?php 
        /*include_once './Post.php';
        include_once './Database.php';
        include_once './Comment.php';
    session_start();
        if (is_dir('./posts')) {
            $users = scandir('./posts');
            $users = array_diff($users, ['..', '.']);
            foreach ($users as $user) {
                //$datas = unserialize($comment);
                $postuser = scandir('./posts/' . $user);
                $postuser = array_diff($postuser, ['..', '.']);
                foreach ($postuser as $post) {
                    if (!is_dir('./posts/' . $user . '/' . $post)) {
                        $seripost = file_get_contents('./posts/' . $user . '/' . $post);
                        $unserpost = unserialize($seripost);
        if ($unserpost == ){
                        ?>
        <h1><?php echo $unserpost->getTitre(); ?> </h1>
                            <p> <?php echo $unserpost->getContenu(); ?> </p>
                            <p> <?php echo $unserpost->getAuteur(); ?> </p>
                            <p> <?php echo $unserpost->getTags(); ?> </p>
                            <p> <?php echo $unserpost->getDate()->format('d-m-Y H:i:s'); ?> </p>
                        </section>
        <?php }}}}}?>
    </body>
</html>
