<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ServicePointSearch\Persistence;

use Generated\Shared\Transfer\ServicePointSearchTransfer;

interface ServicePointSearchEntityManagerInterface
{
    /**
     * @param array<int> $servicePointIds
     *
     * @return void
     */
    public function deleteServicePointSearchByServicePointIds(array $servicePointIds): void;

    /**
     * @param array<int> $servicePointSearchIds
     *
     * @return void
     */
    public function deleteServicePointSearchByServicePointSearchIds(array $servicePointSearchIds): void;

    public function saveServicePointSearch(ServicePointSearchTransfer $servicePointSearchTransfer): void;
}
