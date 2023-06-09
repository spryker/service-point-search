<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ServicePointSearch\Communication\Plugin\Publisher\ServicePoint;

use Spryker\Shared\ServicePointSearch\ServicePointSearchConfig;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\PublisherExtension\Dependency\Plugin\PublisherPluginInterface;

/**
 * @method \Spryker\Zed\ServicePointSearch\ServicePointSearchConfig getConfig()
 * @method \Spryker\Zed\ServicePointSearch\Business\ServicePointSearchFacadeInterface getFacade()
 * @method \Spryker\Zed\ServicePointSearch\Communication\ServicePointSearchCommunicationFactory getFactory()
 */
class ServicePointWritePublisherPlugin extends AbstractPlugin implements PublisherPluginInterface
{
    /**
     * {@inheritDoc}
     * - Retrieves all Service Points using IDs from `$eventTransfers`.
     * - Updates entities from `spy_service_point_search` with actual data from obtained Service Points.
     * - Sends a copy of data to queue based on module config.
     *
     * @api
     *
     * @param array<\Generated\Shared\Transfer\EventEntityTransfer> $eventEntityTransfers
     * @param string $eventName
     *
     * @return void
     */
    public function handleBulk(array $eventEntityTransfers, $eventName): void
    {
        $this->getFacade()->writeCollectionByServicePointEvents($eventEntityTransfers);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return list<string>
     */
    public function getSubscribedEvents(): array
    {
        return [
            ServicePointSearchConfig::SERVICE_POINT_PUBLISH,
            ServicePointSearchConfig::ENTITY_SPY_SERVICE_POINT_CREATE,
            ServicePointSearchConfig::ENTITY_SPY_SERVICE_POINT_UPDATE,
        ];
    }
}
