<!DOCTYPE html>
<html lang='en'>
    <head>
        <title><?= $DUMBDOG->page->name; ?> | <?= $DUMBDOG->site->name; ?></title>
        <link rel="icon" type="image/png" sizes="64x64" href="/assets/dumbdog.png">
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
        <main class="window active">
            <div class="window-title">
                <button class="window-close">&nbsp;</button>
                <span>Workbench</span>
                <button class="window-max">&nbsp;</button>
                <button class="window-index">&nbsp;</button>
            </div>
            <section>
                <div class="window-body">
                    <div class="window-content">
                        <button id="btn-menu" data-window="window-system">
                            <span><i><img src="<?= $DUMBDOG->site->theme_folder; ?>/system.png"></i></span>
                            <strong>System</strong>
                        </button>
                        <div id="window-system" class="window active" style="display: block">
                            <div class="window-title">
                                <button class="window-close">&nbsp;</button>
                                <span>System</span>
                                <button class="window-max">&nbsp;</button>
                                <button class="window-index">&nbsp;</button>
                            </div>
                            <section>
                                <div class="window-body">
                                    <div class="window-content">
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
                    <button class="window-scroll-resize"><span><i>&nbsp;</i></span></button>
                </div>
            </section>
        </main>
        <div id="window-template" class="window" style="display: none">
            <div class="window-title">
                <button class="window-close">&nbsp;</button>
                <span>System</span>
                <button class="window-max">&nbsp;</button>
                <button class="window-index">&nbsp;</button>
            </div>
            <div class="window-body">
                <div class="window-content"></div>
                <div class="window-vert-scroll">
                    <div class="scroll-bar"></div>
                    <button class="scroll-bar-up"><span><i>&nbsp;</i></span></button>
                    <button class="scroll-bar-down"><span><i>&nbsp;</i></span></button>
                </div>
            </div>
            <div class="window-footer">
                <div class="window-footer-border"></div>
                <div class="window-horz-scroll">
                    <div class="scroll-bar"></div>
                    <button class="scroll-bar-left"><span><i>&nbsp;</i></span></button>
                    <button class="scroll-bar-right"><span><i>&nbsp;</i></span></button>
                    <button class="window-scroll-resize"><span><i>&nbsp;</i></span></button>
                </div>                            
            </div>
        </div>
    </body>
    <script type="text/javascript">
        var windows = [
            "window-system"
        ];
            
        function setBinds() {
            $(".window-close").bind("click", function() {
                $(this).parent().parent().hide();
                windowToTop($("main"));
            });
            $(".window-index").bind("click", function () {
                windowToTop($(this).parent().parent());
            });
            $(".window").draggable({
                handle: ".window-title"
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
        }

        $(function() {
            setBinds();
            
            $("button[data-window]").dblclick(function() {
                $(this).addClass("open");
                var window = "#" + $(this).data("window");
                var startx = $(this).offset().left + 80 + "px";
                var starty = $(this).offset().top + "px";

                if ($(window).length) {
                    windowToTop($(window));
                    $(window).css("top", startx);
                    $(window).css("left", starty);
                    $(window).show();
                } else {
                    $.getJSON(
                        $(this).data("api"),
                        function(data) {
                            $("#window-template .window-title span").html(data.name);
                            $("#window-template .window-content").html(data.content);
                            $("#window-template").addClass("shell");

                            var window = $("#window-template").clone();
                            window.attr("id", "window-" + String(data.name).toLowerCase().replace(" ", "-"));
                            windows.push(window.attr("id"));

                            $("main").append(window);
                            setBinds();
                            windowToTop(window);

                            window.css("top", startx);
                            window.css("left", starty);
                            window.show();
                        }
                    );
                }
            });
        });
    </script>
</html>