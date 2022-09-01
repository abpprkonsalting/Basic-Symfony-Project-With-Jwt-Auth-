# Changelog

## [0.1.0]
A basic symfony project skeleton with jwt authentication.

### Tested functionallity (not by phpunit, just functionally):

****************
Register:

description: 
path: /register
method: POST
auth: No authentication needed
body json parameters:
    "email": "",                    // Require email format
    "password": "",                 // minLength = 8, requireLetters = true, requireNumbers = true,
                                    // requireCaseDiff = true, requireSpecialCharacters = true
    "superAdminPassword": ""        // Optional. If set & correct add admin role ('ROLE_ADMIN') to 
                                    // created user. The correct superAdminPassword is set in .env
Headers:
    Content-Type: application/json
Response:
    {
        'user': user email,
        'token': json web token
    }


****************
Login:

path: /login
method: POST
auth: No authentication needed
body json parameters:
    "email": "",                    // Require email format
    "password": "",                 // minLength = 8, requireLetters = true, requireNumbers = true,
                                    // requireCaseDiff = true, requireSpecialCharacters = true
Headers:
    Content-Type: application/json
Response:
    {
        'message': 'success!',
        'token': json web token
    }

****************
Set Admin:

path: /api/setadmin
method: POST
auth: token authentication needed based on token provided on /login
body json parameters:
    "superAdminPassword": ""        // If correct add admin role ('ROLE_ADMIN') to 
                                    // authenticated user. The correct superAdminPassword is set in .env
Headers:
    Content-Type: application/json
    X-AUTH-TOKEN: token provided in /login call
Response:
    {
        'user': user email,
        'token': json web token
    }

****************
Test:

path: /api/test
method: GET
auth: token authentication needed based on token provided on /login
body json parameters:
    
Headers:
    Content-Type: application/json
    X-AUTH-TOKEN: token provided in /login call
Response:
    {
        'message': 'Welcome to your new controller!'
    }

### To do for next version:

- Test correctly what had been done up to now (phpunit, unit / integration /application tests where applicable)
- Check thoroughly the jwt implementation and how much it helps in securing the site.
- Add jwt rotation & auto-logout based on the timestamp


