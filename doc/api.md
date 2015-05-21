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
## 输入参数(查询条件，均为可选)
- client_id: 客户id
- worker_id: 回收人员id
- type: 回收类型
- name: 产品名称
- channel: 渠道
- version: 版本
- color: 颜色
- storage: 容量
- insurance: 保修
- surface: 表面
- screen_surface: 屏幕表面 
- screen_display: 屏幕显示
- damp: 损坏程度
- repair: 维修记录
- start_problem: 启动问题
- key_problem: key问题
- address: 地址
- user_img_path: 用户上传图片路径
- user_img_url: 图片url
- worker_img_path: 回收人员上传路径
- worker_img_url: 回收人员上传图片url
- eval_price: 估价
- real_price: 实际价格
- lng: 经度
- lat: 纬度
- pic_list: 图片列表 
- attr: 属性
- other: 其他

# ```POST /order```
新建订单
## 输入参数
- client_id: 客户id
- worker_id: 回收人员id
- type: 回收类型
- name: 产品名称
- channel: 渠道
- version: 版本
- color: 颜色
- storage: 容量
- insurance: 保修
- surface: 表面
- screen_surface: 屏幕表面 
- screen_display: 屏幕显示
- damp: 损坏程度
- repair: 维修记录
- start_problem: 启动问题
- key_problem: key问题
- address: 地址
- user_img_path: 用户上传图片路径
- user_img_url: 图片url
- worker_img_path: 回收人员上传路径
- worker_img_url: 回收人员上传图片url
- eval_price: 估价
- real_price: 实际价格
- lng: 经度
- lat: 纬度
- pic_list: 图片列表 
- attr: 属性
- other: 其他

# ```GET /order/{id}```
获取订单详情
## 输入参数
- id order_id

# ```PUT /order/{id}```
更新订单
## 输入参数
同创建接口

# ```POST /photo```
上传图片
## 输入参数
- user_id 用户id
- photo 图片文件

# ```GET /photo/{id}```
获取图片
## 输入参数
- id 图片id

# ```GET /token/{mobile}```
获取手机验证码（发短信到手机）
## 输入参数
- mobile 手机号码

# ```GET /token/{mobile}/{code}```
确认手机验证码（返回token）
## 输入参数
- mobile 手机号码
- code 手机收到的短信验证码

# ```GET /token/check/{mobile}/{token}```
检查token是否正确
## 输入参数
- mobile 手机号码
- token 短信验证返回的token

# ```GET /bonus/add/{user}/{bonus}```
用户积分增加
## 输入参数
- user user_id
- bonus 增加的积分

# ```GET /bonus/cost/{user}/{bonus}```
用户积分消费
## 输入参数
- user user_id
- bonus 消费的积分

# ```GET /comment/add/{user}/{level}```
好评、中评、差评　
## 输入参数
- user user_id
- level 好评、中评或差评(分别为good, mid, bad)

