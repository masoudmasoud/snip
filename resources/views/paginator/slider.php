<?php
    $presenter = new Illuminate\Pagination\BootstrapPresenter($paginator);
?>

<div class="pagination">
    <ul class="pull left">
        <li>
        نمایش
        <?php echo $paginator->getFrom(); ?>
        -
        <?php echo $paginator->getTo(); ?>
        از
        <?php echo $paginator->getTotal(); ?>
        مورد
        </li>
    </ul>

    <ul class="pull-right">
        <?php echo $presenter->render(); ?>
    </ul>
</div>
