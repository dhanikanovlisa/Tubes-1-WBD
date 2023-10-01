<a href=<?php
    $url = $_SERVER['REQUEST_URI'];
    if(isset($_GET['page'])){
        if($target=='<'){
            $goto = $_GET['page']-1;
        } elseif($target=='>'){
            $goto = $_GET['page']+1;
        }
        $url = str_replace('page='.$_GET['page'], 'page='.$goto, $url);
    } else {
        $url = $url . (strpos($url, '?')===false ? '?page='.$goto : '&page='.$goto);
    }
    echo '"'.$url.'"';
?>>
    <div class='button-pagination'>
        <?php echo $target; ?>
    </div>
</a>