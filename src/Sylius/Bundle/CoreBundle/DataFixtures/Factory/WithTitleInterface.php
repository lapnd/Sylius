<?php

declare(strict_types=1);

namespace Sylius\Bundle\CoreBundle\DataFixtures\Factory;

interface WithTitleInterface
{
    /**
     * @return $this
     */
    public function withTitle(string $title): self;
}
