var $ = jQuery.noConflict();
var ajax_url = url.ajaxurl;
var site_url = url.siteurl;

$(document).ready(function () {

    // Open input file
    $('.website_logo img').on('click', function () {
        $('.website_logo input').click();
    });

    // Append image base64
    $('.website_logo input').on('change', function () {
        let _this = $(this);
        let image = _this[0].files[0];
        let reader = new FileReader();
        reader.onloadend = function () {
            _this.parent().find('img').attr("src", reader.result);
            _this.parent().find('.remove_logo').remove();
            _this.parent().append(`<span class="remove_logo">x</span>`);
        }
        reader.readAsDataURL(image);
    });

    // Remove image
    $(document).on('click', '.remove_logo', function () {
        let _this = $(this);
        _this.parent().find('input').val('');
        _this.parent().find('img').attr('src', site_url + '/wp-content/themes/ikonic/assets/logo-placeholder.jpg');
        _this.remove();
    });

    // Save data by AJAX
    $('.save_theme_setting input').on('click', function () {
        let _this = $(this);
        let fd = new FormData();
        let web_logo = _this.parent().parent().find('input[name="site_logo"]')[0].files[0];
        let web_addr = _this.parent().parent().find('textarea[name="site_addr"]').val();
        let web_contact = _this.parent().parent().find('input[name="site_contact"]').val();
        let loader = `<span class='theme-loader'></span>`;

        if(_this.parent().parent().find('input[name="site_logo"]').val() == '') {
            web_logo = _this.parent().parent().find('input[name="site_logo"]').next('img').attr('src');
        }

        fd.append("web_logo", web_logo);
        fd.append("web_addr", web_addr);
        fd.append("web_contact", web_contact);
        fd.append("action", "theme_setting");

        $.ajax({
            url: ajax_url,
            type: "post",
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            enctype: "multipart/form-data",
            beforeSend: function() {
                $(loader).insertAfter(_this);
            },
            success: function (res) {
                res = JSON.parse(res);
                if(res) {
                    location.reload();
                }
                else {
                    alert('Something is wrong!');
                    _this.parent().find('.theme-loader').remove();
                }
            },
            error: function (err) {
                console.log(err);
            },
        });
    });
});