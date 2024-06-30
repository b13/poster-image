<?php

declare(strict_types=1);

namespace B13\PosterImage;

/*
 * This file is part of TYPO3 CMS-based extension "poster-image" by b13.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 */

use TYPO3\CMS\Core\LinkHandling\LinkService;
use TYPO3\CMS\Core\Resource\FileInterface;
use TYPO3\CMS\Core\Resource\Rendering\VideoTagRenderer;

/**
 * VideoTagRenderer that adds a poster image to the video tag
 */
class VideoTagWithPosterRenderer extends VideoTagRenderer
{
    protected LinkService $linkService;

    public function __construct(LinkService $linkService)
    {
        $this->linkService = $linkService;
    }

    public function getPriority()
    {
        return 10;
    }

    public function canRender(FileInterface $file)
    {
        if (!parent::canRender($file)) {
            return false;
        }
        return (bool)$file->getProperty('poster');
    }

    public function render(FileInterface $file, $width, $height, array $options = [])
    {
        $posterReference = $file->getProperty('poster');

        if ($posterReference) {
            if ($posterReference instanceof FileInterface) {
                $posterTarget = $posterReference->getPublicUrl();
            } else {
                $posterFile = $this->linkService->resolve($posterReference)['file'] ?? null;

                if($posterFile instanceof FileInterface){
                    $posterTarget = $posterFile->getPublicUrl();
                }
            }
            if (!empty($posterTarget)) {
                $options['additionalAttributes']['poster'] = $posterTarget;
            }
        }

        return parent::render($file, $width, $height, $options);
    }
}
