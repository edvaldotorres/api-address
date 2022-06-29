## Base Docker para o laravel 

## Diretórios
- config = Diretórios e arquivos de configurações do ambiente
- app = Sua aplicação


## Instale o Laravel

```
composer create-project laravel/laravel app
```


### Permissões no diretório storage/ (dentro de app/)

```
chmod -R 777 storage/
```

### Levanta o ambiente (na raiz)

```bash
docker-compose up --build -d
```

### Instala as dependências

```bash
docker exec -it front-gestao-de-ativos composer install
```

### Executando migrations

```bash
docker exec -it app php artisan migrate
```

## Guia de Commit

Padronizamos a forma de escrita dos commits. O objetivo é criar **mensagens mais legíveis** e que passem facilmente o histórico do projeto.

* Seja sucinto, porém é melhor sobrar do que faltar.
* Escreva sempre título e se necessário (geralmente é) uma mensagem explicando o que foi feito.
* Indicar o motivo é melhor do que o que foi feito no código, já que temos o diff para esse histórico.
* Idioma padronizado: **Inglês**.

### Formato da mensagem do commit

````
[Tag] #task Título Relevante do Commit

Mensagem do commit. Geralmente explicando o que foi alterado,
removido ou adicionado e possíveis detalhes de implementação
que possam ser usados pela equipe em desenvolvimentos futuros.
Um checklist explicando o que foi feito também é interessante.
````

### Exemplo de Tags

* **Feat:** Uma nova funcionalidade
* **Fix:** Correção de algum bug
* **Style:** Mudanças que não alteram o significado do código (white-space, formatação, ponto-e-virgula faltando...)
* **Refact:** Alteração do código que não corrige ou adiciona nada.
* **Docs:** Relacionado a documentações
* **Git:** Relacionado ao versionamento
* **Test:** Relacionado a testes

