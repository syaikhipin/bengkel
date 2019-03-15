<?php

$this->title = "Menu " . $model->name;
$this->params["breadcrumbs"][] = array("label" => "Menus", "url" => array("index"));
$this->params["breadcrumbs"][] = array("label" => (string) $model->name, "url" => array("view", "id" => $model->id));
$this->params["breadcrumbs"][] = "View";
echo "<div class=\"giiant-crud menu-view\">\n\n    <!-- menu buttons -->\n    <p class='pull-left'>\n        ";
echo dmstr\helpers\Html::a("<span class=\"glyphicon glyphicon-pencil\"></span> " . "Edit", array("update", "id" => $model->id), array("class" => "btn btn-info"));
echo "        ";
echo dmstr\helpers\Html::a("<span class=\"glyphicon glyphicon-plus\"></span> " . "New", array("create"), array("class" => "btn btn-success"));
echo "    </p>\n    <p class=\"pull-right\">\n        ";
echo dmstr\helpers\Html::a("<span class=\"glyphicon glyphicon-list\"></span> " . "List Menus", array("index"), array("class" => "btn btn-default"));
echo "    </p>\n\n    <div class=\"clearfix\"></div>\n\n    <!-- flash message -->\n    ";
if (Yii::$app->session->getFlash("deleteError") !== NULL) {
    echo "        <span class=\"alert alert-info alert-dismissible\" role=\"alert\">\n            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">\n            <span aria-hidden=\"true\">&times;</span></button>\n            ";
    echo Yii::$app->session->getFlash("deleteError");
    echo "        </span>\n    ";
}
echo "\n    <div class=\"panel panel-default\">\n        <div class=\"panel-heading\">\n            <h2>\n                ";
echo $model->name;
echo "            </h2>\n        </div>\n\n        <div class=\"panel-body\">\n\n\n\n    ";
$this->beginBlock("app\\models\\Menu");
echo "\n    ";
echo yii\widgets\DetailView::widget(array("model" => $model, "attributes" => array("id", "name", "controller", "action", "icon", "order", array("format" => "html", "attribute" => "parent_id", "value" => $model->getParent()->one() ? dmstr\helpers\Html::a($model->getParent()->one()->name, array("menu/view", "id" => $model->getParent()->one()->id)) : "<span class=\"label label-warning\">?</span>"))));
echo "\n    <hr/>\n\n    ";
echo dmstr\helpers\Html::a("<span class=\"glyphicon glyphicon-trash\"></span> " . "Delete", array("delete", "id" => $model->id), array("class" => "btn btn-danger", "data-confirm" => "" . "Are you sure to delete this item?" . "", "data-method" => "post"));
echo "    ";
$this->endBlock();
echo "\n\n    \n";
$this->beginBlock("Menuses");
echo "<div style='position: relative'><div style='position:absolute; right: 0px; top 0px;'>\n  ";
echo dmstr\helpers\Html::a("<span class=\"glyphicon glyphicon-list\"></span> " . "List All" . " Menuses", array("menu/index"), array("class" => "btn text-muted btn-xs"));
echo "  ";
echo dmstr\helpers\Html::a("<span class=\"glyphicon glyphicon-plus\"></span> " . "New" . " Menus", array("menu/create", "Menus" => array("parent_id" => $model->id)), array("class" => "btn btn-success btn-xs"));
echo "</div></div>";
yii\widgets\Pjax::begin(array("id" => "pjax-Menuses", "enableReplaceState" => false, "linkSelector" => "#pjax-Menuses ul.pagination a, th a", "clientOptions" => array("pjax:success" => "function(){alert(\"yo\")}")));
echo "<div class=\"table-responsive\">" . yii\grid\GridView::widget(array("layout" => "{summary}{pager}<br/>{items}{pager}", "dataProvider" => new yii\data\ActiveDataProvider(array("query" => $model->getMenus(), "pagination" => array("pageSize" => 20, "pageParam" => "page-menuses"))), "pager" => array("class" => yii\widgets\LinkPager::className(), "firstPageLabel" => "First", "lastPageLabel" => "Last"), "columns" => array(array("class" => "yii\\grid\\ActionColumn", "template" => "{view} {update}", "contentOptions" => array("nowrap" => "nowrap"), "urlCreator" => function ($action, $model, $key, $index) {
    $params = is_array($key) ? $key : array($model->primaryKey()[0] => (string) $key);
    $params[0] = "menu" . "/" . $action;
    return $params;
}, "buttons" => array(), "controller" => "menu"), "id", "name", "controller", "action", "icon", "order"))) . "</div>";
yii\widgets\Pjax::end();
$this->endBlock();
echo "\n\n";
$this->beginBlock("RoleMenuses");
echo "<div style='position: relative'><div style='position:absolute; right: 0px; top 0px;'>\n  ";
echo dmstr\helpers\Html::a("<span class=\"glyphicon glyphicon-list\"></span> " . "List All" . " Role Menuses", array("role-menu/index"), array("class" => "btn text-muted btn-xs"));
echo "  ";
echo dmstr\helpers\Html::a("<span class=\"glyphicon glyphicon-plus\"></span> " . "New" . " Role Menus", array("role-menu/create", "RoleMenus" => array("menu_id" => $model->id)), array("class" => "btn btn-success btn-xs"));
echo "</div></div>";
yii\widgets\Pjax::begin(array("id" => "pjax-RoleMenuses", "enableReplaceState" => false, "linkSelector" => "#pjax-RoleMenuses ul.pagination a, th a", "clientOptions" => array("pjax:success" => "function(){alert(\"yo\")}")));
echo "<div class=\"table-responsive\">" . yii\grid\GridView::widget(array("layout" => "{summary}{pager}<br/>{items}{pager}", "dataProvider" => new yii\data\ActiveDataProvider(array("query" => $model->getRoleMenus(), "pagination" => array("pageSize" => 20, "pageParam" => "page-rolemenuses"))), "pager" => array("class" => yii\widgets\LinkPager::className(), "firstPageLabel" => "First", "lastPageLabel" => "Last"), "columns" => array(array("class" => "yii\\grid\\ActionColumn", "template" => "{view} {update}", "contentOptions" => array("nowrap" => "nowrap"), "urlCreator" => function ($action, $model, $key, $index) {
    $params = is_array($key) ? $key : array($model->primaryKey()[0] => (string) $key);
    $params[0] = "role-menu" . "/" . $action;
    return $params;
}, "buttons" => array(), "controller" => "role-menu"), "id", array("class" => yii\grid\DataColumn::className(), "attribute" => "role_id", "value" => function ($model) {
    if ($rel = $model->getRole()->one()) {
        return dmstr\helpers\Html::a($rel->name, array("role/view", "id" => $rel->id), array("data-pjax" => 0));
    }
    return "";
}, "format" => "raw")))) . "</div>";
yii\widgets\Pjax::end();
$this->endBlock();
echo "\n\n    ";
echo dmstr\bootstrap\Tabs::widget(array("id" => "relation-tabs", "encodeLabels" => false, "items" => array(array("label" => "<b class=\"\"># " . $model->id . "</b>", "content" => $this->blocks["app\\models\\Menu"], "active" => true), array("content" => $this->blocks["Menuses"], "label" => "<small>Menuses <span class=\"badge badge-default\">" . count($model->getMenus()->asArray()->all()) . "</span></small>", "active" => false), array("content" => $this->blocks["RoleMenuses"], "label" => "<small>Role Menuses <span class=\"badge badge-default\">" . count($model->getRoleMenus()->asArray()->all()) . "</span></small>", "active" => false))));
echo "        </div>\n    </div>\n</div>\n";

?>