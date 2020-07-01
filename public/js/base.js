$(function () {
    const switchUrl = {
        switchWwwUrl:function () {
            window.localStorage.setItem("urlType", "www_url");
            $('#www_switch').prop('checked', true);
            $('#switch_url_label').html('外网地址');
            $.each($(".link"), function (k, v) {
                if ($(v).attr('href').startsWith('/tag')) {
                    return;
                }
                $(v).attr('href', $(v).attr('data-www-url'));
            });
        },
        switchLocalUrl:function () {
            window.localStorage.setItem("urlType", "local_url");
            $('#www_switch').prop('checked', false);
            $('#switch_url_label').html('内网地址');
            $.each($(".link"), function (k, v) {
                $(v).attr('href', $(v).attr('data-url'));
            })
        },
        init: function () {
            let urlType = window.localStorage.getItem("urlType");
            if (urlType !== undefined && urlType === 'www_url') {
                switchUrl.switchWwwUrl();
            }
            if (urlType !== undefined && urlType === 'local_url') {
                switchUrl.switchLocalUrl();
            }
        }

    };

    switchUrl.init();

    $('#www_switch').click(function () {
        if (this.checked) {
            switchUrl.switchWwwUrl();
        } else {
            switchUrl.switchLocalUrl();
        }
    });
});