# 拼多多开放平台多多客SDK

说明：本SDK依赖于curl/curl类，使用SDK时，请先加载curl类，如果使用composer包安装，无需关注此说明

如果你有什么使用问题及bug，你可以到本SDK的github issues提交 [提交问题](https://github.com/henrickcn/duoduoke/issues).

## 安装方法

在终端进入对应的项目目录，输入以下命令:

```sh
composer require henrick/duoduoke
```

或者在composer.json文件追加此行

```json
"henrick/exmailqq": "*"
```

## 使用方法

```php
$clientId     = "test0001";  //应用ID
$clientSecret = "ii5Q4jihb1CcfyiT1TcIIq0ecmQKvRm"; //应用秘钥

//调用示例

use Henrick\Duoduoke\DuoduokeSDK;

$exmail = new DuoduokeSDK($clientId, $clientSecret);
$token = $exmail->goodsOptGet([
            'parent_opt_id' => 0
        ]);
```
## SDK说明
* 本SDK目前只包含了多多客所有API，所有类方法名命名规则根据多多客api接口Type值去掉pdd.ddk字符，剩余字符采用小驼峰命名，如官方接口pdd.ddk.cms.prom.url.generate，其对应cmsPromUrlGenerate()方法。

------
需要授权的接口还没有完善，现在只能使用不需要授权的接口

如果觉得有帮助到你，也欢迎各路大佬打赏！

<img src="https://henrickcn.github.io/exmailqq/img/wechat-pay.jpeg" width = "300" height = "300" div align=left />
