# Upload photo files

## Precondition

* [Login as a user](../common/login-with-user-1.md)

## POST /media/photo

| Header | Value |
| - | - |
| Authorization | Bearer {access-token} |

### Photos to be uploaded

Photos to be uploaded will be the file in the link in the bullets below. They will be uploaded to the corresponding field name mentioned in the bracket.

* [photo](../files/3x3.gif)
* [photo](../files/lamp.png)
* [not-a-photo](../files/simple-text.txt)

## Expectation

| Assert | Expected |
| - | - |
| StatusCode | 201 |
