//找到url中匹配的字符串
function findInUrl(str) {
    url = location.href;
    return url.indexOf(str) == -1 ? false : true;
}
//获取url参数
function queryString(key) {
    return (document.location.search.match(new RegExp("(?:^\\?|&)" + key + "=(.*?)(?=&|$)")) || ['', null])[1];
}

//产生指定范围的随机数
function randomNumb(minNumb, maxNumb) {
    var rn = Math.round(Math.random() * (maxNumb - minNumb) + minNumb);
    return rn;
}

var shareImgSrc;
var wHeight;
var imgDir;
var fisrtTouch=false;
var secondTouch=false;
//var isWechat = false;
$(document).ready(function () {
    $('body').on('touchmove', function (e) {
        e.preventDefault();
    });

    wHeight = $(window).height();
	
    $('.pageOuter').height(wHeight);
	
	if(wHeight<1008){
		var bli=wHeight/1008;
		$('.page').height(1008);
		$('.h1008').css('padding-top','0px');
		$('.page').css('-webkit-transform','scale('+bli+')');
		$('.page').css('-webkit-transform-origin','50% 0px');
		}
		else if(wHeight>1039){
			$('.page').height(wHeight);
			$('.h1008').css('padding-top',wHeight-1008+'px');
			}
			else{
				$('.page').height(wHeight);
				$('.h1008').css('padding-top',(wHeight-1008)/2+'px');
				}
});

window.onresize=winOnResize;

function winOnResize(){
	wHeight = $(window).height();
	
    $('.pageOuter').height(wHeight);
	
	if(wHeight<1008){
		var bli=wHeight/1008;
		$('.page').height(1008);
		$('.h1008').css('padding-top','0px');
		$('.page').css('-webkit-transform','scale('+bli+')');
		$('.page').css('-webkit-transform-origin','50% 0px');
		}
		else if(wHeight>1039){
			$('.page').height(wHeight);
			$('.h1008').css('padding-top',wHeight-1008+'px');
			}
			else{
				$('.page').height(wHeight);
				$('.h1008').css('padding-top',(wHeight-1008)/2+'px');
				}
	}

var phTxt=[{p1:'个性',p2:'独立摄影师',p3:'Bruce'},{p1:'颠覆',p2:'时尚博主',p3:'Carol'},{p1:'阳光',p2:'乐队鼓手',p3:'Charles'},{p1:'颓废',p2:'摇滚乐手',p3:'Gloria'},{p1:'活力',p2:'是平面模特',p3:'Helena'},{p1:'随性',p2:'青年舞蹈家',p3:'Diana'},{p1:'朋克',p2:'男团主唱',p3:'Eric'}];

function page1Swipe() {
    var swiper = new Swiper('.swiper-container', {
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        nextButton: '.arrowRight',
        prevButton: '.arrowLeft',
        loop: true,
        spaceBetween: 0,

        slidesPerView: 2,
		autoplay:1500,
		autoplayDisableOnInteraction:true,
        coverflow: {
            rotate: 0,
            stretch: 0,
            depth: 100,
            modifier: 1.1,
            slideShadows: true
        }
    });
	$('.swiper-slide').click(function(){
		if($(this).hasClass('swiper-slide-active')){
			goPage2Link(page2Url);
			}
		});
}

var isFirstUpload=true;

function resizeImg() {
    document.getElementById("uploadBtn").onchange = function (e) {
        var file = e.target.files[0];
        var orientation;
        //EXIF js 可以读取图片的元信息 https://github.com/exif-js/exif-js
        EXIF.getData(file, function () {
            orientation = EXIF.getTag(this, 'Orientation');
        });
        var reader = new FileReader();
        reader.onload = function (e) {
            getImgData(this.result, orientation, function (data) {
                //这里可以使用校正后的图片data了
				$('.page2Photo').hide();
				
                $('#preview').attr('src', data);
                $('#preview').show();

                isSelectedImg = true;
                $('.upLoadImg').css('webkitTransform', '');
                START_X = 0;
                START_Y = 0;
                endx = 0;
                endy = 0;
                posX = 0;
                posY = 0;
                ticking = false;
                iX = 0;
                iY = 0;
                iS = 1;
                iA = 0;

                $('#modelMImg').show();
                $('#modelMImg2').hide();
                $('.zsImg').hide();
				
				if(isFirstUpload){
					isFirstUpload=false;
					ga('send','event','button','click','page_upload_photo');
					}
					else{
						ga('send','event','button','click','reupload'); 
						}

                changeMc();
                goPage3();
                return true;
            });
        }
        reader.readAsDataURL(file);
    }
}

