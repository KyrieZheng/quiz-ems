# [phpems v6.1](https://phpems.is.js.cn)

开源免费的PHP无纸化模拟考试系统，基于 [PHPEMS](http://www.phpems.net/) v6.1 优化。本版本重点修复BUG(包括所有非 E_NOTICE 级别错误提示)，并根据需要优化新增一些功能。

因使用部分第三方扩展包，系统要求`php>=7.0`，默认集成扩展包如下：

| 扩展包 | 说明 |
| --- | --- |
| [illuminate/database](https://packagist.org/packages/illuminate/database) | Eloquent ORM，以[Model](https://learnku.com/docs/laravel/5.8/eloquent/3931)的方式操作数据库 |
| [symfony/var-dumper](https://packagist.org/packages/symfony/var-dumper) | 支持 dd()、dump() 等方法调试代码 |
| [predis/predis](https://packagist.org/packages/predis/predis) | 缓存驱动 Redis 基础扩展包，使系统支持Redis缓存 |
| [overtrue/wechat](https://packagist.org/packages/overtrue/wechat) | 开源的微信非官方 SDK，方便在考试系统开发微信服务号相关功能 |
| [overtrue/easy-sms](https://packagist.org/packages/overtrue/easy-sms) | 一款满足你的多种发送需求的短信发送组件 |
| [aliyuncs/oss-sdk-php](https://packagist.org/packages/aliyuncs/oss-sdk-php) | Aliyun OSS SDK for PHP |

## 优化&新增功能

- 新增使用composer，可直接安装第三方扩展包
- 为所有数据表定义 [Model](https://learnku.com/docs/laravel/5.8/eloquent/3931) ，数据库操作更灵活方便
- 可在线[数据库迁移](https://learnku.com/docs/laravel/5.8/migrations/3928)，请参考 `tasks` 目录下 `Database.php`
- 新增部分字符串和数组[辅助函数](https://learnku.com/docs/laravel/5.8/helpers/3919)，如：dd()
- 新增 Redis 缓存支持，请参考 `tasks` 目录中的 `Cache.php`

使用 ORM 操作数据库示例：
````php
// 获取userid为1的用户
$user = \Model\User::find(1);

// 获取用户名
echo $user->username;

// 调试输出用户所有信息
dd($user->getAttributes());

// 获取用户的考试记录
$eh = $user->examHistories;
foreach ($eh as $result){
    print_r($result->getAttributes());
}

// 获取用户开通的考场
$ob = $use->basics;
foreach($ob as $basic)
{
    // 考场信息
    print_r($basic->getAttributes());
    // 开通时间等信息
    print_r($basic->pivot->getAttributes());
}

// 获取basicid为1的考场
$basic = \Model\Basic::find(1);

// 获取考场考试科目信息
print_r($basic->subject->getAttributes());

// 获取考场的考试记录
$eh = $basic->examHistories;
foreach ($eh as $result){
    print_r($result->getAttributes());
}

// 获取开通考场的用户
$ou = $basic->users;
foreach($ou as $user)
{
    // 用户信息
    print_r($user->getAttributes());
    // 开通时间等信息
    print_r($user->pivot->getAttributes());
}

// 更多方法参考 model 目录
````

使用 Redis 缓存数据库示例：
```php
$client = new Predis\Client('tcp://127.0.0.1:6379');
$client->set('phpems:questions', json_encode(Cache::questions()));
$client->set('phpems:knows', json_encode(Cache::knows()));
```

## 安装和配置

### 安装

#### 方式1：使用 composer 创建项目

通过 [composer](https://getcomposer.org/) 指令直接创建项目

    composer create-project --prefer-dist phpems/phpems phpems

如果要安装 v5.0 版本，请使用以下指令：

    composer create-project --prefer-dist phpems/phpems phpems "5.*"

提示：推荐使用[阿里云 Composer 全量镜像](https://developer.aliyun.com/composer)

#### 方式2：使用 git 创建项目

使用 git 复制项目后使用 composer 安装依赖

    git clone https://github.com/phpems/phpems.git
    cd phpems && composer install
    cd lib && cp config.inc.example.php config.inc.php

### 配置

安装完成后，根据需要修改 lib 目录下的 `config.inc.php` 文件，配置数据库，然后使用 `tasks` 目录下的数据库文件 `phpems.sql` 创建数据库，项目上线后务必删除 `tasks` 目录。

如果是 phpems v5.0 版本升级到 v6.0，请使用 `tasks` 目录下的 `v5v6.sql` 升级数据库。

如果是 linux 系统，需要保证 `data` 目录具有可写权限，否则网站无法正常访问。

默认管理员账号：peadmin，密码：peadmin

> 源码默认关闭错误提示，如需调试请修改 `config.inc.php` 中 `DEBUG` 为 `true`。
