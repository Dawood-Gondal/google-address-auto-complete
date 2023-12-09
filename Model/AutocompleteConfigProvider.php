<?php
/**
 * @category    M2Commerce Enterprise
 * @package     M2Commerce_GoogleAddressAutocomplete
 * @copyright   Copyright (c) 2023 M2Commerce Enterprise
 * @author      dawoodgondaldev@gmail.com
 */

namespace M2Commerce\GoogleAddressAutocomplete\Model;

use Magento\Checkout\Model\ConfigProviderInterface;
use M2Commerce\GoogleAddressAutocomplete\Helper\Config;

class AutocompleteConfigProvider implements ConfigProviderInterface
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
     * @return array
     */
    public function getConfig(): array
    {
        $config = [];
        if ($this->config->isEnabled()) {
            $config['m2c_google_autocomplete'] = [
                'apiKey' => $this->config->getApiKey(),
                'defaultCountryId' => $this->config->getDefaultCountryId()
            ];
        }
        return $config;
    }
}
