# Create a new media file

## Precondition

* [Login as a user](../common/login-with-user-1.md)

## POST /api/media

| Header | Value |
| - | - |
| Authorization | Bearer {access-token} |
| Content-Type | image/gif |
| Content-Length | 90 |

Media file content in hexadecimal string, escaped byte by byte. The following binary is a 3x3 gif image with 9 colors.

```
\x47\x49\x46\x38\x37\x61\x03\x00\x03\x00\xF3\x00\x00\x00\x00\x00\xFF\xFF\xFF\xFF\x00\x00\x43\xF2\x0D\x0D\x28\xF2\xE5\xF2\x0D\x93\x0D\xF2\x0D\xF2\xC9\xE4\x0D\xF2\x26\x45\xC9\x26\x45\xC9\x26\x45\xC9\x26\x45\xC9\x26\x45\xC9\x26\x45\xC9\x26\x45\xC9\x21\xF9\x04\x01\x00\x00\x09\x00\x2C\x00\x00\x00\x00\x03\x00\x03\x00\x00\x04\x07\x10\x04\x31\x48\x31\x07\x45\x00\x3B
```

## Expectation

| Assert | Expected |
| - | - |
| StatusCode | 201 |

## Capture

| Name | Value |
| - | - |
| new-media-uri | Header.Location |

## Finally

[Delete New Media](../common/delete-new-media.md)
