<?php

defined('TYPO3') || die();

$rendererRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Resource\Rendering\RendererRegistry::class);
$rendererRegistry->registerRendererClass(\B13\PosterImage\VideoTagWithPosterRenderer::class);
