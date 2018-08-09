# Delete a post by admin should success

## Precondition

* [Login with User 1 Account](../common/login-with-user-1.md)
* [Create New Post](../common/create-new-post.md)
* [Login with Admin Account](../common/login-with-admin.md)

## DELETE {new-post-uri}

| Header | Value |
| - | - |
| Authorization | Bearer {access-token} |
| Content-Type | application/json |

## Expectation

| Assert | Expected |
| - | - |
| StatusCode | 200 |
