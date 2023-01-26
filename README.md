# ??? find me a name

## Functionalities :
### Essentials :
- [ ] web access
- [ ] messages text
- [ ] messages vocal
- [ ] file sharing
- [ ] sent date
- [ ] received date
- [ ] hidden text
- [ ] thread
- [ ] delete for me
- [ ] hidden picture
- [ ] message send masked for me
- [ ] customisation of chat backgrounds

### To be out of beta :
- [ ] voice call
- [ ] video call
- [ ] emoji reactions
- [ ] connection status
- [ ] customisation of the message layout
- [ ] custom emojis
- [ ] pinned messages

### To be V.2 :
- [ ] dark-theme
- [ ] sharing of large files
- [ ] locket like
- [ ] spotify listening
- [ ] location sharing

### To be V.3 :
- [ ] spotify shared music streaming
- [ ] shared calendar
- [ ] account without email

## Data dictionary :
### User
| name                      | type       | length | nullable | description | default |
|---------------------------|------------|:------:|:--------:|------------:|--------:|
| id                        | bigint     |        |          |     Primary |         |
| name                      | string     |  100   |          |             |         |
| email                     | string     |        |          |      Unique |         |
| email_verified_at         | timestamp  |        |          |             |         |
| password                  | string     |        |          |             |         |
| two_factor_secret         | text       |        |   true   |             |         |
| two_factor_recovery_codes | text       |        |   true   |             |         |
| two_factor_confirmed_at   | timestamp  |        |   true   |             |         |
| remember_token            | string     |  100   |   true   |             |         |
| current_team_id           | bigint     |   20   |   true   |  FK -> team |         |
| profile_photo_path        | string     |  2048  |   true   |             |         |

### PasswordReset
| name       | type      | length | nullable | description | default |
|------------|-----------|:------:|:--------:|------------:|--------:|
| email      | string    |        |          |     Primary |         |
| token      | string    |        |          |             |         |
| created_at | timestamp |        |   true   |             |         |

### FailedJobs
| name       | type      | length | nullable | description | default |
|------------|-----------|:------:|:--------:|------------:|--------:|
| id         | bigint    |        |          |     Primary |         |
| uuid       | string    |        |          |      Unique |         |
| connection | text      |        |          |             |         |
| queue      | text      |        |          |             |         |
| payload    | longText  |        |          |             |         |
| exception  | longText  |        |          |             |         |
| failed_at  | timestamp |        |          |             | current |

### PersonalAccessToken
| name           | type      | length | nullable | description |    default |
|----------------|-----------|:------:|:--------:|------------:|-----------:|
| id             | bigint    |        |          |     Primary |            |
| tokenable_type | string    |        |          |  Index [^1] |            |
| tokenable_id   | uuid      |        |          |  Index [^1] |            |
| name           | string    |        |          |             |            |
| token          | string    |   64   |          |      Unique |            |
| abilities      | text      |        |   true   |             |            |
| last_used_at   | timestamp |        |   true   |             |            |
| expires_at     | timestamp |        |   true   |             |            |

[^1]: Index on tokenable_type and tokenable_id

### Session
| name          | type     | length | nullable |       description | default |
|---------------|----------|:------:|:--------:|------------------:|--------:|
| id            | string   |        |          |           Primary |         |
| user_id       | bigint   |        |   true   | Index, FK -> user |         |
| ip_address    | string   |   45   |   true   |                   |         |
| user_agent    | text     |        |   true   |                   |         |
| payload       | longText |        |          |                   |         |
| last_activity | integer  |        |          |             Index |         |
