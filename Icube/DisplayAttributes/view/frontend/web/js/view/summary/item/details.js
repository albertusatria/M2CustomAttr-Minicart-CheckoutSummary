/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
/*jshint browser:true jquery:true*/
/*global alert*/
define(
[
    'uiComponent'
],
function (Component) {
    "use strict";
    var quoteItemData = window.checkoutConfig.quoteItemData;
    return Component.extend({
        defaults: {
            template: 'Icube_DisplayAttributes/summary/item/details'
        },
        quoteItemData: quoteItemData,
        getValue: function(quoteItem) {
            return quoteItem.name;
        },
        getItemDisplayPN: function(quoteItem) {
            var itemProduct = this.getItemProduct(quoteItem.item_id);
            return itemProduct.display_pn;
        },
        getItemProduct: function(item_id) {
            var itemElement = null;
            _.each(this.quoteItemData, function(element, index) {
                if (element.item_id == item_id) {
                    itemElement = element;
                }
            });
            return itemElement;
        }

    });
});
