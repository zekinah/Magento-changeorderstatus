# Change order status - Magento 1

This module can change the order status programmatically.

## Files

* magento-changestatus.php
	-Use this file if you want to load this only this module.
* magento-changestatus_HF.php
	-Use this file instead, if you want to load this module with your default header and footer.

## Instruction

Add this module to your magento 1 root directory.

First you should know or get the order_id of the Order that you want to change the order status. To get that you can hover or point your cursor into the ideal order to change.

![picture1 alt] (https://www.screencast.com/t/TJElwz5NNiG7)

or you can open the ideal order and you can see the order_id on its url

![picture2 alt] (https://www.screencast.com/t/xFManLWCx)

Next go to the module redirecting via /magento-changestatus.php and you can see the same form below. and you can input the order_id on the provided text field. and select what status do you prefered for the order. Here are the available status on the module (Pending,Processing,Complete,Close,Cancel,Hold,Unhold). And after you select you can click the button Update.

![picture3 alt] (https://www.screencast.com/t/HEwww8iAWZ5G)

After that the module will be processed and the module will notify you about the changing status if it is succeed or failed.

![picture4 alt] (https://www.screencast.com/t/dFcDn4OR)

The output will be

![picture5 alt] (https://www.screencast.com/t/aHPxmubyO0f)

##Important notes :exclamation::exclamation::exclamation:

> Change the filename after including into your magento root file to avoid unknown changes.

* This module make take change to the order status directly in all orders, to use this please first verify or please confirm your info before taking an action using this module.
* This module will only use for emergency purposes only.
* The changes cannot be undone if the order made as completed

## Author

* **Zekinah Joy Lecaros** - *Initial work* - [Zekinah Lecaros](https://github.com/zekinah)

## License

[MIT](http://opensource.org/licenses/MIT)

Copyright (c) 2019-present, Zekinah
