<?php

echo "<div class=\"easyui-layout\" style=\"width:100%;height:100%;\">\n    <div data-options=\"region:'north',border:false\" style=\"height:350px;padding: 10px;overflow: hidden\">\n        <form id=\"form_atas\">\n            <div class=\"form-control\">\n                ";
echo yii\helpers\Html::dropDownList("penerimaan_part_id", NULL, array(), array("class" => "easyui-combobox", "id" => "penerimaan_part_id", "label" => "No. SPG:", "labelWidth" => "150px", "style" => "width:350px", "disabled" => true));
echo "\n                <button id=\"btn_search_penerimaan\" class=\"easyui-linkbutton\"\n                        data-options=\"iconCls:'icon-search'\"></button>\n            </div>\n            <div class=\"form-control\">\n                <input id=\"alasan\" class=\"easyui-textbox\" label=\"Alasan:\" labelWidth=\"150px\"\n                       data-options=\"\" style=\"width:450px\">\n            </div>\n            <div style=\"margin-left: 150px\">\n                <button id=\"btn_search\" class=\"easyui-linkbutton\" iconCls=\"icon-search\">Cari Data</button>\n                <button id=\"btn_proses_batal\" disabled class=\"easyui-linkbutton\" iconCls=\"icon-remove\">Proses Batal\n                </button>\n            </div>\n        </form>\n        <hr/>\n        <h3>Informasi Penerimaan</h3>\n        <div class=\"easyui-layout\" style=\"width:100%;height:200px;\">\n            <div data-options=\"region:'west',border:false\" style=\"width:50%;overflow: hidden\">\n                <form id=\"form_bawah\">\n                    <div class=\"form-control\">\n                        <input id=\"no_faktur\" disabled class=\"easyui-textbox\" label=\"No Faktur:\" labelWidth=\"200px\"\n                               data-options=\"\" style=\"width: 350px\">\n                    </div>\n                    <div class=\"form-control\">\n                        <input id=\"tanggal_penerimaan\" disabled class=\"easyui-datebox\" label=\"Tgl Nota:\"\n                               labelWidth=\"200px\"\n                               style=\"width: 320px\" value=\"\">\n                    </div>\n                    <div class=\"form-control\">\n                        ";
echo yii\helpers\Html::dropDownList("pembayaran_id", NULL, yii\helpers\ArrayHelper::map(app\models\Pembayaran::find()->all(), "id", "nama"), array("class" => "easyui-combobox", "id" => "pembayaran_id", "label" => "Pembayaran:", "labelWidth" => "200px", "style" => "width:350px", "disabled" => true));
echo "                    </div>\n                    <div class=\"form-control\">\n                        ";
echo yii\helpers\Html::dropDownList("supplier_id", NULL, yii\helpers\ArrayHelper::map(app\models\Supplier::find()->where(array("jaringan_id" => app\models\Jaringan::getCurrentID()))->all(), "id", "nama"), array("class" => "easyui-combobox", "id" => "supplier_id", "label" => "Supplier:", "labelWidth" => "200px", "style" => "width:450px", "disabled" => true));
echo "                    </div>\n                    <div class=\"form-control\">\n                        <input id=\"alamat\" disabled class=\"easyui-textbox\" label=\"Alamat:\" labelWidth=\"200px\"\n                               data-options=\"\" style=\"width:100%\">\n                    </div>\n                    <div class=\"form-control\">\n                        <input id=\"kota\" disabled class=\"easyui-textbox\" label=\"Kota:\" labelWidth=\"200px\"\n                               data-options=\"\" style=\"width:400px\">\n                    </div>\n                </form>\n            </div>\n            <div data-options=\"region:'east',border:false\" style=\"width:50%;padding-left: 10px\">\n                <form id=\"form_samping\">\n                    <div class=\"form-control\">\n                        <input id=\"total_pembelian\" disabled class=\"easyui-textbox\" label=\"Total Pembelian:\"\n                               labelWidth=\"200px\"\n                               data-options=\"\" style=\"width:100%\">\n                    </div>\n                </form>\n            </div>\n        </div>\n    </div>\n    <div data-options=\"region:'center',border:false\" style=\"padding: 10px\">\n        <table id=\"list_detail_penerimaan\" style=\"height: 100%;width: 100%;\">\n            <thead>\n            <tr>\n                <th field=\"suku_cadang_kode\" width=\"80\">Kode Part</th>\n                <th field=\"suku_cadang_nama\" width=\"150\">Nama</th>\n                <th field=\"harga_beli\" width=\"60\" align=\"right\" formatter=\"formatMoney\">Harga Beli</th>\n                <th field=\"quantity_order\" width=\"60\" align=\"right\">Qty Stok</th>\n                <th field=\"diskon_p\" width=\"60\" align=\"right\">Diskon(%)</th>\n                <th field=\"diskon_r\" width=\"60\" align=\"right\">Diskon(Rp)</th>\n                <th field=\"rak_nama\" width=\"100\" align=\"center\">Rak</th>\n                <th field=\"total_harga\" width=\"100\" align=\"right\" formatter=\"formatMoney\">Total</th>\n            </tr>\n            </thead>\n        </table>\n    </div>\n</div>\n\n<div id=\"dialog_search_penerimaan\">\n    <table class=\"easyui-datagrid\" id=\"list_penerimaan\" style=\"height: 100%;width:100%\">\n        <thead>\n        <tr>\n            <th field=\"no_spg\" width=\"150\">No SPG</th>\n            <th field=\"no_faktur\" width=\"150\">No Faktur</th>\n            <th field=\"tanggal_penerimaan_format\" align=\"center\" width=\"100\">Tgl Penerimaan</th>\n            <th field=\"total\" width=\"120\" align=\"right\" formatter=\"formatMoney\">Total</th>\n        </tr>\n        </thead>\n    </table>\n</div>\n\n<div id=\"dialog_otorisasi\" class=\"easyui-dialog\">\n    <div style=\"padding: 20px 30px\">\n        <div class=\"form-control\">\n            ";
echo yii\helpers\Html::dropDownList("user_id", NULL, yii\helpers\ArrayHelper::map(app\models\User::getAuthorizedUsers(), "id", "name"), array("class" => "easyui-combobox", "id" => "user_id", "label" => "Kepala/Owner", "labelWidth" => "100px", "style" => "width:300px"));
echo "        </div>\n        <div class=\"form-control\">\n            <input id=\"user_password\" class=\"easyui-passwordbox\" label=\"Password:\" labelWidth=\"100px\"\n                   data-options=\"\" style=\"width:300px\">\n        </div>\n    </div>\n</div>\n\n<script>\n    //Search Penerimaan\n    \$(\"#dialog_search_penerimaan\").window({\n        width: 800,\n        height: 380,\n        modal: true,\n        closed: true,\n        title: \"Data SPG (Klik 2x untuk memilih)\"\n    });\n\n    \$(\"#list_penerimaan\").datagrid({\n        url: \"";
echo yii\helpers\Url::to(array("list-penerimaan"));
echo "\",\n        singleSelect: true,\n        pagination: true,\n        rownumbers: true,\n        fitColumns: true,\n        //pageSize: 19,\n        toolbar: addSearchToolbar(\"list_penerimaan\"),\n        onDblClickRow: function (index, row) {\n            var data_id = row.id;\n            \$(\"#penerimaan_part_id\").combobox(\"reload\", \"";
echo yii\helpers\Url::to(array("spg-combo"));
echo "?id=\" + data_id);\n            \$(\"#penerimaan_part_id\").combobox(\"select\", data_id);\n            \$('#dialog_search_penerimaan').window('close');\n        }\n    });\n\n    \$(\"#btn_search_penerimaan\").linkbutton({\n        onClick: function () {\n            \$('#dialog_search_penerimaan').window('open');\n            \$(\"#list_penerimaan\").datagrid('reload');\n            return false;\n        }\n    });\n\n    \$(\"#btn_search\").linkbutton({\n        onClick: function () {\n            \$.ajax({\n                url: \"";
echo yii\helpers\Url::to(array("load"));
echo "?id=\" + \$(\"#penerimaan_part_id\").combobox(\"getValue\"),\n                dataType: \"json\",\n                success: function (msg) {\n                    var data = msg.data;\n                    \$(\"#no_faktur\").textbox(\"setValue\", data.no_faktur);\n                    \$(\"#tanggal_penerimaan\").datebox(\"setValue\", data.tanggal_penerimaan);\n                    \$(\"#pembayaran_id\").combobox(\"setValue\", data.pembayaran_id);\n                    \$(\"#supplier_id\").combobox(\"setValue\", data.supplier_id);\n                    \$(\"#alamat\").textbox(\"setValue\", data.supplier.alamat);\n                    \$(\"#kota\").textbox(\"setValue\", data.supplier.kota);\n                    \$(\"#total_pembelian\").textbox(\"setValue\", data.total);\n\n                    \$(\"#list_detail_penerimaan\").datagrid('load', \"";
echo yii\helpers\Url::to(array("list-detail-penerimaan"));
echo "?id=\" + data.id);\n\n                    \$(\"#btn_proses_batal\").linkbutton(\"enable\");\n                },\n                error: function (xhr, ajaxOptions, thrownError) {\n                    dialog(xhr.responseJSON.message);\n                }\n            });\n            return false;\n        }\n    });\n\n    \$(\"#btn_proses_batal\").linkbutton({\n        onClick: function () {\n            if (\$(\"#alasan\").textbox(\"getValue\") == \"\") {\n                dialog(\"Mohon isi Alasan.\");\n                return false;\n            }\n\n            \$(\"#dialog_otorisasi\").dialog('open');\n            return false;\n        }\n    });\n\n    \$(\"#list_detail_penerimaan\").datagrid({\n        url: \"";
echo yii\helpers\Url::to(array("list-detail-penerimaan"));
echo "\",\n        singleSelect: true,\n        pagination: true,\n        rownumbers: true,\n        fitColumns: true\n    });\n\n    \$.parser.parse(\"#dialog_otorisasi\");\n    \$(\"#dialog_otorisasi\").dialog({\n        width: 400,\n        height: 170,\n        modal: true,\n        closed: true,\n        title: \"Otorisasi Kepala Bengkel/Owner\",\n        buttons: [{\n            text: 'Lanjutkan',\n            iconCls: \"fam disk\",\n            handler: function () {\n                \$.ajax({\n                    url: \"";
echo yii\helpers\Url::to(array("proses-batal"));
echo "\",\n                    data: {\n                        id: \$(\"#penerimaan_part_id\").combobox(\"getValue\"),\n                        keterangan: \$(\"#alasan\").textbox(\"getValue\"),\n                        user_id: \$(\"#user_id\").combobox(\"getValue\"),\n                        user_password: \$(\"#user_password\").passwordbox(\"getValue\")\n                    },\n                    dataType: \"json\",\n                    success: function (msg) {\n                        dialog(msg.message);\n\n                        \$(\"#form_atas\").form('reset');\n                        \$(\"#form_bawah\").form('reset');\n                        \$(\"#form_samping\").form('reset');\n                    }\n                });\n                \$(\"#dialog_otorisasi\").dialog('close');\n            }\n        }, {\n            text: 'Batal',\n            iconCls: \"icon-cancel\",\n            handler: function () {\n                \$(\"#dialog_otorisasi\").dialog('close');\n            }\n        }]\n    });\n\n    setTitle(\"Retur Pembelian\");\n</script>";

?>