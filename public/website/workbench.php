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
        <main class="window">
            <div class="window-title">
                <button class="window-close">&nbsp;</button>
                <span>Workbench</span>
                <button class="window-max">&nbsp;</button>
                <button class="window-index">&nbsp;</button>
            </div>
            <div class="window-body">
                <div class="window-content">
                    <button id="btn-menu">
                        <span>
                            <i>
                                <img src="<?= $DUMBDOG->site->theme_folder; ?>/menu.png">
                            </i>
                        </span>
                        <strong>
                            System
                        </strong>
                    </button>
                    <div class="window active" style="top: 200px; left: 300px">
                        <div class="window-title">
                            <button class="window-close">&nbsp;</button>
                            <span>Active</span>
                            <button class="window-max">&nbsp;</button>
                            <button class="window-index">&nbsp;</button>
                        </div>
                        <div class="window-body">
                            <div class="window-content">
                            <?php
                            foreach ($DUMBDOG->menu->header as $item) {
                                ?>
                                <button>
                                    <span>
                                        <i>
                                            <img src="<?= $DUMBDOG->site->theme_folder; ?>/<?= str_replace(" ", "-", strtolower($item->name)); ?>.png?t=<?= time(); ?>">
                                        </i>
                                    </span>
                                    <strong><?= ucwords($item->name); ?></strong>
                                </button>
                                <?php
                            }
                            ?>
                            </div>
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

                    <div class="window" style="top: 200px; left: 800px">
                        <div class="window-title">
                            <button class="window-close">&nbsp;</button>
                            <span>Inactive</span>
                            <button class="window-max">&nbsp;</button>
                            <button class="window-index">&nbsp;</button>
                        </div>
                        <div class="window-body">
                            <div class="window-content">
                            <?php
                            foreach ($DUMBDOG->menu->header as $item) {
                                ?>
                                <button>
                                    <span>
                                        <i>
                                            <img src="<?= $DUMBDOG->site->theme_folder; ?>/<?= str_replace(" ", "-", strtolower($item->name)); ?>.png?t=<?= time(); ?>">
                                        </i>
                                    </span>
                                    <strong><?= ucwords($item->name); ?></strong>
                                </button>
                                <?php
                            }
                            ?>
                            </div>
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
                </div>
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
        </main>
    </body>
    <script type="text/javascript">
    $(function() {
        var top_index = 4;
        $(".window").draggable({
            handle: ".window-title"
        });
        $(".window-index").click(function () {
            var div = $(this).parent().parent();
            if (div.css("z-index") != top_index) {
                div.css("z-index", parseInt(div.css("z-index")) + 1);
            } else {
                top_index = div.css("z-index");
            }
            console.log(div.css("z-index"));
        });
    });
    </script>
</html>