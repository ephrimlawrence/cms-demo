# ARCHITECTURE

The project architecture is relatively simple. It consist of three (3) main components:

- Authentication
- Website Customization and
- Analytics

## Authentication

Authentication is handled by the [Auth Controllers](./app/Http/Controllers/Auth/)

## Website Customization

The [WebsiteController](./app/Http/Controllers/WebsiteController) handles creation and customization of web pages. The user is limited to customizing the contents of [template.blade.php](./resources/views/websites/template.blade.php).

A default page is created with dummy content when a new website is created. The user can then customize the content using a simple form. The customization is saved as json in the `config` field of the `website_config` table, and `website` when published.

Client web page can be accessed by visiting [http://127.0.0.1:8000/sites/\<site-name-slug>]()


## Analytics

User's device information (IP, timestamp, user agent) are atomically captured when browsing the page. The analytics data is accessible from the admin dashboard.
