/* Cole este código em um Snippet ou no functions.php */ 
function stop_youtube_on_tabs_change() {
    ?>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.jet-tabs__control').forEach(control => {
                control.addEventListener('click', function() {
                    document.querySelectorAll('iframe').forEach(iframe => {
                        if (iframe.src.includes('youtube.com')) {
                            iframe.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
                        }
                    });
                });
            });
        });
    </script>
    <?php
}
add_action('wp_footer', 'stop_youtube_on_tabs_change');