var selM;
var selMTxtData1 = [{'t1': '拒绝大头贴，造点', t2: '的', bg: '#ffb641'}, {'t1': '从未被撞衫，造点', t2: '的', bg: '#ffe7cf'}, {'t1': '负能量走开，造点', t2: '的', bg: '#22b9a6'}, {'t1': '打倒小清新，造点', t2: '的', bg: '#e4ade2'}, {'t1': '青春无所畏，造点', t2: '的', bg: '#1896e2'}, {
    't1': '我是麦克疯，造点',
    t2: '的',
    bg: '#e18181'
}, {'t1': '只爱重金属，造点', t2: '的', bg: '#a25b92'}]
var selMTxtData2 = [{'t1': '我是', t2: '@'}, {'t1': '我是', t2: '@'}, {'t1': '我是', t2: '@'}, {'t1': '我是', t2: '@'}, {'t1': '我是', t2: '@'}, {'t1': '我是', t2: '@'}, {'t1': '我是', t2: '@'}]

var gpUrl;
function goPage2Link(url){
	gpUrl=url;
	ga('send', 'event', 'button', 'click', 'gamestart',{'hitCallback':function(){
		selM = parseInt($('.swiper-slide-active').attr('slem'));
		window.location.href=gpUrl+'?selM='+selM;
		}});
	}
	
function showPhotoPop(){
	if(!isWechat){
		$('#uploadBtn').show();
		$('#wxChoseImg').click(function(){
			$('#uploadBtn').click();
			});
		}
		else{
			$('#uploadBtn').hide();
			$('#wxChoseImg').click(function(){
				if(isWechat){
					$('#uploadBtn').show();
					$('#uploadBtn').click();
					
					/*wx.chooseImage({
						count: 1, // 默认9
						sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
						sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
						success: function (res) {
							$('.page2Photo').hide();
							
							var localIds = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
							$('#preview').attr('src', localIds);
							$('#preview').show();
			
							isSelectedImg = true;
							$('.upLoadImg').css('webkitTransform', '');
							START_X = 0;
							START_Y = 0;
							endx = 0;
							endy = 0;
							posX = 0;
							posY = 0;
							ticking = false;
							iX = 0;
							iY = 0;
							iS = 1;
							iA = 0;
			
							$('#modelMImg').show();
							$('#modelMImg2').hide();
							$('.zsImg').hide();
			
							changeMc();
							goPage3();
							}
						});*/
					}
					else{
						$('#uploadBtn').click();
						}
				});
			/*$('#wxChoseImgAgain').click(function(){
				wx.chooseImage({
					count: 1, // 默认9
					sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
					sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
					success: function (res) {
						$('.page2Photo').hide();
						
						var localIds = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
						$('#preview').attr('src', localIds);
						$('#preview').show();
		
						isSelectedImg = true;
						$('.upLoadImg').css('webkitTransform', '');
						START_X = 0;
						START_Y = 0;
						endx = 0;
						endy = 0;
						posX = 0;
						posY = 0;
						ticking = false;
						iX = 0;
						iY = 0;
						iS = 1;
						iA = 0;
		
						$('#modelMImg').show();
						$('#modelMImg2').hide();
						$('.zsImg').hide();
		
						changeMc();
						goPage3();
						}
					});
				});*/
			}
	$('.popBg1').fadeIn(500);
	$('.page2Photo').fadeIn(500);
	}
	
var selDataIndexFirst;
function getPage2() {
	var urlSelM=queryString('selM');
	if(parseInt(urlSelM)>=1||parseInt(urlSelM)<=7){
		selM = parseInt(urlSelM);
		}
		else{
			selM = 1;//如果参数错误，选用第一张图片
			}
			
	ga('send', 'event', 'template', 'choose', 'module_'+selM);
			
	$('.mnImg').attr('src',"images/mn"+selM+".png");
    
    $('.model').addClass('model' + selM);
    $('.modelM').addClass('modelM' + selM);
    $('.preImg').addClass('preImg' + selM);
    $('.faceResize').addClass('faceResize' + selM);
    //$('.zsImg').addClass('zsImg'+selM);
    $('.setpImg').attr('src', 'images/Steps_0' + selM + '.gif');
    selDataIndexFirst = (parseInt(selM) - 1);
    $('.diyTxt11').html(selMTxtData1[selDataIndexFirst].t1);
    $('.diyTxt12').html(selMTxtData1[selDataIndexFirst].t2);
	$('.diyTxt2Input2').show();
    $('.diyTxt21').html(selMTxtData2[selDataIndexFirst].t1);
    $('.diyTxt22').html(selMTxtData2[selDataIndexFirst].t2);
	
	$('.diyTxt1Input').prop('placeholder',phTxt[selDataIndexFirst].p1);
	$('.diyTxt2Input1').prop('placeholder',phTxt[selDataIndexFirst].p2);
	$('.diyTxt2Input2').prop('placeholder',phTxt[selDataIndexFirst].p3);
	
	var images = [];
    images.push("images/model"+selM+"Img.png");
    images.push("images/photoPop.png");
	images.push("images/model"+selM+".jpg");
	
    /*图片预加载*/
    var imgNum = 0;
    $.imgpreload(images,
        {
            each: function () {
                var status = $(this).data('loaded') ? 'success' : 'error';
                if (status == "success") {
                }
            },
            all: function () {
				setTimeout(function(){
					$('body').css('background', selMTxtData1[selDataIndexFirst].bg);
					$('.page0').fadeOut(500);
					$('.page2').fadeIn(500);
					},1000);
            }
        });
}

