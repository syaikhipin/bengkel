<?php

use yii\helpers\Html;
/* @var $caption string */
/* @var $values array */
?>

<h3><?php 
echo $caption;
?></h3>

<?php 
if (empty($values)) {
    ?>

    <p>Empty.</p>

<?php 
} else {
    ?>
    <div class="table-responsive">
        <table class="table table-condensed table-bordered table-striped table-hover" style="table-layout: fixed;">
            <thead>
            <tr>
                <th style="nowrap">Name</th>
                <th>Value</th>
            </tr>
            </thead>
            <tbody>
            <?php 
    foreach ($values as $name => $value) {
        ?>
                <tr>
                    <th style="white-space: normal"><?php 
        echo Html::encode($name);
        ?></th>
                    <td style="overflow:auto"><?php 
        echo Html::encode($value);
        ?></td>
                </tr>
            <?php 
    }
    ?>
            </tbody>
        </table>
    </div>
<?php 
}

?>