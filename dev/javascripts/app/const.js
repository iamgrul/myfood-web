let TM = TweenMax,
  ww, wh

const isOpera = !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0,                    // Opera 8.0+ (UA detection to detect Blink/v8-powered Opera)
  isFirefox = typeof InstallTrigger !== 'undefined',                                        // Firefox 1.0+
  isSafari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent),
  isChrome = !!window.chrome && !isOpera,                                                   // Chrome 1+
  isIE = /*@cc_on!@*/false || !!document.documentMode,                                    // At least IE6
  isEdge = navigator.userAgent.indexOf(' Edge/') >= 0;


const breakpoints = {
  sm: 840,
  md: 1080
}

window.isRetina = (window.devicePixelRatio > 1 || (window.matchMedia && window.matchMedia("(-webkit-min-device-pixel-ratio: 1.5),(-moz-min-device-pixel-ratio: 1.5),(min-device-pixel-ratio: 1.5)").matches));
