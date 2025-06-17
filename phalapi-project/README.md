# PhalApi Project

## 项目简介
PhalApi Project 是一个基于 PhalApi 框架的 RESTful API 项目，旨在提供高效、灵活的 API 服务。该项目使用 Docker 进行容器化部署，方便开发和生产环境的一致性。

## 目录结构
```
phalapi-project
├── config
│   └── config.php          # 项目配置文件
├── docker
│   ├── Dockerfile          # Docker 镜像构建文件
│   └── nginx.conf          # Nginx 配置文件
├── public
│   └── index.php           # 应用入口文件
├── src
│   ├── Controller
│   │   └── Default.php     # 控制器文件
│   ├── Domain
│   │   └── Default.php     # 业务逻辑文件
│   ├── Model
│   │   └── Default.php     # 数据模型文件
│   └── Common
│       └── functions.php   # 公共函数文件
├── composer.json           # Composer 配置文件
├── docker-compose.yml      # Docker Compose 配置文件
└── README.md               # 项目文档
```

## 安装与使用

### 环境要求
- PHP >= 7.2
- Composer
- Docker 和 Docker Compose

### 安装步骤
1. 克隆项目到本地：
   ```
   git clone <repository-url>
   cd phalapi-project
   ```

2. 使用 Composer 安装依赖：
   ```
   composer install
   ```

3. 构建 Docker 镜像：
   ```
   docker-compose build
   ```

4. 启动服务：
   ```
   docker-compose up -d
   ```

5. 访问 API：
   打开浏览器，访问 `http://localhost`，即可查看 API 响应。

## 贡献
欢迎任何形式的贡献！请提交问题或拉取请求。

## 许可证
本项目遵循 MIT 许可证。