<?php
/**
 * @category    M2Commerce Enterprise
 * @package     M2Commerce_GoogleAddressAutocomplete
 * @copyright   Copyright (c) 2023 M2Commerce Enterprise
 * @author      dawoodgondaldev@gmail.com
 */

namespace M2Commerce\GoogleAddressAutocomplete\Plugin;

use Magento\Checkout\Block\Checkout\LayoutProcessor;
use M2Commerce\GoogleAddressAutocomplete\Helper\Config;

class LayoutProcessorPlugin
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @param Config $config
     */
    public function __construct(
        Config $config
    ) {
        $this->config = $config;
    }

    /**
     * @param LayoutProcessor $processor
     * @param array $jsLayout
     * @return array
     */
    public function afterProcess(
        LayoutProcessor $processor,
        array $jsLayout
    ) {
        if (isset($jsLayout['components']['checkout']['children']['autocomplete'])) {
            $jsLayout['components']['checkout']['children']['autocomplete']['streetLinesQty'] = $this->config->getStreetLinesQty();
        }
        return $jsLayout;
    }
}
