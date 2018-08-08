# After update my password, should be able to login with new password

## Precondition

* [Login](../common/login.md)
* [Change Password](../common/change-my-password.md)

## POST /login

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
