# Login Should Return Token

## POST /login

| Header | Value |
| - | - |
| Content-Type | application/json |

```
{
    "login": "admin",
    "pwd": "admin"
}
```

## Expectation

| Assert | Expected |
| - | - |
| StatusCode | 200 |
| HEADER.content-type | /^application/json[;$]/ |
| DATA.token | /.+/ |