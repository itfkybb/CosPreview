<?php
/**
 * Short code alias for the CosPreview extension.
 */

$wgHooks['ParserFirstCallInit'][] = function ( Parser $parser ) {
    $parser->setFunctionHook( 'cospreview', [ 'MediaWiki\extensions\CosPreview\CosPreview', 'renderCosPreview' ] );
    return true;
};