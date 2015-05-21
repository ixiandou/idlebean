# ```GET /user```
获取用户列表
## 输入参数(这些参数都是可选)
- name: 用户名
- email: 邮箱
- password: 密码
- telephone: 电话
- area: 区域
- address: 地址
- role: 角色(0:管理员, 1:普通用户, 2:回收人员)
- lng: 经度
- lat: 纬度
- score: 打分
- bonus_total: 总积分
- bonus_unpaid: 未支付积分
- comments_good: 好评
- comments_mid: 中评
- comments_bad: 差评
- status: 状态

## 示例
### 请求
```
GET /user?name=wangchuan HTTP/1.1
Host: magic.my
Cache-Control: no-cache
```
### 返回
```
[
    {
        "id": 1,
        "name": "wangchuan",
        "email": "wangchuan3533@gmail.com",
        "telephone": "18610734056",
        "area": "",
        "address": "",
        "role": 0,
        "score": 0,
        "bonus_total": 0,
        "bonus_unpaid": 0,
        "comments_good": 0,
        "comments_mid": 0,
        "comments_bad": 0,
        "status": 0,
        "lng": 0,
        "lat": 0,
        "created_at": "2015-05-21 02:35:31",
        "updated_at": "2015-05-21 02:35:31"
    }
]
```

# ```POST /user```
创建用户
## 输入参数：
- name: 用户名
- email: 邮箱
- password: 密码
- telephone: 电话
- area: 区域
- address: 地址
- role: 角色(0:管理员, 1:普通用户, 2:回收人员)
- lng: 经度
- lat: 纬度

## 示例
### 请求
```
POST /user HTTP/1.1
Host: magic.my
Cache-Control: no-cache
Content-Type: application/x-www-form-urlencoded

name=wangchuan&email=wangchuan3533%40gmail.com&password=123456&telephone=18610734056&area=%E6%9C%9D%E9%98%B3%E5%8C%BA&addresss=%E5%8C%97%E4%BA%AC%E5%B8%82%E6%9C%9D%E9%98%B3%E5%8C%BA%E6%9C%9D%E9%98%B3%E9%97%A8%E9%93%B6%E6%B2%B3soho&lng=56.123&lat=121.111
```
### 返回
```
{
    "name": "wangchuan",
    "email": "wangchuan3533@gmail.com",
    "telephone": "18610734056",
    "updated_at": "2015-05-21 02:35:31",
    "created_at": "2015-05-21 02:35:31",
    "id": 1
}
```
	
# ```GET /user/{id}```
获取用户详情
## 输入参数
- id 用户id

## 示例
### 请求
```
GET /user/1 HTTP/1.1
Host: magic.my
Cache-Control: no-cache
```
### 返回
```
{
    "id": 1,
    "name": "wangchuan",
    "email": "wangchuan3533@gmail.com",
    "telephone": "18610734056",
    "area": "",
    "address": "",
    "role": 0,
    "score": 0,
    "bonus_total": 0,
    "bonus_unpaid": 0,
    "comments_good": 0,
    "comments_mid": 0,
    "comments_bad": 0,
    "status": 0,
    "lng": 0,
    "lat": 0,
    "created_at": "2015-05-21 02:35:31",
    "updated_at": "2015-05-21 02:35:31"
}
```

# ```PUT /user/{id}```
更改用户信息
## 参考创建用户

# ```GET /order```
获取订单列表

# ```POST /order```
新建订单

# ```GET /order/{id}```
获取订单详情

# ```PUT /order/{id}```
更新订单

# ```POST /photo```
上传图片

# ```GET /photo/{id}```
获取图片

# ```GET /token/{mobile}```
获取手机验证码（发短信到手机）

# ```GET /token/{mobile}/{code}```
确认手机验证码（返回token）

# ```GET /token/check/{mobile}/{token}```
检查token是否正确
