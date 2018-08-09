# Create a new post

## Precondition

* [Login as a user](../common/login-with-user-1.md)

## POST /posts

| Header | Value |
| - | - |
| Authorization | Bearer {access-token} |
| Content-Type | application/json |

```
{
    "title": "New post",
    "body": "New post body",
    "featured_image": 0
}
```

## Expectation

| Assert | Expected |
| - | - |
| StatusCode | 201 |

## Capture

| Name | Value |
| - | - |
| new-post-uri | Header.Location |

## Finally

* [Delete New Post](../common/delete-new-post.md)
