
var VideoDetails = function () {

    var view_tbl;
    var view_url = 'video_details';
    var list_url = 'getVideoDetail';

    /////////////////// View //////////////////
    ///////////////////////////////////////////
    var viewTable = function () {
        var href = window.location.href;
        var link = list_url + '/' + href.substring(href.lastIndexOf('/') + 1);
        var columns = [
            {"data": "index", "title": "#", "orderable": false, "searchable": false},
            {"data": "name", "orderable": true, "searchable": true},
            {"data": "category_id", "orderable": true, "searchable": true},
            {"data": "user_id", "orderable": true, "searchable": false},
            {"data": "created_at", "orderable": true, "searchable": false},
            {"data": "active", "orderable": false, "searchable": true},
            {"data": "actions", "orderable": false, "searchable": false}
        ];
        var perPage = 25;
        var order = [[4, 'desc']];

        var ajaxFilter = function (d) {
            d.name = $('#generalSearch').val();
            d.category_id = $('#category').val();
            d.active=$('#status').val();
        };

        view_tbl = DataTable.init($('#video_details_table'), link, columns, order, ajaxFilter, perPage);
    };


    /////////////////// ADD ///////////////////
    ///////////////////////////////////////////


    var updateStatus = function () {
        $(document).on('click', '.change-status', function (e) {
            var link = $( this ).attr('href');
            Forms.doAction(link, "", "", null, updateStatusCallBack);
        });
    };



    var  updateStatusCallBack = function () {
        view_tbl.draw();
    }


    var add = function () {
        $('#add-video-details').on('click', function (e) {
            let form = document.getElementById('add-new-video_details');
            var formData = new FormData(form);
            let method = form.getAttribute('method');
            let link = form.getAttribute('action');
            Forms.doAction(link, formData, method, null, addCallBack);

        });
    };
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


    var updateVideo=function () {
        $('#update-video-details').click(function (e){
            e.preventDefault();
            let form = document.getElementById('update-data-video-details');
            var formData = new FormData(form);
            let method = form.getAttribute('method');
            let link = form.getAttribute('action');
            Forms.doAction(link, formData, method, null, addCallBack);

        });
    }


    //////////////// DELETE ///////////////////
    ///////////////////////////////////////////
    // var deleteItem = function () {
    //     $(document).on('click', '.delete_btn', function (e) {
    //         e.preventDefault();
    //         var btn = $(this);
    //
    //         Common.confirm(function () {
    //             var link = btn.data('url');
    //             var formData = {};
    //             var method = "GET";
    //
    //             Forms.doAction(link, formData, method, view_tbl);
    //         });
    //     });
    // };
    //////////////// Search ///////////////////
    ///////////////////////////////////////////




    var search = function () {

        $('#generalSearch').on('input', function (e) {
            e.preventDefault();
            view_tbl.search($(this).val()).draw();
        });

        $('#category').on('change', function (e) {
            e.preventDefault();
            // console.log($(this).val());
            view_tbl.search($(this).val()).draw();
        })
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




    ///////////////// INITIALIZE //////////////
    ///////////////////////////////////////////
    return {
        init: function () {
            viewTable();
            search();
            add();
            // deleteItem();
            updateStatus();
            edit();
            updateVideo();
        }
    }
}();
