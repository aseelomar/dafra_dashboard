
var User = function () {

    var view_tbl;
    var view_url = 'users';
    var list_url = 'users/getUser';
    /////////////////// View //////////////////
    ///////////////////////////////////////////
    var viewTable = function () {
        var link = list_url;
        var columns = [
            {"data": "index", "title": "#", "orderable": false, "searchable": false},
            {"data": "name", "orderable": true, "searchable": true},
            {"data": "email", "orderable": false, "searchable": true},
            // {"data": "image", "orderable": false, "searchable": false},
            {"data": "created_at", "orderable": true, "searchable": false},
            {"data": "updated_at", "orderable": true, "searchable": false},
            {"data": "user_id", "orderable": true, "searchable": false},
            {"data": "active", "orderable": false, "searchable": true},
            {"data": "actions", "orderable": false, "searchable": false}
        ];
        var perPage = 25;
        var order = [[3, 'desc']];


        var ajaxFilter = function (d) {
            d.name = $('#generalSearch').val();
            d.active=$('#status').val();
        };

        view_tbl = DataTable.init($('#users_table'), link, columns, order, ajaxFilter, perPage);
    };

    var add = function () {
        $('#store_user').submit(function (e) {
            e.preventDefault();
            var link = $(this).attr('action');
            var formData = new FormData((this));
            var method = $(this).attr('method');
            Forms.doAction(link, formData, method, null, editCallBack);
        });
    };

    var edit = function () {
        $('#update_user').submit(function (e) {
            e.preventDefault();
            var link = $(this).attr('action');
            var formData = new FormData((this));
            var method = $(this).attr('method');
            Forms.doAction(link, formData, method, null, editCallBack);
        });
    };


    var editCallBack = function (obj) {
        if (obj.code === 200) {
            var delay = 1750;

            setTimeout(function () {
                history.back(0);
            }, delay);
        }
    };





///////////////// search //////////////
    ///////////////////////////////////////////

    var search = function () {

        $('#generalSearch').on('input', function (e) {
            e.preventDefault();
            view_tbl.search($(this).val()).draw();
        });


        $('#status').on('change', function (e) {
            e.preventDefault();
            view_tbl.search($(this).val()).draw();
        })


        $('.search').on('click', function (e) {
            e.preventDefault();
            view_tbl.draw(false);
        });

        $('form input').keydown(function (e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                view_tbl.draw(false);
            }
        });

        $('.btn-clear').on('click', function (e) {
            e.preventDefault();
            $('.clear').val('');
            $('.clear').selectpicker("refresh");
        });
    };
    //////////////// updateStatus //////////////
    ///////////////////////////////////////////

    var updateStatus = function () {
        $(document).on('click', '.change-status', function (e) {
            var link = $( this ).attr('href');
            Forms.doAction(link, "", "", null, updateStatusCallBack);
        });
    }

    var  updateStatusCallBack = function () {
        view_tbl.draw();
    }
    ///////////////// INITIALIZE //////////////
    ///////////////////////////////////////////
    return {
        init: function () {
            add();
            edit();
            viewTable();
            search();
            updateStatus();

        }
    }
}();
