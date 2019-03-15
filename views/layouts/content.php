<?php

echo "<div class=\"content-wrapper\">\n    <section class=\"content-header\">\n        ";
if (isset($this->blocks["content-header"])) {
    echo "            <h1>";
    echo $this->blocks["content-header"];
    echo "</h1>\n        ";
} else {
    echo "            <h1>\n                ";
    if ($this->title !== NULL) {
        echo yii\helpers\Html::encode($this->title);
    } else {
        echo yii\helpers\Inflector::camel2words(yii\helpers\Inflector::id2camel($this->context->module->id));
        echo $this->context->module->id !== Yii::$app->id ? "<small>Module</small>" : "";
    }
    echo "            </h1>\n        ";
}
echo "\n        ";
echo yii\widgets\Breadcrumbs::widget(array("links" => isset($this->params["breadcrumbs"]) ? $this->params["breadcrumbs"] : array()));
echo "    </section>\n\n    <section class=\"content\">\n        ";
echo dmstr\widgets\Alert::widget();
echo "        ";
echo $content;
echo "    </section>\n</div>\n\n<footer class=\"main-footer\">\n    <div class=\"pull-right hidden-xs\">\n        <b>Version</b> 1.0\n    </div>\n    <strong>Copyright &copy; 2016 <a href=\"http://indoarta.co.id\">Indoarta Citra Media</a>.</strong> All rights\n    reserved.\n</footer>\n\n<!-- Control Sidebar -->\n<aside class=\"control-sidebar control-sidebar-dark\">\n    <!-- Create the tabs -->\n    <ul class=\"nav nav-tabs nav-justified control-sidebar-tabs\">\n        <li><a href=\"#control-sidebar-home-tab\" data-toggle=\"tab\"><i class=\"fa fa-home\"></i></a></li>\n        <li><a href=\"#control-sidebar-settings-tab\" data-toggle=\"tab\"><i class=\"fa fa-gears\"></i></a></li>\n    </ul>\n    <!-- Tab panes -->\n    <div class=\"tab-content\">\n        <!-- Home tab content -->\n        <div class=\"tab-pane\" id=\"control-sidebar-home-tab\">\n            <h3 class=\"control-sidebar-heading\">Recent Activity</h3>\n            <ul class='control-sidebar-menu'>\n                <li>\n                    <a href='javascript::;'>\n                        <i class=\"menu-icon fa fa-birthday-cake bg-red\"></i>\n\n                        <div class=\"menu-info\">\n                            <h4 class=\"control-sidebar-subheading\">Langdon's Birthday</h4>\n\n                            <p>Will be 23 on April 24th</p>\n                        </div>\n                    </a>\n                </li>\n                <li>\n                    <a href='javascript::;'>\n                        <i class=\"menu-icon fa fa-user bg-yellow\"></i>\n\n                        <div class=\"menu-info\">\n                            <h4 class=\"control-sidebar-subheading\">Frodo Updated His Profile</h4>\n\n                            <p>New phone +1(800)555-1234</p>\n                        </div>\n                    </a>\n                </li>\n                <li>\n                    <a href='javascript::;'>\n                        <i class=\"menu-icon fa fa-envelope-o bg-light-blue\"></i>\n\n                        <div class=\"menu-info\">\n                            <h4 class=\"control-sidebar-subheading\">Nora Joined Mailing List</h4>\n\n                            <p>nora@example.com</p>\n                        </div>\n                    </a>\n                </li>\n                <li>\n                    <a href='javascript::;'>\n                        <i class=\"menu-icon fa fa-file-code-o bg-green\"></i>\n\n                        <div class=\"menu-info\">\n                            <h4 class=\"control-sidebar-subheading\">Cron Job 254 Executed</h4>\n\n                            <p>Execution time 5 seconds</p>\n                        </div>\n                    </a>\n                </li>\n            </ul>\n            <!-- /.control-sidebar-menu -->\n\n            <h3 class=\"control-sidebar-heading\">Tasks Progress</h3>\n            <ul class='control-sidebar-menu'>\n                <li>\n                    <a href='javascript::;'>\n                        <h4 class=\"control-sidebar-subheading\">\n                            Custom Template Design\n                            <span class=\"label label-danger pull-right\">70%</span>\n                        </h4>\n\n                        <div class=\"progress progress-xxs\">\n                            <div class=\"progress-bar progress-bar-danger\" style=\"width: 70%\"></div>\n                        </div>\n                    </a>\n                </li>\n                <li>\n                    <a href='javascript::;'>\n                        <h4 class=\"control-sidebar-subheading\">\n                            Update Resume\n                            <span class=\"label label-success pull-right\">95%</span>\n                        </h4>\n\n                        <div class=\"progress progress-xxs\">\n                            <div class=\"progress-bar progress-bar-success\" style=\"width: 95%\"></div>\n                        </div>\n                    </a>\n                </li>\n                <li>\n                    <a href='javascript::;'>\n                        <h4 class=\"control-sidebar-subheading\">\n                            Laravel Integration\n                            <span class=\"label label-waring pull-right\">50%</span>\n                        </h4>\n\n                        <div class=\"progress progress-xxs\">\n                            <div class=\"progress-bar progress-bar-warning\" style=\"width: 50%\"></div>\n                        </div>\n                    </a>\n                </li>\n                <li>\n                    <a href='javascript::;'>\n                        <h4 class=\"control-sidebar-subheading\">\n                            Back End Framework\n                            <span class=\"label label-primary pull-right\">68%</span>\n                        </h4>\n\n                        <div class=\"progress progress-xxs\">\n                            <div class=\"progress-bar progress-bar-primary\" style=\"width: 68%\"></div>\n                        </div>\n                    </a>\n                </li>\n            </ul>\n            <!-- /.control-sidebar-menu -->\n\n        </div>\n        <!-- /.tab-pane -->\n\n        <!-- Settings tab content -->\n        <div class=\"tab-pane\" id=\"control-sidebar-settings-tab\">\n            <form method=\"post\">\n                <h3 class=\"control-sidebar-heading\">General Settings</h3>\n\n                <div class=\"form-group\">\n                    <label class=\"control-sidebar-subheading\">\n                        Report panel usage\n                        <input type=\"checkbox\" class=\"pull-right\" checked/>\n                    </label>\n\n                    <p>\n                        Some information about this general settings option\n                    </p>\n                </div>\n                <!-- /.form-group -->\n\n                <div class=\"form-group\">\n                    <label class=\"control-sidebar-subheading\">\n                        Allow mail redirect\n                        <input type=\"checkbox\" class=\"pull-right\" checked/>\n                    </label>\n\n                    <p>\n                        Other sets of options are available\n                    </p>\n                </div>\n                <!-- /.form-group -->\n\n                <div class=\"form-group\">\n                    <label class=\"control-sidebar-subheading\">\n                        Expose author name in posts\n                        <input type=\"checkbox\" class=\"pull-right\" checked/>\n                    </label>\n\n                    <p>\n                        Allow the user to show his name in blog posts\n                    </p>\n                </div>\n                <!-- /.form-group -->\n\n                <h3 class=\"control-sidebar-heading\">Chat Settings</h3>\n\n                <div class=\"form-group\">\n                    <label class=\"control-sidebar-subheading\">\n                        Show me as online\n                        <input type=\"checkbox\" class=\"pull-right\" checked/>\n                    </label>\n                </div>\n                <!-- /.form-group -->\n\n                <div class=\"form-group\">\n                    <label class=\"control-sidebar-subheading\">\n                        Turn off notifications\n                        <input type=\"checkbox\" class=\"pull-right\"/>\n                    </label>\n                </div>\n                <!-- /.form-group -->\n\n                <div class=\"form-group\">\n                    <label class=\"control-sidebar-subheading\">\n                        Delete chat history\n                        <a href=\"javascript::;\" class=\"text-red pull-right\"><i class=\"fa fa-trash-o\"></i></a>\n                    </label>\n                </div>\n                <!-- /.form-group -->\n            </form>\n        </div>\n        <!-- /.tab-pane -->\n    </div>\n</aside><!-- /.control-sidebar -->\n<!-- Add the sidebar's background. This div must be placed\n     immediately after the control sidebar -->\n<div class='control-sidebar-bg'></div>";

?>