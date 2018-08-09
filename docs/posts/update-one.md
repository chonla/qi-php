# Update a post

## Precondition

* [Login as a user](../common/login-by-user-1.md)
* [Create New Post](../common/create-new-post.md)

## PATCH {new-post-uri}

| Header | Value |
| - | - |
| Authorization | Bearer {access-token} |
| Content-Type | application/json |

```
{
    "title": "Updated title again",
    "body": "Updated body"
}
```

## Expectation

| Assert | Expected |
| - | - |
| StatusCode | 200 |

## Finally

* [Delete New Post](../common/delete-new-post.md)
