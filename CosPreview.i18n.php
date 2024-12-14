<?php
/**
 * Internationalization file for the CosPreview extension.
 */

$messages = [];

$messages['en'] = [
    'cospreview-desc' => 'Embed Tencent Cloud COS preview links',
];

/** @var \IContextSource $context */
$context->getHookContainer()->register('MediaWiki', 'i18n', function (array &$info) use ($messages) {
    $info['extensions']['CosPreview'] = $messages;
});