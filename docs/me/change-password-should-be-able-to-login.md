# After update my password, should be able to login with new password

## Precondition

* [Login with admin account](../common/login-with-admin.md)
* [Change Password](../common/change-my-password.md)

## POST /api/login

| Header | Value |
| - | - |
| Content-Type | application/json |

```
{
    "login": "admin",
    "pwd": "newerpassword"
}
```

## Expectation

| Assert | Expected |
| - | - |
| StatusCode | 200 |

## Finally

* [Delete New User](../common/reset-my-password.md)
