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
        </header>
        <main id="workbench" class="window">
            <div class="window-title">
                <button class="window-close" disabled="disabled">&nbsp;</button>
                <span>Workbench</span>
                <button class="window-max">&nbsp;</button>
                <button class="window-index">&nbsp;</button>
            </div>
            <section>
                <div class="window-body">
                    <div class="window-content">
                        <div class="window-output">
                            <button id="btn-menu" data-window="window-system" data-api="system">
                                <span><i><img src="<?= $DUMBDOG->site->theme_folder; ?>/system.png"></i></span>
                                <strong>System</strong>
                            </button>
                            <div id="window-system" class="window" data-api="system">
                                <div class="window-title">
                                    <button class="window-close">&nbsp;</button>
                                    <span>System</span>
                                    <button class="window-max">&nbsp;</button>
                                    <button class="window-index">&nbsp;</button>
                                </div>
                                <section>
                                    <div class="window-body">
                                        <div class="window-content">
                                            <div class="window-output">
                                            <?php
                                            foreach ($DUMBDOG->menu->header as $item) {
                                                ?>
                                                <button data-api="<?= $item->url; ?>" data-window="window-<?= str_replace(" ", "-", $item->name); ?>">
                                                    <span><i><img src="<?= $DUMBDOG->site->theme_folder; ?>/folder-close.png?t=<?= time(); ?>"></i></span>
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
                                                <button class="scroll-bar-left"><span><i>&nbsp;</i></span></button>
                                                <button class="scroll-bar-right"><span><i>&nbsp;</i></span></button>
                                            </div>                            
                                        </div>
                                    </div>
                                    <div class="window-vert-scroll">
                                        <div class="scroll-bar"></div>
                                        <button class="scroll-bar-up"><span><i>&nbsp;</i></span></button>
                                        <button class="scroll-bar-down"><span><i>&nbsp;</i></span></button>
                                        <button class="window-scroll-resize"><span><i>&nbsp;</i></span></button>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="window-footer">
                        <div class="window-footer-border"></div>
                        <div class="window-horz-scroll">
                            <div class="scroll-bar"></div>
                            <button class="scroll-bar-left"><span><i>&nbsp;</i></span></button>
                            <button class="scroll-bar-right"><span><i>&nbsp;</i></span></button>                    
                        </div>
                    </div>
                </div>
                <div class="window-vert-scroll">
                    <div class="scroll-bar"></div>
                    <button class="scroll-bar-up"><span><i>&nbsp;</i></span></button>
                    <button class="scroll-bar-down"><span><i>&nbsp;</i></span></button>
                    <button id="workbench-resize" class="window-scroll-resize"><span><i>&nbsp;</i></span></button>
                </div>
            </section>
        </main>
        <div id="test" style="border: 1px solid #000; width: 500px; height: 500px">jump</div>
        <div id="window-template" class="window shell" style="display: none">
            <div class="window-title">
                <button class="window-close">&nbsp;</button>
                <span>System</span>
                <button class="window-max">&nbsp;</button>
                <button class="window-index">&nbsp;</button>
            </div>
            <section>
                <div class="window-body">
                    <div class="window-content">
                        <div class="window-output"></div>
                    </div>
                    <div class="window-footer">
                        <div class="window-horz-scroll">
                            <div class="scroll-bar"></div>
                            <button class="scroll-bar-left"><span><i>&nbsp;</i></span></button>
                            <button class="scroll-bar-right"><span><i>&nbsp;</i></span></button>
                        </div>                            
                    </div>
                </div>
                <div class="window-vert-scroll">
                    <div class="scroll-bar"></div>
                    <button class="scroll-bar-up"><span><i>&nbsp;</i></span></button>
                    <button class="scroll-bar-down"><span><i>&nbsp;</i></span></button>
                    <button class="window-scroll-resize"><span><i>&nbsp;</i></span></button>
                </div>
            </section>
        </div>
    </body>
    <script type="text/javascript">
        var windows = [
            "workbench",
            "window-system"
        ];
        var theme = "<?= $DUMBDOG->site->theme_folder; ?>";
            
        function setBinds() {
            $(".window-close").bind("click", function() {
                $(this).parent().parent().hide();
                $("button[data-api='" + $(this).parent().parent().data("api") + "'").removeClass("open");
                windowToTop($("main"));
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
                        width: $("main").width(),
                        height: $("main").height()
                    });
                    $(this).parent().parent().offset({
                        left: $("main").offset().left,
                        top: $("main").offset().top
                    });
                }
            });
            $(".window").draggable({
                handle: ".window-title"
            }).resizable({
                handle: ".window-scroll-resize"
            });
            $(".scroll-bar-down").bind("click", function () {
                console.log($(this).parent().parent().children(".window-content"));
                $(this).parent().parent().children(".window-content").scrollTop({top:"+=5px"}, 800);
            });
            $(".scroll-bar-up").bind("click", function () {
                console.log($(this).parent().parent().children(".window-content"));
                $(this).parent().parent().children(".window-content").scrollTop({top:"-=5px"}, 800);
            });
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
                    $("#" + window + " .window-scroll-resize i").removeClass("active");
                } else {
                    $("#" + target.attr("id") + " .window-scroll-resize i").addClass("active");
                }
            });
        }

        $(function() {
            setBinds();
            windowToTop($("main"));

            $("button[data-window]").dblclick(function() {
                $(this).addClass("open");
                var window = "#" + $(this).data("window");
                var startx = $(this).position().left;
                var starty = $(this).position().top;

                if ($(window).length) {
                    windowToTop($(window));
                    $(window).css({
                        top: starty,
                        left: startx
                    });
                    $(window).show();
                } else {
                    $.getJSON(
                        $(this).data("api"),
                        function(data) {
                            $("#window-template .window-title span").html(data.name);
                            $("#window-template .window-content .window-output").html(data.content);
                            $("#window-template").attr("data-api", data.url);
                            $("#window-template").addClass("shell");

                            var window = $("#window-template").clone();
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
            });
        });
    </script>
</html>