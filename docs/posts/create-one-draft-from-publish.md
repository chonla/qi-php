# Create a new draft from previous published copy

## Precondition

* [Login as a user](../common/login-with-user-1.md)
* [Create New Post](../common/create-new-post.md)

## PATCH {new-post-uri}/draft

| Header | Value |
| - | - |
| Authorization | Bearer {access-token} |
| Content-Type | application/json |

```
{
    "title": "New post draft",
    "body": "New post body draft",
    "featured_image": 0
}
```

## Expectation

| Assert | Expected |
| - | - |
| StatusCode | 200 |
| Data.status | draft |

## Finally

* [Delete New Post](../common/delete-new-post.md)