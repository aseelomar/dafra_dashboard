var Category = function () {

    var view_tbl;
    var view_url = 'goals';
    var list_url = 'goals/getGoals';
    /////////////////// View //////////////////
    ///////////////////////////////////////////
    var viewTable = function () {
        var link = list_url;
        var columns = [
            {"data": "index", "title": "#", "orderable": false, "searchable": false},
            {"data": "name", "orderable": true, "searchable": false},
            {"data": "description", "orderable": true, "searchable": false},
            {"data": "created_at", "orderable": true, "searchable": false},
            {"data": "updated_at", "orderable": true, "searchable": false},
            {"data": "user_id", "orderable": true, "searchable": false},
            {"data": "active", "orderable": false, "searchable": true},
            {"data": "actions", "orderable": false, "searchable": false}
        ];
        var perPage = 25;
        var order = [[3, 'desc']];



        view_tbl = DataTable.init($('#goals_table'), link, columns, order,'', perPage);
    };

    ///////////////// ADD //////////////
    ///////////////////////////////////////////
    var add = function () {
        $('#add_goals').submit(function (e) {
            e.preventDefault();
            var link = $(this).attr('action');
            var formData = $(this).serialize();
            var method = $(this).attr('method');
            Forms.doAction(link, formData, method, null, editCallBack);
            $('#name').val('');
            $('#description').val('');
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
                $('#description').val(data.description);

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
    ///////////////// INITIALIZE //////////////
    ///////////////////////////////////////////
    return {
        init: function () {
            viewTable();
            edit();
            add();
            updateStatus();
            deleteItem();
        }
    }
}();