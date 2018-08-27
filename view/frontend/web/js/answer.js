define([
    'ko',
    'uiComponent',
    'jquery'
], function (ko, Component, $) {


    return Component.extend({
        defaults: {
            template: 'Magenest_PartTimePlus2/exam',
            orderList: ko.observableArray([]),
            questions: ko.observableArray(),
            entity_id: ko.observable()
        },

        initObservable: function () {
            var self = this;
            self.orderList(this.order_data);
            return this;
        },

        changeOption:  function (component, event) {
            var self = this;
            self.questions(self.question[event.currentTarget.value]);
        }
    });
});