
var Setting = function () {

    var view_tbl;
    var view_url = 'backend_settings';
    var list_url = 'backend_settings/getSetting';
    /////////////////// View //////////////////
    ///////////////////////////////////////////
    var viewTable = function () {
        var link = list_url;
        var columns = [
            {"data": "index", "title": "#", "orderable": false, "searchable": false},
            {"data": "key", "orderable": true, "searchable": false},
            {"data": "value", "orderable": true, "searchable": false},
            {"data": "actions", "orderable": false, "searchable": false}
        ];
        var perPage = 25;
        var order = [[0, 'desc']];



        view_tbl = DataTable.init($('#setting_table'), link, columns, order, null, perPage);
    };


    /////////////////// ADD ///////////////////
    ///////////////////////////////////////////
    var add = function () {
        $('#add-setting').submit(function (e) {
            e.preventDefault();
            var link = $(this).attr('action');
            var formData = $(this).serialize();
            var method = $(this).attr('method');
            Forms.doAction(link, formData, method, null, addCallBack);
        });
    };

    var add_by_key = function () {
        $('#save_settings').on('click', function (e) {
            let form = document.getElementById('settings_by_key');
            let formData = $(form).serialize();
            let method = form.getAttribute('method');
            let link = form.getAttribute('action');
            Forms.doAction(link, formData, method, null);
        });
    }

    var addCallBack = function (obj) {
        if(obj.code === 200) {
            var delay = 1750;

            setTimeout(function () {
                history.back(0);
            }, delay);
        }
    };




    /////////////////// EDIT //////////////////
    ///////////////////////////////////////////


    var edit = function () {
        $('.update_btn').click(function (e) {
            e.preventDefault();
            var link = $(this).attr('action');
            var formData = $(this).serialize();
            var method = $(this).attr('method');
            Forms.doAction(link, formData, method, null, editCallBack);
        });
    };

    var updateSetting=function () {
        $('#update-setting').submit(function (e){
            e.preventDefault();
            var link = $(this).attr('action');
            var formData = $(this).serialize();
            var method = $(this).attr('method');
            Forms.doAction(link, formData, method, null, addCallBack);

        });


    }
    var editCallBack = function (obj) {
        if (obj.code === 200) {
            var delay = 1750;

            setTimeout(function () {
                window.location = view_url;
            }, delay);
        }
    };

//////////////// DELETE ///////////////////
    ///////////////////////////////////////////
    var deleteItem = function () {
        $(document).on('click', '.delete_btn', function (e) {
            e.preventDefault();
            var btn = $(this);

            Common.confirm(function () {
                var link = btn.data('url');
                var formData = {};
                var method = "GET";

                Forms.doAction(link, formData, method, view_tbl);
            });
        });
    };

    return {
        init: function () {
            add();
            add_by_key();
            viewTable();
            deleteItem();
            edit();
            updateSetting();
        }
    }
}();
