<?php

$jaringan = app\models\Jaringan::find()->where(array("id" => app\models\Jaringan::getCurrentID()))->one();
echo "<div class=\"easyui-layout\" style=\"width:100%;height:100%;\">\n    <div data-options=\"region:'west'\" title=\"Adjust Harga Jual\" style=\"width:40%;overflow: hidden;padding:20px\">\n        <form id=\"form_3\" method=\"post\" action=\"\">\n            <div style=\"padding-bottom: 30px\">Persentase Harga Jual Suku Cadang:</div>\n            <div class=\"form-control\">\n                <input id=\"slider\" class=\"easyui-slider\" value=\"";
echo $jaringan->persentase_harga_jual;
echo "\" style=\"width:300px\" data-options=\"\n                    showTip: true,\n                    max: 300,\n                    rule: [0,'|',100,'|',200,'|',300],\n                    tipFormatter: function(value){\n                        return value+' %';\n                    },\n                    onChange: function(value){\n                        //\$('#ff').css('font-size', value);\n                    }\">\n            </div>\n            <div style=\"padding-top: 30px\">\n                <button id=\"btn-apply\" class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-reload'\">\n                    Terapkan Ke Semua Suku Cadang\n                </button>\n            </div>\n        </form>\n    </div>\n    <div id=\"process_output\" data-options=\"region:'east'\" title=\"Output\" style=\"width:60%;overflow: scroll;padding:20px\">\n\n    </div>\n</div>\n<script>\n    \$(\"#btn-apply\").click(function(){\n        var value = \$(\"#slider\").slider(\"getValue\");\n        if(confirm(\"Anda yakin ingin mengubah semua harga jual suku cadang pada bengkel anda menjadi \"+value+\" % ?\")){\n            \$(\"#btn-apply\").linkbutton(\"disable\");\n            \$(\"#process_output\").load(\"";
echo yii\helpers\Url::to(array("process", "percentage" => ""));
echo "\" + value, function(){\n                \$(\"#btn-apply\").linkbutton(\"enable\");\n            });\n        }\n        return false;\n    });\n\n    setTitle(\"Adjust Harga Jual\");\n</script>";

?>