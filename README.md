\mainpage THE BAOBAB SERVER

![BAOBAB](images/BAOBAB.png)

BAOBAB APPLICATION SERVER
=========================

Part of the Rift Valley Platform
-----------------------------------------------------------------------------------------------------------------
![BAOBAB Server and The Rift Valley Platform](images/BothLogos.png)

THE BAOBAB REST API
===================
The BAOBAB server is designed to be used as a low-level application server; part of a larger solution that includes client-focused SDKs. Access by client applications is to be done via the SDKs, meaning that the BAOBAB REST API is an internal Great Rift Valley interface.

The client SDKs will use this REST API to interact with the BAOBAB Server.

REST-LIKE, NOT REST-FUL
-----------------------
Although we will be referring to the BAOBAB API as a "REST" API, it is not actually a true ["RESTful API"](https://restfulapi.net).

In particular, the GET and DELETE methods will work in a RESTful manner, but the POST and PUT methods will differ. Instead of full XML or JSON resources being transmitted to the server, we will use format-neutral query arguments to affect the operations.

STATELESS
---------
Like other REST APIs, the server will operate in a "stateless" fashion, with each call being a completely atomic operation. State can be managed in the various client SDKs that accompany BAOBAB.

AUTHENTICATION
--------------
Authentication is accomplished by a 2-key system:

- **Server Secret**
    
    Each BAOBAB server installation will specify a "secret," which is a random sequence of characters. This secret will be supplied to authorized client connectors, and will remain valid at the discretion of the server administrator.

- **API key**
    
    The other part of the athorization will be a temporary dynamic API key that is provided on a realtime basis to users that initiate connections with the server. The user logs in once with a login ID and password, and an API key is returned to them.
    This key is timed, and may also be tied to the user's IP address. The timeout is set by the server administrator (default is 60 minutes for a regular login, and 10 minutes for a "main admin" login).
    API Key timeouts are "hard." They will not be reset or "touched" by interactions. It is up to the user process to track the time. If an API Key times out while a server process is under way, the process will conclude as normal, but subsequent calls will fail until the login has been renewed (and a new API Key is supplied).

When connecting to the BAOBAB server as an authorized user, you must include the Server Secret and the API Key in the [Basic Authentication HTTP Header](https://en.wikipedia.org/wiki/Basic_access_authentication), like so:

In PHP (cURL):

    // Authentication. We provide the Server Secret and the API key here.
    if (isset($g_server_secret) && isset($g_api_key)) {
        curl_setopt($curl_resource_handle, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl_resource_handle, CURLOPT_USERPWD, "$g_server_secret:$g_api_key");
    }

Or in JavaScript (AJAX):

    // Authentication. We provide the Server Secret and the API key here.
    if (isset(g_server_secret) && isset(g_api_key)) {
        xml_http_request_object.setRequestHeader('Authorization', 'Basic ' + btoa(unescape(encodeURIComponent(g_server_secret + ':' + g_api_key))));
    };

The Server Secret is placed in the "login ID" place, and the API Key is placed in the "password" place.

Additionally, the server administrator has the option to require that all interactions be done via HTTPS (SSL/TLS). They can also specify that any subsequent connections of an authorized user must originate from the same IP address, and that the user cannot log in while a current login is still active (there is a `"logout"` command).

This header should accompany any GET, POST, PUT or DELETE operations that you make.

Without authorization, you can only make GET calls. Additionally, you may be restricted from accessing some resources.

SECURITY
========
BAOBAB uses a "token-based" security system.

TOKENS
------
BAOBAB uses "security tokens," which are simple integers. These are generated and managed by Manager Users and the Main Admin User.

Tokens can be applied to any resource on the server. There are no "levels" to tokens. The same token can be used to secure nuclear launch codes, or your porn stash (**PROTIP:** Don't do that).

Any resource can have a single token applied as a read permission, and a single token applied as a write permission. When a user accesses a resource, the tokens "owned" by that user (including the user's own resource ID) are checked against the resource read and/or write tokens. If they do not match, the resource is "invisible" to the user.

It is possible for users to have read rights to resources, but not write/modification rights. If a user has write/modification permission, they also have read permission for that resource.

Tokens are super-simple. They have no accompanying metadata (like names). The SDKs and client applications should be responsible for applying organizational characteristics to security tokens, and for providing a cognitive model of the token system to users and administrators.

Manager Users are given a "pool" of tokens that they can give to users they create. No user can have any tokens that the Manager does not have. Manager users can create new tokens, which are added to their pool, or another manager with a larger pool can give tokens to users (Managers or otherwise), and they have write permissions for the login (not user record) for that user.

Users cannot set their own security tokens. A manager must set the security tokens for any user (Manager or Standard User).

USERS
-----
There are only three levels of user:

- **Standard User**

    This is a login that can access (and, if authorized, affect) resources on the server.
    
- **Manager User**

    This is a standard user that also has the authority to create other users, modify user security tokens, and create new security tokens.
    
- **Main Admin ("God") User**

    This is a server administrator account with full rights to all resources. There can only be one of these per server. Any user login can be "promoted" to the Main Admin, but the login is subjected to a more rigorous timeout than standard logins, and can be slower (sometimes, considerably so), as it can "see" the entirety of the server.
    
REST PLUGINS
============
BAOBAB uses a "plugin" system to provide primary-level REST API services. The default plugins are:

- \ref rest-plugin-baseline

    This is a basic plugin that gives access to the tokens, and provides resource-blind search options.
    
- \ref rest-plugin-people

    This is a plugin that allows you to access user and/or login objects. Users and logins are two different types of resources, but are often linked. They can exist independently.
    
- \ref rest-plugin-places

    This is a plugin that manages resources that represent geographic locations.
    
- \ref rest-plugin-things

    This is a plugin that allows key/value storage of generic data. You can attach all kinds of data to these resources, but the data upload is MIME/FORM-MULTIPART or INLINE, and will be further discussed in the \ref rest-plugin-things plugin documentation.
    
All of these resources can have geographic locations (long/lat), as well as the ability to aggregate other resources (of any type).

It is possible for a resource to aggregate resources to which the current user has no permissions. In these cases, the aggregated resources will be "invisible" to the user.

LOGGING IN/OUT
==============
You cannot provide login credentials to resource access/modification calls. You must first make a simple `"login"` call, get an API Key, and then use that API Key and the Server Secret in the [Basic Authentication HTTP Header](https://en.wikipedia.org/wiki/Basic_access_authentication) in subsequent calls.

The server administrator has the option to require that the initial login call always be SSL (this should always be the case, but it is an option); regardless of whether or not the regular calls are SSL.

You make a login call in this fashion:

    {GET} http[s]://{SERVER URL}/login?login_id=<YOUR LOGIN ID>&password=<YOUR PASSWORD>
    
Where `"{SERVER URL}"` is the root URL to the BAOBAB server, and the `"login_id="` and `"password="` query arguments reference the user string login ID and password (not the Server Secret or API Key).

The response from this call is a simple string, which will be the API Key. Once an API Key is generated, its "clock" starts ticking, and it will not be reset. Also, the server may be configured to prevent the same login from receiving a new API Key while one is still active, so it is important to retain this response.

You log out by calling the logout call, like so:

    {GET} http[s]://{SERVER URL}/logout

This should be accompanied by the authorization header. The requirement for SSL is the one for regular interactions (independent of login). Once this has been successfully called, the API Key is no longer valid, and can be disposed of.

**NOTE:** Logout does not return [200 (OK)](https://httpstatuses.com/200) as an HTTP Status. Instead, it returns [205 (Reset Content)](https://httpstatuses.com/205). This indicates to the recipient that there is a different server context, and they should reset their content.

DATA FORMATS
============
BAOBAB will respond with four different formats:

- PLAINTEXT
    
    The only guaranteeed time that you will receive a plaintext format is as a response to the `"login"` command; when you receive the API Key as a response.
    You can also get it as a response to access of \ref rest-plugin-things resources, if you request it.
    
- XML

    This is a BAOBAB-specifc XML dialect that will be defined by XML Schema documents.
    
- JSON

    This is a very straigtforward JSON object model. Both JSON and XML will contain the same information, and will use the same keys.

- XSD (XML SCHEMA)

    Each plugin can be queried for its XML data schema. The schema will be comprehensive, describing all possible responses from the plugin. XSD responses are always "publicly-accessible." There are no restrictions on reading them. They are read-only resources.

LOCATION, LOCATION, LOCATION
============================
Despite the generic nature of the data contained within the BAOBAB dataset, special consideration is given to allowing all data to have a geographic location set (as a longitude/latitude -in degrees- value).

This means that you can use the \ref rest-plugin-baseline plugin to do "format-agnostic" searches, based on a location and radius, and find all available resources -of any type, within the search radius.

RADIUS SEARCH
-------------
You can search for all resources, using a radius search. This is when you supply a longitude and latitude, along with a radius (not diameter); describing a circle around the long/lat. This can be sent to BAOBAB as a search criteria, and any resources that have a position set that fall within that radius will be returned. Resources that do not have an assigned long/lat will not be included in the results.

LOCATION OBFUSCATION
--------------------
It is also possible to [obfuscate](https://en.wikipedia.org/wiki/Location_obfuscation) each location by a given distance, in Kilometers. If this is done, then the precise location will not be returned when the record is queried. Instead, a randomized long/lat will be returned. If the resource's actual location falls within the search radius, then it will be returned, but the long/lat will be different, and could actually be outside the requested radius.

This is a common practice for security, allowing a degree of privacy or security to people or institutions (think battered women's shelters, which often have confidential locations).

AGGREGATORS
===========
Every resource is a "collection." That means that you can associate other resources with it, so you can have logical connections between resources.

LOCALIZATION FLAGS
==================
Every resource in the BAOBAB server, regardless of its type, can have a `"lang"` data member. This is a simple [ISO 639-1 or ISO 639-2](http://www.loc.gov/standards/iso639-2/php/code_list.php) code. It is up to the client endpoint to provide localizations, but the resources can be flagged with localization hints.

RESPONSE HEADERS
================
Unsuccessful attempts at operations may result in response headers of [400 (Bad Request)](https://httpstatuses.com/400), [401 (Unauthorized)](https://httpstatuses.com/401), [403 (Forbidden)](https://httpstatuses.com/403), or even [500 (Internal Server Error)](https://httpstatuses.com/500).

Successful operations will return [200 (OK)](https://httpstatuses.com/200), or [205 (Reset Content)](https://httpstatuses.com/205), in the case of a successful logout.

In most cases, you will also receive some text that may help to explain the cause. For reasons of security, this may be limited (A good security practice is to keep people guessing as to what, exactly, happened).

LICENSE
=======

![Little Green Viper Software Development LLC](images/viper.png)
© Copyright 2018, [Little Green Viper Software Development LLC](https://littlegreenviper.com).
This code is ENTIRELY proprietary and not to be reused, unless under specific, written license from [Little Green Viper Software Development LLC](https://littlegreenviper.com).
