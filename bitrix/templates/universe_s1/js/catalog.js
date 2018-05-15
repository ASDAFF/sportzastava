
universe.catalog.offers = function (structure) {
    var self = this,
        offers = structure['OFFERS'];

    self.current = null;
    self.list = {};
    self.properties = structure['PROPERTIES'];

    if (intec.isArray(offers)) {
        intec.each(offers, function (i, val) {
            self.list[val['ID']] = val;
        });
    } else if (intec.isObject(offers)) {
        self.list = offers;
    }

    intec.extend(self, intec.ext.events(self));

    intec.each(structure['EVENTS'], function(event, callback){
        self.on(event, callback);
    });
};

universe.catalog.offers.prototype.getParameters = function () {
    var self = this,
        parameters = {
            offer: self.getCurrentOffer(),
            properties: {
                displayed: [],
                disabled: [],
                enabled: [],
                selected: []
            }
        };

    intec.each(self.list, function (i, offer) {
        var offerTree = self.getOfferPropertiesTree(offer['ID']);
        intec.each(offerTree, function (code, value) {
            var property = {key: code, value: value};

            if (!intec.inArray(property, parameters.properties.displayed, true)) {
                parameters.properties.displayed.push(property);
            }
        });
    });

    var properties = [],
        propertiesSelected = [],
        currentOffer = self.getCurrentOffer(),
        currentOfferTree = null;

    if (currentOffer != null)
        currentOfferTree = self.getOfferPropertiesTree(currentOffer['ID']);

    intec.each(self.properties, function (i, property) {
        properties.push(property['CODE']);
    });

    intec.each(properties, function (propertyIndex, propertyValue) {

        intec.each(self.list, function (offerCode, offer) {
            var compared = true,
                offerTree = self.getOfferPropertiesTree(offer['ID']);

            if (currentOffer != null) {
                intec.each(propertiesSelected, function (i, selectedProperty) {
                    if (offerTree[selectedProperty] != currentOfferTree[selectedProperty]) {
                        compared = false;
                        return false;
                    }
                });
            } else if (propertiesSelected.length > 0) {
                compared = false;
            }

            if (compared == true) {
                var property = {key: propertyValue, value: offerTree[propertyValue]};

                if (!intec.inArray(property, parameters.properties.enabled, true)) {
                    parameters.properties.enabled.push(property);
                }
            }
        });

        propertiesSelected.push(propertyValue);
    });

    intec.each(parameters.properties.displayed, function (i, property) {
        if (!intec.inArray(property, parameters.properties.enabled, true))
            parameters.properties.disabled.push(property);
    });

    if (currentOfferTree != null)
        intec.each(currentOfferTree, function (code, value) {
            parameters.properties.selected.push({key: code, value: value});
        });

    return parameters;
};

universe.catalog.offers.prototype.getOfferByID = function (offerId) {
    if (typeof offerId === "string")
        offerId = parseInt(offerId);

    if (isNaN(offerId))
        return null;

    if (typeof offerId === 'number') {
        var currentOffer = this.list[offerId];

        if (currentOffer !== undefined)
            return currentOffer;
    }

    return null;
};

// Find offer by current properties tree
universe.catalog.offers.prototype.getOfferByPropertiesTree = function (properties) {
    var self = this,
        result = null;

    intec.each(self.list, function (i, offer) {
        var equal = true;

        intec.each(properties, function(code, value) {
            var offerProperty = offer['PROPERTIES'][code];

            if (!intec.isEmpty(value) && !intec.isEmpty(offerProperty)) {
                switch (offerProperty['PROPERTY_TYPE']) {
                    case 'L':
                        if (offerProperty['VALUE_ENUM_ID'] != value) {
                            equal = false;
                        }
                        break;
                    default:
                        if (offerProperty['VALUE'] != value) {
                            equal = false;
                        }
                        break;
                }
            }
        });

        if (equal) {
            result = offer;
            return false;
        }
    });

    return result;
};

universe.catalog.offers.prototype.getCurrentOffer = function () {
    return this.getOfferByID(this.current);
};

universe.catalog.offers.prototype.setCurrentOfferByID = function (offerId) {
    var self = this;

    if (self.getOfferByID(offerId) != null) {
        self.current = offerId;

        self.trigger('offerChange', self.getParameters());

        return true;
    }
    return false;
};

universe.catalog.offers.prototype.getOfferPropertiesTree = function (offerId) {
    var self = this,
        tree = {},
        offer = self.getOfferByID(offerId);

    if (offer == null)
        return tree;

    intec.each(self.properties, function (key, property) {
        var offerProperty = offer['PROPERTIES'][property['CODE']],
            value = '';

        if (!intec.isEmpty(offerProperty)) {
            switch (offerProperty['PROPERTY_TYPE']) {
                case 'L':
                    value = offerProperty['VALUE_ENUM_ID'];
                    break;
                default:
                    value = offerProperty['VALUE'];
                    break;
            }
        }

        tree[property['CODE']] = value;
    });

    return tree;
};

universe.catalog.offers.prototype.setCurrentOfferByPropertyValue = function (propertyCode, propertyValue) {
    var self = this,
        currentOffer = self.getCurrentOffer(),
        changeableProperty = null,
        compareProperties = {},
        foundedOffer;
return;
    if (currentOffer == null || !intec.isString(propertyCode))
        return false;

    intec.each(self.properties, function (code, property) {
        if (property['CODE'] == propertyCode) {
            changeableProperty = property;
            return false;
        }
    });

    if (changeableProperty == null)
        return false;

    var currentOfferPropertyTree = self.getOfferPropertiesTree(currentOffer['ID']);

    compareProperties = {};
    intec.each(currentOfferPropertyTree, function (code, value) {
        compareProperties[code] = value;
        if (code == propertyCode) {
            compareProperties[code] = propertyValue;
        }
    });
    foundedOffer = self.getOfferByPropertiesTree(compareProperties);
    if (foundedOffer != null) {
        this.setCurrentOfferByID(foundedOffer['ID']);
        return true;
    }

    // if can't find offer, try find closest offer
    compareProperties = {};
    intec.each(currentOfferPropertyTree, function (code, value) {
        compareProperties[code] = value;
        if (code == propertyCode) {
            compareProperties[code] = propertyValue;
            return false;
        }
    });
    foundedOffer = self.getOfferByPropertiesTree(compareProperties);
    if (foundedOffer != null) {
        this.setCurrentOfferByID(foundedOffer['ID']);
        return true;
    }

    return false;
};

universe.catalog.offers.prototype.initialize = function () {
    var self = this;
    intec.each(self.list, function (i, offer) {
        self.setCurrentOfferByID(offer['ID']);
        return false;
    });
};