function goPage3() {
	ga('send','pageview','custom_photo');
    $('.p2Step1').fadeOut(500);
    $('.p2Step2').fadeIn(500);
	$('.popBg1').hide();
	$('.faceResize').addClass('faceResizeAct');
}

function changZs(e) {
	if(parseInt(zsNumb)==parseInt(e)){
		zsNumb=0;
		$('#modelMImg').show();
		$('#modelMImg2').hide();
		$('.zsImg').hide();
		}
		else{
			zsNumb = parseInt(e);
			$('#modelMImg').hide();
			$('#modelMImg2').show();
			$('.zsImg').attr('src', 'images/zsImg' + zsNumb + '.png');
			$('.zsImg').css({'left': zsData[zsNumb - 1].left + 'px', 'top': zsData[zsNumb - 1].top + 'px'});
			$('.zsImg').show();
			$('.faceResizeImg2').show().addClass('faceResizeAct');
			$('.mnImg').hide();
			$('.faceResize').removeClass('faceResizeAct').hide();
			changeMc2();
			}
}

/*图片上传*/
//全局变量
var isSelectedImg = false;//是否选择图片
var originalImgWidth;//原图宽度
var originalImgHeight;//原图高度

var dataImg;

//移动
var reqAnimationFrame = (function () {
    return window[Hammer.prefixed(window, 'requestAnimationFrame')] || function (callback) {
            window.setTimeout(callback, 1000 / 60);
        };
})();

var el;
var ei;

var START_X = 0;//Math.round((window.innerWidth - el.offsetWidth) / 2);
var START_Y = 0;//Math.round((window.innerHeight - el.offsetHeight) / 2);

var endx = 0;
var endy = 0;
var posX = 0;
var posY = 0;

var ticking = false;
var transform;
var timer;

var mc;

var iX = 0;
var iY = 0;
var iS = 1;
var iA = 0;
var iWidth;
var iHeight;
var iXie;

var mData=[{'left':'237px','top':'158px'},{'left':'250px','top':'140px'},{'left':'232px','top':'194px'},{'left':'287px','top':'154px'},{'left':'230px','top':'170px'},{'left':'243px','top':'140px'},{'left':'221px','top':'140px'}];

function changeMc() {
    el = document.querySelector("#modelMImg");
    ei = document.querySelector('#preview');
    mc = new Hammer.Manager(el);

    mc.add(new Hammer.Pan({threshold: 0, pointers: 0}));
    mc.add(new Hammer.Rotate({threshold: 0})).recognizeWith(mc.get('pan'));
    mc.add(new Hammer.Pinch({threshold: 0})).recognizeWith([mc.get('pan'), mc.get('rotate')]);
    mc.on("panstart panmove panend", onPan);
    mc.on("rotatestart rotatemove", onRotate);
    mc.on("pinchstart pinchmove", onPinch);

    //$('#modelMImg').css({'left':mData[parseInt(selM)-1].left,'top':mData[parseInt(selM)-1].top});

    resetElement();
}

function resetElement() {
    el.className = 'animate';
    transform = {
        translate: {x: START_X, y: START_Y},
        scale: 1,
        angle: 0,
        rx: 0,
        ry: 0,
        rz: 0
    };
    requestElementUpdate();
}

function updateElementTransform() {
    var value = [

        'translate3d(' + transform.translate.x + 'px, ' + transform.translate.y + 'px, 0)',

        'scale(' + transform.scale + ', ' + transform.scale + ')',

        'rotate3d(' + transform.rx + ',' + transform.ry + ',' + transform.rz + ',' + transform.angle + 'deg)'

    ];

    iX = transform.translate.x;
    iY = transform.translate.y;
    iS = transform.scale;
    iA = transform.angle;

    value = value.join(" ");
    ei.style.webkitTransform = value;
    ei.style.mozTransform = value;
    ei.style.transform = value;
    ticking = false;
	if(fisrtTouch){
		//$('.mnImg').fadeOut(500);
		$('.faceResize').removeClass('faceResizeAct').hide();
		}
	fisrtTouch=true;
}


function requestElementUpdate() {
    if (!ticking) {
        reqAnimationFrame(updateElementTransform);
        ticking = true;
    }
}

function onPan(ev) {

    el.className = '';

    switch (ev.type) {
        case 'panmove':
            posX = ev.deltaX + endx;
            posY = ev.deltaY + endy;
            break;
        case 'panend':
            endx = posX;
            endy = posY;
            break;
    }

    transform.translate = {
        x: posX,
        y: posY
    };
    requestElementUpdate();
}

