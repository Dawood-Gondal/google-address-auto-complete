/**
 * @category    M2Commerce Enterprise
 * @package     M2Commerce_GoogleAddressAutocomplete
 * @copyright   Copyright (c) 2023 M2Commerce Enterprise
 * @author      dawoodgondaldev@gmail.com
 */

var google_maps_loaded_def = null;

define(['jquery'], function ($) {
    'use strict';

    if (!google_maps_loaded_def) {
        google_maps_loaded_def = $.Deferred();

        window.google_maps_loaded = function () {
            google_maps_loaded_def.resolve(window.google.maps);
        };

        var apiKey = window.checkoutConfig === undefined ? window.m2c_google_autocomplete.apiKey : window.checkoutConfig.m2c_google_autocomplete.apiKey,
            defaultCountryId = window.checkoutConfig === undefined ? window.m2c_google_autocomplete.defaultCountryId : window.checkoutConfig.defaultCountryId;

        if (apiKey !== false && apiKey !== null) {
            var url = 'https://maps.googleapis.com/maps/api/js?v=quarterly&key=' + apiKey + '&libraries=places&callback=google_maps_loaded';

            /* eslint-disable-next-line max-depth */
            if (defaultCountryId) {
                url += '&region=' + defaultCountryId;
            }

            require([url], function () {}, function () {
                google_maps_loaded_def.reject();
            });
        }
    }

    return google_maps_loaded_def.promise();
});
