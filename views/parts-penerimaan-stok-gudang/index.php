<?php

$user = Yii::$app->user->identity;
echo "\n<div class=\"easyui-layout\">\n    <div data-options=\"region:'north',border:false\" style=\"height:130px;padding: 10px\">\n        <div class=\"easyui-layout\">\n            <div data-options=\"region:'west',border:false\" style=\"width:40%\">\n                <div class=\"easyui-layout\">\n                    <div data-options=\"region:'west',border:false\" style=\"width:50%;overflow: hidden;\">\n                        <div class=\"form-control\">\n                            <input id=\"no_spg\" disabled class=\"easyui-textbox\" label=\"No SPG:\" data-options=\"\"\n                                   style=\"width:200px\">\n                        </div>\n                        <div class=\"form-control\">\n                            <input id=\"no_nota\" disabled class=\"easyui-textbox\" label=\"No Nota:\" data-options=\"\"\n                                   style=\"width:200px\">\n                        </div>\n                        <div class=\"form-control\">\n                            ";
echo yii\helpers\Html::dropDownList("supplier", NULL, array(), array("class" => "easyui-combobox", "id" => "supplier", "label" => "Supplier:", "style" => "width:200px", "disabled" => true));
echo "\n                            <button id=\"btn_search_supplier\" disabled class=\"easyui-linkbutton\"\n                                    data-options=\"iconCls:'icon-search'\"></button>\n                        </div>\n                        <div class=\"form-control\">\n                            <input id=\"tanggal_faktur\" disabled class=\"easyui-datebox\" label=\"Tgl Faktur:\"\n                                   data-options=\"\"\n                                   style=\"width:200px\">\n                        </div>\n                    </div>\n                    <div data-options=\"region:'east',border:false\" style=\"width:50%;overflow: hidden;\">\n                        <div class=\"form-control\">\n                            <input id=\"tanggal_penerimaan\" disabled class=\"easyui-datebox\" label=\"Tgl Penerimaan:\"\n                                   data-options=\"\"\n                                   style=\"width:200px\" value=\"";
echo date("Y-m-d");
echo "\">\n                        </div>\n                        <div class=\"form-control\">\n                            ";
echo yii\helpers\Html::dropDownList("pembayaran", NULL, yii\helpers\ArrayHelper::map(app\models\Pembayaran::find()->all(), "id", "nama"), array("class" => "easyui-combobox", "id" => "pembayaran", "label" => "Pembayaran:", "style" => "width:200px", "disabled" => true));
echo "                        </div>\n                        <div class=\"form-control\">\n                            <input id=\"jatuh_tempo\" disabled class=\"easyui-datebox\" label=\"Jatuh Tempo:\" data-options=\"\"\n                                   style=\"width:200px\">\n                        </div>\n                        <div class=\"form-control\">\n                            ";
echo yii\helpers\Html::dropDownList("status", NULL, yii\helpers\ArrayHelper::map(app\models\StatusHutang::find()->all(), "id", "nama"), array("class" => "easyui-combobox", "id" => "status_po", "label" => "Status:", "style" => "width:200px", "disabled" => true));
echo "                        </div>\n                    </div>\n                </div>\n            </div>\n            <div data-options=\"region:'east',border:false\" style=\"width:60%\">\n                <table id=\"list_penerimaan_aktif\" style=\"height:100%;\">\n                    <thead>\n                    <tr>\n                        <th field=\"no_spg\" width=\"150\">No. SPG</th>\n                        <th field=\"no_faktur\" width=\"150\">No. Nota</th>\n                        <th field=\"tanggal_penerimaan_format\" width=\"100\">Tgl Penerimaan</th>\n                        <th field=\"tanggal_faktur_format\" width=\"100\">Tgl Faktur</th>\n                        <th field=\"supplier_nama\" width=\"150\">Supplier</th>\n                    </tr>\n                    </thead>\n                </table>\n            </div>\n        </div>\n    </div>\n    <div data-options=\"region:'center',border:false\" style=\"padding: 0 10px 10px\">\n        <div class=\"easyui-layout\">\n            <div data-options=\"region:'west',border:false\" style=\"width:60%\">\n                <table id=\"list_suku_cadang\" style=\"height: 100%\">\n                    <thead>\n                    <tr>\n                        <th field=\"kode\" width=\"100\">Kode Part</th>\n                        <th field=\"nama\" width=\"100\">Nama</th>\n                        <th field=\"nama_sinonim\" width=\"100\">Sinonim</th>\n                        <th field=\"het\" width=\"100\" align=\"right\" formatter=\"formatMoney\">HET</th>\n                        <th field=\"quantity\" width=\"100\" align=\"right\">Qty Stok</th>\n                        <th field=\"quantity_order\" width=\"100\" align=\"right\">Qty Booking</th>\n                        <!--<th field=\"add_action\" width=\"100\" align=\"center\">Action</th>-->\n                    </tr>\n                    </thead>\n                </table>\n            </div>\n            <div data-options=\"region:'east',border:false\" style=\"width:40%\">\n                <div class=\"easyui-layout\" style=\"width:100%\">\n                    <div data-options=\"region:'north', border:false\" style=\"height: 50px;padding-left: 10px\">\n                        ";
echo yii\helpers\Html::dropDownList("purchase_order_id", NULL, yii\helpers\ArrayHelper::map(app\models\PurchaseOrder::getCurrentSentData(), "id", "nomorSupplier"), array("class" => "easyui-combobox", "labelWidth" => "150px", "label" => "No. PO Referensi:", "prompt" => "(Pilih No PO)", "id" => "purchase_order_id", "style" => "width:90%"));
echo "                    </div>\n                    <div data-options=\"region:'center', border:false\" style=\"\">\n\n                        <div class=\"easyui-layout\">\n                            <div data-options=\"region:'west', border:false\" style=\"width: 50%;padding-left: 10px\">\n                                <form id=\"form_detail\">\n                                    <div class=\"form-control\">\n                                        <input class=\"easyui-textbox\" disabled id=\"suku_cadang_kode\" label=\"Kode Part:\"\n                                               labelWidth=\"100px\"\n                                               data-options=\"\" style=\"width:100%\">\n                                    </div>\n                                    <div class=\"form-control\">\n                                        <input class=\"easyui-textbox\" disabled id=\"suku_cadang_nama\" label=\"Nama:\"\n                                               labelWidth=\"100px\"\n                                               data-options=\"\" style=\"width:100%\">\n                                    </div>\n                                    <div class=\"form-control\">\n                                        ";
echo yii\helpers\Html::dropDownList("suku_cadang_rak_id", NULL, yii\helpers\ArrayHelper::map(app\models\Rak::getUserActiveData(), "id", "nama"), array("class" => "easyui-combobox", "labelWidth" => "100px", "id" => "suku_cadang_rak_id", "label" => "Rak:", "prompt" => "(Pilih Rak)", "style" => "width:100%"));
echo "                                    </div>\n                                    <div class=\"form-control\">\n                                        <input class=\"easyui-numberbox\" id=\"suku_cadang_harga_beli\" label=\"Harga Beli:\"\n                                               labelWidth=\"100px\"\n                                               data-options=\"\" style=\"width:100%\">\n                                    </div>\n                                </form>\n                            </div>\n                            <div data-options=\"region:'east', border:false\" style=\"width: 50%;padding-left: 10px\">\n                                <form id=\"form_detail_2\">\n                                    <div class=\"form-control\">\n                                        <input class=\"easyui-numberbox\" id=\"suku_cadang_quantity\" label=\"Qty:\"\n                                               labelWidth=\"100px\"\n                                               data-options=\"\" style=\"width:100%\" value=\"1\">\n                                    </div>\n                                    <div class=\"form-control\">\n                                        <input class=\"easyui-numberbox\" id=\"suku_cadang_diskon_p\" label=\"Diskon (%):\"\n                                               labelWidth=\"100px\" precision=\"2\" decimalSeparator=\",\" groupSeparator=\".\"\n                                               data-options=\"\" style=\"width:100%\" value=\"0\">\n                                    </div>\n                                    <div class=\"form-control\">\n                                        <input class=\"easyui-numberbox\" id=\"suku_cadang_diskon_r\" label=\"Diskon (Rp):\"\n                                               labelWidth=\"100px\"\n                                               data-options=\"\" style=\"width:100%\" value=\"0\">\n                                    </div>\n                                    <div class=\"form-control\">\n                                        <input class=\"easyui-textbox\" disabled id=\"suku_cadang_total_harga\"\n                                               label=\"Total Harga:\"\n                                               labelWidth=\"100px\" data-options=\"\" style=\"width:100%\">\n                                    </div>\n                                    <div>\n                                        <button id=\"btn_add_detail\" class=\"easyui-linkbutton\"\n                                                data-options=\"iconCls:'fam disk'\">Simpan Detail\n                                        </button>\n                                    </div>\n                                </form>\n                            </div>\n                        </div>\n                    </div>\n                </div>\n            </div>\n        </div>\n    </div>\n    <div data-options=\"region:'south',border:false\" style=\"height: 250px;padding: 0 10px 10px\">\n        <div class=\"easyui-layout\">\n            <div data-options=\"region:'west',border:false\" style=\"width: 80%\">\n            <table id=\"list_detail_penerimaan\" style=\"height:200px;width: 100%\" singleselect=\"true\">\n            <thead>\n            <tr>\n                <th field=\"suku_cadang_kode\" width=\"80\">Kode Part</th>\n                <th field=\"suku_cadang_nama\" width=\"150\">Nama</th>\n                <th field=\"harga_beli\" width=\"60\" align=\"right\" formatter=\"formatMoney\">Harga Beli</th>\n                <th field=\"quantity_order\" width=\"60\" align=\"right\">Qty Order</th>\n                <th field=\"quantity_supp\" width=\"60\" align=\"right\">Qty Supply</th>\n                <th field=\"diskon_p\" width=\"60\" align=\"right\">Diskon(%)</th>\n                <th field=\"diskon_r\" width=\"60\" align=\"right\">Diskon(Rp)</th>\n                <th field=\"rak_nama\" width=\"100\" align=\"center\">Rak</th>\n                <th field=\"total_harga\" width=\"100\" align=\"right\" formatter=\"formatMoney\">Total</th>\n                <th field=\"action\" width=\"60\" align=\"center\">#</th>\n            </tr>\n            </thead>\n        </table>\n        <div style=\"padding-top: 10px\">\n            <button id=\"btn_add\" class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-add'\">Tambah</button>\n            <button id=\"btn_save\" class=\"easyui-linkbutton\" data-options=\"iconCls:'fam disk'\">Simpan</button>\n            <button id=\"btn_cetak\" disabled class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-print'\">Cetak Nota</button>\n        </div>\n                </div>\n            <div data-options=\"region:'east',border:false\" style=\"width: 20%\">\n                <h2 style=\"text-align: right;padding-right: 15px;\">Total Pembayaran</h2>\n                <h1 id=\"total_pembayaran\" style=\"text-align: right;padding-right: 15px;\">\n                    Rp. 0,-\n                </h1>\n                </div>\n            </div>\n    </div>\n</div>\n\n<div id=\"dialog_search_supplier\">\n    <table class=\"easyui-datagrid\" id=\"list_supplier\" style=\"height: 100%\">\n        <thead>\n        <tr>\n            <th field=\"kode\" width=\"100\">Kode</th>\n            <th field=\"nama\" width=\"220\">Nama</th>\n            <th field=\"alamat\" width=\"220\">Alamat</th>\n            <th field=\"no_telp\" width=\"120\" align=\"center\">No Telp</th>\n            <th field=\"nama_pic\" width=\"120\" align=\"center\">PIC</th>\n            <th field=\"no_telp_pic\" width=\"120\" align=\"center\">No Telp PIC</th>\n            <th field=\"action\" width=\"120\" align=\"center\">#</th>\n        </tr>\n        </thead>\n    </table>\n</div>\n\n<script>\n    //Search Supplier\n    \$(document).off(\"click\", \".btn-supplier-gunakan\");\n    \$(document).on(\"click\", \".btn-supplier-gunakan\", function () {\n        var data_id = \$(this).attr(\"data_id\");\n        \$(\"#supplier\").combobox(\"reload\", \"";
echo yii\helpers\Url::to(array("supplier-combo"));
echo "?id=\" + data_id);\n        \$(\"#supplier\").combobox(\"setValue\", data_id);\n        \$('#dialog_search_supplier').window('close');\n        return false;\n    });\n\n    \$(document).off(\"click\", \".btn-delete-detail-penerimaan\");\n    \$(document).on(\"click\", \".btn-delete-detail-penerimaan\", function () {\n        var ini = \$(this).attr(\"data_id\");\n        \$.ajax({\n            url: '";
echo yii\helpers\Url::to(array("delete-detail"));
echo "?id=' + ini,\n            success: function () {\n                refreshHarga();\n                \$('#list_detail_penerimaan').datagrid('reload');\n            }\n        });\n    });\n\n    \$(\"#dialog_search_supplier\").window({\n        width: 800,\n        height: 380,\n        modal: true,\n        closed: true,\n        title: \"Data Supplier (Klik 2x untuk memilih)\"\n    });\n\n    \$(\"#list_supplier\").datagrid({\n        url: \"";
echo yii\helpers\Url::to(array("list-supplier"));
echo "\",\n        singleSelect: true,\n        pagination: true,\n        rownumbers: true,\n        fitColumns: true,\n        //pageSize: 19,\n        toolbar: addSearchToolbar(\"list_supplier\"),\n        onDblClickRow: function(index, row){\n            var data_id = row.id;\n            \$(\"#supplier\").combobox(\"reload\", \"";
echo yii\helpers\Url::to(array("supplier-combo"));
echo "?id=\" + data_id);\n            \$(\"#supplier\").combobox(\"setValue\", data_id);\n            \$('#dialog_search_supplier').window('close');\n        }\n    });\n\n    \$(\"#btn_search_supplier\").linkbutton({\n        onClick: function () {\n            \$('#dialog_search_supplier').window('open');\n            return false;\n        }\n    });\n\n    \$(\"#btn_add\").click(function () {\n        \$(\"#no_spg\").textbox(\"setValue\", \"\");\n        \$(\"#no_nota\").textbox(\"enable\").textbox(\"setValue\", \"\");\n        \$(\"#supplier\").combobox(\"setValue\", \"\");\n        \$(\"#tanggal_faktur\").datebox(\"enable\").datebox(\"setValue\", \"";
echo date("Y-m-d");
echo "\");\n        \$(\"#tanggal_penerimaan\").datebox(\"setValue\", \"";
echo date("Y-m-d");
echo "\");\n        \$(\"#jatuh_tempo\").datebox(\"enable\").datebox(\"setValue\", \"";
echo date("Y-m-d");
echo "\");\n\n        \$(\"#pembayaran\").combobox(\"enable\");\n        \$(\"#btn_save\").linkbutton(\"enable\");\n        \$(\"#btn_search_supplier\").linkbutton(\"enable\");\n        return false;\n    });\n\n    var selected_penerimaan;\n\n    \$(\"#list_penerimaan_aktif\").datagrid({\n        url: \"";
echo yii\helpers\Url::to(array("list-penerimaan-aktif"));
echo "\",\n        //toolbar: addSearchToolbar(\"list_penerimaan_aktif\"),\n        singleSelect: true,\n        pagination: true,\n        rownumbers: true,\n        fitColumns: true,\n        onClickRow: function (index, row) {\n            selectPenerimaan(row);\n            \$(\"#btn_cetak\").linkbutton('enable');\n            \$(\"#btn_save\").linkbutton('disable');\n        }\n    });\n\n    function selectPenerimaan(row){\n        selected_penerimaan = row;\n        console.log(row);\n\n        \$(\"#no_spg\").textbox(\"setValue\", row.no_spg).textbox(\"disable\");\n        \$(\"#no_nota\").textbox(\"setValue\", row.no_faktur).textbox(\"disable\");\n        \$(\"#supplier\").combobox(\"reload\", \"";
echo yii\helpers\Url::to(array("supplier-combo"));
echo "?id=\" + row.supplier_id).combobox(\"disable\");\n        \$(\"#supplier\").combobox(\"setValue\", row.supplier_id).combobox(\"disable\");\n        \$(\"#tanggal_faktur\").datebox('setValue', row.tanggal_faktur).datebox(\"disable\");\n        \$(\"#tanggal_penerimaan\").datebox('setValue', row.tanggal_penerimaan).datebox(\"disable\");\n        \$(\"#jatuh_tempo\").datebox('setValue', row.tanggal_jatuh_tempo).datebox(\"disable\");\n        \$(\"#pembayaran\").combobox(\"select\", row.pembayaran_id).combobox(\"disable\");\n        \$(\"#status_po\").combobox(\"select\", row.status_spg_id).combobox(\"disable\");\n\n\n        \$(\"#total_pembayaran\").html(row.total_formatted);\n        \$(\"#purchase_order_id\").combobox('select', row.purchase_order_id);\n        \$(\"#list_detail_penerimaan\").datagrid('load', \"";
echo yii\helpers\Url::to(array("list-detail-penerimaan", "id" => ""));
echo "\" + selected_penerimaan.id);\n    }\n\n    \$(\"#btn_save\").click(function () {\n        \$.ajax({\n            url: \"";
echo yii\helpers\Url::to(array("save-penerimaan"));
echo "\",\n            data: {\n                no_faktur: \$(\"#no_nota\").textbox('getValue'),\n                supplier: \$(\"#supplier\").combobox('getValue'),\n                tanggal_faktur: \$(\"#tanggal_faktur\").datebox('getValue'),\n                pembayaran: \$(\"#pembayaran\").combobox('getValue'),\n                jatuh_tempo: \$(\"#jatuh_tempo\").datebox('getValue'),\n                tanggal_penerimaan: \$(\"#tanggal_penerimaan\").datebox('getValue'),\n            },\n            type: \"post\",\n            dataType: \"json\",\n            success: function (msg) {\n                dialog(msg.message);\n                selectPenerimaan(msg.model);\n\n                \$('#list_penerimaan_aktif').datagrid('reload');\n\n                //Disable tombol save\n                \$(\"#btn_save\").linkbutton(\"disable\");\n\n                refreshHarga();\n            },\n            error: function (xhr, ajaxOptions, thrownError) {\n                dialog(xhr.responseJSON.message);\n            }\n        });\n        return false;\n    });\n\n    function refreshHarga(){\n        \$.ajax({\n            url: \"";
echo yii\helpers\Url::to(array("load"));
echo "?id=\" + selected_penerimaan.id,\n            dataType: \"json\",\n            success: function (msg) {\n                \$(\"#total_pembayaran\").html(msg.total_formatted);\n            }\n        });\n    }\n\n    var selected_suku_cadang = null;\n\n    \$(\"#list_suku_cadang\").datagrid({\n        url: \"";
echo yii\helpers\Url::to(array("list-suku-cadang"));
echo "\",\n        toolbar: addSearchToolbar(\"list_suku_cadang\"),\n        singleSelect: true,\n        pagination: true,\n        rownumbers: true,\n        fitColumns: true,\n        onClickRow: function (index, row) {\n            //console.log(row);\n\n            \$(\"#suku_cadang_kode\").textbox(\"setValue\", row.kode);\n            \$(\"#suku_cadang_nama\").textbox(\"setValue\", row.nama);\n            \$(\"#suku_cadang_rak_id\").combobox(\"setValue\", row.rak_id);\n            \$(\"#suku_cadang_harga_beli\").numberbox(\"setValue\", row.het);\n\n            //set quantity\n            \$.ajax({\n                url: \"";
echo yii\helpers\Url::to(array("load-quantity-order"));
echo "\",\n                data : {\n                    suku_cadang_id : row.id,\n                    purchase_order_id : \$(\"#purchase_order_id\").combobox('getValue')\n                },\n                dataType: \"text\",\n                success: function (msg) {\n                    if(msg == \"\"){\n                        \$(\"#suku_cadang_quantity\").textbox(\"setValue\", 1);\n                    }else {\n                        \$(\"#suku_cadang_quantity\").textbox(\"setValue\", msg);\n                    }\n                }\n            });\n\n            selected_suku_cadang = row;\n            detail_penerimaan = null;\n            hitungTotal();\n        }\n    });\n\n    \$(\"#purchase_order_id\").combobox({\n        onChange: function (newval, oldval) {\n            if(newval != null) {\n                \$(\"#list_suku_cadang\").datagrid('load', \"";
echo yii\helpers\Url::to(array("list-suku-cadang", "id" => ""));
echo "\" + newval);\n                \$.ajax({\n                    url: \"";
echo yii\helpers\Url::to(array("update-po"));
echo "?id=\" + selected_penerimaan.id + \"&po_id=\" + newval,\n                    success: function (msg) {\n                    }\n                });\n            }\n        }\n    });\n\n    function hitungTotal() {\n        var total = parseInt(\$(\"#suku_cadang_harga_beli\").numberbox('getValue')) * parseInt(\$(\"#suku_cadang_quantity\").numberbox('getValue'));\n        if (parseFloat(\$(\"#suku_cadang_diskon_p\").numberbox('getValue')) != 0) {\n            total -= parseFloat(\$(\"#suku_cadang_diskon_p\").numberbox('getValue')) / 100 * total;\n        } else if (parseFloat(\$(\"#suku_cadang_diskon_r\").numberbox('getValue')) != 0) {\n            total -= parseFloat(\$(\"#suku_cadang_diskon_r\").numberbox('getValue'));\n        }\n        \$(\"#suku_cadang_total_harga\").textbox(\"setValue\", total);\n    }\n\n    \$(\"#suku_cadang_harga_beli\").numberbox({\n        onChange: function (newVal, oldVal) {\n            hitungTotal()\n        }\n    });\n\n    \$(\"#suku_cadang_quantity\").numberbox({\n        onChange: function (newVal, oldVal) {\n            hitungTotal()\n        }\n    });\n\n    \$(\"#suku_cadang_diskon_p\").numberbox({\n        onChange: function (newVal, oldVal) {\n            hitungTotal()\n        }\n    });\n\n    \$(\"#suku_cadang_diskon_r\").numberbox({\n        onChange: function (newVal, oldVal) {\n            hitungTotal()\n        }\n    });\n\n    \$(\"#btn_add_detail\").click(function () {\n        if (selected_suku_cadang == null && detail_penerimaan == null) {\n            dialog(\"Pilih Suku Cadang Terlebih Dahulu\");\n            return false;\n        }\n        if (selected_penerimaan == null) {\n            dialog(\"Pilih No SPG Terlebih Dahulu\");\n            return false;\n        }\n\n        var suku_cadang_id = null;\n        var penerimaan_part_id = null;\n\n        if(detail_penerimaan == null) {\n            //new record\n            suku_cadang_id = selected_suku_cadang.id;\n            penerimaan_part_id = selected_penerimaan.id;\n        }else{\n            suku_cadang_id = detail_penerimaan.suku_cadang_id;\n            penerimaan_part_id = detail_penerimaan.penerimaan_part_id;\n        }\n\n        \$.ajax({\n            url: \"";
echo yii\helpers\Url::to(array("save-detail-penerimaan"));
echo "\" + (detail_penerimaan == null ? \"\" : \"?id=\" + detail_penerimaan.id),\n            data: {\n                suku_cadang_id: suku_cadang_id,\n                penerimaan_part_id: penerimaan_part_id,\n                rak_id: \$(\"#suku_cadang_rak_id\").combobox('getValue'),\n                harga_beli: \$(\"#suku_cadang_harga_beli\").numberbox('getValue'),\n                quantity_supp: \$(\"#suku_cadang_quantity\").numberbox('getValue'),\n                diskon_p: \$(\"#suku_cadang_diskon_p\").numberbox('getValue'),\n                diskon_r: \$(\"#suku_cadang_diskon_r\").numberbox('getValue'),\n                total_harga: \$(\"#suku_cadang_total_harga\").textbox('getValue')\n            },\n            type: \"post\",\n            dataType: \"json\",\n            success: function (msg) {\n                dialog(msg.message);\n                \$(\"#form_detail\").form(\"reset\");\n                \$(\"#form_detail_2\").form(\"reset\");\n\n                refreshHarga();\n\n                \$(\"#list_detail_penerimaan\").datagrid('load', \"";
echo yii\helpers\Url::to(array("list-detail-penerimaan", "id" => ""));
echo "\" + selected_penerimaan.id);\n            },\n            error: function (xhr, ajaxOptions, thrownError) {\n                dialog(xhr.responseJSON.message);\n            }\n        });\n        return false;\n    });\n\n    var detail_penerimaan = null;\n\n    \$(\"#list_detail_penerimaan\").datagrid({\n        url: \"";
echo yii\helpers\Url::to(array("list-detail-penerimaan"));
echo "\",\n        toolbar: addSearchToolbar(\"list_detail_penerimaan\"),\n        singleselect: true,\n        pagination: true,\n        rownumbers: true,\n        fitColumns: true,\n        onClickRow: function (index, row) {\n            detail_penerimaan = row;\n\n            \$(\"#suku_cadang_kode\").textbox(\"setValue\", row.suku_cadang_kode);\n            \$(\"#suku_cadang_nama\").textbox(\"setValue\", row.suku_cadang_nama);\n            \$(\"#suku_cadang_rak_id\").combobox(\"setValue\", row.rak_id);\n            \$(\"#suku_cadang_harga_beli\").numberbox(\"setValue\", row.harga_beli);\n            \$(\"#suku_cadang_quantity\").numberbox(\"setValue\", row.quantity_supp);\n            \$(\"#suku_cadang_diskon_p\").numberbox(\"setValue\", row.diskon_p);\n            \$(\"#suku_cadang_diskon_r\").numberbox(\"setValue\", row.diskon_r);\n\n            hitungTotal();\n        }\n    });\n\n    \$(\"#btn_cetak\").linkbutton({\n        onClick: function () {\n            if(selected_penerimaan == null){\n                dialog(\"Mohon pilih Penerimaan terlebih dahulu.\");\n                return;\n            }\n            var url = \"";
echo yii\helpers\Url::to(array("cetak-nota"));
echo "?id=\" + selected_penerimaan.id;\n            window.open(url, \"Laporan\", \"width=800,height=600\");\n\n            setTimeout(function(){\n                \$('#list_penerimaan_aktif').datagrid('reload');\n            }, 2000);\n        }\n    });\n\n    setTitle(\"Penerimaan Suku Cadang\");\n</script>\n";

?>