var initScale = 1;
function onPinch(ev) {
    if (ev.type == 'pinchstart') {
        initScale = transform.scale || 1;
    }

    el.className = '';
    transform.scale = initScale * ev.scale;

    requestElementUpdate();
}

var initAngle = 0;
function onRotate(ev) {
    if (ev.type == 'rotatestart') {
        initAngle = transform.angle || 0;
    }

    el.className = '';
    transform.rz = 1;
    transform.angle = initAngle + ev.rotation;
    requestElementUpdate();
}

//移动2
var reqAnimationFrame2 = (function () {
    return window[Hammer.prefixed(window, 'requestAnimationFrame')] || function (callback) {
            window.setTimeout(callback, 1000 / 60);
        };
})();

var el2;
var ei2;

var START_X2 = 0;//Math.round((window.innerWidth - el.offsetWidth) / 2);
var START_Y2 = 0;//Math.round((window.innerHeight - el.offsetHeight) / 2);

var endx2 = 0;
var endy2 = 0;
var posX2 = 0;
var posY2 = 0;

var ticking2 = false;
var transform2;
var timer2;

var mc2;

var iX2 = 0;
var iY2 = 0;
var iS2 = 1;
var iA2 = 0;
var iWidth2;
var iHeight2;
var iXie2;

function changeMc2() {
    el2 = document.querySelector("#modelMImg2");
    ei2 = document.querySelector('#zsImg');
    mc2 = new Hammer.Manager(el2);

    mc2.add(new Hammer.Pan({threshold: 0, pointers: 0}));
    mc2.add(new Hammer.Rotate({threshold: 0})).recognizeWith(mc2.get('pan'));
    mc2.add(new Hammer.Pinch({threshold: 0})).recognizeWith([mc2.get('pan'), mc2.get('rotate')]);
    mc2.on("panstart panmove panend", onPan2);
    mc2.on("rotatestart rotatemove", onRotate2);
    mc2.on("pinchstart pinchmove", onPinch2);
    resetElement2();
}

function resetElement2() {
    el2.className = 'animate';
    transform2 = {
        translate: {x: START_X2, y: START_Y2},
        scale: 1,
        angle: 0,
        rx: 0,
        ry: 0,
        rz: 0
    };
    requestElementUpdate2();
}

function updateElementTransform2() {
    var value2 = [

        'translate3d(' + transform2.translate.x + 'px, ' + transform2.translate.y + 'px, 0)',

        'scale(' + transform2.scale + ', ' + transform2.scale + ')',

        'rotate3d(' + transform2.rx + ',' + transform2.ry + ',' + transform2.rz + ',' + transform2.angle + 'deg)'

    ];

    iX2 = transform2.translate.x;
    iY2 = transform2.translate.y;
    iS2 = transform2.scale;
    iA2 = transform2.angle;

    value2 = value2.join(" ");
    ei2.style.webkitTransform = value2;
    ei2.style.mozTransform = value2;
    ei2.style.transform = value2;
	if(secondTouch){
		$('.faceResizeImg2').removeClass('faceResizeAct').hide();
		}
	secondTouch=true;
    ticking2 = false;
}


function requestElementUpdate2() {
    if (!ticking2) {
        reqAnimationFrame2(updateElementTransform2);
        ticking2 = true;
    }
}

function onPan2(ev) {

    el2.className = '';

    switch (ev.type) {
        case 'panmove':
            posX2 = ev.deltaX + endx2;
            posY2 = ev.deltaY + endy2;
            break;
        case 'panend':
            endx2 = posX2;
            endy2 = posY2;
            break;
    }

    transform2.translate = {
        x: posX2,
        y: posY2
    };
    requestElementUpdate2();
}

var initScale2 = 1;
function onPinch2(ev) {
    if (ev.type == 'pinchstart') {
        initScale2 = transform2.scale || 1;
    }

    el2.className = '';
    transform2.scale = initScale2 * ev.scale;

    requestElementUpdate2();
}

var initAngle2 = 0;
function onRotate2(ev) {
    if (ev.type == 'rotatestart') {
        initAngle2 = transform2.angle || 0;
    }

    el2.className = '';
    transform2.rz = 1;
    transform2.angle = initAngle2 + ev.rotation;
    requestElementUpdate2();
}

function goPage4() {
    var diyTxt1 = $.trim($('.diyTxt1Input').val());
    var diyTxt2 = $.trim($('.diyTxt2Input1').val());
    var diyTxt3 = $.trim($('.diyTxt2Input2').val());
    if (diyTxt1 == '') {
        $('.diyTxt1Input').val(phTxt[(parseInt(selM)-1)].p1);
    }
    if (diyTxt2 == '') {
        $('.diyTxt2Input1').val(phTxt[(parseInt(selM)-1)].p2);
    }
	if (diyTxt3 == '') {
        $('.diyTxt2Input2').val(phTxt[(parseInt(selM)-1)].p3);
    }
    drawCanvas();
    $('.page2').fadeOut(500);
    $('.page4').fadeIn(500);
}

