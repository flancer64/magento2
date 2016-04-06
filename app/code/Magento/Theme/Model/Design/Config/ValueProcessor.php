<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Theme\Model\Design\Config;

use Magento\Theme\Model\Design\BackendModelFactory;

class ValueProcessor
{
    /**
     * @var BackendModelFactory
     */
    protected $backendModelFactory;

    /**
     * @param BackendModelFactory $backendModelFactory
     */
    public function __construct(
        BackendModelFactory $backendModelFactory
    ) {
        $this->backendModelFactory = $backendModelFactory;
    }

    /**
     * Process value
     *
     * @param string $value
     * @param string $path
     * @param string $scope
     * @param string $scopeId
     * @param array $fieldConfig
     * @return mixed
     */
    public function process($value, $path, $scope, $scopeId, array $fieldConfig)
    {
        $backendModel = $this->backendModelFactory->createByPath(
            $path,
            [
                'value' => $value,
                'field_config' => $fieldConfig,
                'scope' => $scope,
                'scope_id' => $scopeId
            ]
        );
        $backendModel->afterLoad();
        return $backendModel->getValue();
    }
}
