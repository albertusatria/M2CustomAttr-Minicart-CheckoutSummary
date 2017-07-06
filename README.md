# M2 Module Display Custom Attribute(s)

Purpose
-------------
To show custom product attributes with code "display_pn" on minicart header and summmary checkout page. Feel free to download and change the attribute code with to suite your needs.


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
