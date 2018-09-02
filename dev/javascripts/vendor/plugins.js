function vlLoadImages ($tabImg, completeCB, progressCB)
{
    var isJQuery = typeof $tabImg['jquery'] !== 'undefined';
    var total = $tabImg.length;
    var loaded = 0;
    var startTime = new Date();

    if (total == 0)
    {
        if (progressCB)
            progressCB (1);
        if (completeCB)
            complete ();
        return;
    }

    $tabImg.each (function () {
        var img = new Image();
        var url = isJQuery ? $(this).attr('src') : this;
        if (!url)
        {
            imgLoaded();
            return;
        }

        img.src = url;
        if (img.complete || img.naturalWidth)
        {
            imgLoaded.apply(img);
        }
        else
        {
            img = new Image();
            img.onload = imgLoaded;
            img.onerror = imgLoaded;
            img.onabort = imgLoaded;
            img.src = url;
        }
    });

    function imgLoaded ()
    {
        loaded++;
        if (progressCB)
        {
            progressCB (loaded / total);
        }
        if (loaded == total && completeCB)
        {
            complete ();
        }
    }

    function complete ()
    {
        var now = new Date ();
        var time = now - startTime;
        if ( time >0 && time < 1000)
        {
            setTimeout (completeCB, 1000 - time);
        }
        else
            completeCB ();
    }
}







function cropImage ($img, complete)
{

    if (typeof complete == 'undefined')
        complete = function(){};

    vlLoadImages($img, function() {
        var w, h, ow, oh, mw, mh;
        $img.css({width: 'auto',height: 'auto'});
        mw = $img.parent().width();
        mh = $img.parent().height();
        ow = $img.width();
        oh = $img.height();

        w = mw;
        h = oh / ow * mw;

        if (h < mh)
        {
            h = mh;
            w = ow / oh * mh;
        }

        $img.css({
            position: 'relative',
            width: w,
            height: h,
            left: (mw - w) / 2,
            top: (mh - h) / 2
        });


        if(complete) complete ();

    });
}


function simpleCrop ($img)
{

    var w, h, ow, oh, mw, mh;
    $img.css({width: 'auto',height: 'auto'});
    mw = $img.parent().width();
    mh = $img.parent().height();
    ow = $img.width();
    oh = $img.height();

    w = mw;
    h = oh / ow * mw;

    if (h < mh)
    {
        h = mh;
        w = ow / oh * mh;
    }

    $img.css({
        position: 'relative',
        width: w,
        height: h,
        left: (mw - w) / 2,
        top: (mh - h) / 2
    });

}



function centerImage ($img, complete)
{
    vlLoadImages($img, function() {
        var w, h, ow, oh, mw, mh, mr, or;
        $img.css({width: 'auto',height: 'auto'});
        mw = $img.parent().width();
        mh = $img.parent().height();
        mr = mh/mw;
        ow = $img.width();
        oh = $img.height();
        or = oh/ow;

        if(or <= mr) {

            w = mw;
            h = mw * oh / ow;

            if(h > mh) {
                h = mh;
                w = ow/oh * mh;
            }
        } else {
            h = mh;
            w = ow/oh * mh;
        }
        $img.css({
            position: 'relative',
            width: w,
            height: h,
            left: (mw - w) / 2,
            top: (mh - h) / 2
        });
        if(complete) complete ();

    });
}



/*
 * Name: ScrollBar
 * Description: Scrollbars customizables.
 * Require:
 * Version: 0.5
 */


