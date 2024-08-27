/* Cole este código em um Snippet ou no functions.php */ 
function stop_youtube_on_tabs_change() {
    ?>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.jet-tabs__control').forEach(control => {
                control.addEventListener('click', function() {
                    const iframes = document.querySelectorAll('iframe');
                    iframes.forEach(iframe => {
                        if (iframe.src.includes('youtube.com')) {
                            const src = iframe.src;
                            iframe.src = ''; // Remove temporariamente o src para parar o vídeo
                            setTimeout(() => {
                                iframe.src = src; // Restaura o src original
                            }, 500);
                        }
                    });
                });
            });
        });
    </script>
    <?php
}
add_action('wp_footer', 'stop_youtube_on_tabs_change');
