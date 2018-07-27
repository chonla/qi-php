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

### Example

```
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MSwiZGlzcGxheSI6IkFkbWluaXN0cmF0b3IiLCJkaXNwbGF5X2ltYWdlIjowfQ.WFqmNdHUggJ_Ln9QEpH5szS6jnDJiZb0PLk4ZH6eFZY"
}
```