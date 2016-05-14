function wxShare(wxData){
    $().ready(function () {
        $.ajax({
            url: 'http://campaign.maestro.com.cn/api/wechat/index.php?c=index&m=sign',
            dataType: 'jsonp',
            jsonp: 'callback',
            data: {url: location.href},
            success: function (json) {
                //wxShare(data);
                var data = $.extend({}, wxData,json);
                wx.config({
                    debug: data.debug || false,
                    appId: data.appId,
                    timestamp: data.timestamp,
                    nonceStr: data.nonceStr,
                    signature: data.signature,
                    jsApiList: [
                        'onMenuShareTimeline',
                        'onMenuShareAppMessage',
                        'uploadImage',
                        'previewImage',
                        'chooseImage'
                    ]
                });
                wx.ready(function () {
                    wx.onMenuShareAppMessage({
                        title: data.title,
                        desc: data.desc,
                        link: data.link,
                        imgUrl: data.imgUrl,
                        trigger: function (res) {},
                        success: function (res) {
                        },
                        cancel: function (res) {},
                        fail: function (res) {}
                    });
                    wx.onMenuShareTimeline({
                        title: data.desc,
                        link: data.link,
                        imgUrl: data.imgUrl,
                        trigger: function (res) {},
                        success: function (res) {
                        },
                        cancel: function (res) {},
                        fail: function (res) {}
                    });
                });
            },
            error: function () {
            }
        })
    })
}