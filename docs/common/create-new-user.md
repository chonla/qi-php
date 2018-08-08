# Create a new user

## POST /users

| Header | Value |
| - | - |
| Authorization | Bearer {access-token} |
| Content-Type | application/json |

```
{
    "display": "New user setup",
    "login": "newuser",
    "pwd": "newpassword",
    "displayed_image": 0
}
```

## Capture

| Name | Value |
| - | - |
| new-user-uri | Header.Location |
