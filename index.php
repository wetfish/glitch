<html>
    <head>
        <title>Welcome to HTML</title>
        
        <script src="node_modules/wetfish-basic/dist/basic.js"></script>
        
        <style>
            html, body {
                height: 100%;
                margin-bottom: 250px;
            }
            
            body {
                background-color:#000;
                color:#eee;
                font-family:tahoma, sans-serif;
            }

            .menu {
                position: fixed;
                z-index: 10;
                bottom: 0;
                background-color: rgba(0, 0, 0, 0.8);
            }
            
            .url {
                width: 600px;
            }

            .images {
                position: relative;
            }

            .front, .back {
                position: absolute;
                top:0;
                left:0;
                bottom: 0;
                right: 0;
            }

            .front {
                z-index: 1;
            }

            .front img, .back img {
                transition: 0.5s all;
                opacity: 0;
            }

            .fadein {
                opacity: 1 !important;
            }

            .fadeout {
                opacity: 0 !important;
            }

            .stop-auto {
                display: none;
            }
        </style>
        
        <script>
            var interval = <?php if($_GET['interval']) { echo $_GET['interval']; } else { echo '3000'; } ?>;
            var auto;

            $(document).ready(function()
            {
                // A count of errors to prevent reloading images forever
                var errors = 0;
                
                $('form').on('submit glitch', function(event)
                {
                    event.preventDefault();

                    var url = $('.url').value();

                    var img = document.createElement('img');
                    $(img).attr('src', "image.php?url="+url+"&rand="+Math.random());

                    if($('.front img').el.length)
                    {
                        // Move the current image to the back
                        $('.back').html('');
                        $('.back').el[0].appendChild($('.front img').el[0]);
                    }

                    $('.front').html('');
                    $('.front').el[0].appendChild(img);

                    $(img).on('load', function(event)
                    {
                        $(this).addClass('fadein');

                        // Reset error count if the image is displayed successfully
                        errors = 0;
                    });

                    $(img).on('error', function(event)
                    {
                        // If there were too many errors
                        if(errors >= 3)
                        {
                            errors = 0;
                            $('.front').html('Error loading image, unable to display after 3 attempts.');
                            return;
                        }

                        // Remove the broken image
                        $('.front').html('');
                        
                        // If there was an error, resubmit the form
                        setTimeout(function()
                        {
                            $('form').trigger('glitch');
                        }, errors * 100);

                        errors++;
                    });

                });

                $('.start-auto').on('click', function(event)
                {
                    // Don't start another interval if we're already auto-glitching
                    if(auto) return;
                    
                    $('.stop-auto').style({display: 'inline'});

                    auto = setInterval(function()
                    {
                        $('form').trigger('glitch');
                    }, interval);
                });

                $('.set-interval').on('click', function(event)
                {
                    interval = prompt("How long would you like to wait between glitches? (in miliseconds)");

                    // Reset autoglitch
                    $('.stop-auto').trigger('click');
                    $('.start-auto').trigger('click');
                });

                $('.stop-auto').on('click', function(event)
                {
                    $(this).style({display: 'none'});
                    clearInterval(auto);
                    auto = false;
                });

                <?php
                
                if($_GET['url'])
                    echo "$('form').trigger('glitch');";

                if($_GET['auto'])
                    echo "$('.start-auto').trigger('click');";

                ?>
            });
        </script>
    </head>
    
    <body>
        <div class="menu">
            <h1>What's the URL?</h1>

            <form action="image.php">
                <input type="text" name="url" class="url" value="<?php echo $_GET['url']; ?>" />
                <input type="submit" value="Glitch" />
                <input type="button" value="Auto Glitch" class="start-auto" />
                <input type="button" value="Set Interval" class="set-interval" />
                <input type="button" value="Stop" class="stop-auto" />
            </form>
        </div>

        <div class="images">
            <div class="front"></div>
            <div class="back"></div>
        </div>
    </body>
</html>
