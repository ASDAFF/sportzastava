var self = this;
var properties = model.properties;

if (stage === 'properties') {
    self.text = ko.observable();

    properties.text = self.text;
} else {

}