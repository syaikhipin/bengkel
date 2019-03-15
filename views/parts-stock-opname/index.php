<?php

echo "<div class=\"easyui-layout\" style=\"width: 100%;height: 100%\">\n    <div data-options=\"region:'north'\" style=\"height:150px;padding: 10px;\">\n        <div class=\"easyui-layout\" style=\"width: 100%;height: 100%\">\n            <!--<div data-options=\"region:'west',border:false\" style=\"width: 20%;padding: 10px\">\n\n            </div>-->\n            <div data-options=\"region:'center',border:false\" style=\"padding: 10px\">\n                <div class=\"form-control\">\n                    <input id=\"no_opname\" disabled class=\"easyui-textbox\" label=\"No Opname:\" labelWidth=\"100px\"\n                           data-options=\"\" style=\"width:250px\">\n                </div>\n                <div class=\"form-control\">\n                    ";
echo yii\helpers\Html::dropDownList("petugas_id", NULL, yii\helpers\ArrayHelper::map(app\models\User::getCurrentActive(), "id", "name"), array("class" => "easyui-combobox", "id" => "petugas_id", "label" => "Petugas:", "labelWidth" => "100px", "style" => "width:350px", "disabled" => true));
echo "                </div>\n                <div class=\"form-control\">\n                    <input id=\"tanggal_opname\" disabled class=\"easyui-datebox\" label=\"Tgl Opname:\" labelWidth=\"100px\" data-options=\"\"\n                           style=\"width:220px\" value=\"";
echo date("Y-m-d");
echo "\">\n                </div>\n                <div class=\"form-control\">\n                    ";
echo yii\helpers\Html::dropDownList("status_opname_id", NULL, yii\helpers\ArrayHelper::map(app\models\StatusOpname::find()->all(), "id", "nama"), array("class" => "easyui-combobox", "id" => "status_opname_id", "label" => "Status:", "labelWidth" => "100px", "style" => "width:250px", "disabled" => true));
echo "                </div>\n            </div>\n            <div data-options=\"region:'east',border:false\" style=\"width: 60%\">\n                <table class=\"easyui-datagrid\" id=\"list_open_stock_opname\" style=\"height: 100%\">\n                    <thead>\n                    <tr>\n                        <th field=\"no_opname\" width=\"120\">Kode</th>\n                        <th field=\"tanggal_opname_format\" width=\"100\">Tanggal Proses</th>\n                        <th field=\"petugas_nama\" width=\"120\">Petugas</th>\n                        <th field=\"status_opname_nama\" width=\"80\">Status</th>\n                    </tr>\n                    </thead>\n                </table>\n            </div>\n        </div>\n    </div>\n    <div data-options=\"region:'center',border:false\" style=\"padding: 10px;\">\n        <table class=\"easyui-datagrid\" id=\"list_all_suku_cadang\" style=\"height: 100%\">\n            <thead>\n            <tr>\n                <th field=\"kode\" width=\"120\">Kode Part</th>\n                <th field=\"nama\" width=\"220\">Nama</th>\n                <th field=\"nama_sinonim\" width=\"220\">Sinonim</th>\n                <th field=\"harga_jual\" width=\"80\" align=\"right\" formatter=\"formatMoney\">Harga Jual</th>\n                <th field=\"quantity\" width=\"80\" align=\"right\">Quantity</th>\n                <th field=\"opname_terakhir\" width=\"120\" align=\"center\">Opname Terakhir</th>\n            </tr>\n            </thead>\n        </table>\n    </div>\n    <div data-options=\"region:'south',border:false\" style=\"height:240px;padding: 10px\">\n        <table class=\"easyui-datagrid\" id=\"list_detail_stock_opname\" style=\"height: 180px\" data-options=\"onLoadSuccess:function(){\n                        \$(this).datagrid('getPanel').find('a.easyui-linkbutton').linkbutton();\n                    }\">\n            <thead>\n            <tr>\n                <th field=\"suku_cadang_kode\" width=\"120\">Kode Part</th>\n                <th field=\"suku_cadang_nama\" width=\"220\">Nama</th>\n                <th field=\"rak_nama\" width=\"220\">Lokasi</th>\n                <th field=\"quantity_sy\" width=\"80\" align=\"right\">Quantity</th>\n                <th field=\"quantity_oh\" width=\"80\" align=\"right\">Quantity Gudang</th>\n                <th field=\"keterangan\" width=\"120\">Keterangan</th>\n                <th field=\"action\" width=\"120\">#</th>\n            </tr>\n            </thead>\n        </table>\n        <div style=\"height:30px;padding: 10px 0px\">\n            <button id=\"btn_add\" class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-add'\">Tambah</button>\n            <button id=\"btn_save\" disabled class=\"easyui-linkbutton\" data-options=\"iconCls:'fam disk'\">Simpan</button>\n            <!--<button disabled id=\"btn_mark_complete\" class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-ok'\">Tandai Sudah Selesai</button>-->\n            <button id=\"btn_delete\" disabled class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-remove'\">Hapus</button>\n            <button id=\"btn_form_cek_fisik\" disabled class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-print'\">Form Cek Fisik</button>\n            <button id=\"btn_validasi_data\" disabled class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-filter'\">Validasi Data</button>\n            <button id=\"btn_cetak_selisih\" disabled class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-print'\">Cetak Selisih</button>\n        </div>\n    </div>\n</div>\n\n<script>\n    var stock_opname_id = null;\n    var stock_opname = null;\n\n    function showStockOpname(){\n        if(stock_opname == null){\n            return;\n        }\n\n        \$(\"#no_opname\").textbox('setValue', stock_opname.no_opname);\n        \$(\"#tanggal_opname\").datebox('setValue', stock_opname.tanggal_opname);\n        \$(\"#status_opname_id\").combobox('select', stock_opname.status_opname_id);\n        \$(\"#petugas_id\").combobox('select', stock_opname.petugas_id);\n    }\n\n    \$(\"#list_open_stock_opname\").datagrid({\n        url: \"";
echo yii\helpers\Url::to(array("list-open-stock-opname"));
echo "\",\n        singleSelect: true,\n        pagination: true,\n        rownumbers: true,\n        fitColumns: true,\n        onClickRow: function(index,row){\n            stock_opname = row;\n            stock_opname_id = row.id;\n\n            console.log(stock_opname);\n\n            \$(\"#list_detail_stock_opname\").datagrid(\"load\", \"";
echo yii\helpers\Url::to(array("list-detail-stock-opname"));
echo "?id=\" + stock_opname_id);\n\n            \$(\"#btn_form_cek_fisik\").linkbutton(\"enable\");\n            \$(\"#btn_validasi_data\").linkbutton(\"enable\");\n            \$(\"#btn_cetak_selisih\").linkbutton(\"enable\");\n\n            \$(\"#btn_mark_complete\").linkbutton(\"enable\");\n\n            showStockOpname();\n        }\n    });\n\n    \$(\"#btn_add\").click(function(){\n        \$(\"#btn_save\").linkbutton(\"enable\");\n        \$(\"#petugas_id\").combobox(\"enable\");\n        \$(\"#tanggal_opname\").datebox(\"setValue\", \"";
echo date("Y-m-d");
echo "\");\n\n        return false;\n    });\n\n    \$(\"#btn_save\").click(function(){\n        \$(\"#btn_save\").linkbutton(\"disable\");\n        \$.ajax({\n            url : \"";
echo yii\helpers\Url::to(array("add-opname"));
echo "\",\n            data : {\n                petugas_id : \$(\"#petugas_id\").val(),\n                tanggal_opname : \$(\"#tanggal_opname\").val(),\n                status_opname_id : \$(\"#status_opname_id\").val(),\n            },\n            type : \"post\",\n            dataType : \"json\",\n            success: function(msg){\n                dialog(msg.message);\n                if(msg.status == 200){\n                    \$(\"#list_open_stock_opname\").datagrid(\"reload\");\n                }\n            },\n            error: function(xhr, ajaxOptions, thrownError){\n                dialog(xhr.responseJSON.message);\n            }\n        });\n\n        return false;\n    });\n\n    \$(\"#list_all_suku_cadang\").datagrid({\n        url: \"";
echo yii\helpers\Url::to(array("list-all-suku-cadang"));
echo "\",\n        singleSelect: true,\n        pagination: true,\n        rownumbers: true,\n        fitColumns: true,\n        toolbar: addSearchToolbar(\"list_all_suku_cadang\"),\n        onDblClickRow: function(index,row){\n            if(stock_opname_id == null){\n                dialog(\"Silakan pilih stock opname\");\n                return;\n            }\n            \$.ajax({\n                url : \"";
echo yii\helpers\Url::to(array("add-detail"));
echo "\",\n                data : {\n                    stock_opname_id : stock_opname_id,\n                    rak_id : row.rak_id,\n                    suku_cadang_id : row.id,\n                    quantity_oh : row.quantity,\n                    quantity_sy : row.quantity\n                },\n                type : \"post\",\n                dataType: \"json\",\n                success: function(msg){\n                    \$(\"#list_detail_stock_opname\").datagrid(\"load\", \"";
echo yii\helpers\Url::to(array("list-detail-stock-opname"));
echo "?id=\" + stock_opname_id);\n                },\n                error: function(xhr, ajaxOptions, thrownError){\n                    dialog(xhr.responseJSON.message);\n                }\n            });\n        }\n    });\n\n    \$(\"#list_detail_stock_opname\").datagrid({\n        url: \"";
echo yii\helpers\Url::to(array("list-detail-stock-opname"));
echo "\",\n        singleSelect: true,\n        pagination: true,\n        rownumbers: true,\n        fitColumns: true\n    });\n\n    \$(\"#btn_mark_complete\").linkbutton({\n        onClick: function(){\n            \$.ajax({\n                url : \"";
echo yii\helpers\Url::to(array("mark-complete"));
echo "?id=\" + stock_opname_id,\n                success: function(msg){\n                    dialog(\"Stock Opname berhasil disimpan.\");\n                }\n            });\n        }\n    });\n\n    \$(document).off(\"click\", \".editstok\");\n    \$(document).on(\"click\", \".editstok\", function(){\n        var pr = prompt(\"Masukkan Jumlah Gudang\", \$(this).attr(\"quantity_oh\"));\n        if(pr != null){\n            \$.ajax({\n                url : \"";
echo yii\helpers\Url::to(array("update-stok"));
echo "?id=\" + \$(this).attr(\"data_id\") + \"&stok=\" + pr,\n                success: function(msg){\n                    \$(\"#list_detail_stock_opname\").datagrid(\"load\", \"";
echo yii\helpers\Url::to(array("list-detail-stock-opname"));
echo "?id=\" + stock_opname_id);\n                }\n            });\n        }\n        return false;\n    });\n\n    \$(document).off(\"click\", \".deletedetail\");\n    \$(document).on(\"click\", \".deletedetail\", function(){\n        \$.ajax({\n            url : \"";
echo yii\helpers\Url::to(array("delete-detail"));
echo "?id=\" + \$(this).attr(\"data_id\"),\n            success: function(msg){\n                \$(\"#list_detail_stock_opname\").datagrid(\"load\", \"";
echo yii\helpers\Url::to(array("list-detail-stock-opname"));
echo "?id=\" + stock_opname_id);\n            }\n        });\n        return false;\n    });\n\n    \$(\"#btn_delete\").linkbutton({\n        onClick: function(){\n            \$.ajax({\n                url : \"";
echo yii\helpers\Url::to(array("delete"));
echo "?id=\" + stock_opname_id,\n                success: function(msg){\n                    dialog(\"Data berhasil dihapus\");\n                }\n            });\n        }\n    });\n    \$(\"#btn_form_cek_fisik\").linkbutton({\n        onClick: function(){\n            if(stock_opname_id == null){\n                dialog(\"Mohon pilih Stock Opname terlebih dahulu.\");\n                return;\n            }\n            var url = \"";
echo yii\helpers\Url::to(array("form-pengecekan"));
echo "?id=\" + stock_opname_id;\n            window.open(url, \"Laporan\", \"width=800,height=600\");\n        }\n    });\n    \$(\"#btn_validasi_data\").linkbutton({\n        onClick: function(){\n            \$(\"#btn_validasi_data\").linkbutton('disable');\n            \$.ajax({\n                url : \"";
echo yii\helpers\Url::to(array("validasi-data"));
echo "?id=\" + stock_opname_id,\n                success: function(msg){\n                    dialog(\"Data berhasil divalidasi\");\n                }\n            });\n        }\n    });\n    \$(\"#btn_cetak_selisih\").linkbutton({\n        onClick: function(){\n            if(stock_opname_id == null){\n                dialog(\"Mohon pilih Stock Opname terlebih dahulu.\");\n                return;\n            }\n            var url = \"";
echo yii\helpers\Url::to(array("cetak-selisih"));
echo "?id=\" + stock_opname_id;\n            window.open(url, \"Laporan\", \"width=800,height=600\");\n        }\n    });\n\n    setTitle(\"Stock Opname\");\n</script>";

?>