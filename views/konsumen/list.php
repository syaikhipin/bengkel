<?php

$model = new app\models\Konsumen();
echo "<div class=\"easyui-layout\" style=\"width:100%;height:100%;\">\n    <div data-options=\"region:'north'\" style=\"height:50%;overflow: hidden\">\n        <table id=\"tt\"\n               class=\"easyui-datagrid\" style=\"width:100%;height:100%\"\n               url=\"";
echo yii\helpers\Url::to(array("list-data"));
echo "\"\n               title=\"Data Konsumen\"\n               singleselect=\"true\"\n               fitColumns=\"true\"\n               rownumbers=\"true\" pagination=\"true\">\n            <thead>\n            <tr>\n                <th field=\"nopol\" width=\"80\">Nopol</th>\n                <th field=\"jenis_identitas\" width=\"140\">Jenis Identitas</th>\n                <th field=\"no_identitas\" width=\"190\">No Identitas</th>\n                <th field=\"nama_identitas\" width=\"200\">Nama Identitas</th>\n                <th field=\"alamat\" width=\"200\">Alamat</th>\n                <th field=\"kodepos\" width=\"80\">Kodepos</th>\n                <th field=\"no_telelpon\" width=\"80\">No Telepon</th>\n                <th field=\"email\" width=\"80\">Email</th>\n                <th field=\"motor_nama\" width=\"80\">Motor</th>\n            </tr>\n            </thead>\n        </table>\n    </div>\n    <div data-options=\"region:'center'\" style=\"height:40%;padding: 10px 20px\">\n        <form id=\"form\" method=\"post\" action=\"\">\n            <div class=\"half\">\n                <div class=\"form-control\">\n                    ";
echo app\components\EasyUI::input($model, "kode", 300);
echo "                </div>\n                <div class=\"form-control\">\n                    ";
echo app\components\EasyUI::combo($model, "jenis_identitas", 300, array("ktp" => "KTP", "sim" => "SIM", "kk" => "KK"));
echo "                </div>\n                <div class=\"form-control\">\n                    ";
echo app\components\EasyUI::input($model, "no_identitas", 300);
echo "                </div>\n                <div class=\"form-control\">\n                    ";
echo app\components\EasyUI::input($model, "nama_identitas", 400);
echo "                </div>\n                <div class=\"form-control\">\n                    ";
echo app\components\EasyUI::input($model, "nama_pengguna", 400);
echo "                </div>\n                <div class=\"form-control\">\n                    ";
echo app\components\EasyUI::input($model, "alamat", 400);
echo "                </div>\n\n                ";
echo app\components\EasyUI::wilayah($model);
echo "\n                <div class=\"form-control\">\n                    ";
echo app\components\EasyUI::input($model, "kodepos", 250);
echo "                </div>\n\n                <div class=\"form-control\">\n                    ";
echo app\components\EasyUI::combo($model, "konsumen_group_id", 300, yii\helpers\ArrayHelper::map(app\models\KonsumenGroup::find()->where(array("jaringan_id" => app\models\Jaringan::getCurrentID()))->all(), "id", "nama"), array());
echo "                </div>\n            </div>\n            <div class=\"half\">\n                <div class=\"form-control\">\n                    ";
echo app\components\EasyUI::input($model, "no_telepon", 250, array("prompt" => "+628XXXXXXXX"));
echo "                </div>\n                <div class=\"form-control\">\n                    ";
echo app\components\EasyUI::input($model, "email", 400);
echo "                </div>\n                <div class=\"form-control\">\n                    ";
echo app\components\EasyUI::input($model, "no_whatsapp", 250, array("prompt" => "+628XXXXXXXX"));
echo "                </div>\n                <div class=\"form-control\">\n                    ";
echo app\components\EasyUI::input($model, "facebook", 400);
echo "                </div>\n                <div class=\"form-control\">\n                    ";
echo app\components\EasyUI::input($model, "instagram", 400);
echo "                </div>\n                <div class=\"form-control\">\n                    ";
echo app\components\EasyUI::input($model, "twitter", 400);
echo "                </div>\n                <div class=\"form-control\">\n                    ";
echo app\components\EasyUI::input($model, "tempat_lahir", 300);
echo "                </div>\n                <div class=\"form-control\">\n                    ";
echo app\components\EasyUI::date($model, "tanggal_lahir", 250);
echo "                    Format : YYYY-MM-DD\n                </div>\n                <div class=\"form-control\">\n                    ";
echo app\components\EasyUI::combo($model, "jenis_kelamin", 250, array("L" => "Laki-laki", "P" => "Perempuan"), array("prompt" => "(Pilih)"));
echo "                </div>\n                <div class=\"form-control\">\n                    ";
echo app\components\EasyUI::combo($model, "agama", 300, array("Islam" => "Islam", "Katolik" => "Katolik", "Protestan" => "Protestan", "Hindu" => "Hindu", "Buddha" => "Buddha"), array("prompt" => "(Pilih)"));
echo "                </div>\n                <div class=\"form-control\">\n                    ";
echo app\components\EasyUI::combo($model, "pendidikan", 300, array("SLTP" => "SLTP", "SLTA" => "SLTA", "STM/SMK" => "STM/SMK", "DIPLOMA" => "DIPLOMA", "SARJANA" => "SARJANA", "PASCA SARJANA" => "PASCA SARJANA"), array("prompt" => "(Pilih)"));
echo "                </div>\n                <div class=\"form-control\">\n                    ";
echo app\components\EasyUI::input($model, "pekerjaan", 300);
echo "                </div>\n                <div class=\"form-control\">\n                    ";
echo app\components\EasyUI::input($model, "nopol", 200);
echo "                </div>\n                <div class=\"form-control\">\n                    ";
echo app\components\EasyUI::combo($model, "motor_id", 540, yii\helpers\ArrayHelper::map(app\models\Motor::find()->all(), "id", "namaLengkap"), array("prompt" => "(Pilih)"));
echo "                </div>\n                <div class=\"form-control\">\n                    ";
echo app\components\EasyUI::input($model, "no_mesin", 300);
echo "                </div>\n                <div class=\"form-control\">\n                    ";
echo app\components\EasyUI::input($model, "no_rangka", 300);
echo "                </div>\n                <div class=\"form-control\">\n                    ";
echo app\components\EasyUI::input($model, "tahun_rakit", 200);
echo "                </div>\n                <div class=\"form-control\">\n                    ";
echo app\components\EasyUI::date($model, "tanggal_beli", 250);
echo "                </div>\n                <div class=\"form-control\">\n                    ";
echo app\components\EasyUI::input($model, "nama_dealer_beli", 300);
echo "                </div>\n                <div class=\"form-control\">\n                    ";
echo app\components\EasyUI::input($model, "kota_dealer_beli", 300);
echo "                </div>\n                <div class=\"form-control\">\n                    ";
echo app\components\EasyUI::date($model, "service_terakhir", 250, array("disabled" => true));
echo "                </div>\n                <div class=\"form-control\">\n                    ";
echo app\components\EasyUI::input($model, "kilometer_terakhir", 200, array("disabled" => true));
echo "                </div>\n                <div class=\"form-control\">\n                    ";
echo app\components\EasyUI::input($model, "sms", 300);
echo "                </div>\n            </div>\n        </form>\n    </div>\n    <div data-options=\"region:'south'\" style=\"height:10%;padding: 10px 20px\">\n        <button id=\"btn-add\" class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-add'\">Tambah Baru</button>\n        <button id=\"btn-save\" class=\"easyui-linkbutton\" data-options=\"iconCls:'fam disk'\">Simpan</button>\n        <button id=\"btn-delete\" class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-cancel'\">Hapus</button>\n    </div>\n</div>\n\n<script>\n    var konsumen = null;\n\n    \$(\"#tt\").datagrid({\n        toolbar: addSearchToolbar('tt'),\n        onClickRow: function (index, row) {\n            konsumen = row;\n\n            temporaryData = row;\n\n            for (var property in konsumen) {\n                if (konsumen.hasOwnProperty(property)) {\n                    //console.log(property, selectedData[property])\n                    \$(\"#\" + property).setValue(konsumen[property]);\n                }\n            }\n        }\n    });\n\n    \$(\"#btn-add\").linkbutton({\n        onClick: function () {\n            \$(\"#form\").form('reset');\n            konsumen = null;\n        }\n    });\n\n    \$(\"#btn-save\").linkbutton({\n        onClick: function () {\n            var serialize = \$(\"#form\").serialize();\n            console.log(serialize);\n            \$.ajax({\n                url: \"";
echo yii\helpers\Url::to(array("save"));
echo "\" + (konsumen == null ? \"\" : \"?id=\" + konsumen.id),\n                data: serialize,\n                type: \"post\",\n                dataType: \"json\",\n                success: function (msg) {\n                    if(msg.status == 200) {\n                        dialog(\"Simpan Data Sukses\");\n                        \$('#tt').datagrid('reload');\n                    }\n                },\n                error: function(xhr, ajaxOptions, thrownError){\n                    dialog(xhr.responseJSON.message);\n                }\n            });\n            return false;\n        }\n    });\n\n    \$(\"#btn-delete\").click(function () {\n        \$.ajax({\n            url: \"";
echo yii\helpers\Url::to(array("delete"));
echo "?id=\" + konsumen.id,\n            success: function (msg) {\n                dialog(\"Hapus Data Sukses\");\n                \$('#tt').datagrid('reload');\n                \$(\"#form\").form(\"clear\");\n                konsumen = null;\n            }\n        });\n        return false;\n    });\n\n    \$(\"#no_telepon\").textbox({\n        onChange: function () {\n            \$(\"#no_whatsapp\").textbox('setValue', \$(\"#no_telepon\").textbox('getValue'));\n        }\n    });\n\n    setTitle(\"Konsumen\");\n</script>";

?>