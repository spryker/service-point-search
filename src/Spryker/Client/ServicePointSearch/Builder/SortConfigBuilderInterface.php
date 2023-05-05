<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\ServicePointSearch\Builder;

use Generated\Shared\Transfer\SortConfigTransfer;

interface SortConfigBuilderInterface
{
    /**
     * @param \Generated\Shared\Transfer\SortConfigTransfer $sortConfigTransfer
     *
     * @return $this
     */
    public function addSort(SortConfigTransfer $sortConfigTransfer);

    /**
     * @param string|null $parameterName
     *
     * @return \Generated\Shared\Transfer\SortConfigTransfer|null
     */
    public function getSortConfigTransfer(?string $parameterName): ?SortConfigTransfer;

    /**
     * @return array<\Generated\Shared\Transfer\SortConfigTransfer>
     */
    public function getAllSortConfigTransfers(): array;

    /**
     * @param array<string, mixed> $requestParameters
     *
     * @return string|null
     */
    public function getActiveParamName(array $requestParameters): ?string;

    /**
     * @param string|null $sortParamName
     *
     * @return string|null
     */
    public function getSortDirection(?string $sortParamName): ?string;
}
