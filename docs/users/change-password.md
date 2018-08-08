# Update a user password

## Precondition

* [Login](../common/login.md)
* [Create New User](../common/create-new-user.md)

## PATCH {new-user-uri}/password

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

* [Delete New User](../common/delete-new-user.md)
