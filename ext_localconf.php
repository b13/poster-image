<?php

defined('TYPO3') || die();

$rendererRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Resource\Rendering\RendererRegistry::class);
if ((new \TYPO3\CMS\Core\Information\Typo3Version())->getMajorVersion() > 11) {
    $rendererRegistry->registerRendererClass(\B13\PosterImage\VideoTagWithPosterRenderer::class);
} else {
    $rendererRegistry->registerRendererClass(\B13\PosterImage\VideoTagWithPosterRendererV11::class);
}
