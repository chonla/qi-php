# Create a new draft

## Precondition

* [Login as a user](../common/login-with-user-1.md)

## POST /api/posts/draft

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
| Data.status | draft |
| Data.slug | /^.+$/ |

## Capture

| Name | Value |
| - | - |
| new-post-uri | Header.Location |

## Finally

* [Delete New Post](../common/delete-new-post.md)