var sCanvas;
var sctx;
var targImg;
function shareCanvas(){
	sCanvas=document.getElementById('shareCanvas');
	sctx=sCanvas.getContext('2d');
	targImg = new Image();
    targImg.onload = function () {
		sctx.drawImage(targImg, 0, -22, 200, 325);//
		shareImgSrc = sCanvas.toDataURL("image/png");
		document.getElementById("shareThumbImg").src = shareImgSrc;
		}
	var targImgSrc = $('#edImg').attr('src');
    targImg.src = targImgSrc;
	}

var drawCanvas;
var ctx;
var ww, wh;
var tImg, tImg2, tImg3;
var zsNumb = 0;
var zsData = [{'width': '235', 'height': '88', 'left': '220', 'top': '180'}, {'width': '158', 'height': '240', 'left': '270', 'top': '40'}, {'width': '221', 'height': '260', 'left': '225', 'top': '50'}, {'width': '206', 'height': '441', 'left': '210', 'top': '70'}, {
    'width': '157',
    'height': '66',
    'left': '255',
    'top': '200'
}];
var iww, iwh;

function drawCanvas() {
	$('.myBtn1').hide();
	$('.myBtn2').hide();
    drawCanvas = document.getElementById('drawCanvas');
    ctx = drawCanvas.getContext('2d');
    ww = 640;
    wh = 1039;
    $('#drawCanvas').attr('width', ww);
    $('#drawCanvas').attr('height', wh);
    ctx.fillStyle = "#FFF";
    ctx.fillRect(0, 0, ww, wh);
    //draw first start
    tImg = new Image();
    tImg.onload = function () {
        ctx.save();

        iww = tImg.width;
        iwh = tImg.height;

        iWidth = 170;
        iHeight = iwh * 170 / iww;

        ctx.translate(parseInt(mData[parseInt(selM) - 1].left) + iX + iWidth / 2, parseInt(mData[parseInt(selM) - 1].top) + iY + iHeight / 2 + 16);

        ctx.rotate(iA * Math.PI / 180);
        ctx.scale(iS, iS);
        ctx.drawImage(tImg, -iWidth / 2, -iHeight / 2, iWidth, iHeight);
        ctx.restore();//draw first end

        //draw second start
        tImg2 = new Image();
        tImg2.onload = function () {
            ctx.save();
            ctx.drawImage(tImg2, 0, 0, 640, 1039);
            ctx.restore();
            if (zsNumb != 0) {
                tImg3 = new Image();
                tImg3.onload = function () {
                    ctx.save();
                    iWidth2 = zsData[parseInt(zsNumb) - 1].width;
                    iHeight2 = zsData[parseInt(zsNumb) - 1].height;

                    ctx.save();
                    ctx.translate(parseInt($('.zsImg').css('left')) + iX2 + iWidth2 / 2, parseInt($('.zsImg').css('top')) + iY2 + iHeight2 / 2 + 16);
                    ctx.rotate(iA2 * Math.PI / 180);
                    ctx.scale(iS2, iS2);
                    var zsImgFd2 = document.getElementsByClassName('zsImg');
                    ctx.drawImage(zsImgFd2[0], -iWidth2 / 2, -iHeight2 / 2, iWidth2, iHeight2);
                    ctx.restore();
                    drawDiyTxt();
                }
                var img3Src = $('.zsImg').attr('src');
                tImg3.src = img3Src;
            }
            else {
                drawDiyTxt();
            }
        }
        var img2Src = $('.modelM').css('background-image').replace(/url/g, '').replace('(', '').replace(')', '').replace(/"/g, '').replace('\'', '');
        tImg2.src = img2Src;
    }
    tImg.src = $('#preview').attr('src');
}

function drawDiyTxt() {
    var selDataIndex = (parseInt(selM) - 1);
    var diyTxt1 = selMTxtData1[selDataIndex].t1 + ' ' + $.trim($('.diyTxt1Input').val()) + ' ' + selMTxtData1[selDataIndex].t2;
    var diyTxt2;
	diyTxt2 = selMTxtData2[selDataIndex].t1 + ' ' + $.trim($('.diyTxt2Input1').val()) + ' ' + selMTxtData2[selDataIndex].t2 + $.trim($('.diyTxt2Input2').val());

    //打印文字
    ctx.font = "italic 40px Microsoft YaHei";
    ctx.textAlign = "center";

    ctx.shadowOffsetX = 0;
    ctx.shadowOffsetY = 0;
    ctx.shadowColor = "#FFF";
    ctx.shadowBlur = 5;
    ctx.fillText(diyTxt1, 320, 610);
    ctx.shadowBlur = 10;
    ctx.fillText(diyTxt1, 320, 610);
    ctx.shadowBlur = 15;
    ctx.fillText(diyTxt1, 320, 610);
    ctx.shadowColor = "#0e2c69";
    ctx.shadowBlur = 20;
    ctx.fillText(diyTxt1, 320, 610);
    ctx.shadowBlur = 30;
    ctx.fillText(diyTxt1, 320, 610);
    ctx.shadowBlur = 40;
    ctx.fillText(diyTxt1, 320, 610);
    ctx.shadowBlur = 55;
    ctx.fillText(diyTxt1, 320, 610);
    ctx.shadowBlur = 75;
    ctx.fillText(diyTxt1, 320, 610);

    ctx.font = "22px Microsoft YaHei";
    ctx.shadowColor = "#FFF";
    ctx.shadowBlur = 2;
    ctx.fillText(diyTxt2, 320, 665);
    ctx.shadowBlur = 4;
    ctx.fillText(diyTxt2, 320, 665);
    ctx.shadowBlur = 6;
    ctx.fillText(diyTxt2, 320, 665);
    ctx.shadowColor = "#0e2c69";
    ctx.shadowBlur = 10;
    ctx.fillText(diyTxt2, 320, 665);
    ctx.shadowBlur = 15;
    ctx.fillText(diyTxt2, 320, 665);
    ctx.shadowBlur = 20;
    ctx.fillText(diyTxt2, 320, 665);
    ctx.shadowBlur = 30;
    ctx.fillText(diyTxt2, 320, 665);


    //合成到图片
    var edImgSrc = drawCanvas.toDataURL("image/png");
    document.getElementById("edImg").src = edImgSrc;
	
	//合成分享小图
	shareCanvas();
	
	$('.popBg2').show();
	$('.popLoading').show();

    var data = {
        img: edImgSrc,
        attitude: $.trim($('.diyTxt1Input').val()),
        self_name: $.trim($('.diyTxt2Input1').val()),
        friend_name: $.trim($('.diyTxt2Input1').val()),
        _token: $('input[name="_token"]').val()
    };
    $.post(uploadUrl,data, function (json) {
        if (json.ret == 0){
            wxData.title = json.data.title;
            wxData.dec = json.data.desc;
            wxData.link = json.data.link;
            wxData.imgUrl = json.data.imgUrl;
            noWechatShareTitle=json.data.title;//分享标题
            noWechatSharlUrl=json.data.link;//分享地址
            noWechatShareImg=json.data.imgUrl;//分享小图
            noWechatShareTxt=json.data.desc;//分享文案
            shareNoWeichat();
            wxShare(wxData);
        }
		$('.popBg2').hide();
		$('.popLoading').hide();
		
		if (isWechat) {
			$('.shareNote1').fadeIn(500);
			$('.shareNote2').hide();
		}
		else {
			$('.popBg1').fadeIn(500);
			$('.shareNote2').fadeIn(500);
			$('.shareNote1').hide();
		}
		
		ga('send','pageview','custom_photo_finished');
		
        //alert(json.ret);
    },"JSON");
}

var needtor=false;
var efCanvas;
var efImage;
var texture;
var isFirstMp=true;
var isFirstRo=true;
var rImg;
var isMp=false;
var eftdu;

function changeMp(){
	if(isMp){
		return false;
		}
		else{
			isMp=true;
			$('.myBtn1').hide();
			$('.myBtn2').show();
			}
	if(isFirstMp){
		try {
			efCanvas = fx.canvas();
			} catch (e) {
				alert(e);
				return;
				}
		isFirstMp=false;
		efImage = document.getElementById('pmImg');
		texture = efCanvas.texture(efImage);
		}
	efCanvas.draw(texture).unsharpMask(25, 0.23).brightnessContrast(0.02, 0.05).denoise(50).update();  
	eftdu=efCanvas.toDataURL('image/png')
	efImage.src=eftdu;
	
	if(needtor&&isIOS){
		rImg=new Image();
		rImg.onload=function(){
			var rImgw=rImg.width;
			var rImgh=rImg.height;
			var pmCavas=document.getElementById('pmCavas');
			var pmCtx=pmCavas.getContext('2d');
			$('#pmCavas').attr('width',rImgw);
			$('#pmCavas').attr('height',rImgh);
			pmCtx.save();
			pmCtx.translate(0, rImgh);
			pmCtx.scale(1, -1);
			pmCtx.drawImage(rImg,0,0);
			pmCtx.restore();
			$('#preview').attr('src',pmCavas.toDataURL('image/png'));
			}
		rImg.src=$('#pmImg').attr('src');
		}
		else{
			$('#preview').attr('src',eftdu);
			}
	}
	
function recoverMp(){
	if(!isMp){
		return false;
		}
		else{
			isMp=false;
			$('.myBtn2').hide();
			$('.myBtn1').show();
			}
	efCanvas.draw(texture).update();
	eftdu=efCanvas.toDataURL('image/png');
	efImage.src=eftdu;
	
	if(needtor&&isIOS){
		rImg=new Image();
		rImg.onload=function(){
			var rImgw=rImg.width;
			var rImgh=rImg.height;
			var pmCavas=document.getElementById('pmCavas');
			var pmCtx=pmCavas.getContext('2d');
			$('#pmCavas').attr('width',rImgw);
			$('#pmCavas').attr('height',rImgh);
			pmCtx.save();
			pmCtx.translate(0, rImgh);
			pmCtx.scale(1, -1);
			pmCtx.drawImage(rImg,0,0);
			pmCtx.restore();
			$('#preview').attr('src',pmCavas.toDataURL('image/png'));
			}
		rImg.src=$('#pmImg').attr('src');
		}
		else{
			$('#preview').attr('src',eftdu);
			}
	}

// @param {string} img 图片的base64
// @param {int} dir exif获取的方向信息
// @param {function} next 回调方法，返回校正方向后的base64
function getImgData(img, dir, next) {
	needtor=false;
    var image = new Image();
    image.onload = function () {
        var degree = 0, drawWidth, drawHeight, width, height;
        drawWidth = this.naturalWidth;
        drawHeight = this.naturalHeight;
        //以下改变一下图片大小
        var maxSide = Math.max(drawWidth, drawHeight);
        if (maxSide > 1024) {
            var minSide = Math.min(drawWidth, drawHeight);
            minSide = minSide / maxSide * 1024;
            maxSide = 1024;
            if (drawWidth > drawHeight) {
                drawWidth = maxSide;
                drawHeight = minSide;
            } else {
                drawWidth = minSide;
                drawHeight = maxSide;
            }
        }
        var canvas = document.getElementById('guoduCanvas');
        canvas.width = width = drawWidth;
        canvas.height = height = drawHeight;
        var context = canvas.getContext('2d');
        //判断图片方向，重置canvas大小，确定旋转角度，iphone默认的是home键在右方的横屏拍摄方式
        switch (dir) {
			case 1:
				needtor=true;
				break;
			
            //iphone横屏拍摄，此时home键在左侧
            case 3:
				needtor=true;
                degree = 180;
                drawWidth = -width;
                drawHeight = -height;
                break;
            //iphone竖屏拍摄，此时home键在下方(正常拿手机的方向)
            case 6:
				needtor=true;
                canvas.width = height;
                canvas.height = width;
                degree = 90;
                drawWidth = width;
                drawHeight = -height;
                break;
            //iphone竖屏拍摄，此时home键在上方
            case 8:
				needtor=true;
                canvas.width = height;
                canvas.height = width;
                degree = 270;
                drawWidth = -width;
                drawHeight = height;
                break;
        }
		/*var getPixelRatio = function(context) {
		var backingStore = context.backingStorePixelRatio ||
		  context.webkitBackingStorePixelRatio ||
		  context.mozBackingStorePixelRatio ||
		  context.msBackingStorePixelRatio ||
		  context.oBackingStorePixelRatio ||
		  context.backingStorePixelRatio || 1;
		  return (window.devicePixelRatio || 1) / backingStore;
	  	};

	  	//调用
	  	var ratio = getPixelRatio(context);*/
		
        //使用canvas旋转校正
        context.rotate(degree * Math.PI / 180);
        context.drawImage(this, 0, 0, drawWidth, drawHeight);
        //返回校正图片
		
		$('.myBtn1').show();
		$('.myBtn2').hide();
		isFirstMp=true;
		isMp=false;
		
		var itdu=canvas.toDataURL("image/png");
		$('#pmImg').attr('src',itdu);
        next(itdu);
    }
    image.src = img;
}

function goPage5() {
	ga('send','pageview','finalpage_steps');
    $('.shareNote1').hide();
    $('.shareNote2').hide();
    $('body').css('background', 'url(images/bg1.jpg) center top no-repeat');
    $('.page2').fadeOut(500);
    $('.page4').fadeOut(500);
    $('.page5').fadeIn(500);
    //getLottery();
}

var status = false;
var isRotate
var rotateFunc = function (awards, angle, text) {  //awards:奖项，angle:奖项对应的角度
    $('#lotteryBtn').stopRotate();
    $("#lotteryBtn").rotate({
        angle: 0,
        duration: 5000,
        animateTo: angle + 1440, //angle是图片上各奖项对应的角度，1440是我要让指针旋转4圈。所以最后的结束的角度就是这样子^^
        callback: function () {
            alert(text);
            if (awards != 5) {

            }
        }
    });
}

function getLottery() {
    status = true;
    isRotate = false; // false:不在旋转抽奖中 true:在旋转抽奖


    $(".begin").click(function () {
        if (!status) {
            return false;
        } else {
            status = false;
            rotateThis();
        }
    })
};

function rotateThis() {
    var data = [1, 2, 3, 4, 5, 6]; //返回的数组
    data = data[Math.floor(Math.random() * data.length)];
    if (data == 1) {
        rotateFunc(1, 0, '215毫升美涛强劲定型喷雾');
    }
    if (data == 2) {
        rotateFunc(2, 60, '美涛持久魅卷弹力素60克');
    }
    if (data == 3) {
        rotateFunc(3, 120, '美涛定型啫喱水60毫升');
    }
    if (data == 4) {
        status = true;
        rotateFunc(4, 180, '再玩一次');
    }
    if (data == 5) {
        rotateFunc(5, 240, '5元抵扣券');
    }
    if (data == 6) {
        rotateFunc(6, 300, '10元抵扣券');
    }
}

function showPop(e) {
    if (e == 1) {
        $('.popBg1').fadeIn(500);
        $('.page2Note').fadeIn(500);
    }
}

function closePop(e) {
    $('.popBg1').fadeOut(500);
    $('.pop').fadeOut(500);
    if (e == 1) {
        $('.faceResize').addClass('faceResizeAct');
    }
}

var target_str='_blank';
//打开窗口的大小
var window_size="scrollbars=no,width=600,height=450,"+"left=75,top=20,status=no,resizable=yes";

//分享到新浪网
function shareToSina(sharetext, pageurl, picUrl) {
		window.open("http://service.weibo.com/share/share.php?title=" + encodeURIComponent(sharetext) + "&url=" + encodeURIComponent(pageurl)+"&pic="+encodeURIComponent(picUrl)+'&searchPic=false', target_str,window_size)}


//分享到腾讯微博
function shareToTencent(title, pageurl, sharetext) {
		window.open('http://share.v.t.qq.com/index.php?c=share&a=index&title='+encodeURIComponent(sharetext)+'&url='+encodeURIComponent(pageurl), target_str,window_size)}

//分享到豆瓣网
function shareToDouban(title, pageurl, sharetext,picurl) {
		window.open('http://www.douban.com/recommend/?url=' + encodeURIComponent(pageurl) +"&image="+encodeURIComponent(picurl)+'&title=' + encodeURIComponent(title)+'&text='+encodeURIComponent(sharetext) , target_str,window_size);}

//分享到QQ空间
function shareToQzone(title, pageurl, sharetext,picurl) {
		window.open("http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url="+encodeURIComponent(pageurl)+"&title="+encodeURIComponent(title)+"&pics="+encodeURIComponent(picurl)+"&summary="+encodeURIComponent(sharetext), target_str,window_size);
	}


//share to renren
function shareToRenRen(title, pageurl,sharetext,picurl){

	window.open("http://widget.renren.com/dialog/share?url="+encodeURIComponent(pageurl)+"&title="+encodeURIComponent(title)+"&content="+encodeURIComponent(sharetext)+"&pic="+encodeURIComponent(picurl)+"&message="+encodeURIComponent(sharetext), target_str,window_size);
	}
	
function shareNoWeichat(){
		$(".douban").click(function(){
			var _title=noWechatShareTitle;
			var _pageurl=noWechatSharlUrl;
			var _picurl=noWechatShareImg;
			var _sharetext=noWechatShareTxt;

			shareToDouban(_title,_pageurl,_sharetext,_picurl);
			// ga('send', 'event', 'Social', 'share','douban')
		});
		$(".renren").click(function(){
			var _title=noWechatShareTitle;
			var _pageurl=noWechatSharlUrl;
			var _picurl=noWechatShareImg;
			var _sharetext=noWechatShareTxt;

			shareToRenRen(_title,_pageurl,_sharetext,_picurl);
			// ga('send', 'event', 'Social', 'share','Renren')
		});
		$(".weibo").click(function(){
			var _title=noWechatShareTitle;
			var _pageurl=noWechatSharlUrl;
			var _picurl=noWechatShareImg;
			var _sharetext=noWechatShareTxt;

			shareToSina(_sharetext,_pageurl,_picurl);
			// ga('send', 'event', 'Social', 'share','Sina')
		});
		$(".tengxun").click(function(){
			var _title=noWechatShareTitle;
			var _pageurl=noWechatSharlUrl;
			var _picurl=noWechatShareImg;
			var _sharetext=noWechatShareTxt;

			shareToTencent(_title,_pageurl,_sharetext);
			// ga('send', 'event', 'Social', 'share','Tencent')
		});
		
		$('.sinaShare').click(function(){
			var _title=noWechatShareTitle;
			var _pageurl=noWechatSharlUrl;
			var _picurl=noWechatShareImg;
			var _sharetext=noWechatShareTxt;
			shareToSina(_sharetext,_pageurl,_picurl);
			});
			
		$('.qqShare').click(function(){
			var _title=noWechatShareTitle;
			var _pageurl=noWechatSharlUrl;
			var _picurl=noWechatShareImg;
			var _sharetext=noWechatShareTxt;
			shareToTencent(_title,_pageurl,_sharetext);
			});
			
		$('.qzoneShare').click(function(){
			var _title=noWechatShareTitle;
			var _pageurl=noWechatSharlUrl;
			var _picurl=noWechatShareImg;
			var _sharetext=noWechatShareTxt;
			shareToQzone(_title,_pageurl,_sharetext,_picurl);
			});
	}
	