--
-- 事前準備クエリ
--

-- 管理者登録
-- admin / admin
INSERT INTO admin (id, username, password, `group`, email, last_login, created_at, updated_at) VALUES(1, 'admin', 'K0VTGAnXgKh1OJcRXlmDcf64j5wriR1MuZdREx1f1lA=', 100, 'admin@hoge.com', UNIX_TIMESTAMP(NOW()), UNIX_TIMESTAMP(NOW()) , UNIX_TIMESTAMP(NOW()));


-- 部署登録
INSERT INTO division(id, name, created_at, updated_at) VALUES 
(1, '開発部', NOW(), NOW()),
(2, '総務部', NOW(), NOW());

