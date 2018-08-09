# Create a new user

## Precondition

* [Login with admin account](../common/login-with-admin.md)

## POST /users

| Header | Value |
| - | - |
| Authorization | Bearer {access-token} |
| Content-Type | application/json |

```
{
    "display": "New user",
    "login": "newuser",
    "pwd": "newpassword",
    "displayed_image": 0
}
```

## Expectation

| Assert | Expected |
| - | - |
| StatusCode | 201 |

## Capture

| Name | Value |
| - | - |
| new-user-uri | Header.Location |

## Finally

* [Delete New User](../common/delete-new-user.md)
