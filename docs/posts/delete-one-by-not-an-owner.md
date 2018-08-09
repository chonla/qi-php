# Delete a post by non-owner should not success

## Precondition

* [Login with User 1 Account](../common/login-with-user-1.md)
* [Create New Post](../common/create-new-post.md)
* [Login with User 2 Account](../common/login-with-user-2.md)

## DELETE {new-post-uri}

| Header | Value |
| - | - |
| Authorization | Bearer {access-token} |
| Content-Type | application/json |

## Expectation

| Assert | Expected |
| - | - |
| StatusCode | 403 |
