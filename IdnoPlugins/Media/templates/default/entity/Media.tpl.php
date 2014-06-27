<?php
    if (\Idno\Core\site()->currentPage()->isPermalink()) {
        $rel = 'rel="in-reply-to"';
    } else {
        $rel = '';
    }
?>
    <p class="p-name"><a href="<?= $vars['object']->getURL(); ?>"><?= $vars['object']->getTitle(); ?></a></p>
<?php
    if ($attachments = $vars['object']->getAttachments()) {
        foreach ($attachments as $attachment) {
            $mainsrc = $attachment['url'];
            if (substr($attachment['mime-type'], 0, 5) == 'video') {
                ?>
                <p style="text-align: center">
                    <video src="<?= $mainsrc ?>" class="u-media" controls preload="none"
                           style="width: 100%; height: 100%"></video>
                </p>
            <?php

            } else {

                ?>
                <p style="text-align: center">
                    <audio src="<?= $mainsrc ?>" class="u-media" controls preload="none"
                           style="width: 100%; height: 100%"></audio>
                </p>
            <?php

            }
        }
    }
?>
<?= $this->autop($this->parseHashtags($this->parseURLs($vars['object']->body, $rel))) ?>