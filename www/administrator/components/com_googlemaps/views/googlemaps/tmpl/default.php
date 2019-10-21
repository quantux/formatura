<?php
/**
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');

?>

<style>
    body {
        height: calc(100% - 30px) !important;
    }

    #content, .container-main {
        height: 100% !important;
        padding: 0 !important;
    }

    #content *:not(#system-message-container) {
        height: 100% !important;
    }

    #system-message-container {
        padding: 0 !important;
    }

    #system-message-container .alert {
        margin-bottom: 0 !important;
    }

    #content .elfsight-portal {
        display: block !important;
        width: 100% !important;
        height: 100% !important;
        margin: 0 !important;
    }

    #content .elfsight-portal iframe {
        display: block !important;
        width: 100% !important;
        height: 100% !important;
        border: none !important;
    }

    #status {
        box-shadow: none !important;
    }

    #status, .header, .subhead-collapse {
        display: none !important;
    }
</style>

<div class="elfsight-portal">
    <iframe src="<?php echo $this->url; ?>"></iframe>
</div>