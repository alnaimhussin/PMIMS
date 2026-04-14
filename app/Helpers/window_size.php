<?php
if (!function_exists('set_window_height')) {
    function set_window_height($height) {
        $script = '<script>
            $(document).ready(function() {
                $(window).height('.$height.');
            });
        </script>';
        return $script;
    }
}
?>