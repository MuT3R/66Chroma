### Chroma contest ###

## chroma_contest

| Nom | Type | Interclassement | Attributs | Null | Valeur par défaut | Extra |
| --- | --- | --- | --- | --- | --- | --- |
| ID | bigint(20) | - | unsigned |  NOT NULL | - | AUTO_INCREMENT |
| contest_name | bigint(20) | - | unsigned | NOT NULL | - | - |
| contest_date | date | - | - | NOT NULL | timestamp | - |
| contest_description | text | utf8mb4_unicode_520_ci | - | NOT NULL | ' ' | - |
| artwork_name | text | utf8mb4_unicode_520_ci | - | NOT NULL | ' ' | - |

## chroma_contest_vote

| Nom | Type | Interclassement | Attributs | Null | Valeur par défaut | Extra |
| --- | --- | --- | --- | --- | --- | --- |
| user_id | bigint(20) | - | unsigned | NOT NULL | - | - |
| contest_id| bigint(20) | - | unsigned | NOT NULL | - | - |
| creation_id | bigint(20) | - | unsigned | NOT NULL | - | - |