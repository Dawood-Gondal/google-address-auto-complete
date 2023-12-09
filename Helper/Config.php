<?php
/**
 * @category    M2Commerce Enterprise
 * @package     M2Commerce_GoogleAddressAutocomplete
 * @copyright   Copyright (c) 2023 M2Commerce Enterprise
 * @author      dawoodgondaldev@gmail.com
 */

namespace M2Commerce\GoogleAddressAutocomplete\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\UrlInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Class for helper Data
 */
class Config extends AbstractHelper
{
    const GOOGLE_AUTOCOMPLETE_ENABLED = 'autocomplete/general/enabled';
    const AUTOCOMPLETE_API_KEY_XML_PATH = 'autocomplete/general/api_key';
    const CUSTOMER_STREET_LINES_QTY_CONFIG_PATH = 'customer/address/street_lines';
    const DEFAULT_COUNTRY_CONFIG_PATH = 'general/country/default';

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return (bool) $this->scopeConfig->getValue(
            self::GOOGLE_AUTOCOMPLETE_ENABLED,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return (string) $this->scopeConfig->getValue(
            self::AUTOCOMPLETE_API_KEY_XML_PATH,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return mixed
     */
    public function getDefaultCountryId()
    {
        return $this->scopeConfig->getValue(
            self::DEFAULT_COUNTRY_CONFIG_PATH,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return string
     */
    public function getStreetLinesQty()
    {
        return (string) $this->scopeConfig->getValue(
            self::CUSTOMER_STREET_LINES_QTY_CONFIG_PATH,
            ScopeInterface::SCOPE_STORE
        );
    }
}
