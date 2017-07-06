# M2 Module Display Custom Attribute(s)

>To show custom product attributes with code "display_pn" on minicart header and summmary checkout page.
Feel free to download and change the attribute code to suite your needs.


Installing
-------------
1. Just copy this module to `{root}app/code/`

2. Cleanup the **pub/** directory or do this from your root Magento location : 
`cd pub/static/frontend && rm -rf * && cd ../_requirejs/frontend && rm -rf * && cd ../../../../`

3.  Cleanup the **var/** directory or do this from your root Magento location :
`rm -rf var/cache var/composer_home var/di var/generation var/page_cache var/session var/tmp var/view_preprocessed`

4. Run setup upgrade :
`php bin/magento setup:upgrade`

5. Run code compilation :
`php bin/magento setup:di:compile`

6. Run code deployment :
`php bin/magento setup:static-content:deploy --theme="{vendor/theme}"`

7. Refresh your site page


How to use
----------------
**MINI CART**

1. Navigate to : Icube/DisplayAttributes/Plugin/DefaultItem.php
On line #29, change the "$attributes['display_pn']" with your custom attribute code :
`"display_pn" => $attributes['your_custom_attribute_code']->getFrontend()->getValue($product)`
You may change the variable name, too -- before the arrow sign

2. Navigate to : Icube/DisplayAttributes/view/frontend/web/template/minicart/item/default.html
On line #33, change the "display_pn" with your variable above


**CHECKOUT PAGE - SUMMARY SECTION**

1. Navigate to : Icube/DisplayAttributes/Plugin/ConfigProviderPlugin.php
On line #38, change the "getDisplayPn()" with your custom attribute code :
`$displayPN = $product->getYourCustomAttribute();`
You may change the variable name too -- before the equals sign

2. Also, on line #40, change the "display_pn" attribute code with your custom attribute code
And the value, change it to your custom attribute code

3. Navigate to : Icube/DisplayAttributes/view/frontend/web/js/view/summary/item/details.js
On line #24, change "display_pn" with your variable on step 1 line #38
You may change the function name.
If you do change the function name, please proceed to step 4,
if you are not then go to step 5

4. Navigate to : Icube/DisplayAttributes/view/frontend/web/template/summary/item/details.html
On line #17, change "getItemDisplayPN" with your newly created function name on step 4

5. Perform cleanup for directory : pub/ and var/ 
`rm -rf var/cache var/composer_home var/di var/generation var/page_cache var/session var/tmp var/view_preprocessed`

6. Run code deployment :
`php bin/magento setup:static-content:deploy --theme="{vendor/theme}"`