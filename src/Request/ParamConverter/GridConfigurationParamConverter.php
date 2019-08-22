<?php

/**
 * Copyright © Bold Brand Commerce Sp. z o.o. All rights reserved.
 * See license.txt for license details.
 */

declare(strict_types = 1);

namespace Ergonode\Grid\Application\Request\ParamConverter;

use Ergonode\Grid\GridConfigurationInterface;
use Ergonode\Grid\RequestGridConfiguration;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 */
class GridConfigurationParamConverter implements ParamConverterInterface
{
    /**
     * {@inheritDoc}
     */
    public function apply(Request $request, ParamConverter $configuration): void
    {
        $requestGridConfiguration = new RequestGridConfiguration($request);
        $request->attributes->set($configuration->getName(), $requestGridConfiguration);
    }

    /**
     * {@inheritDoc}
     */
    public function supports(ParamConverter $configuration): bool
    {
        return GridConfigurationInterface::class === $configuration->getClass();
    }
}
