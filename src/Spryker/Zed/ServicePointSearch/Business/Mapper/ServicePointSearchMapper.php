<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ServicePointSearch\Business\Mapper;

use Generated\Shared\Transfer\ServicePointSearchTransfer;
use Generated\Shared\Transfer\ServicePointTransfer;
use Generated\Shared\Transfer\StoreTransfer;
use Spryker\Zed\ServicePointSearch\Business\DataMapper\ServicePointSearchDataMapperInterface;
use Spryker\Zed\ServicePointSearch\Dependency\Service\ServicePointSearchToUtilEncodingServiceInterface;

class ServicePointSearchMapper implements ServicePointSearchMapperInterface
{
    /**
     * @var \Spryker\Zed\ServicePointSearch\Dependency\Service\ServicePointSearchToUtilEncodingServiceInterface
     */
    protected ServicePointSearchToUtilEncodingServiceInterface $utilEncodingService;

    /**
     * @var \Spryker\Zed\ServicePointSearch\Business\DataMapper\ServicePointSearchDataMapperInterface
     */
    protected ServicePointSearchDataMapperInterface $servicePointSearchDataMapper;

    public function __construct(
        ServicePointSearchToUtilEncodingServiceInterface $utilEncodingService,
        ServicePointSearchDataMapperInterface $servicePointSearchDataMapper
    ) {
        $this->utilEncodingService = $utilEncodingService;
        $this->servicePointSearchDataMapper = $servicePointSearchDataMapper;
    }

    public function mapServicePointTransferToServicePointSearchTransfer(
        ServicePointTransfer $servicePointTransfer,
        ServicePointSearchTransfer $servicePointSearchTransfer,
        StoreTransfer $storeTransfer
    ): ServicePointSearchTransfer {
        $data = $this->servicePointSearchDataMapper->mapServicePointToSearchData($servicePointTransfer, $storeTransfer);
        $structuredData = $this->servicePointSearchDataMapper->getSearchResultData($servicePointTransfer);

        $servicePointSearchTransfer
            ->setIdServicePoint($servicePointTransfer->getIdServicePointOrFail())
            ->setStore($storeTransfer->getNameOrFail())
            ->setStructuredData($this->utilEncodingService->encodeJson($structuredData))
            ->setData($data);

        return $servicePointSearchTransfer;
    }
}
