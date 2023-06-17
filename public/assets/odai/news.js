
var News = function () {

    var view_tbl;
    var view_url = 'news';
    var list_url = 'news/getNews';
    /////////////////// View //////////////////
    ///////////////////////////////////////////
    var viewTable = function () {
        var link = list_url;
        var columns = [
            {"data": "index", "title": "#", "orderable": false, "searchable": false},
            {"data": "title", "orderable": true, "searchable": true},
            {"data": "description", "orderable": true, "searchable": false},
            {"data": "image", "orderable": false, "searchable": false},
            {"data": "user_id", "orderable": true, "searchable": false},
            {"data": "category_id", "orderable": true, "searchable": true},
            {"data": "created_at", "orderable": true, "searchable": false},
            {"data": "active", "orderable": false, "searchable": true},
            {"data": "actions", "orderable": false, "searchable": false}
        ];
        var perPage = 25;
        var order = [[5, 'desc']];


        var ajaxFilter = function (d) {
            d.title = $('#generalSearch').val();
            d.category_id = $('#category').val();
            d.active=$('#status').val();
        };

        view_tbl = DataTable.init($('#news_table'), link, columns, order, ajaxFilter, perPage);
    };
    /////////////////// ADD ///////////////////
    ///////////////////////////////////////////

    // var publish = function () {
    //     $('#publish-news').on('click', function (e) {
    //         let form = $('#add-new-nwes');
    //         let formData = form.serialize();
    //         let method = form.attr('method');
    //         let link = form.attr('action');
    //
    //        var newLink =  link.substring(0, link.length - 1);
    //          newLink = newLink + '1';
    //
    //         Forms.doAction(newLink, formData, method, null, addCallBack);
    //     });
    // }

    var publish = function () {
        $('#publish-news').on('click', function (e) {
            let form = document.getElementById('add-new-nwes');
            var formData = new FormData(form);
            let method = form.getAttribute('method');
            let link = form.getAttribute('action');

           var newLink =  link.substring(0, link.length - 1);
             newLink = newLink + '1';

            Forms.doAction(newLink, formData, method, null, addCallBack);
        });
    }



    var add = function () {
        $('#add-news').on('click', function (e) {
            let form = document.getElementById('add-new-nwes');
            var formData = new FormData(form);
            let method = form.getAttribute('method');
            let link = form.getAttribute('action');
            Forms.doAction(link, formData, method, null, addCallBack);
        });
    }

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

    var updateNews=function () {
        $('#update-news').click(function (e){
            e.preventDefault();
            let form = document.getElementById('update-data_news');
            var formData = new FormData(form);
            let method = form.getAttribute('method');
            let link = form.getAttribute('action');
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
            add();
            publish();
            edit();
            viewTable();
            search();
            deleteItem();
            updateStatus();
            updateNews()
        }
    }
}();
