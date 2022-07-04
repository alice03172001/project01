// 回到頂端的功能按鈕gotop(路飛轉720deg)
(function ($) {
    $("body").append("<img id='goTopButton' style='display:none;z-index:5;cursor:pointer;top:100px;right:100px;position:fixed' title='回到頂端'>");
    var img = "./product_img/top1.gif",
      location = 0.5,   //按鈕出現在螢幕的高度，0.9在下面
      right = 10,         //距離右邊px值
      opacity = 0.6,      //透明度
      speed = 1000,        //捲動速度
      $button = $("#goTopButton"),
      $body = $(document),
      $win = $(window);   //瀏覽器
    $button.attr("src", img);
    // 設定按鈕動作事件
    $button.on({
      mouseover: function () { $button.css("opacity", 1); },
      mouseout: function () { $button.css("opacity", opacity); },
      // click是執行
      click: function () {
        css = { "transform": "rotate(720deg)", "transition": "transform 1s ease 0s " };
        $button.css(css);
        // 轉場效果
        $("html,body").animate({ scrollTop: 0 }, speed);
        // 頂端效果
      }        
    });
    // goTopMove程式啟動方式
    $win.on({
      scroll: function () { goTopMove(); },
      resize: function () { goTopMove(); }
    });

    window.goTopMove = function () {
      var scrollH = $body.scrollTop(),
        winH = $win.height(),
        css = { "top": winH * location + "px", "position": "fixed", "right": right, "opacity": opacity };
      if (scrollH > 20) {
        $button.css(css);
        $button.fadeIn("slow");
      } else {
        $button.fadeOut("slow");
        if ($button.css("transform") != "none") {
          css = { "transform": "", "transition": "" };
          $button.css(css);
        }
      }
    };
  })(jQuery);