<?php
function searchPagination($page, $numPages, $search_location) { ?>
    <div class="searchPagination">
        <?php
        if ($page > 1) { ?>
            <a href="?controller=search&action=search&location=<?php if(!empty(urlencode($search_location))) { echo $search_location; } ?>&p=<?php echo $page - 1; ?>">Previous</a>
        <?php
        }
        if ($page > 2) { ?>
            <a href="?controller=search&action=search&location=<?php if(!empty(urlencode($search_location))) { echo $search_location; } ?>&p=1">1</a> ...
        <?php
        }

        if ($page <= 2) {
            $paginationStart = 1;
            if ($numPages <= 3) {
                $paginationEnd = $numPages;
            } else {
                $paginationEnd = 3;
            }
        } elseif ($page >= $numPages - 1) {
            $paginationStart = $numPages - 2;
            $paginationEnd = $numPages;
        } else {
            $paginationStart = $page - 1;
            $paginationEnd = $page + 1;
        }

        for ($i = $paginationStart; $i <= $paginationEnd; $i++) {

            ?>
            <a class="<?php if ($page == $i) { echo "currentPage"; } ?>" href="?controller=search&action=search&location=<?php if(!empty(urlencode($search_location))) { echo $search_location; } ?>&p=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php
        }

        if ($page < $numPages - 1) { ?>
            ... <a href="?controller=search&action=search&location=<?php if(!empty(urlencode($search_location))) { echo $search_location; } ?>&p=<?php echo $numPages; ?>"><?php echo $numPages; ?></a>
        <?php
        }

        if ($page < $numPages) { ?>
            <a href="?controller=search&action=search&location=<?php if(!empty(urlencode($search_location))) { echo $search_location; } ?>&p=<?php echo $page + 1; ?>">Next</a>
        <?php
        }
        ?>
    </div>
    <?php
} ?>
