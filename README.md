# EMS Ventura - Tech Challenge

Projeto feito com o intuito de realizar o desafio proposto pela empresa [EMS VENTURA](https://github.com/emsventura/tech_challenge), no qual deve-se consumir uma API que apresenta a cotaçao de moedas, utilizando PHP, e o framework Laravel, assim como uma biblioteca para gerar um gráfico com o intuito de acompanhar as últimas variações de cotações de moedas.

## Tecnologias Utilizadas

Para realizar esse projeto foram utilizadas tecnologias, algumas foram requisitos para o projeto e outras diferenciais, tais como:

- PHP 7.4 - Utilizado como a linguagem de programação principal.
- Docker - Utilizado para instanciar os containers.
- Laravel 8 - Utilizado como framework.
- API pública AwesomeAPI - Utilizada para gerar as informacoes sobre a cotaçõe das moedas.
- Guzzlehttp 7.0.1 - Utilizado para fazer os request's na API.
- ChartJS - Utilizado para gerar o gráfico.
- Git-commit-msg-linter - Utilizado como diretrizes de mensagem de commit.
- CSS3 - Utilizado para estilizar a aplicação.

## Pré-requisitos

- Tenha o Docker instalado.
- Tenha o Docker-compose instalado.

## Como Executar

1. Clone o repositorio.

```bash
git clone https://github.com/PauloStein/ems-ventura-tech-challenge.git
 ```

2. Copie o arquivo .env-example para .env.
 ```bash
 cp .env-example .env
 ```
3. Instancie o container do docker.

 ```bash
 docker-compose up
  ```

4. Acesse a [aplicação](http://127.0.0.1:8000).