(function ($){
    var pluginName = 'vlScrollBar';
    var scrollBarSize = 20;

    $(function () {
        var $div = $('<div><div></div></div>');
        var $div2 = $div.children();
        $div.appendTo ('body');
        $div.css({width: 50, height: 50, overflow: 'scroll'});
        $div2.css({height: 100});

        scrollBarSize = Math.max ($div.innerWidth() - $div2.innerWidth(), 20);
        $div.remove();
    });


    var scrollBarDefaults = {
        // options
        mode: 'vertical',
        width: '',
        height: '',
        classPrefix: 'vl-scroll',
        handleHTML: '',
        scrollBarCss: {},
        scrollHandleCss: {},

        //events
        ready: null,
        scrollStart: null,
        scrollEnd: null,
        scroll: null
    };


    function VlScrollBar ($elem, args) {
        var sb = this;
        var options = $.extend ({}, scrollBarDefaults, args);
        var horizontal = (options.mode == 'horizontal');
        var vertical = (options.mode == 'vertical');

        if (options.width == '' && horizontal)
            options.width = $elem.width();

        if (options.height == '' && vertical)
            options.height = $elem.height();

        var $container = $('<div class="' + options.classPrefix + '-mask"></div>');
        var $scrollContainer = $('<div class="' + options.classPrefix + '-container"></div>');
        var $content = $('<div class="' + options.classPrefix + '-content"></div>');
        var $scrollBarContainer = $('<div class="' + options.classPrefix + '-scrollbar-container-' + options.mode +'"></div>');
        var $scrollBarHandle = $('<div class="' + options.classPrefix + '-scrollbar-handle">' + options.handleHTML + '</div>');

        this.$elem = $elem;
        this.options = options;
        this.horizontal = horizontal;
        this.vertical = vertical;
        this.$container = $container;
        this.$scrollContainer = $scrollContainer;
        this.$content = $content;
        this.$scrollBarContainer = $scrollBarContainer;
        this.$scrollBarHandle = $scrollBarHandle;

        $elem.contents().appendTo($content);
        $content.appendTo($scrollContainer);
        $scrollContainer.appendTo($container);
        $container.appendTo($elem);

        $scrollBarHandle.appendTo($scrollBarContainer);
        $scrollBarContainer.appendTo($elem);


        if(typeof options.scrollHandleCss['position'] == 'undefined')
        {
            options.scrollHandleCss.position = 'absolute';
        }
        $scrollBarContainer.css(options.scrollBarCss);
        $scrollBarHandle.css(options.scrollHandleCss);

        var w, h;
        var containerCss = {overflow: 'hidden'};
        var scrollContainerCss = {overflow: 'auto', width: options.width, height: options.height};
        var scrollContentCss = {};


        if (vertical)
        {
            w = $elem.width();
            containerCss.height = options.height;
            scrollContentCss.width = w;
            scrollContainerCss.width = w;
            scrollContainerCss.paddingRight = scrollBarSize;

        }
        if (horizontal)
        {
            h = $elem.height();
            w = $content.css('float', 'left').width();
            $content.css('float', '');
            containerCss.width = options.width;
            containerCss.height = h;
            scrollContentCss.width = w;
            scrollContainerCss.height = h;
            scrollContainerCss.paddingBottom = scrollBarSize;
        }

        $container.css(containerCss);
        $scrollContainer.css(scrollContainerCss);
        $content.css(scrollContentCss);


        $scrollBarHandle
            .on ('mousedown touchstart', function (e) {
            if (typeof options.scrollStart == 'function')
            {
                options.scrollStart.call(sb.$elem, sb);
            }

            var pagePos = 0;
            if (e.type == 'mousedown')
            {
                e.preventDefault ();
                pagePos = vertical ? e.pageY : e.pageX;
            }
            else
            {
                var touches = e.originalEvent.touches;
                if (touches.length > 1)
                    return;

                pagePos = vertical ? touches[0].pageY : touches[0].pageX;
            }

            var startPos = parseInt($(this).css(vertical ? 'top' : 'left'));
            $(document)
                .off ('mouseup touchend mouseleave', onStop)
                .on ('mouseup touchend mouseleave', onStop)
                .off ('mousemove touchmove', onMove)
                .on ('mousemove touchmove', onMove);


            function onMove (e) {
                var currentpagePos = 0;
                if (e.type == 'mousemove')
                {
                    currentpagePos = vertical ? e.pageY : e.pageX;
                }
                else
                {
                    var touches = e.originalEvent.touches;
                    if (touches.length > 1)
                        return;
                    currentpagePos = vertical ? touches[0].pageY : touches[0].pageX;
                }

                var diff = currentpagePos - pagePos;
                var ratio = vertical ?
                    1 / (options.height - $scrollBarHandle.height ()) * ($content.outerHeight(true) - options.height) :
                    1 / (options.width - $scrollBarHandle.width ()) * ($content.outerWidth(true) - options.width);
                var st = (startPos + diff) * ratio;
                $scrollContainer[vertical ? 'scrollTop' : 'scrollLeft'] (st);
            }

            function onStop()
            {
                if (typeof options.scrollEnd == 'function')
                    options.scrollEnd.call(sb.$elem, sb);
                $(document)
                    .off ('mousemove touchmove', onMove)
                    .off ('mouseup touchend mouseleave', onStop)
            }
        });


        $scrollContainer.on('scroll', function () {
            sb.updateScrollBar ();
        });


        this.scrollBarVisible = false;
        this.$scrollBarContainer.css('opacity', 0);

        sb._updateScrollBar (true);


    }

    VlScrollBar.prototype._updateScrollBar = function () {
        if (typeof this.options.ready == 'function')
            this.options.ready.apply(this.$elem, this);
    };


    VlScrollBar.prototype.updateScrollBar = function () {
        var s = 0;
        var l, test;
        if (this.vertical)
        {
            l = this.$content.outerHeight(true);
            test = this.options.height < l;
        }
        else
        {
            l = this.$content.outerWidth(true);
            test = this.options.width < l;
        }

        if (test)
        {
            if (! this.scrollBarVisible)
            {
                this.scrollBarVisible = true;
                this.$scrollBarContainer.animate({opacity: 1});
            }
            if (this.vertical)
            {
                s = this.$scrollContainer.scrollTop();
                this.$scrollBarHandle.css('top', (s / l * this.options.height));
                this.$scrollBarHandle.height ((this.options.height / l * 100) + '%');
            }
            else
            {
                s = this.$scrollContainer.scrollLeft();
                this.$scrollBarHandle.css('left', (s / l * this.options.width));
                this.$scrollBarHandle.width ((this.options.width / l * 100) + '%');
            }
        }
        else if (this.scrollBarVisible)
        {
            this.scrollBarVisible = false;
            this.$scrollBarContainer.animate({opacity: 0});
        }

        if (typeof this.options.scroll == 'function')
            this.options.scroll.call(this.$elem, this);
    };

    VlScrollBar.prototype.setScroll = function (scroll) {
        if (typeof this.options.scroll == 'function')
            this.options.scroll.call(this.$elem, this);
    };

    VlScrollBar.prototype.setScrollPercent = function (scrollPercent) {
        if (typeof this.options.scroll == 'function')
            this.options.scroll.call(this.$elem, this);
    };


    VlScrollBar.prototype.setWidth = function (width) {
        this.options.width = width;
        this.updateScrollBar();
    };

    VlScrollBar.prototype.setHeight = function (height) {
        this.options.height = height;
        this.updateScrollBar();
    };


    $.fn.extend({
        vlScrollBar: function (args) {

            if (typeof args == 'string')
            {
                var fargs = Array.prototype.slice.call(arguments, 1);

                if (args.indexOf('_') !== 0 && typeof VlScrollBar.prototype[args] == 'function')
                {
                    return this.each(function () {
                        var sb = $.data(this, 'plugin_' + pluginName);
                        if (sb)
                        {
                            sb[args].apply(sb, fargs);
                        }
                    });
                }
            }
            else
            {

                return this.each(function () {
                    if (!$.data(this, 'plugin_' + pluginName)) {
                        $.data(this, 'plugin_' + pluginName,
                            new VlScrollBar ($(this), args));
                    }
                });
            }

            return this.each(function () {
                if (!$.data(this, 'plugin_' + pluginName)) {
                    $.data(this, 'plugin_' + pluginName,
                        new VlScrollBar($(this)));
                }
            });
        }
    });



})(jQuery);


