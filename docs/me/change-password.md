# Update my password

As an owner of my account, I should be able to change my own password.

## Precondition

* [Login](../common/login.md)

## PATCH /me/password

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
