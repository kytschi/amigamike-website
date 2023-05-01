<?php
$window_url = !empty($_GET['window']) ? urldecode($_GET['window']) : '';
$window = '';
switch ($window_url) {
    case "/contact":
        $window = "#window-contact";
        break;
}
?>
<!DOCTYPE html>
<html lang='en'>
    <head>
        <title><?= $DUMBDOG->page->name; ?> | <?= $DUMBDOG->site->name; ?></title>
        <link rel="icon" sizes="64x64" href="<?= $DUMBDOG->site->theme_folder; ?>/favicon.ico">
        <link rel="stylesheet" type="text/css" href="/website/assets/jquery-ui.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?= $DUMBDOG->site->theme . '?t=' . time(); ?>">
        <script src="/assets/jquery.min.js"></script>
        <script src="/website/assets/jquery-ui.min.js"></script>
        <meta name="description" content="<?= $DUMBDOG->page->meta_description ? $DUMBDOG->page->meta_description : $DUMBDOG->site->meta_description; ?>">
        <meta name="keywords" content="<?= $DUMBDOG->page->meta_keywords ? $DUMBDOG->page->meta_keywords : $DUMBDOG->site->meta_keywords; ?>">
        <meta name="author" content="<?= $DUMBDOG->page->meta_author ? $DUMBDOG->page->meta_author : $DUMBDOG->site->meta_author; ?>">
    </head>
    <body>
        <header>
            <h1><?= $DUMBDOG->site->name; ?>'s Workbench</h1>
            <span id="chipram"><strong>1,957,784</strong> Chip-mem</span>
            <span id="otherram"><strong>7,510,420</strong> other mem</span>
            <a href="https://dumb-dog.kytschi.com" target="_blank">powered by dumb dog</a>
        </header>
        <main id="workbench" class="window">
            <div class="window-title">
                <button class="button window-close" disabled="disabled">&nbsp;</button>
                <span>Workbench</span>
                <button class="button window-max">&nbsp;</button>
                <button class="button window-index">&nbsp;</button>
            </div>
            <section>
                <div class="window-body">
                    <div class="window-content">
                        <div class="window-output">
                            <div id="buttons">
                                <button id="btn-contact" class="button floppy" data-window="window-contact" data-api="/contact?html=true">
                                    <label><span>&nbsp;</span></label>
                                    <strong>Contact</strong>
                                </button>
                                <a href="https://soundcloud.com/trekster" class="button floppy" target="_blank">
                                    <label><span>&nbsp;</span></label>
                                    <strong>Music</strong>
                                </a>
                                <a href="https://kytschi.com" class="button floppy" target="_blank">
                                    <label><span>&nbsp;</span></label>
                                    <strong>Portfolio</strong>
                                </a>
                                <button id="btn-system" class="button" data-window="window-system" data-api="system">
                                    <label><span>&nbsp;</span></label>
                                    <strong>System</strong>
                                </button>
                            </div>
                            <div id="window-system" class="window" data-api="system">
                                <div class="window-title">
                                    <button class="button window-close">&nbsp;</button>
                                    <span>System</span>
                                    <button class="button window-max">&nbsp;</button>
                                    <button class="button window-index">&nbsp;</button>
                                </div>
                                <section>
                                    <div class="window-body">
                                        <div class="window-content">
                                            <div class="window-output folder">
                                                <?php
                                                foreach ($DUMBDOG->menu->header as $item) {
                                                    ?>
                                                    <button class="button" data-api="<?= $item->url; ?>" data-window="window-<?= str_replace(" ", "-", $item->name); ?>">
                                                        <label><span>&nbsp;</span></label>
                                                        <strong><?= ucwords($item->name); ?></strong>
                                                    </button>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="window-footer">
                                            <div class="window-horz-scroll">
                                                <div class="scroll-bar"></div>
                                                <button class="button scroll-bar-left"><label><span>&nbsp;</span></label></button>
                                                <button class="button scroll-bar-right"><label><span>&nbsp;</span></label></button>
                                            </div>                            
                                        </div>
                                    </div>
                                    <div class="window-vert-scroll">
                                        <div class="scroll-bar"></div>
                                        <button class="button scroll-bar-up"><span><i>&nbsp;</i></span></button>
                                        <button class="button scroll-bar-down"><span><i>&nbsp;</i></span></button>
                                        <button class="button window-scroll-resize"><label><span>&nbsp;</span></label></button>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="window-footer">
                        <div class="window-footer-border"></div>
                        <div class="window-horz-scroll">
                            <div class="scroll-bar"></div>
                            <button class="button scroll-bar-left"><label><span>&nbsp;</span></label></button>
                            <button class="button scroll-bar-right"><label><span>&nbsp;</span></label></button>                    
                        </div>
                    </div>
                </div>
                <div class="window-vert-scroll">
                    <div class="scroll-bar"></div>
                    <button class="button scroll-bar-up"><span><i>&nbsp;</i></span></button>
                    <button class="button scroll-bar-down"><span><i>&nbsp;</i></span></button>
                    <button id="workbench-resize" class="button window-scroll-resize"><span><i>&nbsp;</i></span></button>
                </div>
            </section>
        </main>
        <div id="popup" class="popup active">
            <div class="window-title">
                <span>System</span>
                <button class="window-index">&nbsp;</button>
            </div>
            <section>
                <div class="window-body">
                    <div class="window-content">
                        <div class="window-output"></div>
                    </div>
                </div>
                <div class="window-footer">
                    <button type="button" class="button text-button">
                        <label><span><i>Ok</i></span></label>
                    </button>
                </div>
            </section>
        </div>
        <div id="guru">
            <section>
                <p>Software Failure, Press left mouse button to continue.</p>
                <p>Guru Meditation #80081E55, <span></span></p>
            </section>
        </div>
        <div id="window-template" class="window shell" style="display: none">
            <div class="window-title">
                <button class="button window-close">&nbsp;</button>
                <span>System</span>
                <button class="button window-max">&nbsp;</button>
                <button class="button window-index">&nbsp;</button>
            </div>
            <section>
                <div class="window-body">
                    <div class="window-content">
                        <div class="window-output"></div>
                    </div>
                    <div class="window-footer">
                        <div class="window-horz-scroll">
                            <div class="scroll-bar"></div>
                            <button class="button scroll-bar-left"><label><span>&nbsp;</span></label></button>
                            <button class="button scroll-bar-right"><label><span>&nbsp;</span></label></button>
                        </div>                            
                    </div>
                </div>
                <div class="window-vert-scroll">
                    <div class="scroll-bar"></div>
                    <button class="button scroll-bar-up"><span><i>&nbsp;</i></span></button>
                    <button class="button scroll-bar-down"><span><i>&nbsp;</i></span></button>
                    <button class="button window-scroll-resize"><label><span>&nbsp;</span></label></button>
                </div>
            </section>
        </div>
        <div id="kickstart">
            <audio id="audio" autoplay>
                <source src="<?= $DUMBDOG->site->theme_folder; ?>/loading.mp3" type="audio/mpeg">
            </audio> 
        </div>
    </body>
    <script type="text/javascript">
        var windows = [
            "workbench",
            "window-system"
        ];
        var theme = "<?= $DUMBDOG->site->theme_folder; ?>";
        var scroll = null;

        function memory(action = "decrease") {
            var chipram = parseInt($("#chipram strong").html().replace(/,/g, ""));
            var otherram = parseInt($("#otherram strong").html().replace(/,/g, ""));

            if (action == "decrease") {
                chipram -= Math.floor(Math.random() * 10000) + 100;
                otherram -= Math.floor(Math.random() * 10000) + 100;
            } else {
                chipram += Math.floor(Math.random() * 10000) + 100;
                otherram += Math.floor(Math.random() * 10000) + 100;
            }

            $("#chipram strong").html(new Intl.NumberFormat('en-US').format(chipram));
            $("#otherram strong").html(new Intl.NumberFormat('en-US').format(otherram));
        }
            
        function setBinds() {
            $(".window-close").bind("click", function() {
                $("button[data-api='" + $(this).parent().parent().data("api") + "'").removeClass("open");
                var id = $(this).parent().parent().attr("id");
                windows.forEach(function (window, key) {
                    if (id == window) {
                        windows.splice(key, 1);
                        return;
                    }
                });
                if ($(this).parent().parent().data("destroy") == true) {
                    $(this).parent().parent().remove();
                } else {
                    $(this).parent().parent().hide();
                }
                console.log(windows);
                windowToTop($("main"));
                memory("increase");
            });
            $(".window-index").bind("click", function () {
                windowToTop($(this).parent().parent());
            });
            $(".window-max").bind("click", function () {
                if ($(this).parent().parent().data("width")) {
                    $(this).parent().parent().css({
                        width: $(this).parent().parent().data("width"),
                        height: $(this).parent().parent().data("height"),
                        left: $(this).parent().parent().data("left"),
                        top: $(this).parent().parent().data("top")
                    });
                    $(this).parent().parent().offset({
                        left: $(this).parent().parent().data("left"),
                        top: $(this).parent().parent().data("top")
                    });

                    $(this).parent().parent().data({
                        width: null,
                        height: null,
                        left: null,
                        top: null
                    });
                } else {
                    $(this).parent().parent().data({
                        width: $(this).parent().parent().width(),
                        height: $(this).parent().parent().height(),
                        left: $(this).parent().parent().offset().left,
                        top: $(this).parent().parent().offset().top
                    });
                    $(this).parent().parent().css({
                        width: $("main").width() - 32,
                        height: $("main").height() - 56
                    });
                    $(this).parent().parent().offset({
                        left: $("main").offset().left + 5,
                        top: $("main").offset().top + 28
                    });
                }
            });
            $(".window").draggable({
                handle: ".window-title"
            }).resizable({
                handle: ".window-scroll-resize"
            });
            $(".popup").draggable({
                handle: ".window-title"
            });
            $(".scroll-bar-down").bind("mousedown", function () {
                var window = "#" + $(this).parent().parent().parent().attr("id");
                scroll = setInterval(() => {
                    $(window + " .window-output").offset({
                        top: $(window + " .window-output").offset().top - 10
                    });
                }, 100);
            });
            $(".scroll-bar-up").bind("mousedown", function () {
                var window = "#" + $(this).parent().parent().parent().attr("id");
                scroll = setInterval(() => {
                    $(window + " .window-output").offset({
                        top: $(window + " .window-output").offset().top + 10
                    });
                }, 100);
            });
            $(".scroll-bar-down, .scroll-bar-up").bind("mouseup", () => {
                clearInterval(scroll);
            });
        }

        $("#popup button").click(function () {
            $(this).parent().parent().parent().hide();
        });
        $("#guru").click(function () {
            $(this).hide();
        });

        function triggerApi(url, window = "", button) {
            var startx = 50;
            var starty = 50;
            if (button) {
                var startx = $(button).position().left;
                var starty = $(button).position().top;
            }

            memory();

            if ($(window).length) {
                windowToTop($(window));
                $(window).css({
                    top: starty,
                    left: startx
                });
                $(window).show();
            } else {
                if (!url.includes("?html=true")) {
                    url + "?json=true";
                }

                $.getJSON(
                    url,
                    function(data) {
                        $("#window-template .window-title span").html(data.name);
                        $("#window-template .window-content .window-output").html(data.content);
                        $("#window-template").attr("data-api", data.url);
                        $("#window-template").attr("data-destroy", data.destroy);
                        $("#window-template").addClass("shell");
                        if (typeof(data.height) != "undefind") {
                            $("#window-template").css("height", data.height + "px");
                        }

                        var window = $("#window-template").clone();
                        $("#window-template .window-content .window-output").html("");
                        window.attr("id", "window-" + String(data.name).toLowerCase().replace(" ", "-"));
                        windows.push(window.attr("id"));

                        $("main").append(window);
                        setBinds();
                        windowToTop(window);

                        window.css({
                            top: starty,
                            left: startx
                        });

                        window.show();
                    }
                );
            }
        }

        function windowToTop(target) {
            var top_index = (windows.length + 4);
            $(".window").css("z-index", top_index - 1).removeClass("active");
            if (target.css("z-index") != top_index) {
                target.css("z-index", parseInt(target.css("z-index")) + 1);
            }
            target.addClass("active");    
            windows.forEach(function (window) {
                if (target.attr("id") != window) {
                    $("#" + window + " .window-scroll-resize span").removeClass("active");
                } else {
                    $("#" + target.attr("id") + " .window-scroll-resize span").addClass("active");
                }
            });
        }

        function sendMessage() {
            var valid = true;
            $("#form-contact input[required], #form-contact textarea[required]").each(function(key, item) {
                if (!item.value) {
                    valid = false;
                    return;
                }
            });

            if (!valid) {
                $("#guru span").html("Missing required fields");
                $("#guru").show();
                return;
            }

            $.ajax(
                {
                    method: "POST",
                    url: "/contact?json=true",
                    data: {
                        name: $("#form-contact input[name=name]").val(),
                        email: $("#form-contact input[name=email]").val(),
                        message: $("#form-contact textarea[name=message]").val(),
                        dd_captcha: $("#form-contact input[name=dd_captcha]").val(),
                        _DDCAPTCHA: $("#form-contact input[name=_DDCAPTCHA]").val()
                    }
                }
            ).done(function(data) {
                    if (data.error) {
                        $("#guru span").html(data.message);
                        $("#guru").show();
                        return;
                    }
                    $("#window-contact .window-close").click();
                    $("#popup .window-title span").html("Thank you");
                    $("#popup .window-output").html(data.message);
                    $("#popup").show();
            }).fail(function(data) {
                $("#guru span").html("An error has an occurred");
                $("#guru").show();
            });
        }

        $(function() {
            var timeout = setTimeout(() => {
                $("#audio")[0].pause();
                $("#kickstart").hide();
                $("header").show();
                setBinds();
                <?php
                if ($window_url) {
                    echo "triggerApi('" . $window_url . "', '" . $window . "');";
                } else {
                    echo "windowToTop($('main'));";
                }
                ?>
            }, <?= $_SERVER['SERVER_NAME'] == 'amigamike.kytschi.ninja' ? 500 : 9000; ?>);
            
            $("button[data-window]").dblclick(function() {
                $(this).addClass("open");
                var window = "#" + $(this).data("window");
                triggerApi($(this).data("api"), window, this);
            });

            
        });
    </script>
</html>