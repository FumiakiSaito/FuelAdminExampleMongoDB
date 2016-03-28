-- Project Name : noname
-- Date/Time    : 2016/03/18 11:45:03
-- Author       : fumiaki_local
-- RDBMS Type   : MySQL
-- Application  : A5:SQL Mk-2

-- 部署
drop table division cascade;

create table division (
  id INT UNSIGNED AUTO_INCREMENT not null comment '部署ID'
  , name VARCHAR(20) not null comment '部署名'
  , created_at DATETIME not null comment '作成日時'
  , updated_at DATETIME not null comment '更新日時'
  , constraint division_PKC primary key (id)
) comment '部署' ENGINE=InnoDB CHARACTER SET utf8;

-- 社員
drop table staff cascade;

create table staff (
  id INT UNSIGNED AUTO_INCREMENT not null comment '社員ID'
  , num VARCHAR(4) not null comment '社員番号'
  , name VARCHAR(20) not null comment '名前'
  , sex TINYINT UNSIGNED not null comment '性別'
  , division_id INT UNSIGNED not null comment '所属部署ID'
  , created_at DATETIME not null comment '作成日時'
  , updated_at DATETIME not null comment '更新日時'
  , constraint staff_PKC primary key (id)
) comment '社員' ENGINE=InnoDB CHARACTER SET utf8;

-- 管理者
drop table admin cascade;

create table admin (
  id INT UNSIGNED AUTO_INCREMENT not null comment '管理者ID'
  , username VARCHAR(50) not null comment 'アカウント'
  , password CHAR(255) not null comment 'パスワード'
  , group INT default 1 not null comment 'グループ'
  , email VARCHAR(255) not null comment 'メールアドレス'
  , last_login VARCHAR(25) comment '最終ログイン'
  , login_hash VARCHAR(255) comment 'ログインハッシュ'
  , profile_fields TEXT comment 'プロファイルフィールド'
  , created_at INT not null comment '作成日時	 UNIXタイムスタンプ'
  , updated_at INT not null comment '更新日時	 UNIXタイムスタンプ'
  , constraint admin_PKC primary key (id)
) comment '管理者' ENGINE=InnoDB CHARACTER SET utf8;
