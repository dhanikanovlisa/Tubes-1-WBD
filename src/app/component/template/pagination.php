<!--
    @total_records
    @items_per_page
    @current_page
-->
<div class='pagination'>
    <?php
        if($total_records) $total_records=$total_records['count'];
        $limitpage = 4;

        $totalpages = ceil($total_records/$items_per_page);
        
        $start = ($current_page===1) ? 1 : $current_page-1;
        $bound = $start+$limitpage-1;
        if($bound > $totalpages){
            $start = $totalpages-$limitpage+1;
            $bound = $totalpages;
        }
        if($current_page!=1){
            $target = '<';
            include (DIRECTORY . "/../component/template/paginationButton.php");
        }
        for($i=$start; $i<=$bound; $i++){
            $target = $i;
            $is_active=false;
            if($target==$current_page) $is_active=true;
            include(DIRECTORY . "/../component/template/paginationButton.php");
        }
        if($current_page!=$totalpages){
            $target = '>';
            include (DIRECTORY . "/../component/template/paginationButton.php");
        }?>
</div>