<?php

use backend\assets\AppAsset;
use yii\helpers\Html;
/* @var $this \yii\web\View */
/* @var $content string */
dmstr\web\AdminLteAsset::register($this);
$this->beginPage();
?>
<!DOCTYPE html>
<html lang="<?php 
echo Yii::$app->language;
?>">
<head>
    <meta charset="<?php 
echo Yii::$app->charset;
?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php 
echo Html::csrfMetaTags();
?>
    <title><?php 
echo Html::encode($this->title);
?></title>
    <?php 
$this->head();
?>
</head>
<body class="login-page">

<?php 
$this->beginBody();
?>

    <?php 
echo $content;
?>

<?php 
$this->endBody();
?>
</body>
</html>
<?php 
$this->endPage();

?>