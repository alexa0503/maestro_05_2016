$('document').ready(function () {
    $.ajax({
        url: 'http://campaign.maestro.com.cn/api/wechat/index.php?c=index&m=sign',
        dataType: 'jsonp',
        jsonp: 'callback',
        data: {url: location.href},
        success: function (json) {
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
                    'onMenuShareQQ',
                    'uploadImage',
                    'previewImage',
                    'chooseImage'
                ]
            });
        },
        error: function () {
            console.log('请求微信分享接口失败~');
        }
    })
})
function wxShare(data){
    wx.ready(function () {
        isWechat = true;
        wx.onMenuShareAppMessage({
            title: data.title,
            desc: data.desc,
            link: data.link,
            imgUrl: data.imgUrl,
            trigger: function (res) {},
            success: function (res) {},
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
        wx.onMenuShareQQ({
            title: data.title,
            desc: data.desc,
            link: data.link,
            imgUrl: data.imgUrl,
            success: function () {},
            cancel: function () {}
        });
    });
}