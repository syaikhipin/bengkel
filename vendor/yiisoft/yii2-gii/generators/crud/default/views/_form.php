<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;
/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */
/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}
echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model <?php 
echo ltrim($generator->modelClass, '\\');
?> */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="<?php 
echo Inflector::camel2id(StringHelper::basename($generator->modelClass));
?>-form">

    <?php 
echo "<?php ";
?>$form = ActiveForm::begin(); ?>

<?php 
foreach ($generator->getColumnNames() as $attribute) {
    if (in_array($attribute, $safeAttributes)) {
        echo "    <?= " . $generator->generateActiveField($attribute) . " ?>\n\n";
    }
}
?>
    <div class="form-group">
        <?php 
echo "<?= ";
?>Html::submitButton($model->isNewRecord ? <?php 
echo $generator->generateString('Create');
?> : <?php 
echo $generator->generateString('Update');
?>, ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php 
echo "<?php ";
?>ActiveForm::end(); ?>

</div>
<?php 

?>