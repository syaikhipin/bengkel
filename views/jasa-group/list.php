<?php

$model = new app\models\JasaGroup();
echo "<div class=\"easyui-layout\" style=\"width:100%;height:100%;\">\n    <div data-options=\"region:'north'\" style=\"height:50%;overflow: hidden\">\n        <table id=\"tt\"\n               class=\"easyui-datagrid\" style=\"width:100%;height:100%\"\n               url=\"";
echo yii\helpers\Url::to(array("list-data"));
echo "\"\n               title=\"Data Jasa Group\"\n               rownumbers=\"true\" pagination=\"true\">\n            <thead>\n                <tr>\n                    <th field=\"kode\" width=\"80\">Kode</th>\n\t\t\t\t\t<th field=\"nama\" width=\"80\">Nama</th>\n\t\t\t\t\t<th field=\"merek_id\" width=\"80\">Merek ID</th>\n\t\t\t\t\t</tr>\n            </thead>\n        </table>\n    </div>\n    <div data-options=\"region:'center'\" style=\"height:40%;padding: 10px 20px\">\n        <form id=\"form\" method=\"post\" action=\"\">\n            <div class=\"form-control\">\n                <div class=\"form-control\">\n\t\t\t\t";
echo app\components\EasyUI::input($model, "kode", 300);
echo "\t\t\t\t</div>\n\t\t\t\t<div class=\"form-control\">\n\t\t\t\t";
echo app\components\EasyUI::input($model, "nama", 300);
echo "\t\t\t\t</div>\n\t\t\t\t<div class=\"form-control\">\n\t\t\t\t";
echo app\components\EasyUI::input($model, "merek_id", 300);
echo "\t\t\t\t</div>\n\t\t\t\t</div>\n        </form>\n    </div>\n    <div data-options=\"region:'south'\" style=\"height:10%;padding: 10px 20px\">\n        <a href=\"javascript:void(0)\" id=\"btn-save\" class=\"easyui-linkbutton\" data-options=\"iconCls:'fam disk'\">Simpan</a>\n        <a href=\"javascript:void(0)\" id=\"btn-delete\" class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-cancel'\">Hapus</a>\n    </div>\n</div>\n\n<script>\n    var selectedData = {};\n    var currentID = \"\";\n\n    \$(\"#tt\").datagrid({\n        onClickRow: function(index, row){\n            selectedData = row;\n            console.log(row);\n            for (var property in selectedData) {\n                if (selectedData.hasOwnProperty(property)) {\n                    //console.log(property, selectedData[property])\n                    \$(\"#\" + property).setValue(selectedData[property]);\n                }\n            }\n            currentID = selectedData.id;\n        }\n    });\n\n    \$(\"#btn-save\").click(function(){\n        var serialize = \$(\"#form\").serialize();\n        console.log(serialize);\n        \$.ajax({\n            url : \"";
echo yii\helpers\Url::to(array("save"));
echo "?id=\" + currentID,\n            data : serialize,\n            type : \"post\",\n            success: function(msg){\n                dialog(\"Simpan Data Sukses\");\n                \$('#tt').datagrid('reload');\n            }\n        });\n        return false;\n    });\n    \$(\"#btn-delete\").click(function(){\n        \$.ajax({\n            url : \"";
echo yii\helpers\Url::to(array("delete"));
echo "?id=\" + currentID,\n            data : \$(\"#form\").serialize(),\n            success: function(msg){\n                dialog(\"Hapus Data Sukses\");\n                \$('#tt').datagrid('reload');\n                currentID = \"\";\n                \$(\"#form\").form(\"clear\");\n            }\n        });\n        return false;\n    });\n\n    setTitle(\"Group Jasa\");\n</script>";

?>