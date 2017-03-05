# Instalação

> Atenção: Esse repositório usa [Docker](https://www.docker.com/) e [docker-compose](https://docs.docker.com/compose/) para criar a instalação,
> então você só precisa do Docker e docker-compose instalados, não precisará do PHP, MySQL, Apache nem o WordPress instalados em sua máquina.

---

Com o Docker e o docker-compose já instalados em sua máquina execute os seguintes comandos:

```
docker-compose build
docker-compose up -d
```

ou se preferir em apenas uma sequencia de comandos para fazer o build e já subir o container:

```
docker-compose up -d --build
```

Agora acesse: [localhost](http://localhost/) e faça sua instalação do WP.

## Instalação e build dos assets

> Para os assets do projeto usamos o [nodejs](https://nodejs.org/en/) com [gulpjs](http://gulpjs.com/) e
> [Bower](https://bower.io/) então tenha-os instalados em sua máquina.

### Instalação

Com o Nodejs, Bower e Gulpjs instalados execute a seguinte sequência de comandos:

```
cd src/assets/
npm install
bower install
```

### Build e watch

Para apenas fazer o build dos arquivos execute:

```
gulp build
```
ou
```
npm run build
```

Agora se você quiser trabalhar no front-end constantemente use o watch:

```
gulp watch
```
ou
```
npm start
```

### Para produção

Para criar os arquivos de produção execute o `gulp build` com o sub comando `--type production` para que o gulp crie os arquivos `.min` e comprima as imagens para produção.

```
gulp build --type production
```