(function($){
    var $w = $(window);
    $.fn.visible = function(partial,hidden,direction){

        if (this.length < 1)
            return;

        var $t        = this.length > 1 ? this.eq(0) : this,
            t         = $t.get(0),
            vpWidth   = $w.width(),
            vpHeight  = $w.height(),
            direction = (direction) ? direction : 'both',
            clientSize = hidden === true ? t.offsetWidth * t.offsetHeight : true;

        if (typeof t.getBoundingClientRect === 'function'){

            // Use this native browser method, if available.
            var rec = t.getBoundingClientRect(),
                tViz = rec.top    >= 0 && rec.top    <  vpHeight,
                bViz = rec.bottom >  0 && rec.bottom <= vpHeight,
                lViz = rec.left   >= 0 && rec.left   <  vpWidth,
                rViz = rec.right  >  0 && rec.right  <= vpWidth,
                vVisible   = partial ? tViz || bViz : tViz && bViz,
                hVisible   = partial ? lViz || rViz : lViz && rViz;

            if(direction === 'both')
                return clientSize && vVisible && hVisible;
            else if(direction === 'vertical')
                return clientSize && vVisible;
            else if(direction === 'horizontal')
                return clientSize && hVisible;
        } else {

            var viewTop         = $w.scrollTop(),
                viewBottom      = viewTop + vpHeight,
                viewLeft        = $w.scrollLeft(),
                viewRight       = viewLeft + vpWidth,
                offset          = $t.offset(),
                _top            = offset.top,
                _bottom         = _top + $t.height(),
                _left           = offset.left,
                _right          = _left + $t.width(),
                compareTop      = partial === true ? _bottom : _top,
                compareBottom   = partial === true ? _top : _bottom,
                compareLeft     = partial === true ? _right : _left,
                compareRight    = partial === true ? _left : _right;

            if(direction === 'both')
                return !!clientSize && ((compareBottom <= viewBottom) && (compareTop >= viewTop)) && ((compareRight <= viewRight) && (compareLeft >= viewLeft));
            else if(direction === 'vertical')
                return !!clientSize && ((compareBottom <= viewBottom) && (compareTop >= viewTop));
            else if(direction === 'horizontal')
                return !!clientSize && ((compareRight <= viewRight) && (compareLeft >= viewLeft));
        }
    };

})(jQuery);



function preventDefault(e) {
    e = e || window.event;
    if (e.preventDefault)
        e.preventDefault();
    e.returnValue = false;
}

function wheel(e) {
    preventDefault(e);
}

var keys = [37, 38, 39, 40, 32];
function keydown(e) {
    for (var i = keys.length; i--;) {
        if (e.keyCode === keys[i]) {
            preventDefault(e);
            return;
        }
    }
}

function disable_scroll() {
    if (window.addEventListener) {
        window.addEventListener('DOMMouseScroll', wheel, false);
    }
    window.onmousewheel = document.onmousewheel = wheel;
    document.onkeydown = keydown;
    scrollEnable = false;
}

function enable_scroll() {
    if (window.removeEventListener) {
        window.removeEventListener('DOMMouseScroll', wheel, false);
    }
    window.onmousewheel = document.onmousewheel = document.onkeydown = null;

    setTimeout(function(){
        scrollEnable = true;
    }, 100);
}