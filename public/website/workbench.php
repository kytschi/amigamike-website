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
                            <div id="buttons">
                                <button id="btn-contact" data-window="window-contact" data-api="contact">
                                    <label><span>&nbsp;</span></label>
                                    <strong>Contact</strong>
                                </button>
                                <button id="btn-system" data-window="window-system" data-api="system">
                                    <label><span>&nbsp;</span></label>
                                    <strong>System</strong>
                                </button>
                            </div>
                            <div
                                id="window-contact" 
                                class="window shell" 
                                data-api="contact" 
                                style="display: none; width: 500px;height: 520px;">
                                <div class="window-title">
                                    <button class="window-close">&nbsp;</button>
                                    <span>Contact</span>
                                    <button class="window-max">&nbsp;</button>
                                    <button class="window-index">&nbsp;</button>
                                </div>
                                <section>
                                    <div class="window-body">
                                        <div class="window-content">
                                            <div class="window-output">
                                                <div id="form-contact" style="float:left;width:calc(100% - 20px);overflow:hidden;padding:5px 5px;">
                                                    <div class="form-input">
                                                        <label>Your name<span class="required">*</span></label>
                                                        <input type="text" name="name" required="required"/>
                                                    </div>
                                                    <div class="form-input">
                                                        <label>Your email<span class="required">*</span></label>
                                                        <input type="email" name="email" required="required"/>
                                                    </div>
                                                    <div class="form-input">
                                                        <label>Your message<span class="required">*</span></label>
                                                        <textarea rows="4" name="message" required="required"></textarea>
                                                    </div>
                                                    <div class="form-input">
                                                        <label>Captcha<span class="required">*</span></label>
                                                        <?= $DUMBDOG->captcha->draw(); ?>
                                                    </div>
                                                    <p>Required fields<span class="required">*</span></p>
                                                    <div class="form-input">
                                                        <button
                                                            id="btn-contact-send"
                                                            type="button"
                                                            name="send"
                                                            class="text-button"
                                                            data-api="/contact">
                                                            <label><span><i>Send</i></span></label>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="window-footer">
                                            <div class="window-horz-scroll">
                                                <div class="scroll-bar"></div>
                                                <button class="scroll-bar-left"><label><span>&nbsp;</span></label></button>
                                                <button class="scroll-bar-right"><label><span>&nbsp;</span></label></button>
                                            </div>                            
                                        </div>
                                    </div>
                                    <div class="window-vert-scroll">
                                        <div class="scroll-bar"></div>
                                        <button class="scroll-bar-up"><span><i>&nbsp;</i></span></button>
                                        <button class="scroll-bar-down"><span><i>&nbsp;</i></span></button>
                                        <button class="window-scroll-resize"><label><span>&nbsp;</span></label></button>
                                    </div>
                                </section>
                            </div>
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
                                                <button class="folder" data-api="<?= $item->url; ?>" data-window="window-<?= str_replace(" ", "-", $item->name); ?>">
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
                                                <button class="scroll-bar-left"><label><span>&nbsp;</span></label></button>
                                                <button class="scroll-bar-right"><label><span>&nbsp;</span></label></button>
                                            </div>                            
                                        </div>
                                    </div>
                                    <div class="window-vert-scroll">
                                        <div class="scroll-bar"></div>
                                        <button class="scroll-bar-up"><span><i>&nbsp;</i></span></button>
                                        <button class="scroll-bar-down"><span><i>&nbsp;</i></span></button>
                                        <button class="window-scroll-resize"><label><span>&nbsp;</span></label></button>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="window-footer">
                        <div class="window-footer-border"></div>
                        <div class="window-horz-scroll">
                            <div class="scroll-bar"></div>
                            <button class="scroll-bar-left"><label><span>&nbsp;</span></label></button>
                            <button class="scroll-bar-right"><label><span>&nbsp;</span></label></button>                    
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
                    <button type="button" class="text-button">
                        <label><span><i>Ok</i></span></label>
                    </button>
                </div>
            </section>
        </div>
        <div id="guru">
            <section>
                <p>Software Failure, Press left mouse button to continue.</p>
                <p>Guru Meditation #B00B1E55, <span></span></p>
            </section>
        </div>
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
                            <button class="scroll-bar-left"><label><span>&nbsp;</span></label></button>
                            <button class="scroll-bar-right"><label><span>&nbsp;</span></label></button>
                        </div>                            
                    </div>
                </div>
                <div class="window-vert-scroll">
                    <div class="scroll-bar"></div>
                    <button class="scroll-bar-up"><span><i>&nbsp;</i></span></button>
                    <button class="scroll-bar-down"><span><i>&nbsp;</i></span></button>
                    <button class="window-scroll-resize"><label><span>&nbsp;</span></label></button>
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
        var scroll = null;
            
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

            $("#btn-contact-send").click(function() {
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
                        url :$(this).data("api"),
                        data: {
                        name: $("#form-contact input[name=name]").val(),
                        email: $("#form-contact input[name=email]").val(),
                        message: $("#form-contact text[name=message]").val(),
                        captcha: $("#form-contact input[name=captcha]").val()
                        }
                    }
                ).done(function(data) {
                        if (data.error) {
                            $("#guru span").html(data.message);
                            $("#guru").show();
                            return;
                        }
                        
                        $("#popup .window-title span").html("Thank you");
                        $("#popup .window-output").html(data.message);
                        $("#popup").show();
                }).fail(function(data) {
                    $("#guru span").html("An error has an occurred");
                    $("#guru").show();
                });
            });
        });
    </script>
</html>