<?php
/**
 * @file
 * This is a basic MediaWiki extension to embed Tencent Cloud COS preview links.
 */

namespace MediaWiki\extensions\CosPreview;

use MediaWiki\MediaWikiServices;
use Parser;

class CosPreview {
    public static function onParserFirstCallInit( Parser $parser ) {
        $parser->setHook( 'cospreview', [ __CLASS__, 'renderCosPreview' ] );
        return true;
    }

    public static function renderCosPreview( $input, array $args, Parser $parser, $frame ) {
        $id = $args['id'] ?? '';
        $path = $args['path'] ?? '';
        $region = $args['region'] ?? '';

        if ( empty( $id ) || empty( $path ) || empty( $region ) ) {
            return '<p>Missing required parameters for COS preview.</p>';
        }

        $url = "https://$id.cos.$region.myqcloud.com/$path?ci-process=doc-preview&dstType=html";
        $html = self::generateIframeHtml( $url );

        return $html;
    }

    private static function generateIframeHtml( $url ) {
        return <<<HTML
<html>
<body>
        <iframe src="$url" frameborder="0" allowfullscreen style="width: 100%; height: 100vh; border: none;"></iframe>
</body>
</html>
HTML;

    }
}