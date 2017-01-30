PRAGMA foreign_keys=1;
PRAGMA encoding="UTF-8";

CREATE TABLE IF NOT EXISTS bookmark(
    id         INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT
    ,dateAdded INTEGER NOT NULL
    ,note      TEXT    DEFAULT NULL
    ,title     TEXT    DEFAULT NULL
    ,url       TEXT    NOT NULL
    ,UNIQUE(url)
);

CREATE TABLE IF NOT EXISTS tag(
    id           INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT
    ,description TEXT    DEFAULT NULL
    ,name        TEXT    NOT NULL
    ,UNIQUE(name)
);

CREATE TABLE IF NOT EXISTS bookmark_tags(
    bookmark_id INTEGER NOT NULL
    ,tag_id     INTEGER NOT NULL
    ,PRIMARY KEY(bookmark_id, tag_id)
    ,FOREIGN KEY(bookmark_id) REFERENCES bookmark(id)
    ,FOREIGN KEY(tag_id)      REFERENCES tag(id)
    ,UNIQUE(tag_id, bookmark_id)
);

/*
--------------------------------------------------------------------
| Samples                                                          |
--------------------------------------------------------------------
INSERT INTO bookmark (dateAdded,note,title,url) VALUES
(
    (SELECT strftime('%s','now'))
    ,'Test'
    ,'Da Google'
    ,'http://google.com'
);

INSERT INTO tag (description,name) VALUES('Da Google, OK.', 'Google');
*/

/*
--------------------------------------------------------------------
| SQLite 3 Modeling                                                |
--------------------------------------------------------------------

--------------------------------------------------------------------
|                          TABLE bookmark                          |
--------------------------------------------------------------------
|    Name    |   Type   | Not null | PK | AI | U | Default | Check |
--------------------------------------------------------------------
| id         | INTEGER  |     X    |  X |  X |   |         |       |
| dateAdded  | INTEGER  |     X    |    |    |   |         |       |
| note       | TEXT     |          |    |    |   |  NULL   |       |
| title      | TEXT     |          |    |    |   |  NULL   |       |
| url        | TEXT     |     X    |    |    | X |         |       |
--------------------------------------------------------------------
--------------------------------------------------------------------
|                        TABLE bookmark_tags                       |
--------------------------------------------------------------------
|    Name    |   Type   | Not null | PK | AI | U | Default | Check |
--------------------------------------------------------------------
| bookmark_id | INTEGER |     X    |  X |  X | X |         |       |
| tag_id      | INTEGER |     X    |  X |  X | X |         |       |    
--------------------------------------------------------------------
--------------------------------------------------------------------
|                             TABLE tag                            |
--------------------------------------------------------------------
|    Name     |   Type  | Not null | PK | AI | U | Default | Check |
--------------------------------------------------------------------
| id          | INTEGER |     X    |  X |  X |   |         |       |
| description | TEXT    |          |    |    |   |  NULL   |       |
| name        | TEXT    |     X    |    |    | X |         |       |
--------------------------------------------------------------------
*/
