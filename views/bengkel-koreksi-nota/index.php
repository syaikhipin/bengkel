<?php

echo "<div class=\"easyui-layout\" style=\"width:100%;height:100%;\">\n    <div data-options=\"region:'north',border:false\" style=\"height:350px;padding: 10px;overflow: hidden\">\n        <div class=\"form-control\">\n            ";
echo yii\helpers\Html::dropDownList("nota_jasa_id", NULL, array(), array("class" => "easyui-combobox", "id" => "nota_jasa_id", "label" => "No. NJB:", "labelWidth" => "150px", "style" => "width:350px", "disabled" => true));
echo "\n            <button id=\"btn_search_njb\" class=\"easyui-linkbutton\"\n                    data-options=\"iconCls:'icon-search'\"></button>\n        </div>\n        <div class=\"form-control\">\n            <input id=\"alasan\" class=\"easyui-textbox\" label=\"Alasan:\" labelWidth=\"150px\"\n                   data-options=\"\" style=\"width:450px\">\n        </div>\n        <div style=\"margin-left: 150px\">\n            <button id=\"btn_search\" class=\"easyui-linkbutton\" iconCls=\"icon-search\">Cari Data</button>\n            <button id=\"btn_simpan\" disabled class=\"easyui-linkbutton\" iconCls=\"fam disk\">Simpan Perubahan</button>\n        </div>\n        <hr/>\n        <h3>Informasi Pelayanan Jasa Bengkel</h3>\n        <div class=\"easyui-layout\" style=\"width:100%;height:200px;\">\n            <div data-options=\"region:'west',border:false\" style=\"width:50%;overflow: hidden\">\n                <div class=\"form-control\">\n                    <input id=\"no_njb\" disabled class=\"easyui-textbox\" label=\"No NJB:\" labelWidth=\"200px\"\n                           data-options=\"\" style=\"width: 350px\">\n                </div>\n                <div class=\"form-control\">\n                    <input id=\"tanggal_njb\" disabled class=\"easyui-datebox\" label=\"Tgl Nota:\" labelWidth=\"200px\"\n                           style=\"width: 320px\" value=\"\">\n                </div>\n                <div class=\"form-control\">\n                    ";
echo yii\helpers\Html::dropDownList("status_njb_id", NULL, yii\helpers\ArrayHelper::map(app\models\StatusNjb::find()->all(), "id", "nama"), array("class" => "easyui-combobox", "id" => "status_njb_id", "label" => "Status:", "labelWidth" => "200px", "style" => "width:350px", "disabled" => true, "prompt" => "(Pilih)"));
echo "                </div>\n                <div class=\"form-control\">\n                    ";
echo yii\helpers\Html::dropDownList("karyawan_id", NULL, yii\helpers\ArrayHelper::map(app\models\User::getCurrentActive(), "id", "name"), array("class" => "easyui-combobox", "id" => "karyawan_id", "label" => "Karyawan:", "labelWidth" => "200px", "style" => "width:350px", "disabled" => true, "prompt" => "(Pilih)"));
echo "                </div>\n            </div>\n            <div data-options=\"region:'east',border:false\" style=\"width:50%;padding-left: 10px\">\n                <div class=\"form-control\">\n                    <div class=\"form-control\">\n                        <input id=\"nama\" disabled class=\"easyui-textbox\" label=\"Nama Konsumen:\" labelWidth=\"200px\"\n                               data-options=\"\" style=\"width:100%\">\n                    </div>\n                    <div class=\"form-control\">\n                        <input id=\"alamat\" disabled class=\"easyui-textbox\" label=\"Alamat:\" labelWidth=\"200px\"\n                               data-options=\"\" style=\"width:100%\">\n                    </div>\n                    <div class=\"form-control\">\n                        <input id=\"kota\" disabled class=\"easyui-textbox\" label=\"Kota:\" labelWidth=\"200px\"\n                               data-options=\"\" style=\"width:400px\">\n                    </div>\n                    <div class=\"form-control\" style=\"margin-top: 20px\">\n                        <input id=\"total_pembelian\" disabled class=\"easyui-textbox\" label=\"Total Pembelian:\"\n                               labelWidth=\"200px\"\n                               data-options=\"\" style=\"width:300px\">\n                    </div>\n                </div>\n            </div>\n        </div>\n    </div>\n    <div data-options=\"region:'center',border:false\" style=\"padding: 10px\">\n        <table id=\"list_detail_njb\" style=\"height: 100%;width: 100%;\">\n            <thead>\n            <tr>\n                <th field=\"jasa_kode\" width=\"80\">Kode Part</th>\n                <th field=\"jasa_nama\" width=\"150\">Nama</th>\n                <th field=\"harga\" width=\"60\" align=\"right\" formatter=\"formatMoney\">Harga</th>\n                <th field=\"diskon_p\" width=\"60\" align=\"right\">Diskon(%)</th>\n                <th field=\"diskon_r\" width=\"60\" align=\"right\">Diskon(Rp)</th>\n                <th field=\"total\" width=\"100\" align=\"right\" formatter=\"formatMoney\">Total</th>\n                <th field=\"beban_pembayaran_nama\" width=\"100\" align=\"center\">Pembayaran</th>\n                <th field=\"koreksi_nota_action\" width=\"100\" align=\"center\">#</th>\n            </tr>\n            </thead>\n        </table>\n    </div>\n</div>\n\n<div id=\"dialog_search_njb\" class=\"easyui-window\">\n    <table class=\"easyui-datagrid\" id=\"list_njb\" style=\"height: 100%;width:100%\">\n        <thead>\n        <tr>\n            <th field=\"nomor\" width=\"150\">No NJB</th>\n            <th field=\"no_pkb\" width=\"150\">No PKB</th>\n            <th field=\"tanggal_njb_format\" align=\"center\" width=\"100\">Tgl Service</th>\n            <th field=\"total\" width=\"120\" align=\"right\" formatter=\"formatMoney\">Total</th>\n        </tr>\n        </thead>\n    </table>\n</div>\n\n\n<div id=\"dialog_edit_detail\" class=\"easyui-window\" style=\"padding: 10px 20px\">\n    <div class=\"form-control\">\n        ";
echo yii\helpers\Html::dropDownList("beban_pembayaran_id", NULL, yii\helpers\ArrayHelper::map(app\models\BebanPembayaran::find()->all(), "id", "nama"), array("class" => "easyui-combobox", "id" => "beban_pembayaran_id", "label" => "Jenis Pembayaran:", "labelWidth" => "180px", "style" => "width:350px"));
echo "    </div>\n    <div style=\"margin-top: 20px;padding-left: 180px\">\n        <button id=\"btn_simpan_detail\" class=\"easyui-linkbutton\" iconCls=\"fam disk\">Simpan</button>\n    </div>\n</div>\n\n<div id=\"dialog_otorisasi\" class=\"easyui-dialog\">\n    <div style=\"padding: 20px 30px\">\n        <div class=\"form-control\">\n            ";
echo yii\helpers\Html::dropDownList("user_id", NULL, yii\helpers\ArrayHelper::map(app\models\User::getAuthorizedUsers(), "id", "name"), array("class" => "easyui-combobox", "id" => "user_id", "label" => "Kepala/Owner", "labelWidth" => "100px", "style" => "width:300px"));
echo "        </div>\n        <div class=\"form-control\">\n            <input id=\"user_password\" class=\"easyui-passwordbox\" label=\"Password:\" labelWidth=\"100px\"\n                   data-options=\"\" style=\"width:300px\">\n        </div>\n    </div>\n</div>\n\n<script>\n    //Search pengeluaran\n    \$(\"#dialog_search_njb\").window({\n        width: 800,\n        height: 380,\n        modal: true,\n        closed: true,\n        title: \"Data NJB (Klik 2x untuk memilih)\"\n    });\n\n    \$(\"#list_njb\").datagrid({\n        url: \"";
echo yii\helpers\Url::to(array("list-njb"));
echo "\",\n        singleSelect: true,\n        pagination: true,\n        rownumbers: true,\n        fitColumns: true,\n        //pageSize: 19,\n        toolbar: addSearchToolbar(\"list_njb\"),\n        onDblClickRow: function (index, row) {\n            var data_id = row.id;\n            \$(\"#nota_jasa_id\").combobox(\"reload\", \"";
echo yii\helpers\Url::to(array("njb-combo"));
echo "?id=\" + data_id);\n            \$(\"#nota_jasa_id\").combobox(\"select\", data_id);\n            \$('#dialog_search_njb').window('close');\n        }\n    });\n\n    \$(\"#btn_search_njb\").linkbutton({\n        onClick: function () {\n            \$('#dialog_search_njb').window('open');\n            \$(\"#list_njb\").datagrid('reload');\n            return false;\n        }\n    });\n\n    \$(\"#btn_search\").click(function () {\n        \$.ajax({\n            url: \"";
echo yii\helpers\Url::to(array("load"));
echo "?id=\" + \$(\"#nota_jasa_id\").combobox(\"getValue\"),\n            dataType: \"json\",\n            success: function (msg) {\n                var data = msg.data;\n                console.log(data);\n                \$(\"#no_njb\").textbox(\"setValue\", data.nomor);\n                \$(\"#tanggal_njb\").datebox(\"setValue\", data.tanggal_njb);\n                \$(\"#status_njb_id\").combobox('select', data.status_njb_id);\n                \$(\"#karyawan_id\").combobox('select', data.karyawan_id).combobox('enable');\n                \$(\"#nama\").textbox(\"setValue\", data.konsumen_nama);\n                \$(\"#alamat\").textbox(\"setValue\", data.konsumen_alamat);\n                \$(\"#kota\").textbox(\"setValue\", data.konsumen_kota);\n                \$(\"#total_pembelian\").textbox(\"setValue\", data.total);\n\n                \$(\"#list_detail_njb\").datagrid('load', \"";
echo yii\helpers\Url::to(array("list-detail-njb"));
echo "?id=\" + data.id);\n\n                \$(\"#btn_simpan\").linkbutton(\"enable\");\n            },\n            error: function (xhr, ajaxOptions, thrownError) {\n                dialog(xhr.responseJSON.message);\n            }\n        });\n        return false;\n    });\n\n    \$(\"#btn_simpan\").linkbutton({\n        onClick: function () {\n            if (\$(\"#alasan\").textbox(\"getValue\") == \"\") {\n                dialog(\"Mohon isi Alasan.\");\n                return false;\n            }\n\n            \$(\"#dialog_otorisasi\").dialog('open');\n            return false;\n        }\n    });\n\n    \$(\"#list_detail_njb\").datagrid({\n        url: \"";
echo yii\helpers\Url::to(array("list-detail-njb"));
echo "\",\n        singleSelect: true,\n        pagination: true,\n        rownumbers: true,\n        fitColumns: true\n    });\n\n    \$(\"#dialog_edit_detail\").window({\n        width: 430,\n        height: 130,\n        modal: true,\n        closed: true,\n        title: \"Edit Detail NJB\"\n    });\n\n    \$.parser.parse(\"#dialog_edit_detail\");\n\n    var detail_id = null;\n\n    \$(document).off(\"click\", \".detail-edit\");\n    \$(document).on(\"click\", \".detail-edit\", function () {\n        detail_id = \$(this).attr(\"data_id\");\n        \$(\"#beban_pembayaran_id\").combobox(\"select\", \$(this).attr(\"beban_pembayaran_id\"));\n        \$('#dialog_edit_detail').window('open');\n        \$(\"#btn_simpan_detail\").linkbutton('enable');\n    });\n\n    \$(\"#btn_simpan_detail\").linkbutton({\n        onClick: function () {\n            \$(\"#btn_simpan_detail\").linkbutton('disable');\n            \$.ajax({\n                url: \"";
echo yii\helpers\Url::to(array("update-detail-pembayaran"));
echo "?id=\" + detail_id,\n                data: {\n                    beban_pembayaran_id: \$(\"#beban_pembayaran_id\").combobox('getValue')\n                },\n                dataType: \"json\",\n                success: function (msg) {\n                    \$(\"#list_detail_njb\").datagrid('reload');\n                    \$('#dialog_edit_detail').window('close');\n                }\n            });\n        }\n    });\n\n    \$.parser.parse(\"#dialog_otorisasi\");\n    \$(\"#dialog_otorisasi\").dialog({\n        width: 400,\n        height: 170,\n        modal: true,\n        closed: true,\n        title: \"Otorisasi Kepala Bengkel/Owner\",\n        buttons:[{\n            text:'Lanjutkan',\n            iconCls: \"fam disk\",\n            handler:function(){\n                \$.ajax({\n                    url: \"";
echo yii\helpers\Url::to(array("update"));
echo "\",\n                    data: {\n                        id: \$(\"#nota_jasa_id\").combobox(\"getValue\"),\n                        status_njb_id: \$(\"#status_njb_id\").combobox(\"getValue\"),\n                        karyawan_id: \$(\"#karyawan_id\").combobox(\"getValue\"),\n                        keterangan: \$(\"#alasan\").textbox(\"getValue\"),\n                        user_id: \$(\"#user_id\").combobox(\"getValue\"),\n                        user_password: \$(\"#user_password\").passwordbox(\"getValue\")\n                    },\n                    dataType: \"json\",\n                    success: function (msg) {\n                        dialog(msg.message);\n                    }\n                });\n                \$(\"#dialog_otorisasi\").dialog('close');\n            }\n        },{\n            text:'Batal',\n            iconCls: \"icon-cancel\",\n            handler:function(){\n                \$(\"#dialog_otorisasi\").dialog('close');\n            }\n        }]\n    });\n\n    setTitle(\"Koreksi Nota Jasa\");\n</script>";

?>