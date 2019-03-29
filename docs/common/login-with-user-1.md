# Login with valid credential with user 1 and collect token

## POST /api/login

| Header | Value |
| - | - |
| Content-Type | application/json |

```
{
    "login": "user1",
    "pwd": "user1"
}
```

## Capture

| Name | Value |
| - | - |
| access-token | DATA.token |
