<?php

echo "<div class=\"easyui-layout\" style=\"width:100%;height:100%;\">\n    <div data-options=\"region:'center',border:false\" style=\"height:100%;padding: 10px\">\n        <div class=\"form-control\">\n            <input id=\"tanggal_awal\" class=\"easyui-datebox\"\n                   label=\"Interval Waktu:\" labelWidth=\"100px\"\n                   style=\"width:220px\" value=\"";
echo date("Y-m-d");
echo "\">\n            s/d\n            <input id=\"tanggal_akhir\" class=\"easyui-datebox\"\n                   style=\"width:120px\" value=\"";
echo date("Y-m-d");
echo "\">\n        </div>\n        <div class=\"form-control\">\n            Jenis Laporan :<br>\n            <input type=\"radio\" name=\"jenis\" value=\"rp\" checked> Internal<br>\n            <input type=\"radio\" name=\"jenis\" value=\"ue\"> Unit Entry<br>\n        </div>\n        <div class=\"form-control\">\n            <a id=\"btn-cetak\" href=\"#\" class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-search'\">Cetak</a>\n        </div>\n    </div>\n</div>\n<script>\n    \$(\"#btn-cetak\").click(function () {\n        var url = null;\n        var radio = \$(\"input[name='jenis']:checked\").val();\n        if(radio == \"rp\"){\n            url = \"";
echo yii\helpers\Url::to(array("laporan-mekanik"));
echo "\";\n        }else if(radio == \"ue\"){\n            url = \"";
echo yii\helpers\Url::to(array("laporan-mekanik-unit"));
echo "\";\n        }\n\n        window.open(url + \"?tanggal1=\"+\$(\"#tanggal_awal\").val()+\"&tanggal2=\"+\$(\"#tanggal_akhir\").val(), \"Laporan\", \"width=800,height=600\");\n\n        return false;\n    });\n\n    setTitle(\"Laporan\");\n</script>";

?>