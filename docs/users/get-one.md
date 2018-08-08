# Get a user should return user content without password

## Precondition

* [Login](../common/login.md)

## GET /users/1

| Header | Value |
| - | - |
| Authorization | Bearer {access-token} |

## Expectation

| Assert | Expected |
| - | - |
| StatusCode | 200 |
| HEADER.content-type | /^application/json[;$]/ |
| DATA.id | 1 |
| DATA.display | Administrator |
| DATA.login | admin |
| DATA.displayed_image | 0 |
| DATA.created_at | /\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}/ |
| DATA.updated_at | /\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}/ |
| DATA.pwd | *should not exist* |

### Example

```
{
    "id": 1,
    "display": "Administrator",
    "login": "admin",
    "created_at": "2018-07-26 17:54:40",
    "updated_at": "2018-07-26 17:54:40",
    "displayed_image": 0
}
```