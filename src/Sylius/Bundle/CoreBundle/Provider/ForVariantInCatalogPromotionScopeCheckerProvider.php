<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Sylius\Bundle\CoreBundle\Provider;

use Sylius\Bundle\CoreBundle\Checker\VariantInScopeCheckerInterface;
use Sylius\Component\Core\Model\CatalogPromotionScopeInterface;

final class ForVariantInCatalogPromotionScopeCheckerProvider implements ForVariantInCatalogPromotionScopeCheckerProviderInterface
{
    public function __construct(private iterable $variantCheckers)
    {
    }

    public function provide(CatalogPromotionScopeInterface $scope): VariantInScopeCheckerInterface
    {
        /** @var VariantInScopeCheckerInterface $checker */
        foreach ($this->variantCheckers as $checker) {
            if ($checker->supports($scope)) {
                return $checker;
            }
        }

        throw new \InvalidArgumentException('There is catalog promotion scope without configured variantInScopeChecker');
    }
}