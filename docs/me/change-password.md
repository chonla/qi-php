# Update my password

As an owner of my account, I should be able to change my own password.

## Precondition

* [Login with admin account](../common/login-with-admin.md)

## PATCH /api/me/password

| Header | Value |
| - | - |
| Authorization | Bearer {access-token} |
| Content-Type | application/json |

```
{
    "pwd": "newerpassword"
}
```

## Expectation

| Assert | Expected |
| - | - |
| StatusCode | 200 |

## Finally

* [Delete New User](../common/reset-my-password.md)
