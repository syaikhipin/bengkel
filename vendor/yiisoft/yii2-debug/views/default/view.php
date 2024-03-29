<?php

/* @var $this \yii\web\View */
/* @var $summary array */
/* @var $tag string */
/* @var $manifest array */
/* @var $panels \yii\debug\Panel[] */
/* @var $activePanel \yii\debug\Panel */
use yii\bootstrap\ButtonDropdown;
use yii\bootstrap\ButtonGroup;
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Yii Debugger';
?>
<div class="default-view">
    <div id="yii-debug-toolbar" class="yii-debug-toolbar-top">

        <div class="yii-debug-toolbar-block title">
            <a href="<?php 
echo Url::to(['index']);
?>">
                <img width="29" height="30" alt="" src="<?php 
echo \yii\debug\Module::getYiiLogo();
?>">
                Yii Debugger
            </a>
        </div>

        <?php 
foreach ($panels as $panel) {
    ?>
            <?php 
    echo $panel->getSummary();
    ?>
        <?php 
}
?>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2">
                <div class="list-group">
                    <?php 
foreach ($panels as $id => $panel) {
    $label = '<i class="glyphicon glyphicon-chevron-right"></i>' . Html::encode($panel->getName());
    echo Html::a($label, ['view', 'tag' => $tag, 'panel' => $id], ['class' => $panel === $activePanel ? 'list-group-item active' : 'list-group-item']);
}
?>
                </div>
            </div>
            <div class="col-lg-10 col-md-10">
                <?php 
$statusCode = $summary['statusCode'];
if ($statusCode === null) {
    $statusCode = 200;
}
if ($statusCode >= 200 && $statusCode < 300) {
    $calloutClass = 'callout-success';
} elseif ($statusCode >= 300 && $statusCode < 400) {
    $calloutClass = 'callout-info';
} else {
    $calloutClass = 'callout-important';
}
?>
                <div class="callout <?php 
echo $calloutClass;
?>">
                    <?php 
$count = 0;
$items = [];
foreach ($manifest as $meta) {
    $label = $meta['tag'] . ': ' . $meta['method'] . ' ' . $meta['url'] . ($meta['ajax'] ? ' (AJAX)' : '') . ', ' . date('Y-m-d h:i:s a', $meta['time']) . ', ' . $meta['ip'];
    $url = ['view', 'tag' => $meta['tag'], 'panel' => $activePanel->id];
    $items[] = ['label' => $label, 'url' => $url];
    if (++$count >= 10) {
        break;
    }
}
echo ButtonGroup::widget(['options' => ['class' => 'btn-group-sm'], 'buttons' => [Html::a('All', ['index'], ['class' => 'btn btn-default']), Html::a('Latest', ['view', 'panel' => $activePanel->id], ['class' => 'btn btn-default']), ButtonDropdown::widget(['label' => 'Last 10', 'options' => ['class' => 'btn-default btn-sm'], 'dropdown' => ['items' => $items]])]]);
echo "\n" . $summary['tag'] . ': ' . $summary['method'] . ' ' . Html::a(Html::encode($summary['url']), $summary['url']);
echo ' at ' . date('Y-m-d h:i:s a', $summary['time']) . ' by ' . $summary['ip'];
?>
                </div>
                <?php 
echo $activePanel->getDetail();
?>
            </div>
        </div>
    </div>
</div>
<?php 

?>