# Update a post should update data successfully

## Precondition

* [Login as a user](../common/login-with-user-1.md)
* [Create New Post](../common/create-new-post.md)
* [Update New Post](../common/update-new-post.md)

## GET {new-post-uri}

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
| Data.title | Updated post setup |

## Finally

* [Delete New Post](../common/delete-new-post.md)
