<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;
/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */
echo "<?php\n";
?>

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model <?php 
echo ltrim($generator->modelClass, '\\');
?> */

$this->title = <?php 
echo $generator->generateString('Create ' . Inflector::camel2words(StringHelper::basename($generator->modelClass)));
?>;
$this->params['breadcrumbs'][] = ['label' => <?php 
echo $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass))));
?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="<?php 
echo Inflector::camel2id(StringHelper::basename($generator->modelClass));
?>-create">

    <h1><?php 
echo "<?= ";
?>Html::encode($this->title) ?></h1>

    <?php 
echo "<?= ";
?>$this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<?php 

?>