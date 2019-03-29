# Login Should Return Unauthorized Response

## POST /api/login

| Header | Value |
| - | - |
| Content-Type | application/json |

```
{
    "login": "admin",
    "pwd": "not-a-password"
}
```

## Expectation

| Assert | Expected |
| - | - |
| StatusCode | 403 |
