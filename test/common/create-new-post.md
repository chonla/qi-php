# Create a new post

## POST /posts

| Header | Value |
| - | - |
| Authorization | Bearer {access-token} |
| Content-Type | application/json |

```
{
    "title": "New post setup",
    "body": "New post body setup",
    "featured_image": 0
}
```

## Capture

| Name | Value |
| - | - |
| new-post-uri | Header.Location |
