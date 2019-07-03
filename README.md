# WC API debugger

The WC API debugger is a child theme for Storefront that allows you to test if the REST API of any WooCommerce site is running as it should.

----

## Prerequisites

* This is a child theme of Storefront, so you need to have [Storefront]() installed on the site.
* When the child theme is installed and activated, create a new page and choose "WC API Debug" under **Document > Page Attributes > Template**. There's no need for content on that page.

![Where to set the page attributes](https://cld.wthms.co/zscLwC+)
Link to screenshot: https://cld.wthms.co/zscLwC

## Testing

### Generate REST API keys

* Open any live WooCommerce site. Local sites currently cannot be tested this way yet.
* Go to **WooCommerce > Settings > Advanced > REST API**.
* Select **Add key**, give a name and set the permissions you want to test. Note that "Write" permissions can currently not be tested yet.

### Testing the keys

* Go to the page with the WC API Debug template you've created.
* Enter the site URL. Make sure this is the homepage.
* Enter the customer key and secret.
* Choose the permalink structure. If you're not sure, you can find this under **Settings > Permalinks**.
* Hit "Submit Query" and see the results.
