# Get a media file should return media content

## Precondition

* [Login as a user](../common/login-with-user-1.md)
* [Create New Media File](../common/create-new-media.md)

## GET {new-media-uri}

## Expectation

| Assert | Expected |
| - | - |
| StatusCode | 200 |
| HEADER.content-type | /^image/gif$/ |

## Finally

[Delete New Media](../common/delete-new-media.md)
