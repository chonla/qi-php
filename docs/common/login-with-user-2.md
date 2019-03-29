# Login with valid credential of user 2 and collect token

## POST /api/login

| Header | Value |
| - | - |
| Content-Type | application/json |

```
{
    "login": "user2",
    "pwd": "user2"
}
```

## Capture

| Name | Value |
| - | - |
| access-token | DATA.token |
