
var Category = function () {

    var view_tbl;
    var view_url = 'sub-category';
    var list_url = 'sub-category/getSubCategory';
    /////////////////// View //////////////////
    ///////////////////////////////////////////
    var viewTable = function () {
        var link = list_url;
        var columns = [
            {"data": "index", "title": "#", "orderable": false, "searchable": false},
            {"data": "name", "orderable": true, "searchable": true},
            {"data": "parent_id", "orderable": true, "searchable": false},
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
        };

        view_tbl = DataTable.init($('#sub-category_table'), link, columns, order,ajaxFilter, perPage);
    };

    var search = function () {

        $('#generalSearch').on('input', function (e) {
            e.preventDefault();
            view_tbl.search($(this).val()).draw();
        });




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
    ///////////////// ADD //////////////
    ///////////////////////////////////////////
    var add = function () {
        $('#add_category').submit(function (e) {
            e.preventDefault();
            var link = $(this).attr('action');
            var formData = $(this).serialize();
            var method = $(this).attr('method');
            Forms.doAction(link, formData, method, null, editCallBack);
            $('#name').val('');
        });
    };
    var editCallBack = function (obj) {
        if (obj.code === 200) {
            var delay = 1750;

            setTimeout(function () {
                window.location = view_url;
            }, delay);
        }
    };
    var edit = function () {
        $(document).on('click', '.update_btn', function (e) {
            e.preventDefault();
            var link = $(this).data('url');
            $.get(link, function (data) {
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#parent_id').val(data.parent_id);
            });

        });
    };

///////////////// UPDATA_STATUS //////////////
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


    var addCallBack = function (obj) {
        if(obj.code === 200) {
            var delay = 1750;

            setTimeout(function () {
                history.back(0);
            }, delay);
        }
    };
    ///////////////// INITIALIZE //////////////
    ///////////////////////////////////////////
    return {
        init: function () {
            search();
            viewTable();
            edit();
            add();
            updateStatus();
        }
    }
}();