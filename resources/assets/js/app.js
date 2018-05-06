try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {
}


$(document).ready(function () {
    $('#add-row-btn').on('click', function (e) {
        e.preventDefault();
        $('.words-wrapper').append('<div class="form-group words-input">\n' +
            '                                <div class="row">\n' +
            '                                    <div class="col-md-6">\n' +
            '                                        <input class="form-control" name="lang1[]">\n' +
            '                                    </div>\n' +
            '                                    <div class="col-md-6">\n' +
            '                                        <input class="form-control" name="lang2[]">\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                            </div>');
    });

    $('#delete-row-btn').on('click', function (e) {
        e.preventDefault();
        $('.words-input').last().remove();
    });
});
